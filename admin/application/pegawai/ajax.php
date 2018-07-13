<?php

require '../../config/class.php';

$db = new dbObj();
$connString = $db->getConstring();
$eClass = new Pegawai($connString);

$requestData = $_REQUEST;

$columns = array(
    0 => 'id',
    1 => 'nip',
    2 => 'nama_peg',
    3 => 'jabatan',
    4 => 'alamat_peg',
    5 => 'no_tlp',
    6 => 'email'
);

$eClass->getData($requestData, $columns);

class Pegawai {
    
    protected $conn;
    protected $data = [];

    function __construct($connString) {
        $this->conn = $connString;
    }

    public function getData($req, $col) {
        $this->data = $this->getRecords($req, $col);
        echo json_encode($this->data);
    }

    function getRecords($req, $col) {                

        $sqlTot = "SELECT data_pegawai.id, nip, nama_peg, jabatan, alamat_peg, "
                . "no_tlp, email";
        $sqlTot .= " FROM data_pegawai";
        $sqlTot .= " INNER JOIN master_jabatan ON data_pegawai.jabatan_peg = master_jabatan.id";

        $sql = $sqlTot;

        $qTot = mysqli_query($this->conn, $sqlTot) or die("error fetch data: ");
        $totalData = mysqli_num_rows($qTot);
        $totalFiltered = $totalData;
        
        if(!empty($req['search']['value'])) {

            $sql .=" WHERE nip LIKE '%" . $req['search']['value'] . "%' "
                    . "OR nama_peg LIKE '%".$req['search']['value']."%'";            
            
            $query = mysqli_query($this->conn, $sql) or die("ajax-grid-data.php: get PO");
            $totalFiltered = mysqli_num_rows($query);

            $sql .=" ORDER BY " . $col[$req['order'][0]['column']] . " " . 
            $req['order'][0]['dir'] . " LIMIT " . $req['start'] . " ," . $req['length'] . " "; 
            $query = mysqli_query($this->conn, $sql) or die("ajax-grid-data.php: get PO"); 

        }else{

            $sql .=" ORDER BY " . $col[$req['order'][0]['column']] . " 
            " . $req['order'][0]['dir'] . " LIMIT " . $req['start'] . " ,
            " . $req['length'] . " ";
            $query = mysqli_query($this->conn, $sql) or die("ajax-grid-data.php: get PO");
        }

        $user = new User($this->conn);

        while ($row = mysqli_fetch_assoc($query)) {
            $nestedData = [];
            
            $nestedData[] = $user->linkAct($row['id']);            
            $nestedData[] = $row['nip'];
            $nestedData[] = $row['nama_peg'];
            $nestedData[] = $row['jabatan'];
            $nestedData[] = $row['alamat_peg'];
            $nestedData[] = $row['no_tlp'];
            $nestedData[] = $row['email'];

            $data[] = $nestedData;            
        }

        if($totalData > 0) {
            $json_data = array(
                "draw" => intval($req['draw']), 
                "recordsTotal" => intval($totalData), 
                "recordsFiltered" => intval($totalFiltered), 
                "data" => $data
            );
        }else{
            $json_data = array(
                "draw" => 0,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        return $json_data;
    }
}//end class pegawai
<?php

require '../../config/class.php';

$db = new dbObj();
$connString = $db->getConstring();
$eClass = new Proyek($connString);
$tb_name = "master_kategori_proyek";

$requestData = $_REQUEST;

$columns = array(    
    0 => 'kode_proyek',    
    1 => 'id',
    2 => 'nama_proyek',
    3 => 'keterangan'
);

$eClass->getData($requestData, $columns, $tb_name);

class Proyek {

    protected $conn;
    protected $data = [];

    function __construct($connString) {
        $this->conn = $connString;
    }

    public function getData($req, $col, $tb_name) {
        $this->data = $this->getRecords($req, $col, $tb_name);
        echo json_encode($this->data);
    }

    function getRecords($req, $col, $tb_name) {                

        $sqlTot = "SELECT *";
        $sqlTot .= " FROM ".$tb_name;    

        $sql = $sqlTot;

        $qTot = mysqli_query($this->conn, $sqlTot) or die("error fetch data: ");
        $totalData = mysqli_num_rows($qTot);
        $totalFiltered = $totalData;
        
        if(!empty($req['search']['value'])) {

            $sql .=" WHERE nama_proyek LIKE '%" . $req['search']['value'] . "%' ";            
            
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
            $nestedData[] = $row['kode_proyek'];
            $nestedData[] = $row['nama_proyek'];
            $nestedData[] = $row['keterangan'];

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
}//end class proyek

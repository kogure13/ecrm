<?php
include_once '../../../config/class.php';
include_once '../../../config/function.php';

$db = new dbObj();
$connString = $db->getConstring();
$eClass = new Keluhan($connString);

$requestData = $_REQUEST;

$columns = array(
    0 => 'id',
    1 => 'tanggal',
    2 => 'id',
    3 => 'nama_proyek',
    4 => 'keterangan'
);

$eClass->getData($requestData, $columns);

class Keluhan {
    
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

        $sqlTot = "SELECT data_penilaian.id, data_penilaian.tanggal, data_prospek.status,"
                . "master_kategori_proyek.nama_proyek, data_penilaian.keterangan";
        $sqlTot .= " FROM data_penilaian";
        $sqlTot .= " JOIN data_prospek ON data_penilaian.id_prospek = data_prospek.id";
        $sqlTot .= " JOIN master_kategori_proyek ON data_prospek.id_proyek = master_kategori_proyek.id";        
        $sqlTot .= " WHERE keluhan = TRUE";
        
        $sql = $sqlTot;                

        $qTot = mysqli_query($this->conn, $sqlTot) or die("error fetch data: ");
        $totalData = mysqli_num_rows($qTot);
        $totalFiltered = $totalData;
        
        if(!empty($req['search']['value'])) {

            $sql .= " AND nama_proyek LIKE '%" . $req['search']['value'] . "%'";            
            
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
            
            switch ($row['status']) {
                default : $ubtn = $user->editAct($row['id']);
                    break;
            }
            
            $nestedData[] = NULL;
            $nestedData[] = $ubtn;
            $nestedData[] = $row['tanggal'];
            $nestedData[] = $row['nama_proyek'];
            $nestedData[] = NULL;
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
}//end class keluhan
?>
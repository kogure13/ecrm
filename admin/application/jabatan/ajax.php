<?php
include_once '../../../config/class.php';
include_once '../../../config/function.php';

$db = new dbObj();
$connString = $db->getConstring();
$jabatanClass = new Jabatan($connString);

$requestData = $_REQUEST;

$columns = array(    
    0 => 'kode_jabatan',
    1 => 'id',    
    2 => 'jabatan'
);

$jabatanClass->getData($requestData, $columns);

class Jabatan {

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

        $sqlTot = "SELECT *";
        $sqlTot .= " FROM master_jabatan";    

        $sql = $sqlTot;

        $qTot = mysqli_query($this->conn, $sqlTot) or die("error fetch data: ");
        $totalData = mysqli_num_rows($qTot);
        $totalFiltered = $totalData;
        
        if(!empty($req['search']['value'])) {

            $sql .=" WHERE jabatan LIKE '%" . $req['search']['value'] . "%' ";            
            
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
            
            $nestedData[] = $user->editAct($row['id']);
            $nestedData[] = $row['kode_jabatan'];
            $nestedData[] = $row['jabatan'];

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
}//end class jabatan
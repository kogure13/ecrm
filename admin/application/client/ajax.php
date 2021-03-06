<?php
require '../../../config/class.php';

$db = new dbObj();
$connString = $db->getConstring();
$eClass = new Client($connString);
$tb_name = "data_client";

$requestData = $_REQUEST;

$columns = array(    
    0 => 'id',
    1 => 'date_register',
    2 => 'id',
    3 => 'company_name',
    4 => 'company_address',    
    5 => 'tlp',
    6 => 'email',    
    7 => 'username',
    8 => 'status_client'
);

$eClass->getData($requestData, $columns, $tb_name);

class Client {

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

        if (!empty($req['search']['value'])) {

            $sql .= " WHERE company_name LIKE '%" . $req['search']['value'] . "%' ";
            $sql .= " OR username LIKE '".$req['search']['value']."'";
            $sql .= " OR email LIKE '%".$req['search']['value']."%'";

            $query = mysqli_query($this->conn, $sql) or die("ajax-grid-data.php: get PO");
            $totalFiltered = mysqli_num_rows($query);

            $sql .=" ORDER BY " . $col[$req['order'][0]['column']] . " " .
                    $req['order'][0]['dir'] . " LIMIT " . $req['start'] . " ," . $req['length'] . " ";
            $query = mysqli_query($this->conn, $sql) or die("ajax-grid-data.php: get PO");
        } else {

            $sql .=" ORDER BY " . $col[$req['order'][0]['column']] . " 
            " . $req['order'][0]['dir'] . " LIMIT " . $req['start'] . " ,
            " . $req['length'] . " ";
            $query = mysqli_query($this->conn, $sql) or die("ajax-grid-data.php: get PO");
        }

        $user = new User($this->conn);
                
        while ($row = mysqli_fetch_assoc($query)) {
            $nestedData = [];
            $status = '';
            
            if($this->ctClient($row['id']) > 0) {
                $status = "Aktif";
            }else {
                $status = "Pasif";
            }                        
            
            $nestedData[] = NULL;
            $nestedData[] = $row['username'];
            $nestedData[] = $row['company_name'];
            $nestedData[] = $row['company_address'];
            $nestedData[] = $row['tlp'];
            $nestedData[] = $row['email'];
            $nestedData[] = $row['date_register'];
            $nestedData[] = $status;

            $data[] = $nestedData;
        }

        if ($totalData > 0) {
            $json_data = array(
                "draw" => intval($req['draw']),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data
            );
        } else {
            $json_data = array(
                "draw" => 0,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        return $json_data;
    }
    
    function ctClient($params) {
        $sql = "select count(*) as cl ";
        $sql .= "FROM data_prospek ";
        $sql .= "WHERE id_client = $params AND ";
        $sql .= "(status = 1 OR status = 2)";
        
        $result = mysqli_query($this->conn, $sql) or die();
        $row = mysqli_fetch_assoc($result);
        $d = $row['cl'];
        return $d;
    }
}//end class client
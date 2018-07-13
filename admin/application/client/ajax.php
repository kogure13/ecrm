<?php
require '../../config/class.php';

$db = new dbObj();
$connString = $db->getConstring();
$eClass = new Client($connString);
$tb_name = "data_client";

$requestData = $_REQUEST;

$columns = array(    
    0 => 'date_register',
    1 => 'id',
    2 => 'company_name',
    3 => 'company_address',    
    4 => 'tlp',
    5 => 'email',    
    6 => 'username',
    7 => 'status_client'
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
            
            $nestedData[] = $user->editAct($row['id']);
            $nestedData[] = $row['username'];
            $nestedData[] = $row['company_name'];
            $nestedData[] = $row['company_address'];
            $nestedData[] = $row['tlp'];
            $nestedData[] = $row['email'];
            $nestedData[] = $row['date_register'];            
            $nestedData[] = $row['status_client'];

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
}//end class client
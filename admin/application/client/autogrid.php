<?php
require_once '../../../config/class.php';

$db = new dbObj();
$connString = $db->getConstring();
$tb_name = "data_client";
$params = $_REQUEST['term'];

$grid = new grid($connString);

    $grid->getData($params, $tb_name);



class grid {
    protected $conn;
    protected $data = [];
    
    function __construct($connString) {
        $this->conn = $connString;
    }
    
    function getData($params, $tb_name) {
        //$json_data = [];
        $sql = "SELECT * FROM ".$tb_name;
        $sql .= " WHERE email LIKE '%".$params."%' OR "
                . "company_name LIKE '%".$params."%'";

        $result = mysqli_query($this->conn, $sql) or die();
                
        while ($row = mysqli_fetch_assoc($result)) {            
            $data = array(
                'value' => $row['id'],
                'label' => $row['email']
            );
        }
        echo json_encode($data);
    }
}
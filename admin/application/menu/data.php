<?php

include_once '../../../config/class.php';
$db = new dbObj();
$connString = $db->getConstring();
$crudClass = new CRUD($connString);
$tb_name = "data_user";

if(!isset($_GET['id'])){
    exit();
}else{
    $params = $_GET['id'];
}

if ($params > 0) {
    $crudClass->getData($params, $tb_name);
} else {
    mysql_errno();
}

class CRUD {

    protected $conn;    

    function __construct($connString) {
        $this->conn = $connString;
    }

    function getData($params, $tb_name) {
        $json_data = [];
        $sql = "SELECT SUBSTR(nama_peg, 1, 8) AS nama_peg FROM ".$tb_name;
        $sql .= " JOIN data_pegawai ON data_pegawai.id = data_user.id_reff";
        $sql .= " WHERE $tb_name.id = $params";

        $result = mysqli_query($this->conn, $sql) or die();
                
        while ($row = mysqli_fetch_assoc($result)) {            
            $json_data = $row;
        }
        echo json_encode($json_data);
    }
}

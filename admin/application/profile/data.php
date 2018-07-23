<?php
include_once '../../../config/class.php';
include_once '../../../config/function.php';

$db = new dbObj();
$connString = $db->getConstring();

$params = $_REQUEST;
$tb_name = "data_user";

$crudClass = new CRUD($connString);
$crudClass->updateData($params);

class CRUD {

    protected $conn;

    function __construct($connString) {
        $this->conn = $connString;
    }       

    function updateData($params) {
        
        $sql = "UPDATE data_user SET";
        $sql .= " username = '".  addslashes($params['uname'])."', "
                . "password = '".  addslashes($params['password'])."'";
        $sql .= " WHERE id = '".$params['edit_id']."'";

        echo $result = mysqli_query($this->conn, $sql) or die("error to update data");
    }    

}

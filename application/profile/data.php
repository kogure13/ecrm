<?php
include_once '../../config/class.php';
include_once '../../config/function.php';
$db = new dbObj();
$connString = $db->getConstring();

$params = $_REQUEST;
$tb_name = "data_client";

$action = isset($params['action']) != '' ? $params['action'] : '';
$crudClass = new CRUD($connString);

switch ($action) {
    case 'save' : $crudClass->updateData($params, $tb_name);
        break;    
    default : break;
}

class CRUD {

    protected $conn;

    function __construct($connString) {
        $this->conn = $connString;
    }
    
    function updateData($params, $tb_name) {

        $numData = $this->cekData($params, $tb_name);

        if ($numData > 1) {
            echo 1;
        } else {

            $sql = "UPDATE " . $tb_name;
            $sql .= " SET company_name = '" . addslashes($params['cname']) . "',"
                    . " company_address = '" . addslashes($params['caddress']) . "',"
                    . " tlp = '" . $params['phone'] . "',"
                    . " email = '" . addslashes($params['email']) . "',"
                    . " username = '" . addslashes($params['uname']) . "'";
            $sql .= " WHERE id = '" . $_POST['edit_id'] . "'";

            $result = mysqli_query($this->conn, $sql) or die("error to update data");
            echo 0;
        }
    }    

    function cekData($params, $tb_name) {

        $sql = "SELECT * FROM " . $tb_name;
        $sql .= " WHERE email = '" . $params['email'] . "'";
        $query = mysqli_query($this->conn, $sql) or die('error to cek data');
        $numData = intval($query->num_rows);

        return $numData;
    }

}

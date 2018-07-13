<?php

include_once '../../config/class.php';
include_once '../../config/function.php';

$db = new dbObj();
$connString = $db->getConstring();

$params = $_REQUEST;
$tb_name = "data_client";

$password = $params['password'];
$hashpassword = hashing_pasword($password);

$action = isset($params['action']) != '' ? $params['action'] : '';
$crudClass = new CRUD($connString);

switch ($action) {
    case 'add' : $crudClass->insertData($params, $tb_name); break;
    case 'save' : $crudClass->regData($params, $tb_name, $hashpassword); break;
    case 'edit' : $crudClass->updateData($params, $tb_name); break;
    case 'delete' : $crudClass->deleteData($params, $tb_name); break;
    default : break;
}

class CRUD {

    protected $conn;

    function __construct($connString) {
        $this->conn = $connString;
    }

    function insertData($params, $tb_name) {

        $numData = $this->cekData($params, $tb_name);

        if ($numData > 0) {
            echo 1;
        } else {
            $sql = "INSERT INTO " . $tb_name;
            $sql .= " (company_name, company_address, tlp, email, date_register)";
            $sql .= " VALUES('" . addslashes($params['cname']) . "', "
                    . "'" . addslashes($params['caddress']) . "', '" . addslashes($params['tlp']) . "', "
                    . "'" . addslashes($params['email']) . "', '" . $params['jdate'] . "')";

            $result = mysqli_query($this->conn, $sql) or die("error to insert data");
            echo 0;
        }
    }
    
    function regData($params, $tb_name, $hashPassword) {        
        
        $numData = $this->cekData($params, $tb_name);
        
        if($numData > 0) {
            echo 1;
        } else {
            $sql = "INSERT INTO " . $tb_name;
            $sql .= " (company_name, company_address, tlp, email, date_register, username, password)";
            $sql .= " VALUES('" . addslashes($params['cname']) . "', "
                    . "'" . addslashes($params['caddress']) . "', '" . addslashes($params['phone']) . "', "
                    . "'" . addslashes($params['email']) . "', '" . $params['jdate'] . "', "
                    . "'".  addslashes($params['uname'])."', '".$hashPassword."')";

            $result = mysqli_query($this->conn, $sql) or die("error to insert data");
            echo 0;
        }
    }

    function updateData($params, $tb_name) {

        $numData = $this->cekData($params, $tb_name);

        if ($numData > 1) {
            echo 1;
        } else {
            $sql = "UPDATE " . $tb_name;
            $sql .= " SET company_name = '" . addslashes($params['cname']) . "', "
                    . " company_address ='" . addslashes($params['caddress']) . "', "
                    . " tlp = '" . addslashes($params['tlp']) . "', "
                    . " email = '" . addslashes($params['email']) . "', "
                    . " date_register = '" . $params['jdate'] . "'";
            $sql .= " WHERE id = '" . $_POST['edit_id'] . "'";

            $result = mysqli_query($this->conn, $sql) or die("error to update data");
            echo 0;
        }
    }

    function deleteData($params, $tb_name) {

        $sql = "DELETE FROM " . $tb_name;
        $sql .= " WHERE id = '" . $params['id'] . "'";

        echo $result = mysqli_query($this->conn, $sql) or die("error to delete data");
    }

    function cekData($params, $tb_name) {

        $sql = "SELECT * FROM " . $tb_name;
        $sql .= " WHERE email LIKE '%" . $params['email'] . "%'";
        $query = mysqli_query($this->conn, $sql) or die('error to cek data');

        $numData = intval($query->num_rows);
        return $numData;
    }

}

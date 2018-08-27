<?php

include_once '../../../config/class.php';
include_once '../../../config/function.php';

$db = new dbObj();
$connString = $db->getConstring();

$params = $_REQUEST;

$action = isset($params['action']) != '' ? $params['action'] : '';
$crudClass = new CRUD($connString);

switch ($action) {
    case 'add' : $crudClass->insertData($params);
        break;
    case 'edit' : $crudClass->updateData($params);
        break;
    case 'delete' : $crudClass->deleteData($params);
        break;
    default : break;
}

class CRUD {

    protected $conn;

    function __construct($connString) {
        $this->conn = $connString;
    }

    function insertData($params) {
        
        $sql = "INSERT INTO data_keluhan";
        $sql .= " (id_penilaian, status, keterangan)";
        $sql .= " VALUES('" . $params['edit_id'] . "', " . $params['status'] . "', "
                . "'" . addslashes($params['keterangan']) . "')";

        $result = mysqli_query($this->conn, $sql) or die("error to insert data");
        echo 0;
    }

    function updateData($params) {

        $sql = "UPDATE data_penilaian";
        $sql .= " SET keterangan = '" . addslashes($params['keterangan']) . "'";
        $sql .= " WHERE id = '" . $_POST['edit_id'] . "'";

        $result = mysqli_query($this->conn, $sql) or die("error to update data");
        echo 0;
    }

    function deleteData($params) {

        $sql = "DELETE from data_penilaian";
        $sql .= " WHERE id = '" . $_POST['id'] . "'";

        $result = mysqli_query($this->conn, $sql) or die("error to delete data");
        echo 'delete';
    }

}

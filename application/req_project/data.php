<?php
include_once '../../config/class.php';
include_once '../../config/function.php';
$db = new dbObj();
$connString = $db->getConstring();

$params = $_REQUEST;
$tb_name = "data_prospek";

$action = isset($params['action']) != '' ? $params['action'] : '';
$crudClass = new CRUD($connString);

switch ($action) {
    case 'add' : $crudClass->insertData($params, $tb_name);
        break;
    case 'edit' : $crudClass->updateData($params, $tb_name);
        break;
    default : break;
}

class CRUD {

    protected $conn;

    function __construct($connString) {
        $this->conn = $connString;
    }

    function insertData($params, $tb_name) {

        $sql = "INSERT INTO " . $tb_name;
        $sql .= " (no_reg, id_client, id_proyek, tgl_request, keterangan)";
        $sql .= " VALUES('" . $params['noreg'] . "', '" . $params['id_client'] . "',"
                . " '" . $params['kproyek'] . "', '" . $params['rdate'] . "',"
                . " '" . addslashes($params['keterangan']) . "')";

        $result = mysqli_query($this->conn, $sql) or die("error to insert data");
        echo 0;
    }

    function updateData($params, $tb_name) {

        $sql = "UPDATE " . $tb_name;
        $sql .= " SET tgl_request = '" . $params['rdate'] . "',"
                . " keterangan = '" . addslashes($params['keterangan']) . "',"
                . " id_proyek = '" . $params['kproyek'] . "'";
        $sql .= " WHERE id = '" . $_POST['edit_id'] . "'";

        $result = mysqli_query($this->conn, $sql) or die("error to update data");
        echo 0;
    }

}

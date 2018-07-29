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
    case 'add' : $crudClass->insertData($params, $tb_name); break;
    case 'add_comment' : $crudClass->insertComment($params); break;
    case 'edit' : $crudClass->updateData($params, $tb_name); break;

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

    function insertComment($params) {

        $sql = "INSERT INTO data_penilaian";

        if ($params['rdc'] == 1) {
            $sql .= " (id_prospek, keluhan, kepuasan, nilai_kepuasan, keterangan, tanggal)";
            $sql .= " VALUES('".$params['edit_id_comment']."', '0', '1', '".$params['rdstar']."', 
                    '".addslashes($params['keterangan'])."', '".$params['comdate']."')";

        } else if ($params['rdc'] == 0) {
            $sql .= " (id_prospek, keluhan, kepuasan, keterangan, tanggal)";
            $sql .= " VALUES('".$params['edit_id_comment']."', '1', '0', 
                    '".addslashes($params['keterangan'])."', '".$params['comdate']."')";
        }

        $result = mysqli_query($this->conn, $sql) or die("error to insert data");

        $sqlU = "UPDATE data_prospek";
        $sqlU .= " SET status = '5'";
        $sqlU .= " WHERE id = '".$params['edit_id_comment']."'";

        $resultU = mysqli_query($this->conn, $sqlU) or die("error to update data");
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

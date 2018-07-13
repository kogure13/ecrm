<?php

include_once '../../config/class.php';
$db = new dbObj();
$connString = $db->getConstring();

$params = $_REQUEST;
$tb_name = "data_pegawai";

$action = isset($params['action']) != '' ? $params['action'] : '';
$crudClass = new CRUD($connString);

switch ($action) {
    case 'add' : $crudClass->insertData($params, $tb_name);
        break;
    case 'edit' : $crudClass->updateData($params, $tb_name);
        break;
    case 'delete' : $crudClass->deleteData($params, $tb_name);
        break;
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
            $sql .= " (nip, nama_peg, jabatan_peg, alamat_peg, no_tlp, email)";
            $sql .= " VALUES('" . $params['nip'] . "','" . addslashes($params['fname']) . "', "
                    . "'" . $params['jabatan'] . "', '" . addslashes($params['alamat']) . "', '" . $params['tlp'] . "', "
                    . "'" . addslashes($params['email']) . "')";
            
            $sqli = $sql;
            //$result = mysqli_query($this->conn, $sql) or die("error to insert data");
            
            if(mysqli_query($this->conn, $sql)) {
                $last_id = mysqli_insert_id($this->conn);
                
                $sq = "SELECT id, nip FROM ".$tb_name;
                $sq .= " WHERE id = '".$last_id."'";
                
                $rts = mysqli_query($this->conn, $sq) or die();
                $rs = mysqli_fetch_assoc($rts);
                
                $si = "INSERT INTO data_user (username, password, id_reff)";
                $si .= " VALUES('".$rs['nip']."', '".$rs['nip']."', '".$rs['id']."')";
                
                $qsi = mysqli_query($this->conn, $si);
            }
            echo 0;
        }
    }

    function updateData($params, $tb_name) {

        $numData = $this->cekData($params, $tb_name);

        if ($numData > 1) {
            echo 1;
        } else {

            $sql = "UPDATE " . $tb_name;
            $sql .= " SET nip = '" . $params['nip'] . "',"
                    . " nama_peg = '" . addslashes($params['fname']) . "',"
                    . " jabatan_peg = '" . $params['jabatan'] . "',"
                    . " alamat_peg = '" . addslashes($params['alamat']) . "',"
                    . " no_tlp = '" . $params['tlp'] . "',"
                    . " email = '" . addslashes($params['email']) . "'";
            $sql .= " WHERE id = '" . $_POST['edit_id'] . "'";

            $result = mysqli_query($this->conn, $sql) or die("error to update data");
            echo 0;
        }
    }

    function deleteData($params, $tb_name) {

        $sql = "DELETE FROM " . $tb_name;
        $sql .= " WHERE id = '" . $params['id'] . "'";

        $result = mysqli_query($this->conn, $sql) or die("error to delete data");
    }

    function cekData($params, $tb_name) {

        $sql = "SELECT * FROM " . $tb_name;
        $sql .= " WHERE nip = '" . $params['nip'] . "'";
        $query = mysqli_query($this->conn, $sql) or die('error to cek data');
        $numData = intval($query->num_rows);

        return $numData;
    }

}

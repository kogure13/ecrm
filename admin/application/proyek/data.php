<?php

include_once '../../config/class.php';

$db = new dbObj();
$connString = $db->getConstring();

$params = $_REQUEST;
$tb_name = "master_kategori_proyek";

$action = isset($params['action']) != '' ? $params['action'] : '';
$crudClass = new CRUD($connString);

switch ($action) {
    case 'add' : $crudClass->insertData($params, $tb_name); break;
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

        if($numData > 0) {
            echo 1;
        }else{
            $sql = "INSERT INTO ".$tb_name;
            $sql .= " (kode_proyek, nama_proyek, keterangan)";
            $sql .= " VALUES('".addslashes($params['kode'])."', '".addslashes($params['proyek'])."', "
                    . "'".addslashes($params['keterangan'])."')";

            $result = mysqli_query($this->conn, $sql) or die("error to insert data");
            echo 0;
        }                
    }

    function updateData($params, $tb_name) {

        $numData = $this->cekData($params, $tb_name);

        if($numData > 1) {
            echo 1;
        }else{
            $sql = "UPDATE ".$tb_name;
            $sql .= " SET kode_proyek = '".addslashes($params['kode'])."', "
                    . "nama_proyek = '".  addslashes($params['proyek'])."', "
                    . "keterangan = '".  addslashes($params['keterangan'])."'";
            $sql .= " WHERE id = '" . $_POST['edit_id'] . "'";

            $result = mysqli_query($this->conn, $sql) or die("error to update data");
            echo 0;
        }                
    }

    function deleteData($params, $tb_name) {
        
        $sql = "DELETE FROM ".$tb_name;
        $sql .= " WHERE id = '" . $_POST['id'] . "'";

        $result = mysqli_query($this->conn, $sql) or die("error to delete data");
        echo 'delete';
    }

    function cekData($params, $tb_name) {
        
        $sql = "SELECT * FROM ".$tb_name;
        $sql .= " WHERE kode_proyek LIKE '%".$params['kode']."%'"
                . " OR nama_proyek LIKE '%".$params['proyek']."%'";        
        $query = mysqli_query($this->conn, $sql) or die('error to cek data');
        
        $numData = intval($query->num_rows);
        return $numData;
    }

}

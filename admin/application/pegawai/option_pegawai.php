<?php
require_once '../../../config/class.php';
$db = new dbObj();
$connString = $db->getConstring();

$params = $_REQUEST;

$optionClass = new Option($connString);
$optionClass->getOption($params);

class Option {
    
    protected $conn;    
            
    function __construct($connString) {
        $this->conn = $connString;
    }
    
    function getOption($params) {
        $json_data = [];
        $sql = "SELECT data_pegawai.id AS id, nama_peg FROM data_pegawai";
        $sql .= " JOIN master_jabatan ON data_pegawai.jabatan_peg = master_jabatan.id";
        $sql .= " WHERE jabatan = 'Marketing'";
        $result = mysqli_query($this->conn, $sql);
        
        while ($row = mysqli_fetch_assoc($result)){
            $json_data[] = $row;
        }                
        
        echo json_encode($json_data);
    }
}
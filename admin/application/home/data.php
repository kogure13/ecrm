<?php
include_once '../../../config/class.php';
include_once '../../../config/function.php';

$db = new dbObj();
$connString = $db->getConstring();
$homeClass = new homeClass($connString);
$params = $_REQUEST;

$action = isset($params['action']) != '' ? $params['action'] : '';

switch ($action) {
    default : $json_data = array(
            'jKepuasan' => $homeClass->getKepuasan($params),
            'jKeluhan' => $homeClass->getKeluhan($params),
            'jClient' => $homeClass->getClient($params)
        );
        echo json_encode($json_data);
        break;
}

class homeClass {

    protected $conn;

    function __construct($connString) {
        $this->conn = $connString;
    }

    function getKepuasan($params) {
        
        $sql = "SELECT sum(kepuasan) as kepuasan FROM data_penilaian";
        $result = mysqli_query($this->conn, $sql) or die('error to fetch data');
        $row = mysqli_fetch_array($result);

        return $row['kepuasan'];
    }
    
    function getKeluhan($params) {
        
        $sql = "SELECT sum(keluhan) as keluhan FROM data_penilaian";
        $result = mysqli_query($this->conn, $sql) or die('error to fetch data');
        $row = mysqli_fetch_array($result);

        return $row['keluhan'];
    }
    
    function getClient($params) {
        
        $sql = "SELECT * FROM data_client";
        $result = mysqli_query($this->conn, $sql) or die('error to fetch data');
        $qTotal = intval($result->num_rows);

        return $qTotal;
    }

}

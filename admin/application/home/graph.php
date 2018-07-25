<?php
include_once '../../../config/class.php';
include_once '../../../config/function.php';

$db = new dbObj();
$connString = $db->getConstring();

$params = $_REQUEST;

$optionClass = new Option($connString);
$optionClass->getOption();

class Option {
    
    protected $conn;    
            
    function __construct($connString) {
        $this->conn = $connString;
    }
    
    function getOption() {
        $sc = [];
                
        $query = "SELECT sum(kepuasan) as kepuasan, sum(keluhan) as keluhan, tanggal";
        $query .= " FROM data_penilaian";
        $query .= " GROUP BY tanggal";
        $result = mysqli_query($this->conn, $query);        
        
        foreach ($result as $a) {
            $sc[] = $a;
        }                
        
        echo json_encode($sc);        
    }
}
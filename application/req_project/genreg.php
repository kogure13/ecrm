<?php
require_once '../../admin/config/class.php';
require_once '../../admin/config/function.php';

$db = new dbObj();
$connString = $db->getConstring();

$params = $_REQUEST;

$noreg = new CRUD($connString);
$noreg->getData($params);

class CRUD {

    protected $conn;    

    function __construct($connString) {
        $this->conn = $connString;
    }

    function getData($params) {
 
        $sql = "SELECT * FROM data_prospek";        

        $result = mysqli_query($this->conn, $sql) or die();
        $numData = intval($result->num_rows);
        
        if($numData < 10) {
            $numData = $numData+1;
            $regno = "0".$numData;
        }else{
            $numData = $numData+1;
            $regno = $numData;
        }
        
        echo $regno;
    }
}
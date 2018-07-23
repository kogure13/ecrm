<?php
session_start();

require_once '../../config/class.php';
require_once '../..//config/function.php';

$db = new dbObj();
$connString = $db->getConstring();

$params = $_REQUEST;

$login = new Login($connString);
$login->getData($params);

class Login {
    
    protected $conn;    

    function __construct($connString) {
        $this->conn = $connString;
    }
    
    function getData($params) {
        
        $sql = "SELECT id, username, password FROM data_client";
        $sql .= " WHERE username = '".$params['uname']."'";
        
        $uTotal = $sql;
        $uquery = mysqli_query($this->conn, $uTotal) or die(0);
        $uNumData = intval($uquery->num_rows);
        
        if($uNumData > 0) {
            $query = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_assoc($query);
            if(password_verify($params['password'], $row['password'])) {
                $_SESSION['ecrm_client'] = true;
                $_SESSION['id_user'] = $row['id'];
                
                echo 0;
            } else {
                echo 1;
            }            
        } else {
            echo 1;
        }
    }
}

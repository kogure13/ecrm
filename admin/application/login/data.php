<?php
session_start();
include_once '../../../config/class.php';
include_once '../../../config/function.php';

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

        $sql = "SELECT * FROM data_user";
        $sql .= " WHERE username = '" . $params['uname'] . "'";        

        $qTotal = $sql;

        $uQuery = mysqli_query($this->conn, $qTotal) or die();
        $numData = intval($uQuery->num_rows);

        if ($numData > 0) {
            $query = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_assoc($query);
            
            if($row['password'] == $params['password']) {
                $_SESSION['admin_crm'] = true;
                $_SESSION['id_user'] = $row['id'];
                $_SESSION['id_reff'] = $row['id_reff'];
                $_SESSION['role'] = $row['role'];                
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 404;
        }
    }
}
?>
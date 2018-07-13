<?php
//get session(user) admin application
session_start();

//set class & configuration
require_once 'config/class.php';
require_once 'config/function.php';

$main = new Main();

if (isset($_SESSION['admin_crm'])) {
    include 'model/main.php';
} else {
    include 'model/login.php';
}
?>		
<?php
//set session
session_start();
//classes & function
require 'admin/config/class.php';
require 'admin/config/function.php';
//call main
$main = new Main();

include 'model/main.php';
?>
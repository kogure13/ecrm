<?php
//set session
session_start();
//classes & function
require 'config/class.php';
require 'config/function.php';
//call main
$main = new Main();
include 'model/main.php';
?>
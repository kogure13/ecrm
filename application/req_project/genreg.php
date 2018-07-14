<?php
require_once '../../admin/config/class.php';
require_once '../../admin/config/function.php';

$db = new dbObj();
$connString = $db->getConstring();

$params = $_REQUEST;

$noreg = new CRUD($connString);

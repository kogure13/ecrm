<?php
include_once '../../../config/class.php';
include_once '../../../config/function.php';
include_once '../DataPenilaian.php';

$db = new dbObj();
$connString = $db->getConstring();
$data = new Penilaian($connString);

$data = $data->getDataKeluhan('keluhan');
$dataE['data'] = $data;
$jData = json_encode($dataE);
echo $jData;
?>
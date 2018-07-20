<?php

date_default_timezone_set('Asia/Jakarta');

define('company_name', 'PT. CATUDAYA DATA PRAKASA');
define('company_name_short', 'CDP');
define('company_title', 'DC Power System and Controls');
define('apps_name', 'e-CRM');
define('key', 'HEX1234@bit.byte');

$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari = date("w");
$hari_ini = $seminggu[$hari];

$tgl_sekarang = date("Y-m-d");
$tgl_skrg     = date("d");
$bln_sekarang = date("m");
$thn_sekarang = date("Y");
$jam_sekarang = date("H:i:s");

$nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                    "Juni", "Juli", "Agustus", "September", 
                    "Oktober", "November", "Desember");

function hashing_pasword($password) {            
    
    $hash = password_hash($password, PASSWORD_DEFAULT);    
    
    return $hash;
}

function v_password($password, $hash_pass) {
    
    $hash = password_verify($password, $hash_pass);
    
    return $hash;
}

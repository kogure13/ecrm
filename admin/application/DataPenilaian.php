<?php

  class Penilaian {

  protected $conn;
  protected $data = [];

  function __construct($connString){
	$this->conn = $connString;
  }

  public function getDataKepuasan($a) {
	  
	$data = [];
			  
	$query = "SELECT data_penilaian.tanggal, master_kategori_proyek.nama_proyek, data_penilaian.nilai_kepuasan,
			data_penilaian.keterangan";
	$query .= " FROM data_penilaian";
	$query .= " JOIN data_prospek ON data_penilaian.id_prospek = data_prospek.id";
	$query .= " JOIN master_kategori_proyek ON data_prospek.id_proyek = master_kategori_proyek.id";
	$query .= " WHERE kepuasan = TRUE
				ORDER BY tanggal";
	$result = mysqli_query($this->conn, $query) or die("error fetch data: ");
	
	while ($row = mysqli_fetch_assoc($result)) {
	  $data[] = array(
		  $row['tanggal'], 
		  $row['nama_proyek'], 
		  $row['nilai_kepuasan'], 
		  $row['keterangan']		  
		);
	}    
	
	return $data;
  }

  public function getDataKeluhan($a) {

		$data = [];

		$query = "SELECT data_penilaian.tanggal, master_kategori_proyek.nama_proyek, data_penilaian.keterangan";
	$query .= " FROM data_penilaian";
	$query .= " JOIN data_prospek ON data_penilaian.id_prospek = data_prospek.id";
	$query .= " JOIN master_kategori_proyek ON data_prospek.id_proyek = master_kategori_proyek.id";
	$query .= " WHERE keluhan = TRUE
				ORDER BY tanggal";

	$result = mysqli_query($this->conn, $query) or die("error fetch data: ");
	
	while ($row = mysqli_fetch_assoc($result)) {
	  $data[] = array(
			'a',
		  $row['tanggal'], 
		  $row['nama_proyek'], 
		  $row['keterangan']		  
		);
	}    
	
	return $data;
  }

  
  }

?>
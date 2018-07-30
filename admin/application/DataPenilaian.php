<?php

class Penilaian {

    protected $conn;
    protected $data = [];

    function __construct($connString) {
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

    public function getDataKeluhan($req, $col) {

        $sqlTot = "SELECT data_penilaian.id, data_penilaian.tanggal, "
                . "master_kategori_proyek.nama_proyek, data_penilaian.keterangan";
        $sqlTot .= " FROM data_penilaian";
        $sqlTot .= " JOIN data_prospek ON data_penilaian.id_prospek = data_prospek.id";
        $sqlTot .= " JOIN master_kategori_proyek ON data_prospek.id_proyek = master_kategori_proyek.id";
        $sqlTot .= " WHERE keluhan = TRUE ORDER BY tanggal";
        
        $sql = $sqlTot;

        $qTot = mysqli_query($this->conn, $sqlTot) or die("error fetch data: ");
        $totalData = mysqli_num_rows($qTot);
        $totalFiltered = $totalData;

        if(!empty($req['search']['value'])) {

            $sql .=" WHERE nip LIKE '%" . $req['search']['value'] . "%' "
                    . "OR nama_proyek LIKE '%".$req['search']['value']."%'";            
            
            $query = mysqli_query($this->conn, $sql) or die("ajax-grid-data.php: get PO");
            $totalFiltered = mysqli_num_rows($query);

            $sql .=" ORDER BY " . $col[$req['order'][0]['column']] . " " . 
            $req['order'][0]['dir'] . " LIMIT " . $req['start'] . " ," . $req['length'] . " "; 
            $query = mysqli_query($this->conn, $sql) or die("ajax-grid-data.php: get PO"); 

        }else{

            $sql .=" ORDER BY " . $col[$req['order'][0]['column']] . " 
            " . $req['order'][0]['dir'] . " LIMIT " . $req['start'] . " ,
            " . $req['length'] . " ";
            $query = mysqli_query($this->conn, $sql) or die("ajax-grid-data.php: get PO");
        }

        $user = new User($this->conn);

        while ($row = mysqli_fetch_assoc($query)) {
            $nestedData = [];
            
            $nestedData[] = $user->editAct($row['id']);            
            $nestedData[] = $row['tanggal'];
            $nestedData[] = $row['nama_proyek'];
            $nestedData[] = $row['keterangan'];            

            $data[] = $nestedData;            
        }

        if($totalData > 0) {
            $json_data = array(
                "draw" => intval($req['draw']), 
                "recordsTotal" => intval($totalData), 
                "recordsFiltered" => intval($totalFiltered), 
                "data" => $data
            );
        }else{
            $json_data = array(
                "draw" => 0,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        return $json_data;
    }

}//end class

?>
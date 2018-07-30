<?php

session_start();
require '../../../config/class.php';

$db = new dbObj();
$connString = $db->getConstring();
$eClass = new Prospek($connString);

$requestData = $_REQUEST;

$columns = array(
    0 => 'tgl_request',
    1 => 'no_reg',
    2 => 'company_name',
    3 => 'nama_peg',
    4 => 'status'
);

$eClass->getData($requestData, $columns);

class Prospek {

    protected $conn;
    protected $data = [];

    function __construct($connString) {
        $this->conn = $connString;
    }

    public function getData($req, $col) {
        $this->data = $this->getRecords($req, $col);
        echo json_encode($this->data);
    }

    function getRecords($req, $col) {

        $sqlTot = "SELECT data_prospek.id AS id, no_reg, company_name, "
                . "nama_proyek, nama_peg, tgl_request, status, data_prospek.keterangan AS keterangan";
        $sqlTot .= " FROM data_prospek";
        $sqlTot .= " JOIN data_client ON data_prospek.id_client = data_client.id";
        $sqlTot .= " LEFT OUTER JOIN data_pegawai ON data_prospek.id_pegawai = data_pegawai.id";
        $sqlTot .= " JOIN master_kategori_proyek ON data_prospek.id_proyek = master_kategori_proyek.id";

        $sql = $sqlTot;

        $qTot = mysqli_query($this->conn, $sqlTot) or die("error fetch data: ");
        $totalData = mysqli_num_rows($qTot);
        $totalFiltered = $totalData;

        if (!empty($req['search']['value'])) {

            $sql .=" WHERE company_name LIKE '%" . $req['search']['value'] . "%'"
                    . " OR nama_peg LIKE '%" . $req['search']['value'] . "%'"
                    . " OR no_reg LIKE '%" . $req['search']['value'] . "%'";

            $query = mysqli_query($this->conn, $sql) or die("ajax-grid-data.php: get PO");
            $totalFiltered = mysqli_num_rows($query);

            $sql .=" ORDER BY " . $col[$req['order'][0]['column']] . " " .
                    $req['order'][0]['dir'] . " LIMIT " . $req['start'] . " ," . $req['length'] . " ";
            $query = mysqli_query($this->conn, $sql) or die("ajax-grid-data.php: get PO");
        } else {

            $sql .=" ORDER BY " . $col[$req['order'][0]['column']] . " 
            " . $req['order'][0]['dir'] . " LIMIT " . $req['start'] . " ,
            " . $req['length'] . " ";
            $query = mysqli_query($this->conn, $sql) or die("ajax-grid-data.php: get PO");
        }

        $user = new User($this->conn);

        while ($row = mysqli_fetch_assoc($query)) {
            $nestedData = [];

            switch ($row['status']) {
                case 0 : $status = 'Open'; $ubtn = $user->editAct($row['id']);
                    break;
                case 1 : $status = 'Approve'; $ubtn = '';
                    break;
                case 2 : $status = 'On-Progress'; $ubtn = '';
                    break;
                case 3 : $status = 'Canceled'; $ubtn = '';
                    break;
                case 4 : $status = 'Close'; $ubtn = '';
                    break;
                case 5 : $status = 'Close'; $ubtn = '';
                    break;
                default : break;
            }

            $nestedData[] = $ubtn;
            $nestedData[] = $row['no_reg'];
            $nestedData[] = $row['company_name'];
            $nestedData[] = $row['nama_proyek'];
            $nestedData[] = $row['nama_peg'];
            $nestedData[] = $row['tgl_request'];
            $nestedData[] = $status;
            $nestedData[] = $row['keterangan'];

            $data[] = $nestedData;
        }

        if ($totalData > 0) {
            $json_data = array(
                "draw" => intval($req['draw']),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data
            );
        } else {
            $json_data = array(
                "draw" => 0,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        return $json_data;
    }

}

//end class pegawai
<?php
session_start();
require '../../config/class.php';

$db = new dbObj();
$connString = $db->getConstring();
$eClass = new Prospek($connString);

$requestData = $_REQUEST;
$id = $_SESSION['id_user'];

$dbparams = array(
    0 => 'data_prospek',
    1 => $id
);

$columns = array(    
    0 => 'tgl_request',
    1 => 'id',
    2 => 'no_reg',
    3 => 'nama_proyek',
    4 => 'nama_peg',
    5 => 'status',
    6 => 'keterangan'
);

$eClass->getData($requestData, $columns, $dbparams);

class Prospek {

    protected $conn;
    protected $data = [];

    function __construct($connString) {
        $this->conn = $connString;
    }

    public function getData($req, $col, $dbparams) {
        $this->data = $this->getRecords($req, $col, $dbparams);
        echo json_encode($this->data);
    }

    function getRecords($req, $col, $dbparams) {

        $sqlTot = "SELECT $dbparams[0].id, no_reg, nama_proyek, tgl_request, "
                . " $dbparams[0].status, $dbparams[0].keterangan, nama_peg";
        $sqlTot .= " FROM ".$dbparams[0];
        $sqlTot .= " JOIN master_kategori_proyek ON $dbparams[0].id_proyek = master_kategori_proyek.id";
        $sqlTot .= " LEFT OUTER JOIN data_pegawai ON $dbparams[0].id_pegawai = data_pegawai.id";
        $sqlTot .= " WHERE $dbparams[0].id_client = $dbparams[1]";

        $sql = $sqlTot;

        $qTot = mysqli_query($this->conn, $sqlTot) or die("error fetch data: ");
        $totalData = mysqli_num_rows($qTot);
        $totalFiltered = $totalData;

        if (!empty($req['search']['value'])) {

            $sql .= " OR nama_proyek LIKE '%" . $req['search']['value'] . "%' ";            

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
                case 0 : $status = 'Open'; $ubtn = $user->editAct($row['id']);break;
                case 1 : $status = 'Approve'; $ubtn = '';break;
                case 2 : $status = 'On-Progress'; $ubtn = '';break;
                case 3 : $status = 'Canceled'; $ubtn = ''; break;
                case 4 : $status = 'Close'; $ubtn = $user->commentAct($row['id']); break;
                default : break;
            }
            
            $nestedData[] = $ubtn;
            $nestedData[] = $row['no_reg'];
            $nestedData[] = $row['tgl_request'];            
            $nestedData[] = $row['nama_proyek'];
            $nestedData[] = $row['nama_peg'];
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
}//end class client
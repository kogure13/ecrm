<?php

class dbObj {

    var $DB_Host = "localhost"; //koneksi localhost
    // var $DB_Host = "192.168.0.128"; //koneksi server
    var $DB_Name = "db_ecrm"; //nama database
    var $DB_User = "root"; //user database
    var $DB_Pass = ""; //password database
    var $conn;

    function getConstring() {
        $con = mysqli_connect($this->DB_Host, $this->DB_User, $this->DB_Pass, $this->DB_Name) or
                die("Connection failed: " . mysqli_connect_error());

        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        } else {
            $this->conn = $con;
        }

        return $this->conn;
    }

}

class Main {

    function get_page() {
        if (!isset($_GET['page'])) {
            include_once 'view/home.php';
        } else {
            $pages = htmlentities($_GET['page']);
            $page_root = "view/" . $pages . ".php";

            if (file_exists($page_root)) {
                include_once $page_root;
            } elseif ($_GET['page'] == "ulogin") {
                header("location: model/login/");
            } elseif ($_GET['page'] == "logout") {
                $db = new dbObj();
                $connString = $db->getConstring();
                $user = new User($connString);
                $user->logout();
            } else {
                include_once 'model/404.php';
            }
        }
    }

    function get_head() {
        include_once 'model/head.php';
    }

    function get_topbar() {
        include_once 'model/topbar.php';
    }

    function get_footer() {
        include_once 'model/footer.php';
    }

    function get_menu() {
        include_once 'model/menu.php';
    }

    function get_login_page() {
        include_once 'model/login.php';
    }

    function getActScript() {
        if (isset($_GET['page'])) {
            $page = htmlentities($_GET['page']);
            $actRoot = "application/" . $page . "/script.js";

            echo '<script src="' . $actRoot . '"></script>';
        } else {
            $page = "home";
            $actRoot = "application/" . $page . "/script.js";

            echo '<script src="' . $actRoot . '"></script>';
        }
    }

}

class User {

    protected $conn;
    protected $data = [];

    public function linkAct($id) {

        return '
        <div class="text-center">
        <a href="#" id="' . $id . '" class="act_btn text-success" data-toggle="tooltip" data-placement="top" data-original-title="Edit" title="Edit">
        <i class="fa fa-edit fa-fw"></i>                                    
        </a>
        <a href="#" id="' . $id . '" class="act_btn text-danger" data-toggle="tooltip" data-placement="top" data-original-title="Delete" title="Delete">
        <i class="fa fa-trash-o fa-fw"></i>                                    
        </a>
        </div>';
    }

    public function editAct($id) {
        return '
        <div class="text-center">
        <a href="#" id="' . $id . '" class="act_btn text-success" data-toggle="tooltip" data-placement="top" data-original-title="Edit" title="Edit">
        <i class="fa fa-edit fa-fw"></i>
        </a>        
        </div>';
    }
    
    public function pointAct($id) {
        return '<div class="text-center">
        <a href="#" id="' . $id . '" class="act_btn text-success" data-toggle="tooltip" data-placement="top" data-original-title="Point" title="Point">
        <i class="fa fa-check-circle fa-fw"></i>
        </a>        
        </div>';
    }

    public function commentAct($id) {
    	return '<div class="text-center">
    	<button class="act_btn btn btn-sm btn-danger" id="'.$id.'" data-original-title="comment">
            Penilaian
        </button>
    	</div>';
    }

    function logout() {
        session_destroy();
        echo '<meta http-equiv="refresh" content="0;url=index.php" >';
    }

}//end class user

class noreg {

    protected $conn;

    function __construct($connString) {
        $this->conn = $connString;
    }

    function getData() {

        $a = "PJO-";
        $sql = "SELECT count(*)+1 AS numData FROM data_prospek";

        $result = mysqli_query($this->conn, $sql) or die();
        $row = mysqli_fetch_assoc($result);

        if ($row['numData'] < 10) {

            $a .= "0" . $row['numData'];
        } else {
            $a .= $row['numData'];
        }

        $a .= "/" . date('Y') . "-" . date('m');

        echo $a;
    }

}

class nProject {

    protected $conn;

    function __construct($connString) {
        $this->conn = $connString;
    }

    function getOption($tb_name) {
        $json_data = [];
        $sql = "SELECT * FROM " . $tb_name;
        $result = mysqli_query($this->conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<li>';
            echo $row['nama_proyek'];
            echo '</li>';
        }
    }

}//end class list project

class profile_client {
    
    protected $conn;
    
    function __construct($connString) {
        $this->conn = $connString;
    }
    
    function getData($params, $tb_name) {
        $json_data = [];
        $sql = "SELECT * FROM ".$tb_name;
        $sql .= " WHERE id = $params";

        $result = mysqli_query($this->conn, $sql) or die();
                
        while ($row = mysqli_fetch_assoc($result)) {            
            $json_data = $row;
        }
        echo json_encode($json_data);
    }
}

?>
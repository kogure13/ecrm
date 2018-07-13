<div id="slider-wrapper">

    <div id="slider" class="nivoSlider">
        <img src="theme/asset/images/slider/toystory.jpg" alt="" />
        <a href="http://dev7studios.com"><img src="theme/asset/images/slider/up.jpg" alt="" title="This is an example of a caption" /></a>
        <img src="theme/asset/images/slider/walle.jpg" alt="" />
        <img src="theme/asset/images/slider/nemo.jpg" alt="" title="#htmlcaption" />
    </div>
    <div id="htmlcaption" class="nivo-html-caption">
        <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
    </div>

</div>

<div class="col one_third no_margin_right">
    <a href="#"><img src="theme/asset/images/ad_300.jpg" alt="image" /></a>
</div>        

<div id="content" class="float_l">

    <h2><?= company_name ?></h2>
    <div class="image_frame image_fl"><span></span><img src="theme/asset/images/Logo_CDP.jpg" alt="" /></div>
    <p>Sejarah Singkat Perusahaan</p>
    <p>
        Didirikan pada tanggal 2 November 1990 dengan nama PT. CATU DAYA PERKASA, 
        dan pada tanggal 24 agustus 2001 berganti nama menjadi PT. CATUDAYA DATA PRAKASA.
    </p>
    <p>Visi</p>
    <p>Menjadi salah satu industri nasional yang berorientasi pada pemenuhan 
        kebutuhan pasar domestik dengan menitikberatkan pada kualitas produk & 
        memiliki harga jual yang kompetitif khususnya pada produk-produk Power 
        Elektronik. Menjadi Kontraktor dalam bidang Elektrikal dan Mekanikal 
        yang andal dan baik. Memberikan solusi teknologi dibidang perlistrikan, 
        manajemen data dan sistem Kontrol.</p>
    <p></p>
    <p>Misi</p>
    <p>Sebagai Industri Nasional dan Kontraktor yang Tangguh Dalam Bidang 
        Peralatan Power Elektronik, Kontrol, Automation, Power Manajemen, 
        Elektrikal dan Mekanikal. Bidang Kerja Power system : Engginering, 
        Produksi, Instalasi, Quality Control dan After Sales, Mekanikal dan 
        Electrical.</p>
    <p></p>
    <p>Partnet Kerja</p>
    <p>Perusahaan Listrik Negara, Operator Telekomunikasi dan seluler, Industri 
        Tekstil, Industri Keramik, Industri Farmasi, Industri Semen, Oil Company, 
        Airport, dan Pemerintahan.</p>

    <div class="cleaner h40"></div>

    <div class="col one_third">
        <h5>Project</h5>
        <ul class="tmo_list" id="jproyek">
            <?php
            $db = new dbObj();
            $connString = $db->getConstring();

            $tb_name = "master_kategori_proyek";
            $jProyek = new Option($connString);
            $jProyek->getOption($tb_name);
            ?>
        </ul>
    </div>
    <div class="col one_third no_margin_right">
        <h5>Flickr Stream</h5>
        <ul class="flickr_stream">
            <li><a href="#"><img class="image_frame" src="theme/asset/images/tooplate_image_02.png" alt="" /></a></li>
            <li><a href="#"><img class="image_frame" src="theme/asset/images/tooplate_image_03.png" alt="" /></a></li>
            <li class="no_margin_right"><a href="#"><img class="image_frame" src="theme/asset/images/tooplate_image_04.png" alt="" /></a></li>
            <li><a href="#"><img class="image_frame" src="theme/asset/images/tooplate_image_05.png" alt="" /></a></li>
            <li><a href="#"><img class="image_frame" src="theme/asset/images/tooplate_image_06.png" alt="" /></a></li>
            <li class="no_margin_right"><a href="#"><img class="image_frame" src="theme/asset/images/tooplate_image_07.png" alt="" /></a></li>
        </ul>
    </div>        
</div>

<div id="sidebar" class="float_r">                                
    <h5>Artikel</h5>
    <div class="rp_pp">
        <a href="#">Integer venenatis pharetra magna vitae ultrices</a>
        <p>Feb 23, 2048 - 20 Comments</p>
        <div class="cleaner"></div>
    </div>
    <div class="rp_pp">
        <a href="#">Vestibulum quis nulla nunc, nec lobortis nunc.</a>
        <p>Feb 16, 2048 - 20 Comments</p>
        <div class="cleaner"></div>
    </div>
    <div class="rp_pp">
        <a href="#">Pellentesque convallis tristique mauris.</a>
        <p>Feb 10, 2048 - 20 Comments</p>
        <div class="cleaner"></div>
    </div>

    <div class="cleaner h40"></div>

    <h5>News update</h5>
    <ul class="demo">
        <li class="news_item rp_pp">
            <a href="#">Integer venenatis pharetra magna vitae ultrices</a>
            <p>Feb 23, 2048 - 20 Comments</p>
            <div class="cleaner"></div>    
        </li>
        <li class="news_item rp_pp">
            <a href="#">Vestibulum quis nulla nunc, nec lobortis nunc.</a>
            <p>Feb 16, 2048 - 20 Comments</p>
            <div class="cleaner"></div>    
        </li>
        <li class="news_item rp_pp">
            <a href="#">Pellentesque convallis tristique mauris.</a>
            <p>Feb 10, 2048 - 20 Comments</p>
            <div class="cleaner"></div>    
        </li>
    </ul>            

</div>        

<div class="cleaner"></div>

<?php

class Option {

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

}
?>

<script type="text/javascript" src="theme/asset/js/jquery-1.4.3.min.js"></script>

<script type="text/javascript" src="theme/asset/js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
    $(window).load(function () {
        $('#slider').nivoSlider({
            animSpeed: 500,
            pauseTime: 5000,
            controlNavThumbs: false
        });
    });
</script>

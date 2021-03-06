
<div id="slider-wrapper">
    <!-- Promosi banner -->
    <div id="slider" class="nivoSlider">
        <!--<img src="theme/asset/images/Logo_CDP.jpg" alt="" /> -->
        <img src="theme/asset/images/slider/toystory.jpg" alt="" />
        <a href="http://dev7studios.com"><img src="theme/asset/images/slider/up.jpg" alt="" title="This is an example of a caption" /></a>
        <img src="theme/asset/images/slider/walle.jpg" alt="" />
        <img src="theme/asset/images/slider/nemo.jpg" alt="" title="#htmlcaption" />
    </div>
    <div id="htmlcaption" class="nivo-html-caption">
        <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
    </div>
    <!-- end promosi banner -->
</div>

<div class="col one_third no_margin_right">
    <div class="panel panel-default" style="height: 300px;">
        <div class="panel-heading">
            <i class="fa fa-cubes fa-fw"></i> Product
        </div>
        <div class="panel-body" style="overflow-y: auto; ">
            <ul class="tmo_list" id="jproyek">
                <?php
                $db = new dbObj();
                $connString = $db->getConstring();

                $tb_name = "master_kategori_proyek";
                $jProyek = new nProject($connString);
                $jProyek->getOption($tb_name);
                ?>
            </ul>
        </div>
    </div>    
</div>        

<div id="content" class="float_l text-justify">

    <h2><?= company_name ?></h2>
    <div class="image_frame image_fl">
        <span></span>
        <img src="theme/asset/images/Logo_CDP.jpg" alt="" width="310" />
    </div>
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

    </div>
    <div class="col one_third no_margin_right">

    </div>        
</div>

<div id="sidebar" class="float_r">                               
    <div class="cleaner h40"></div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-bell fa-fw"></i> Promosi
        </div>
        <div class="panel-body">
            <ul class="demo">
                <?php
                $db = new dbObj();
                $connString = $db->getConstring();

                $tb_name = "data_promosi";
                $jPromo = new nPromo($connString);
                $jPromo->getOption($tb_name);
                ?>
                <!--
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
                -->
            </ul>            
        </div>
    </div>    
</div>        

<div class="cleaner"></div>

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

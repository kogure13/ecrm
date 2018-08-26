<div id="content" class="float_r">
    <ul id="gallery">
        <?php
        for ($i = 1; $i <= 12; $i++) {
            if ($i < 10) {
                $a = '0' . $i;
            } else {
                $a = $i;
            }
            ?> 
            <li>
                <a href="theme/asset/images/product/<?= $a ?>.jpg" rel="lightbox[portfolio]">
                    <img src="theme/asset/images/product/<?= $a ?>.jpg" alt="image <?= $i ?>" />
                </a>
            </li>
        <?php } ?>                
    </ul>

    <div class="cleaner"></div>

</div>

<div id="sidebar" class="float_l">     
    
    <div class="panel panel-default" style="height: 300px;">
        <div class="panel-heading">
            <i class="fa fa-cubes fa-fw"></i> Product
        </div>
        <div class="panel-body" style="overflow-y: auto; ">
            <ul class="tmo_list" id="jproyek">
                <?php
                $db = new dbObj();
                $connString = $db->getConstring();

                $tb_name = "master_kategori_produk";
                $jProduk = new nProduk($connString);
                $jProduk->getOption($tb_name);
                ?>
            </ul>
        </div>
    </div>        

    <div class="cleaner h40"></div>

</div>

<script type="text/javascript" src="theme/asset/js/jquery-1.4.3.min.js"></script> 
<script type="text/JavaScript" src="theme/asset/js/slimbox2.js"></script> 
<script type="text/javascript">
    $(document).ready(function () {
        $('#gallery').Pagination();
    });
</script>		
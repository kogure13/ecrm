<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navigation</li>                            
                <li>
                    <a href="?page=home" class="">
                        <i class="ti-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!--SDM, Marketing, DIrektur-->                
                <?php
                    if($_SESSION['role'] == 'marketing') {
                        include_once 'model/menu_marketing.php';
                    } elseif($_SESSION['role'] == 'direktur') {
                        include_once 'model/menu_direktur.php';
                    } elseif($_SESSION['role'] == 'sdm') {
                        include_once 'model/menu_sdm.php';
                    }elseif ($_SESSION['role'] == 'admin') {
                        include_once 'model/menu_admin.php';
                    }
                ?>                
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

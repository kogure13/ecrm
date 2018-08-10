<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="assets/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i id="juser" data-id="<?=$_SESSION['id_user']?>"></i> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="?page=profile"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>                                                
                        <li><a href="?page=logout"><i class="md md-settings-power"></i> Logout</a></li>
                    </ul>
                </div>
                <p class="text-muted m-0"><?=strtoupper($_SESSION['role'])?></p>
            </div>
        </div>
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

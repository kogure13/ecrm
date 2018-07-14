<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "";
}
?>

<div id="site_title"><h1><a href="#"></a></h1></div>
<div id="tooplate_menu" class="ddsmoothmenu">
    <ul>
        <li>
            <a href="?page=home" class="<?= ($page == 'home') ? 'selected' : '' ?>">Home</a>
        </li>      
        <!-- <ul>
            <li><a href="#">Sub menu 1</a></li>
            <li><a href="#">Sub menu 1</a></li>
            <li><a href="#">Sub menu 1</a></li>
        </ul> -->
        </li>
        <li><a href="?page=product" class="<?= ($page == 'product') ? 'selected' : '' ?>">Product</a></li>                    
        <li><a href="?page=contact" class="<?= ($page == 'contact') ? 'selected' : '' ?>">Contact</a></li>
        <?php if(!isset($_SESSION['ecrm_client'])) { ?> 
        <li><a href="?page=register" class="<?= ($page == 'register') ? 'selected' : '' ?>">Register</a></li>
        <li><a href="?page=login" class="<?= ($page == 'login') ? 'selected' : '' ?>">Login</a></li>        
        <?php } else { ?> 
        <li>
            <a href="#">Profile</a>
            <ul>
                <li><a href="?page=profile">Company Profile</a></li>
                <li><a href="?page=req_project">Request Project</a></li>
                <li><a href="?page=faq">FAQ</a></li>
                <li><a href="?page=logout">Logout</a></li>
            </ul>
        </li>
        <?php } ?>
    </ul>
    <br style="clear: left" />
</div>

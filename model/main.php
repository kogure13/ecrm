<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?= apps_name ?> | <?= company_name ?>?></title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />

        <link rel="icon" href="theme/asset/css/images/logo_twh.png">

            <link rel="stylesheet" type="text/css" href="theme/asset/css/tooplate_style.css"/>
            <link rel="stylesheet" type="text/css" href="theme/asset/css/nivo-slider.css" media="screen"/>
            <link rel="stylesheet" type="text/css" href="theme/asset/css/ddsmoothmenu.css" />
            <link rel="stylesheet" type="text/css" href="theme/asset/css/slimbox2.css" media="screen"/> 
            <link rel="stylesheet" type="text/css" href="theme/asset/css/font-awesome/css/font-awesome.min.css"/>
            
            <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.min.css"/>            
            <link rel="stylesheet" type="text/css" href="admin/assets/plugins/datatables/jquery.dataTables.min.css"/>            
            <link rel="stylesheet" type="text/css" href="admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css"/>

            <style type="text/css">
                .error {
                    line-height: 1.4em;
                    font-size: 12px;
                    color: #f00;                        
                }
                .demo {
                    margin: 0; 
                    padding: 0;
                    list-style: none;
                }

                .demo > li {
                    margin-bottom: 10px;
                    padding-bottom: 10px;
                }

                .nivo-controlNav {
                    display: none;
                }	
            </style>            

            <script type="text/javascript" src="admin/assets/js/jquery.min.js"></script>

    </head>
    <body>
        <div id="tooplate_wrapper">
            <div id="tooplate_header">
                <?= $main->get_menu() ?>
            </div>
            <div id="tooplate_main">
                <?= $main->get_page() ?>
                <div class="cleaner"></div>		
            </div>		
        </div>
        
        <div class="footer">
            <?=$main->get_footer() ?>
        </div>
        
        <script type="text/javascript" src="admin/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="admin/assets/js/jquery.validate.min.js"></script>
        
        <script type="text/javascript" src="admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="admin/assets/plugins/datatables/dataTables.bootstrap.js"></script>
        
        <script type="text/javascript" src="admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        
        <script type="text/javascript" src="theme/asset/js/ddsmoothmenu.js">
            /***********************************************
             * Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
             * This notice MUST stay intact for legal use
             * Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
             ***********************************************/
        </script>

        <script type="text/javascript">
            ddsmoothmenu.init({
                mainmenuid: "tooplate_menu", //menu DIV id
                orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
                classname: 'ddsmoothmenu', //class added to menu's outer DIV
                //customtheme: ["#1c5a80", "#18374a"],
                contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
            })
        </script>        

        <!-- jQuery -->
        <?= $main->getActScript() ?>
        
    </body>    
</html>
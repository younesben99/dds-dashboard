<?php


if(!file_exists(ABSPATH . "dashboard/index.php")){
    
    if(!is_dir(ABSPATH . "dashboard")) {
        mkdir(ABSPATH . "dashboard");
    }
    if(!is_dir(ABSPATH . "dashboard/archief")) {
        mkdir(ABSPATH . "dashboard/archief");
    }
    $myfile = fopen(ABSPATH . "login.php", "w");
    $content = "<?php 
    include(__DIR__ .'/wp-load.php');
    include( ABSPATH. '/wp-login.php'); ?>";
    fwrite($myfile, $content);
    fclose($myfile);
    
    $myfile = fopen(ABSPATH . "dashboard/index.php", "w");
    $content = "<?php 
    include(__DIR__ .'/../wp-load.php');
    include( WP_PLUGIN_DIR. '/dds-dashboard/templates/dashboard-content.php'); ?>";
    fwrite($myfile, $content);
    fclose($myfile);


    $myfile = fopen(ABSPATH . "dashboard/archief/index.php", "w");
    $content = "<?php 
    include(__DIR__ .'/../wp-load.php');
    include( WP_PLUGIN_DIR. '/dds-dashboard/templates/dashboard-archive.php'); ?>";
    fwrite($myfile, $content);
    fclose($myfile);


    

}



?>
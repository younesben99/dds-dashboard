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
    include(__DIR__ .'/../../wp-load.php');
    include( WP_PLUGIN_DIR. '/dds-dashboard/templates/dashboard-archive.php'); ?>";
    fwrite($myfile, $content);
    fclose($myfile);

    $myfile = fopen(ABSPATH . ".htaccess", "w");
        $content = "RewriteEngine on 
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME}\.php -f
    RewriteRule ^(.*)$ $1.php [NC,L]
    # BEGIN WordPress
    # dynamically generated, and should only be modified via WordPress filters.
    # Any changes to the directives between these markers will be overwritten.
    <IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
    RewriteBase /
    RewriteRule ^index\.php$ - [L]
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule . /index.php [L]
    </IfModule>

    # END WordPress";
        fwrite($myfile, $content);
        fclose($myfile);


}



?>

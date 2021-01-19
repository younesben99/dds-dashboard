<?php

/*
Plugin Name: DDS Dashboard
Plugin URI: https://github.com/younesben99/dds-dashboard
Description: Digiflow Dealership Solutions | Dashboard for managing your digital dealership
Version: 0.1
Author: Younes Benkheil
Author URI: https://digiflow.be/
License: GPL2
GitHub Plugin URI: https://github.com/younesben99/dds-dashboard
*/


remove_action( 'template_redirect', 'wp_redirect_admin_locations', 1000 );
require_once( __DIR__ . '/templates/dashboard-card-aanmaken.php');
require_once( __DIR__ . '/register/create-dashboard.php');


?>
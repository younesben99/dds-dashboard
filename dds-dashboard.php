<?php

/*
Plugin Name: DDS Dashboard
Plugin URI: https://github.com/younesben99/dds-dashboard
Description: Digiflow Dealership Solutions | Dashboard for managing your digital dealership
Version: 3.5.7
Author: Younes Benkheil
Author URI: https://digiflow.be/
License: GPL2
GitHub Plugin URI: https://github.com/younesben99/dds-dashboard
*/


remove_action( 'template_redirect', 'wp_redirect_admin_locations', 1000 );
require_once( __DIR__ . '/templates/dash-ajax.php');
require_once( __DIR__ . '/templates/dashboard-cards.php');
require_once( __DIR__ . '/templates/dds-login.php');
require_once( __DIR__ . '/templates/dds-settings.php');
require_once( __DIR__ . '/register/create-dashboard.php');

function add_admin_style_scripts( $hook ) {

    global $post;
    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( 'autos' === $post->post_type ) {     
            wp_enqueue_script(  'dds-wp-dashboard-js', plugin_dir_url( __FILE__ ).'/assets/js/dds-wp-dashboard.js');
            wp_enqueue_style('dds-wp-dashboard-css', plugin_dir_url( __FILE__ ).'/assets/css/dds-wp-dashboard.css?v=124');
            wp_enqueue_style('lineicons', 'https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css');
            include(__DIR__ . '/templates/nav.php');
           
        }
       
    }
}
add_action( 'admin_enqueue_scripts', 'add_admin_style_scripts', 10, 1 );



?>

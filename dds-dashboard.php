<?php

/*
Plugin Name: DDS Dashboard
Plugin URI: https://github.com/younesben99/dds-dashboard
Description: Digiflow Dealership Solutions | Dashboard for managing your digital dealership
Version: 3.8.2
Author: Younes Benkheil
Author URI: https://digiflow.be/
License: GPL2
GitHub Plugin URI: https://github.com/younesben99/dds-dashboard
*/


//verwijder redirects naar dashboard zoals /wp-login naar /wp-admin of /dashboard naar /wp-admin

remove_action( 'template_redirect', 'wp_redirect_admin_locations', 1000 );
//require_once( __DIR__ . '/register/dashboard_template_file.php');
require_once( __DIR__ . '/templates/dash-ajax.php');
require_once( __DIR__ . '/templates/dashboard-cards.php');
 require_once( __DIR__ . '/templates/dds-login.php');
 require_once( __DIR__ . '/templates/dds-settings.php');
//require_once( __DIR__ . '/register/create-dashboard.php');

require_once( __DIR__ . '/register/generate_dashboard.php');

function add_admin_style_scripts( $hook ) {

    global $post;
    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( 'autos' === $post->post_type ) {     
            wp_enqueue_script(  'dds-wp-dashboard-js', plugin_dir_url( __FILE__ ).'/assets/js/dds-wp-dashboard.js');
            wp_enqueue_style('dds-wp-dashboard-css', plugin_dir_url( __FILE__ ).'/assets/css/dds-wp-dashboard.css?v='.uniqid());
            wp_enqueue_style('lineicons', 'https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css');
            include(__DIR__ . '/templates/nav.php');
            include(__DIR__.'/templates/spinner.php');
            wp_deregister_script('postbox');
           
        }
       
    }
}
add_action( 'admin_enqueue_scripts', 'add_admin_style_scripts', 10, 1 );

add_option('uitgelichtewagens');


add_filter( 'page_template', 'dashboard_page_template' );
function dashboard_page_template( $page_template )
{
    if ( is_page( 'dashboard' ) ) {
        $page_template = dirname( __FILE__ ) . '/templates/dashboard-content.php';
    }
    if ( is_page( 'archief' ) ) {
        $page_template = dirname( __FILE__ ) . '/templates/dashboard-archive.php';
    }
    if ( is_page( 'edit' ) ) {
        $page_template = dirname( __FILE__ ) . '/templates/dashboard-edit.php';
    }
    return $page_template;
}




?>

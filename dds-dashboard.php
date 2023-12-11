<?php

/*
Plugin Name: DDS Dashboard
Plugin URI: https://github.com/younesben99/dds-dashboard
Description: Digiflow Dealership Solutions | Dashboard for managing your digital dealership
Version: 4.2.2
Author: Younes Benkheil
Author URI: https://digiflow.be/
License: GPL2
GitHub Plugin URI: https://github.com/younesben99/dds-dashboard
*/


//verwijder redirects naar dashboard zoals /wp-login naar /wp-admin of /dashboard naar /wp-admin

remove_action( 'template_redirect', 'wp_redirect_admin_locations', 1000 );
//require_once( __DIR__ . '/register/dashboard_template_file.php');
require_once( __DIR__ . '/templates/dash-ajax.php');
require_once( __DIR__ . '/templates/backend-popup.php');
require_once( __DIR__ . '/templates/dashboard-cards.php');
 require_once( __DIR__ . '/templates/dds-login.php');
 require_once( __DIR__ . '/templates/dds-settings.php');
//require_once( __DIR__ . '/register/create-dashboard.php');

require_once( __DIR__ . '/register/generate_dashboard.php');
require_once(__DIR__."/templates/navwrapper.php");
include(__DIR__."/templates/dds-edit-gallery.php");
include(__DIR__."/templates/dds-edit-options.php");
include(__DIR__."/templates/dds-frontend-edit-options.php");

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

// Schedule Cron Job Event
function billit_offerte_check_cron_job() {
    if ( ! wp_next_scheduled( 'billit_offerte_check' ) ) {
        wp_schedule_event( current_time( 'timestamp' ), 'twelvehours', 'billit_offerte_check' );
    }
}
add_action( 'wp', 'billit_offerte_check_cron_job' );

// Add custom cron schedule for 12 hours
function add_custom_cron_schedule( $schedules ) {
    $schedules['twelvehours'] = array(
        'interval' => 43200,
        'display'  => esc_html__( 'Every 12 hours' ),
    );
    return $schedules;
}
add_filter( 'cron_schedules', 'add_custom_cron_schedule' );

function billit_offerte_check() {
    $args = array(
        'post_type'      => 'autos',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'meta_query'     => array(
            'relation' => 'AND',
            array(
                'key'   => '_car_post_status_key',
                'value' => 'actief',
            )
        ),
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $ID = get_the_ID();
            
            // Additional check for non-empty meta values
            $wagentitel = get_post_meta($ID, '_car_wagentitel_key', true);
            $prijs = get_post_meta($ID, '_car_prijs_key', true);
            $offerte_aangemaakt = get_post_meta($ID, '_offerte_aangemaakt', true);
            $car_status = get_post_meta($ID, '_car_status_key', true);
            if (!empty($wagentitel) && !empty($prijs) && $offerte_aangemaakt !== 'YES' && $car_status !== "verkocht") {
                 //error reporting fallback moet hier NOG inkomen
                    $car_fields = get_post_meta($ID);
                    $zapier_offerte = wp_zapier_billit($car_fields,true);
                    if($zapier_offerte["status"] == "success"){
                        update_post_meta($ID, '_offerte_aangemaakt', "YES");   
                    }
                    else{
                        update_post_meta($ID, '_offerte_aangemaakt', "NO");   
                    }
            }
        }
    }
}
add_action( 'billit_offerte_check', 'billit_offerte_check' );



?>

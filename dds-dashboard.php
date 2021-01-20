<?php

/*
Plugin Name: DDS Dashboard
Plugin URI: https://github.com/younesben99/dds-dashboard
Description: Digiflow Dealership Solutions | Dashboard for managing your digital dealership
Version: 1.2
Author: Younes Benkheil
Author URI: https://digiflow.be/
License: GPL2
GitHub Plugin URI: https://github.com/younesben99/dds-dashboard
*/


remove_action( 'template_redirect', 'wp_redirect_admin_locations', 1000 );
require_once( __DIR__ . '/templates/dash-ajax.php');
require_once( __DIR__ . '/register/create-dashboard.php');


function add_admin_style_scripts( $hook ) {

    global $post;
    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( 'autos' === $post->post_type ) {     
            //wp_enqueue_script(  'dds-wp-picker-js', 'https://cdn.jsdelivr.net/npm/pickerjs@1.2.1/dist/picker.min.js' );
            //wp_enqueue_style('dds-wp-picker-css', 'https://cdn.jsdelivr.net/npm/pickerjs@1.2.1/src/css/picker.css');
            wp_enqueue_script(  'dds-wp-dashboard-js', plugin_dir_url( __FILE__ ).'/assets/js/dds-wp-dashboard.js');
            
      
            wp_enqueue_style('dds-wp-dashboard-css', plugin_dir_url( __FILE__ ).'/assets/css/dds-wp-dashboard.css');
            wp_enqueue_style('lineicons', 'https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css');
        }
       
    }
}
add_action( 'admin_enqueue_scripts', 'add_admin_style_scripts', 10, 1 );
function display_admin_card($post){
    $carsync_images = get_post_meta($post->ID, '_car_syncimages_key', true);
    $manual_images = get_post_meta($post->ID, 'vdw_gallery_id', true);
    if($manual_images == null){
        $selected_img = $carsync_images[0];
    }
    else{
        $selected_img_url = wp_get_attachment_image_src($manual_images[0]);
        $selected_img = $selected_img_url[0];
    }
    ?>

<div class="card">

<img src="<?php echo $selected_img;?>" class="card-img-top" alt="<?php echo get_the_title($post);?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo get_the_title($post);?></h5>
    <div class="hr"></div>
    <a href="<?php echo get_home_url();?>/wp-admin/post.php?post=<?php echo($post->ID); ?>&amp;action=edit"
      class="btn btn-primary beheerwagen">Beheer deze wagen</a>

  </div>
</div>

<?php
}

function display_archive_card($post){
    $carsync_images = get_post_meta($post->ID, '_car_syncimages_key', true);
    $manual_images = get_post_meta($post->ID, 'vdw_gallery_id', true);
    if($manual_images == null){
        $selected_img = $carsync_images[0];
    }
    else{
        $selected_img_url = wp_get_attachment_image_src($manual_images[0]);
        $selected_img = $selected_img_url[0];
    }
    ?>
  
  <div class="card">
  
  <img src="<?php echo $selected_img;?>" class="card-img-top" alt="<?php echo get_the_title($post);?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo get_the_title($post);?></h5>
    <div class="hr"></div>
    <a href="<?php echo get_home_url();?>/wp-admin/post.php?post=<?php echo($post->ID); ?>&amp;action=edit"
      class="btn btn-primary beheerwagen">Beheer deze wagen</a>
  
  </div>
  </div>
  
  <?php
  }

/**
 * WordPress function for redirecting users on login based on user role
 */
function my_login_redirect( $url, $request, $user ){
    if( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
        if( $user->has_cap( 'administrator' ) ) {
            $url = home_url('/dashboard/');
        } else {
            $url = home_url('/dashboard/');
        }
    }
    return $url;
}
add_filter('login_redirect', 'my_login_redirect', 10, 3 );



function my_login_page_remove_back_to_link() { ?>
<div style="    text-align: center;
    margin-top: 7%;"><img src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/logo.png" class="digilogo" style="width:150px;" /></div>
  <link
    href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,500;1,600&display=swap"
    rel="stylesheet">
    <style type="text/css">
    .digilogo{
        width:150px;
    }
    *{
        font-family:'Rubik';
    }
    
        a {
          display: none !important;
        }
        input#wp-submit {
    display: block;
    width: 100%;
    margin-top: 26px;
    padding: 5px;
    border-radius: 7px;
    border:0px !important;    font-size: 17px;
    background:#0f688a;
}input {
    border: 1px solid #c7c7c7 !important;
    font-size: 19px;
    padding: 8px 15px;
    margin-top: 3px;
}form#loginform {
    border-radius: 8Px;
    box-shadow: 0 0 0 transparent !important;
    border: 1px solid #e4e4e4;
}#login {
    width: 320px;
    padding: 0 !important;
    margin: auto;
}
    </style>
<?php }

//This loads the function above on the login page
add_action( 'login_enqueue_scripts', 'my_login_page_remove_back_to_link' );
?>
<?php


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
    margin-top: 7%;"><img src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/logo.svg" class="digilogo" style="width:150px;" /></div>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,500;1,600&display=swap"
    rel="stylesheet">
    <style type="text/css">
    .digilogo{
        width:150px;
    }
    *{
        font-family:'Montserrat';
    }input {
    font-size: 16px !important;
}
    
        a {
          display: none !important;
        }
        input#wp-submit {
    display: block;
    margin-top: 26px;
    padding: 5px;
    border-radius: 7px;
    font-size: 17px;
    background: #20aee3;
    color: #ffffff;
    border: 1px solid #20aee3 !important;
    width: 100%;
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
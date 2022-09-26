<?php


$check_page_exist = get_page_by_title('Dashboard', OBJECT, 'page');

if(empty($check_page_exist)) {
    $page_id = wp_insert_post(
        array(
        'comment_status' => 'close',
        'ping_status'    => 'close',
        'post_author'    => 1,
        'post_title'     => 'Dashboard',
        'post_name'      => 'Dashboard',
        'post_status'    => 'publish',
        'post_content'   => '',
        'post_type'      => 'page'
        )
    );
}


$check_page_exist = get_page_by_title('Archief', OBJECT, 'page');

if(empty($check_page_exist)) {

    $dashboard_page = get_page_by_path( 'dashboard' );
    
    $page_id = wp_insert_post(
        array(
        'comment_status' => 'close',
        'ping_status'    => 'close',
        'post_author'    => 1,
        'post_title'     => 'Archief',
        'post_name'      => 'Archief',
        'post_status'    => 'publish',
        'post_content'   => '',
        'post_type'      => 'page',
        'post_parent'    => $dashboard_page->ID
         )
    );
}

$check_page_exist = get_page_by_title('Edit car', OBJECT, 'page');

if(empty($check_page_exist)) {

    $dashboard_page = get_page_by_path( 'dashboard' );
    
    $page_id = wp_insert_post(
        array(
        'comment_status' => 'close',
        'ping_status'    => 'close',
        'post_author'    => 1,
        'post_title'     => 'Edit car',
        'post_name'      => 'edit',
        'post_status'    => 'publish',
        'post_content'   => '',
        'post_type'      => 'page',
        'post_parent'    => $dashboard_page->ID
         )
    );
}


?>
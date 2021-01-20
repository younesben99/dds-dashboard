<?php

include(__DIR__ . "/../../../../wp-load.php");


if(isset($_POST['logout'])){

  if($_POST['logout'] == "true"){
    wp_logout();
  }

}
//ALLE DATA

if(isset($_POST['push'])){
  if($_POST['push'] == "allcars"){
    $allposts = get_posts( array('post_type'=>'autos','numberposts'=>-1) );
    foreach ($allposts as $post) {
      $status = get_post_meta( $post->ID, '_car_post_status_key', true );
      if($status == "Actief" ){
        display_admin_card($post);
      }
    }
  }

  if($_POST['push'] == "merkpush"){


    $dsposts = get_posts(array(
      'post_type' => 'autos',
      'numberposts' => -1,
      'tax_query' => array(
        array(
          'taxonomy' => 'merkenmodel',
          'field' => 'term_id', 
          'terms' => $_POST['termid'],
          'include_children' => true
        )
      )
    ));

    foreach($dsposts as $dspost){
      $status = get_post_meta( $dspost->ID, '_car_post_status_key', true );
      if($status == "Actief" ){
        display_admin_card($dspost);
      }
    }

    
  }
  

}



//ARCHIEF




if(isset($_POST['archive'])){
  if($_POST['archive'] == "allcars"){
    $allposts = get_posts( array('post_type'=>'autos','numberposts'=>-1) );
    foreach ($allposts as $post) {
      $status = get_post_meta( $post->ID, '_car_post_status_key', true );
      if($status == "Archief" ){
        display_archive_card($post);
      }
    }
  }

  if($_POST['archive'] == "merkpush"){


    $dsposts = get_posts(array(
      'post_type' => 'autos',
      'numberposts' => -1,
      'tax_query' => array(
        array(
          'taxonomy' => 'merkenmodel',
          'field' => 'term_id', 
          'terms' => $_POST['termid'],
          'include_children' => true
        )
      )
    ));

    foreach($dsposts as $dspost){
      $status = get_post_meta( $dspost->ID, '_car_post_status_key', true );
      if($status == "Archief" ){
          display_admin_card($dspost);
      }
      
    }

    
  }
  

}



?>
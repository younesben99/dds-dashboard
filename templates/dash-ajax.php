<?php

include(__DIR__ . "/../../../../wp-load.php");


if(isset($_POST['dashpoststatus'])){
  if($_POST['dashpoststatus'] == "tekoop"){
    $postid = $_POST['postid'];
    update_post_meta($postid, '_car_status_key', 'tekoop');
    echo($postid . " is aangepast");
  }
  if($_POST['dashpoststatus'] == "gereserveerd"){
    $postid = $_POST['postid'];
    update_post_meta($postid, '_car_status_key', 'gereserveerd');
    echo($postid . " is aangepast");
  }
  if($_POST['dashpoststatus'] == "verkocht"){
    $postid = $_POST['postid'];
    update_post_meta($postid, '_car_status_key', 'verkocht');
    echo($postid . " is aangepast");
  }
  
  
}

if(isset($_POST['dashstatus'])){
  if($_POST['dashstatus'] == "archief"){
    $postid = $_POST['postid'];
    update_post_meta($postid, '_car_sync_key', 'NO');
    update_post_meta($postid, '_car_post_status_key', 'archief');
    wp_update_post(array( 'ID' => $postid, 'post_status' => "publish" ));
    echo($postid . " is aangepast");
  }
  if($_POST['dashstatus'] == "nglive"){
    $postid = $_POST['postid'];
    update_post_meta($postid, '_car_sync_key', 'NO');
    update_post_meta($postid, '_car_post_status_key', 'actief');
    wp_update_post(array( 'ID' => $postid, 'post_status' => "publish" ));
    echo($postid . " is aangepast");
  }
  if($_POST['dashstatus'] == "live"){
    $postid = $_POST['postid'];
    update_post_meta($postid, '_car_sync_key', 'YES');
    update_post_meta($postid, '_car_post_status_key', 'actief');
    wp_update_post(array( 'ID' => $postid, 'post_status' => "publish" ));
    echo($postid . " is aangepast");
  }
  if($_POST['dashstatus'] == "concept"){
    $postid = $_POST['postid'];
    update_post_meta($postid, '_car_sync_key', 'NO');
    update_post_meta($postid, '_car_post_status_key', 'concept');
    wp_update_post(array( 'ID' => $postid, 'post_status' => "draft" ));
    echo($postid . " is aangepast");
  }
  
}

if(isset($_POST['logout'])){

  if($_POST['logout'] == "true"){
    wp_logout();
  }

}


if(isset($_POST['removepost'])){
$postid = $_POST['removepost'];
  update_post_meta($postid,"_car_post_status_key","trash");
  wp_update_post(array(
    'ID'    =>  $postid,
    'post_status'   =>  'private'
    ));
}

//ALLE DATA

if(isset($_POST['push'])){


  if($_POST['push'] == "uitlichten"){

    $carid = $_POST['carid']; 
    $currentcars = get_option("uitgelichtewagens");

    if(!is_array($currentcars)){
      $currentcars = array();
    }

    if(!in_array($carid,$currentcars)){
      array_push($currentcars,$carid);
      update_option("uitgelichtewagens",$currentcars);

      echo("toegevoegd");
    }
    else{

      $key = array_search($carid,$currentcars);
      unset($currentcars[$key]);

      update_option("uitgelichtewagens",$currentcars);

      echo("verwijderd");


    }
   
   
    

    
  }


  if($_POST['push'] == "allcars"){
    $allposts = get_posts( array('post_type'=>'autos','numberposts'=>-1, 'post_status' => 'any') );
    foreach ($allposts as $post) {
      $status = get_post_meta( $post->ID, '_car_post_status_key', true );
      if($status == "actief" || $status == "concept" ){
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
      if($status == "actief" ){
        display_admin_card($dspost);
      }
    }

    
  }
  

}



//ARCHIEF




if(isset($_POST['archive'])){
  if($_POST['archive'] == "allcars"){
    $allposts = get_posts( array('post_type'=>'autos','numberposts'=>-1, 'post_status' => 'any') );
    foreach ($allposts as $post) {
      $status = get_post_meta( $post->ID, '_car_post_status_key', true );
      if($status == "archief" ){
        display_admin_card($post);
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
      if($status == "archief" ){
          display_admin_card($dspost);
      }
      
    }

    
  }



  


}



?>
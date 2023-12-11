<?php

include(__DIR__ . "/../../../../wp-load.php");


//main field update

if(isset($_POST['dds_update_fields'])){


$meta = $_POST['dds_update_fields_meta'];
$value = $_POST['dds_update_fields_value'];
$id = $_POST['dds_update_fields_id'];

update_post_meta( $id,$meta, $value);


echo($post_id." updated");
};


//merkmodel update

if(isset($_POST['dds_update_fields_merk_model'])){


  $merk = $_POST['dds_update_fields_merk'];

  if(empty($merk)){
    $merk = get_post_meta( $id, '_car_merkcf_key', true );
  }

  $model = $_POST['dds_update_fields_model'];
  $id = $_POST['dds_update_fields_id'];
  
  $merkwaarde = $merk;
  $modelwaarde = $model;
  wp_insert_term($merkwaarde,  'merkenmodel' );
  $merkpush = get_term_by('name', $merkwaarde, 'merkenmodel');
  if(!empty($modelwaarde)){
    wp_insert_term($modelwaarde,  'merkenmodel',array('parent' => $merkpush->term_id) );
    wp_set_object_terms( $id, array($merkwaarde,$modelwaarde), 'merkenmodel' );
    update_post_meta( $id,"_car_merkcf_key", $merkwaarde);
    update_post_meta( $id,"_car_modelcf_key", $modelwaarde);
    $posttitle = $merkwaarde . " " .  $modelwaarde;
    wp_update_post( [
      'ID'         => $id,
      'post_title' =>  $posttitle,
      'post_name'  => sanitize_title( $posttitle),
   ] );
  }
  else{
    wp_set_object_terms( $id, $merkwaarde, 'merkenmodel' );
    update_post_meta( $id,"_car_merkcf_key", $merkwaarde);
  }
  
  
  
  echo($post_id." updated");
  };











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


if(isset($_POST['archivepost'])){

    $postid = $_POST['archivepost'];
    update_post_meta($postid,"_car_status_key","verkocht");
    update_post_meta($postid,"_car_post_status_key","archief");
    
  }

  
if(isset($_POST['unarchivepost'])){

  $postid = $_POST['unarchivepost'];
  update_post_meta($postid,"_car_post_status_key","actief");
  
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

//DROPZONE EDIT PAGE

if (isset($_POST['dds_edit_dropzone']) && is_numeric($_POST['dds_edit_dropzone'])) {

  require_once(ABSPATH . 'wp-admin/includes/file.php');
  require_once(ABSPATH . 'wp-admin/includes/image.php');
  require_once(ABSPATH . 'wp-admin/includes/media.php');

  if (!empty($_FILES['file']['name'])) {

      $image = media_handle_upload('file', $_POST['dds_edit_dropzone']);

      if (is_wp_error($image)) {
          // Handle the error.
      } else {
          $gallery_ids = get_post_meta($_POST['dds_edit_dropzone'], 'vdw_gallery_id', true);

          if (!is_array($gallery_ids)) {
              $gallery_ids = [];
          }

          $gallery_ids[] = $image;

          update_post_meta($_POST['dds_edit_dropzone'], 'vdw_gallery_id', $gallery_ids);
      }
  }
}

if (isset($_POST['dds_remove_dropzone_img'], $_POST['postid']) && is_numeric($_POST['dds_remove_dropzone_img']) && is_numeric($_POST['postid'])) {

  $imgid = intval($_POST['dds_remove_dropzone_img']);
  $id = intval($_POST['postid']);

  $gallery_ids = get_post_meta($id, 'vdw_gallery_id', true);

  if (is_array($gallery_ids) && ($key = array_search($imgid, $gallery_ids)) !== false) {
      unset($gallery_ids[$key]);
      // Re-index the array to avoid serialization issues in update_post_meta
      $gallery_ids = array_values($gallery_ids);
      update_post_meta($id, 'vdw_gallery_id', $gallery_ids);
  }

  wp_delete_attachment($imgid, true);
}



if(isset($_POST['dds_dropzone_sort'])){

  
  $g_ids = $_POST['dds_update_fields_value'];

  $g_ids_decode = explode(',', $g_ids);

  $id = $_POST['dds_update_fields_id'];

  update_post_meta($id,'vdw_gallery_id',$g_ids_decode);

}



//offerte aanmaken

if(isset($_POST['offerte_aanmaken'])){

  
  //error reporting fallback moet hier NOG inkomen
  $car_fields = get_post_meta($_POST['offerte_aanmaken']);
  $zapier_offerte = wp_zapier_billit($car_fields,true);
  if($zapier_offerte["status"] == "success"){
      update_post_meta($_POST['offerte_aanmaken'], '_offerte_aangemaakt', "YES");   
      echo("offerte");
  }
  else{
      update_post_meta($_POST['offerte_aanmaken'], '_offerte_aangemaakt', "NO");   
      echo("error");
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


//CREATE CAR DASHBOARD





if(isset($_POST['create_car_basic'])){

  $vin = $_POST['create_car_basic'];




  $new_post = wp_insert_post( [
    "post_type" => "autos",
    "post_title" => "CAR CONCEPT",
    "post_content" => "",
    "meta_input" => ["_car_vin_key"=>$vin
  ,"_car_status_key" => "tekoop","_car_sync_key" => "NO","_offerte_aangemaakt" => "NO","_car_uniq_key" => $vin,"_car_post_status_key"=>"actief"],
    'post_status' => 'publish'

  ]);

  echo($new_post);

}

if(isset($_POST['create_car_inmotiv'])){

  $vin = $_POST['create_car_inmotiv'];




  $new_post = wp_insert_post( [
    "post_type" => "autos",
    "post_title" => "CAR CONCEPT",
    "post_content" => "",
    "meta_input" => ["_car_vin_key"=>$vin
  ,"_car_status_key" => "tekoop","_car_sync_key" => "NO","_offerte_aangemaakt" => "NO","_car_uniq_key" => $vin,"_car_post_status_key"=>"actief"],
    'post_status' => 'publish'

  ]);

  echo($new_post);

}




if(isset($_POST['car_opties_updaten'])){


$id = $_POST['car_opties_updaten'];
 
$carcomfort = $_POST['carcomfort'];
$carmedia = $_POST['carmedia'];
$carextra = $_POST['carextra'];
$carveiligheid = $_POST['carveiligheid'];


update_post_meta($id,"_car_enter_media_key",  $carmedia);
update_post_meta($id,"_car_comfort_key",  $carcomfort);
update_post_meta($id,"_car_extra_key",  $carextra);
update_post_meta($id,"_car_veiligheid_key",  $carveiligheid);


echo($id." updated");

}





?>
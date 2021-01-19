<?php

include(__DIR__ . "/../../../../wp-load.php");
function display_admin_card($post){
    $carsync_images = get_post_meta($post->ID, '_car_syncimages_key', true);
    $manual_images = get_post_meta($post->ID, 'vdw_gallery_id', true);
    if($manual_images == null){
        $selected_img = $carsync_images[0];
    }
    else{
        $selected_img = wp_get_attachment_image_src($manual_images[0]);
    }
    ?>

<div class="card">

<img src="<?php echo $selected_img;?>" class="card-img-top" alt="<?php echo get_the_title($post);?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo get_the_title($post);?></h5>
    <div class="hr"></div>
    <a href="http://cmpluginzone.local/wp-admin/post.php?post=<?php echo($post->ID); ?>&amp;action=edit"
      class="btn btn-primary beheerwagen">Beheer deze wagen</a>

  </div>
</div>

<?php
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

function display_archive_card($post){
  $carsync_images = get_post_meta($post->ID, '_car_syncimages_key', true);
  $manual_images = get_post_meta($post->ID, 'vdw_gallery_id', true);
  if($manual_images == null){
      $selected_img = $carsync_images[0];
  }
  else{
      $selected_img = wp_get_attachment_image_src($manual_images[0]);
  }
  ?>

<div class="card">

<img src="<?php echo $selected_img;?>" class="card-img-top" alt="<?php echo get_the_title($post);?>">
<div class="card-body">
  <h5 class="card-title"><?php echo get_the_title($post);?></h5>
  <div class="hr"></div>
  <a href="http://cmpluginzone.local/wp-admin/post.php?post=<?php echo($post->ID); ?>&amp;action=edit"
    class="btn btn-primary beheerwagen">Beheer deze wagen</a>

</div>
</div>

<?php
}


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
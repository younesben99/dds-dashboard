<?php
function display_admin_card($post){
    $carsync_images = get_post_meta($post->ID, '_car_syncimages_key', true);
    $manual_images = get_post_meta($post->ID, 'vdw_gallery_id', true);
    $poststatus = get_post_meta($post->ID, '_car_post_status_key', true);
    if(empty($manual_images) && empty($carsync_images)){

      $selected_img = "https://digiflowroot.be/static/images/camera_image.jpg";
    } 
    else{
      if($manual_images == null){
        $selected_img = $carsync_images[0];
    }
    else{
      if ($manual_images[0] !== 1) {
          $selected_img_url = wp_get_attachment_image_src($manual_images[0], 'medium');
          $selected_img = $selected_img_url[0];
      }else{
        $selected_img = "https://digiflowroot.be/static/images/camera_image.jpg";
      }
    }
    }
    


    $uitgelichte_opt = get_option("uitgelichtewagens");
    
    if(is_array($uitgelichte_opt)){
      if(in_array($post->ID,$uitgelichte_opt)){
        $uw_icon = "fa fa-star";
      }
      else{
        $uw_icon = "fa fa-star-o";
      }
    }
    else{
      if(empty($uitgelichte_opt)){
        $uw_icon = "fa fa-star-o";
      }
    }


    ?>

<div class="card">
  
  <img src="<?php echo $selected_img;?>" class="card-img-top" alt="<?php echo get_the_title($post);?>">
  <div class="card-body">
    <div style="display: flex;
    justify-content: space-between;">
    
    <h5 class="card-title"><?php echo get_the_title($post);?><span class="card-concept" <?php
    
    if($poststatus !== "concept"){
      echo("style='display:none;'");
    }
    
    ?>> (CONCEPT)</span></h5>


      <?php

if(get_post_meta($post->ID, '_car_post_status_key', true) !== 'archief'){
  ?>
<div class="archive_action" data-post-id="<?php echo($post->ID) ?>"><img class="archive_img" src="<?php echo get_site_url().'/wp-content/plugins/carsync/assets/img/'; ?>archive-svgrepo-com.svg" /></div>
<?php
}else{
  ?>
<div class="unarchive_action" data-post-id="<?php echo($post->ID) ?>"><img class="archive_img" src="<?php echo get_site_url().'/wp-content/plugins/carsync/assets/img/'; ?>unarchive-svgrepo-com.svg" /></div>

  <?php
}
?>
    
    <?php
      if(get_post_meta($post->ID, '_car_post_status_key', true) == 'archief'){
        ?>
<div class="trash_car" data-id="<?php echo($post->ID); ?>"><i class="icon-trash"></i></div>
<?php
      }   
      else{

        ?>
 <div class="uitgelicht_toggle" data-car-id="<?php echo($post->ID); ?>"><i class="<?php echo($uw_icon); ?>"></i></div>

        <?php
      }
    ?>
   

    </div>
    
    <div class="hr"></div>
    <div class="dds-group-button">
      <a href="<?php echo get_home_url();?>/dashboard/edit/?id=<?php echo($post->ID); ?>"
        class="beheerwagen"><i class="icon-pencil"></i> Bewerken</a>
        

        <?php

$Verkoopstatus = get_post_meta( $post->ID, '_car_status_key', true );
$Poststatus = get_post_meta( $post->ID, '_car_post_status_key', true );
?>
<div class="edit_input_wrapper_dash">
<input class="Verkoopstatus" data-post-id="<?php echo($post->ID) ?>" data-meta="_car_status_key" type="text" value="<?php echo($Verkoopstatus); ?>">
<input class="Poststatus" data-post-id="<?php echo($post->ID) ?>" data-meta="_car_post_status_key" type="text" value="<?php echo($Poststatus); ?>">

</div>



        <div class="swrapwrap_2 dashboard_sale_status">
    <div class="btn-group verkoopstatus_group_dash" role="group" aria-label="Gereserveerd of verkocht" style="display: flex;
    flex-wrap: nowrap;">

<input type="checkbox" value="tekoop" class="btn-check radio_tekoop" name="verkoopstatus_<?php echo($post->ID) ?>" id="radio_tekoop_<?php echo($post->ID) ?>" autocomplete="off" <?php

$meta = get_post_meta($post->ID, '_car_status_key', true);
$meta_post_status =  get_post_meta($post->ID, '_car_post_status_key', true);

if($meta == "tekoop"  && $meta_post_status !== "concept"){
  echo('checked="checked"');
}

?>>
  <label class="btn btn-outline-primary" for="radio_tekoop_<?php echo($post->ID) ?>" style="border-radius: 5px 0 0 5px;">Te koop</label>

  
  <input type="checkbox" value="gereserveerd" class="btn-check radio_gereserveerd" name="verkoopstatus_<?php echo($post->ID) ?>" id="radio_gereserveerd_<?php echo($post->ID) ?>" autocomplete="off" <?php



if($meta == "gereserveerd"  && $meta_post_status !== "concept"){
  echo('checked="checked"');
}

?>>
  <label class="btn btn-outline-primary" for="radio_gereserveerd_<?php echo($post->ID) ?>" style="border-radius:0;border-left:0;">Gereserveerd</label>

  <input type="checkbox" value="verkocht" class="btn-check radio_verkocht" name="verkoopstatus_<?php echo($post->ID) ?>" id="radio_verkocht_<?php echo($post->ID) ?>" autocomplete="off" <?php

if($meta == "verkocht"  && $meta_post_status !== "concept"){
  echo('checked="checked"');
}

?>>
  <label class="btn btn-outline-primary" for="radio_verkocht_<?php echo($post->ID) ?>" style="border-radius: 0 5px 5px 0;border-left:0px;">Verkocht</label>

</div>
    </div>













    </div>
  </div>
</div>

<?php
}
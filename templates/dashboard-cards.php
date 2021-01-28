<?php
function display_admin_card($post){
    $carsync_images = get_post_meta($post->ID, '_car_syncimages_key', true);
    $manual_images = get_post_meta($post->ID, 'vdw_gallery_id', true);
    if($manual_images == null){
        $selected_img = $carsync_images[0];
    }
    else{
        $selected_img_url = wp_get_attachment_image_src($manual_images[0],'medium');
        $selected_img = $selected_img_url[0];
    }
    ?>

<div class="card">

  <img src="<?php echo $selected_img;?>" class="card-img-top" alt="<?php echo get_the_title($post);?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo get_the_title($post);?></h5>
    <div class="hr"></div>
    <div class="dds-group-button">
      <a href="<?php echo get_home_url();?>/wp-admin/post.php?post=<?php echo($post->ID); ?>&amp;action=edit"
        class="btn btn-primary beheerwagen"><i class="icon-pencil"></i> Bewerken</a>
      <div class="selectwrapper">
        <div class="dash-status-dot"><span class="<?php 
        if(get_post_meta($post->ID, '_car_sync_key', true) == 'YES' && get_post_meta($post->ID, '_car_post_status_key', true) == 'actief'){
          echo "live";
        }
        if(get_post_meta($post->ID, '_car_sync_key', true) == 'NO' && get_post_meta($post->ID, '_car_post_status_key', true) == 'actief'){
          echo "nglive";
        }
        if(get_post_meta($post->ID, '_car_post_status_key', true) == 'archief'){
          echo "archief";
        }   
        ?>"></span></div>
        <select id="dash-status">
          <option class="dot live" data-post-id="<?php echo $post->ID; ?>" value="live" <?php
        if(get_post_meta($post->ID, '_car_sync_key', true) == 'YES' && get_post_meta($post->ID, '_car_post_status_key', true) == 'actief'){
          echo "selected";
        } ?>>Live</option>
          <option class="dot nglive" data-post-id="<?php echo $post->ID; ?>" value="nglive" <?php
        if(get_post_meta($post->ID, '_car_sync_key', true) == 'NO' && get_post_meta($post->ID, '_car_post_status_key', true) == 'actief'){
          echo "selected";
        } ?>>Geen sync & live</option>
          <optgroup label="--------------"></optgroup>
          <option class="dot archief" data-post-id="<?php echo $post->ID; ?>" value="archief" <?php
        if(get_post_meta($post->ID, '_car_post_status_key', true) == 'archief'){
          echo "selected";
        } ?>>Archief</option>
        </select>
      </div>


      <div class="selectwrapper-post-status">
        <div class="dash-post-status-dot"><span class="<?php 
        if(get_post_meta($post->ID, '_car_status_key', true) == 'tekoop'){
          echo "tekoop";
        }
        if(get_post_meta($post->ID, '_car_status_key', true) == 'gereserveerd'){
          echo "gereserveerd";
        }
        if(get_post_meta($post->ID, '_car_status_key', true) == 'verkocht'){
          echo "verkocht";
        }   
        ?>"></span></div>
        <select id="dash-post-status">
          <option class="dot tekoop" data-post-id="<?php echo $post->ID; ?>" value="tekoop" <?php
        if(get_post_meta($post->ID, '_car_status_key', true) == 'tekoop'){
          echo "selected";
        } ?>>Te Koop</option>
          <option class="dot gereserveerd" data-post-id="<?php echo $post->ID; ?>" value="gereserveerd" <?php
        if(get_post_meta($post->ID, '_car_status_key', true) == 'gereserveerd'){
          echo "selected";
        } ?>>Gereserveerd</option>
          <optgroup label="--------------"></optgroup>
          <option class="dot verkocht" data-post-id="<?php echo $post->ID; ?>" value="verkocht" <?php
        if(get_post_meta($post->ID, '_car_status_key', true) == 'verkocht'){
          echo "selected";
        } ?>>Verkocht</option>
        </select>
      </div>

    </div>
  </div>
</div>

<?php
}
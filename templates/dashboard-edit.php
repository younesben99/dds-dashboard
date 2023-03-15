
<?php
 $id = $_GET["id"];

 if(!isset($id) || empty($id) || FALSE === get_post_status( $id )){
     $url = get_home_url() . "/dashboard/";
     header("Location: ".$url);
 }

include(__DIR__."/dashboard-header.php");

?>
  <div class="bodywrap">


 
      <?php

dashboard_sidebar("Edit",["inventaris","edit","bekijken","uitlichten"]);


$dds_settings_options = get_option( 'dds_settings_option_name' );
$as_key = $dds_settings_options['autoscout_graphql_api_key_0']; 
      ?>
   
    <div class="contentwrap">
    <div class="topnavtoggle" style="font-size: 19px;
    font-weight: 500;
    color: #0d4a61;"><img src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/menu.svg" style="width: 25px;" /><?php echo get_the_title( $id ); ?></div>
      <div class="topnav edittopnav">
<div class="edittopnav_wrap">
      
      <div class="switchwrap as_linker" <?php
      if(empty($as_key)){
        echo(" style='visibility: hidden;' ");
      }
      ?>>
        <div>
          <label class="switch">
              <input type="checkbox" id="as_linked_switch"
              <?php

$meta = get_post_meta($id);


if($meta["_car_sync_key"][0] == "YES"){
  echo("checked");
}





?>>
              <div>
                  <span></span>
              </div>
          </label>
        </div>
      <div class="switchtext">Gelinked met Autoscout</div>

    </div>


    <div class="archivebtn_edit_wrap">
    <div class="archivebtn_edit" style="margin-right: 25px;">
 

<?php
$meta = get_post_meta($id);


if($meta["_car_post_status_key"][0] == "actief"){
?>
<div class="archive_action_edit" data-post-id="<?php echo($id) ?>"><img class="archive_img" src="<?php echo get_site_url().'/wp-content/plugins/carsync/assets/img/archive-svgrepo-com.svg'; ?>" /></div>
<?php
}
else{
  ?>
<div class="unarchive_action_edit" data-post-id="<?php echo($id) ?>"><img class="archive_img" src="<?php echo get_site_url().'/wp-content/plugins/carsync/assets/img/unarchive-svgrepo-com.svg'; ?>" /></div>


<?php
}

?>


 <div class="uitgelicht_toggle_edit" data-car-id="<?php echo($id); ?>"><i class="<?php
 

 $uitgelichte_opt = get_option("uitgelichtewagens");
    
 if(is_array($uitgelichte_opt)){

   if(in_array($id,$uitgelichte_opt)){
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
 
 echo($uw_icon); ?>"></i></div>

     
   
   </div>
    <div class="swrapwrap_2">
    <div class="btn-group verkoopstatus_group" role="group" aria-label="Gerserveerd of verkocht" style="display: flex;
    flex-wrap: nowrap;">

<input type="checkbox" value="tekoop" class="btn-check radio_tekoop" name="verkoopstatus" id="radio_tekoop" autocomplete="off" <?php
$meta = get_post_meta($id);


if($meta["_car_status_key"][0] == "tekoop" && $meta["_car_post_status_key"][0] !== "concept"){
  echo("checked");
}

?>>
  <label class="btn btn-outline-primary" for="radio_tekoop" style="border-radius: 5px 0 0 5px;">Te koop</label>

  
  <input type="checkbox" value="gereserveerd" class="btn-check radio_gereserveerd" name="verkoopstatus" id="radio_gereserveerd" autocomplete="off" <?php
$meta = get_post_meta($id);


if($meta["_car_status_key"][0] == "gereserveerd" && $meta["_car_post_status_key"][0] !== "concept"){
  echo("checked");
}

?>>
  <label class="btn btn-outline-primary" for="radio_gereserveerd" style="border-radius:0;border-left:0;">Gereserveerd</label>

  <input type="checkbox" value="verkocht" class="btn-check radio_verkocht" name="verkoopstatus" id="radio_verkocht" autocomplete="off" <?php
$meta = get_post_meta($id);


if($meta["_car_status_key"][0] == "verkocht" && $meta["_car_post_status_key"][0] !== "concept"){
  echo("checked");
}

?>>
  <label class="btn btn-outline-primary" for="radio_verkocht" style="border-radius: 0 5px 5px 0;border-left:0px;">Verkocht</label>

</div>
</div>
<div class="wagen_status_wrap_btn <?php

if($meta["_car_post_status_key"][0] !== "actief"){
  echo("inactive_car");
}

?>"><div class="wagen_status_wrap_btn_circle"></div><div class="wagen_status_wrap_btn_inner">
  
<?php
echo $meta["_car_post_status_key"][0];
?>

</div></div>
    </div>
    </div>
</div>
      <div style="padding:2%;" class="innercontent">
    

      <?php


include(__DIR__."/dashboard-edit-fields.php");
   
include(__DIR__."/dashboard-edit-images-update.php");  

?>
  
      </div>
    </div>
    <?php
 

//  $uitgelichte_opt = get_option("uitgelichtewagens");

//  var_dump( $uitgelichte_opt);
    ?>
  </div>


  <?php

include(__DIR__."/dashboard-footer.php");

?>
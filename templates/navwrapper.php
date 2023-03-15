<?php
function dashboard_sidebar($page = "Dashboard",$items = ["inventaris"]){
$car_status = get_post_meta($_GET["id"],"_car_post_status_key",true);
?>

<div class="navwrapper">

<div>
  <img class="dslogo" src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/logo.svg" />
  <div class="topnavtoggle toggleinmenu"><img src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/menu.svg" style="width: 25px;" /></div>
</div>





<a href="<?php echo get_home_url();?>/dashboard/" class="archieflink <?php
if($page == "Dashboard"){
  echo("dsactive");
}
if($page == "Edit" && $car_status == "actief"){
  echo("dsactive");
}

?>" style="margin-top:40px;"><i class="icon-grid" style="font-size:20px;" ></i> <span style="margin-left:10px;">Inventaris</span></a>
<?php

if($page == "Edit" && $car_status == "actief"){
    ?>
<a href="#" class="archieflink archieflow"><span style="margin-left: 10px;
    font-size: 13px;
    color: #20aee3;
    font-weight: 600;"><?php echo get_the_title($_GET["id"]); ?></span></a>
    <?php
}


?>





<a href="<?php echo get_home_url();?>/dashboard/archief/" class="archieflink <?php

if($page == "Archief"){
    echo("dsactive");
}
if($page == "Edit" && $car_status == "archief"){
  echo("dsactive");
}
?>"><i class="icon-drawer" style="font-size:20px;" ></i> <span style="margin-left:10px;">Archief</span></a>

<?php
if($page == "Edit" && $car_status == "archief"){
  ?>
<a href="#" class="archieflink archieflow"><span style="margin-left: 10px;
  font-size: 13px;
  color: #20aee3;
  font-weight: 600;"><?php echo get_the_title($_GET["id"]); ?></span></a>
  <?php
}
if(in_array("bekijken",$items)){
    ?>

<a href="<?php echo get_permalink($_GET["id"]); ?>" class="archieflink" target="_blank"><i class="icon-eye" style="font-size:20px;" ></i> <span style="margin-left:10px;">Bekijken</span></a>
<?php
}
if(in_array("uitlichten",$items)){
    ?>
<?php

$uitgelichte_opt = get_option("uitgelichtewagens");

if(is_array($uitgelichte_opt)){
  if(in_array($_GET["id"],$uitgelichte_opt)){
    $uitgelichtelink_class = " uitgelichtelink";
    $uitgelichte_actief = " uwactive";
  }
}




?>
<a class="uitlichten archieflink<?php echo $uitgelichtelink_class; ?>" data-car-id="<?php echo($_GET["id"]); ?>"><i class="fa fa-star" style="font-size:20px;" ></i> <span style="margin-left:10px;">Uitlichten</span></a>


<?php
 if( is_user_logged_in() ) {
  $user = wp_get_current_user();
  $user = $user->display_name;
 
  if($user == "digiflow" || $user == "admin" || $user == "administrator"){
    ?>



<a class="metadata_show archieflink pop_open" data-popup="metadata"><i class="icon-eye" style="font-size:20px;" ></i> <span style="margin-left:10px;">Metadata Tonen</span></a>


<?php
  }

  } 
?>


<?php
}


if(in_array("filter",$items)){



?>
<!--  BEGIN FILTER -->
<div class="dashboard_sidebar_filter">

  <span class="filterlabel">Filteren</span>

  <div class="menuitemwrap">
  <div class='showallcars'>Bekijk alle wagens</div>
  <?php 
  
  $dsposts = get_posts(array(
    'post_type' => 'autos',
    'numberposts' => -1,
    'post_status' => 'any'
    
  ));
  $merkenlijst = array();

  foreach($dsposts as $dspost){

    $status = get_post_meta( $dspost->ID, '_car_post_status_key', true );

    if($page == "Dashboard"){
        if($status == "actief" || $status == "concept"  ){
     
            $term = get_the_terms($dspost, "merkenmodel");
            if (is_array($term) || is_object($term))
            {
              foreach( $term as $termitem){
                if($termitem->parent == 0){
                  if (!in_array($termitem->term_id, $merkenlijst))
                  {
                    array_push($merkenlijst,$termitem->term_id);
                  }
                  
              }
            }
            }
            
            
          
        }
    }
    if($page == "Archief"){
        if($status == "archief"  ){
      
            $term = get_the_terms($dspost, "merkenmodel");
            if (is_array($term) || is_object($term))
            {
              foreach( $term as $termitem){
                if($termitem->parent == 0){
                  if (!in_array($termitem->term_id, $merkenlijst))
                  {
                    array_push($merkenlijst,$termitem->term_id);
                  }
                  
              }
            }
            }
            
            
          
        }
    }
    
}
  foreach($merkenlijst as $termid){
    
    $termitem = get_term_by("ID", $termid,"merkenmodel");
  
    echo "<div class='merkitem' data-id='".$termitem->term_id."' data-slug='".$termitem->slug."'>".$termitem->name."</div>";
  }
 
 //new list
 
  ?>
   
  </div>


</div>

<!-- END FILTER -->

<?php

}

?>

</div>


<?
}
?>
<?php
function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}
if(!is_user_logged_in()){
$url = get_site_url() . "/wp-login.php";
Redirect($url);
}
?>
<?php

include(__DIR__."/dashboard-header.php");

?>
  <div class="bodywrap">


 
      <?php

dashboard_sidebar("Dashboard",["inventaris","filter"]);
      ?>
   
    <div class="contentwrap">
      <div class="topnav">
      <div class="topnavtoggle"><img src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/menu.svg" style="width: 25px;" /></div>
      <a class="archieflink loguitlink" id="loguit" target="_blank"><i class="icon-logout" style="font-size:20px;" ></i> <span style="margin-left:10px;">Uitloggen</span></a></div>
      <div style="padding:2%;">
      <h1 class="dashhead">Inventaris (<span class="dash_counter"><?php


  $count = 0;
  $allposts = get_posts( array('post_type'=>'autos','numberposts'=>-1, 'post_status' => 'any') );
    foreach ($allposts as $post) {
      $status = get_post_meta( $post->ID, '_car_post_status_key', true );
      if($status == "actief" || $status == "concept" ){
       $count++;
      }
    }


echo($count);
?></span>)</h1>
      <button class="additem pop_open" data-popup="auto_toevoegen"><i class="icon-plus" style="font-size:20px;" ></i> <span style="margin-left:10px;">Auto toevoegen</span></button>
     <?php

popup_backend_open("auto_toevoegen");

?>

<div class="auto_toevoegen_wrap" style="width: 100%;">

<h3 style="margin-bottom: 10px;
    margin-top: 25px;">Auto toevoegen aan inventaris</h3>
<p style="margin-bottom: 25px;
    font-size: 12Px;
    color: #80969e;">Vul hier het chassis nummer in en haal de gegevens op van de auto.</p>
<label for="chassisnr">Chassis Nummer</label>
<input type="text" id="new_chassisnr" maxlength="17" />
<input type="hidden" id="inmotiv_apikey" value="<?

$dds_settings_options = get_option( 'dds_settings_option_name' ); 
$inmotiv_key = $dds_settings_options['inmotiv_key']; 
echo $inmotiv_key; ?>"/>
<div style="display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    width: 100%;
    align-items: center;
    flex-direction: column;">

<button id="create_car_inmotiv" class="btn_dialog" style="font-size: 17px;background:#20aee3;color:white;"><img src="<?php echo(get_site_url()); ?>/wp-content/plugins/carsync/assets/img/pdf-down-white.svg" width="30" style="padding-right:20px;"> Gegevens ophalen </button>


<button id="create_car_basic" class="btn_dialog" style="background-color: #f7f7f7;
    border: 2px solid #dcecf2;
    color: #3c5660;">Overslaan</button>
    
</div>
</div>

<?php
popup_backend_close();

     ?>
      <div id="dds-grid"></div>
      </div>
    </div>

  </div>


  <?php

include(__DIR__."/dashboard-footer.php");

?>
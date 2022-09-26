
<?php

include(__DIR__."/dashboard-header.php");

?>
  <div class="bodywrap">

    <div class="navwrapper">

      <div>
        <img class="dslogo" src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/logo.svg" />
        <div class="topnavtoggle toggleinmenu"><img src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/menu.svg" style="width: 25px;" /></div>
      </div>

      <a href="<?php echo get_home_url();?>/dashboard/" class="archieflink dsactive" style="margin-top:40px;"><i class="icon-grid" style="font-size:20px;" ></i> <span style="margin-left:10px;">Inventaris</span></a>
      <a href="<?php echo get_home_url();?>/dashboard/archief/" class="archieflink"><i class="icon-drawer" style="font-size:20px;" ></i> <span style="margin-left:10px;">Archief</span></a>
      <!-- <a href="<?php //echo get_home_url();?>/" class="archieflink" target="_blank"><i class="icon-social-google" style="font-size:20px;" ></i> <span style="margin-left:10px;">Advertenties</span></a>
      <a href="<?php //echo get_home_url();?>/" class="archieflink" target="_blank"><i class="icon-people" style="font-size:20px;" ></i> <span style="margin-left:10px;">Klanten</span></a>
      <a href="<?php //echo get_home_url();?>/" class="archieflink" target="_blank"><i class="icon-calendar" style="font-size:20px;" ></i> <span style="margin-left:10px;">Afspraken</span></a>
      <a href="<?php //echo get_home_url();?>/" class="archieflink" target="_blank"><i class="icon-bell" style="font-size:20px;" ></i> <span style="margin-left:10px;">Abonnementen</span></a>
      
      <a href="<?php //echo get_home_url();?>/" class="archieflink" target="_blank"><i class="icon-list" style="font-size:20px;" ></i> <span style="margin-left:10px;">Banden stock</span></a> -->
      <div class="menuitems">
  
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
        $counter = 0;
        foreach($dsposts as $dspost){

          $status = get_post_meta( $dspost->ID, '_car_post_status_key', true );

          if($status == "actief" || $status == "concept"  ){
            $counter++;
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
        foreach($merkenlijst as $termid){
          
          $termitem = get_term_by("ID", $termid,"merkenmodel");
        
          echo "<div class='merkitem' data-id='".$termitem->term_id."' data-slug='".$termitem->slug."'>".$termitem->name."</div>";
        }
       
       //new list
       
        ?>
         
        </div>


      </div>
    </div>

   
    <div class="contentwrap">
      <div class="topnav">
      <div class="topnavtoggle"><img src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/menu.svg" style="width: 25px;" /></div>
      <a class="archieflink loguitlink" id="loguit" target="_blank"><i class="icon-logout" style="font-size:20px;" ></i> <span style="margin-left:10px;">Uitloggen</span></a></div>
      <div style="padding:2%;" class="innercontent">
      <h1 class="dashhead">Inventaris (<?php echo $counter;?>)</h1>
      <a href="<?php echo get_home_url();?>/wp-admin/post-new.php?post_type=autos" class="additem"><i class="icon-plus" style="font-size:20px;" ></i> <span style="margin-left:10px;">Auto toevoegen</span></a>
      <div id="dds-grid"></div>
      </div>
    </div>

  </div>


  <?php

include(__DIR__."/dashboard-footer.php");

?>
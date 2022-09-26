
<?php

include(__DIR__."/dashboard-header.php");

?>


  <div class="bodywrap">
  

    <nav class="navwrapper">

    <div>
        <img class="dslogo" src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/logo.svg" />
        <div class="topnavtoggle toggleinmenu"><img src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/menu.svg" style="width: 25px;" /></div>
      </div>

      <a href="<?php echo get_home_url();?>/dashboard/" class="archieflink" style="margin-top:40px;"><i class="icon-grid" style="font-size:20px;" ></i> <span style="margin-left:10px;">Inventaris</span></a>
      <a href="<?php echo get_home_url();?>/dashboard/archief/" class="archieflink dsactive"><i class="icon-drawer" style="font-size:20px;" ></i> <span style="margin-left:10px;">Archief</span></a>
      <a href="<?php echo get_home_url();?>/" class="archieflink" target="_blank"><i class="icon-eye" style="font-size:20px;" ></i> <span style="margin-left:10px;">Website bekijken</span></a>
      
      <div class="menuitems">

        <span class="filterlabel">Filteren</span>

        <div class="menuitemwrap">
        <div class='showallcars'>Bekijk alle wagens</div>
        <?php 
        
        $dsposts = get_posts(array(
          'post_type' => 'autos',
          'numberposts' => -1
          
        ));
        $merkenlijst = array();
        $counter = 0;
        foreach($dsposts as $dspost){

          $status = get_post_meta( $dspost->ID, '_car_post_status_key', true );

          if($status == "archief" ){
            $counter++;
            $term = get_the_terms($dspost, "merkenmodel");
            if (is_array($term) || is_object($term)){
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
    </nav>


    <div class="contentwrap">
      <div class="topnav">
      <div class="topnavtoggle"><img src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/menu.svg" style="width: 25px;" /></div>
      <a class="archieflink loguitlink" id="loguit" target="_blank"><i class="icon-logout" style="font-size:20px;" ></i> <span style="margin-left:10px;">Uitloggen</span></a></div>
      <div style="padding:2%;" class="innercontent">
      <h1 class="dashhead">Archief (<?php echo $counter;?>)</h1>
      <a href="<?php echo get_home_url();?>/wp-admin/post-new.php?post_type=autos" class="additem"><i class="icon-plus" style="font-size:20px;" ></i> <span style="margin-left:10px;">Auto toevoegen</span></a>
      <div id="dds-grid"></div>
      </div>
    </div>

  </div>

  </div>


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.5.3/modernizr.min.js" type="text/javascript"></script>
  <script src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/js/dds-grid-archive.js?v=<?php echo(uniqid()); ?>" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>



  <?php

include(__DIR__."/dashboard-footer.php");

?>

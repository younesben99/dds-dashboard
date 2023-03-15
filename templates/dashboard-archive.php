
<?php

include(__DIR__."/dashboard-header-archive.php");

?>


  <div class="bodywrap">
  

  <?php

dashboard_sidebar("Archief",["inventaris","filter"]);

?>


    <div class="contentwrap">
      <div class="topnav">
      <div class="topnavtoggle"><img src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/menu.svg" style="width: 25px;" /></div>
      <a class="archieflink loguitlink" id="loguit" target="_blank"><i class="icon-logout" style="font-size:20px;" ></i> <span style="margin-left:10px;">Uitloggen</span></a></div>
      <div style="padding:2%;">
      <h1 class="dashhead">Archief (<span class="dash_counter"><?php


$count = 0;
$allposts = get_posts( array('post_type'=>'autos','numberposts'=>-1, 'post_status' => 'any') );
  foreach ($allposts as $post) {
    $status = get_post_meta( $post->ID, '_car_post_status_key', true );
    if($status == "archief" ){
     $count++;
    }
  }


echo($count);
?></span>)</h1>
      <a  href="/dashboard/" class="additem" style="font-size:13.3px;"><i class="icon-arrow-left" style="font-size:15px;" ></i> <span style="margin-left:10px;">Naar Dashboard</span></a>
      <div id="dds-grid"></div>
      </div>
    </div>

  </div>

  </div>

<footer>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
  




  <script src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/js/dds-grid-archive.js?v=<?php echo(uniqid()); ?>" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
  
</footer>

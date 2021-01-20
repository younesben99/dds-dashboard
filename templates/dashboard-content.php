<?php

if(is_user_logged_in()){

  ?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,500;1,600&display=swap"
    rel="stylesheet">

  <link href="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/css/dashboard-style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" integrity="sha512-QKC1UZ/ZHNgFzVKSAhV5v5j73eeL9EEN289eKAEFaAjgAiobVAnVv/AGuPbXsKl1dNoel3kNr6PYnSiTzVVBCw==" crossorigin="anonymous" />
  <title>Dashboard</title>

</head>

<body>


  <div class="bodywrap">

    <nav class="navwrapper">

      <div style="margin-top:20px;text-align:center;">
        <img class="dslogo" src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/logo.png" />
      </div>

      <a href="<?php echo get_home_url();?>/wp-admin/post-new.php?post_type=autos" class="additem"><i class="icon-plus" style="font-size:20px;" ></i> <span style="margin-left:10px;">Auto toevoegen</span></a>
      <a href="<?php echo get_home_url();?>/dashboard/archief" class="archieflink"><i class="icon-drawer" style="font-size:20px;" ></i> <span style="margin-left:10px;">Archief</span></a>
      <a href="<?php echo get_home_url();?>/" class="archieflink" target="_blank"><i class="icon-eye" style="font-size:20px;" ></i> <span style="margin-left:10px;">Website bekijken</span></a>
      <a class="archieflink" id="loguit" target="_blank"><i class="icon-logout" style="font-size:20px;" ></i> <span style="margin-left:10px;">Uitloggen</span></a>

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

          if($status == "Actief" ){
            $counter++;
            $term = get_the_terms($dspost, "merkenmodel");
            
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

      <h1 class="dashhead">Inventaris (<?php echo $counter;?>)</h1>
    <div id="dds-grid"></div>
    </div>

  </div>


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
  
  <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.5.3/modernizr.min.js" type="text/javascript"></script>
  <script src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/js/dds-grid.js" type="text/javascript"></script>

</body>

</html>


<?php
}
else{
  auth_redirect();
}
?>

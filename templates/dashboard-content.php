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

  <link href="https://cmpluginzone.local/wp-content/plugins/dds-dashboard/assets/dashboard-style.css" rel="stylesheet">
  <title>Dashboard</title>

</head>

<body>


  <div class="bodywrap">

    <nav class="navwrapper">

      <div style="margin-top:20px;text-align:center;">
        <img class="dslogo" src="https://cmpluginzone.local/wp-content/uploads/2021/01/digiflow_donkerblauw.png" />
      </div>

      <div class="additem">Wagen toevoegen</div>

      <div class="menuitems">

        <span class="filterlabel">Filteren</span>

        <div class="menuitemwrap">
        <div class='showallcars'>Bekijk alle wagens</div>
          <?php 
        
        $merken = get_terms("merkenmodel",  '&hide_empty=1&parent=0');
        
        foreach($merken as $merk){
          echo "<div class='merkitem' data-id='".$merk->term_id."' data-slug='".$merk->slug."'>".$merk->name."</div>";
        }
       
        ?>
         
        </div>


      </div>
    </nav>


    <div class="contentwrap">

    <div id="dds-grid"></div>
    </div>

  </div>


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
  
  <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.5.3/modernizr.min.js" type="text/javascript"></script>
  <script src="https://cmpluginzone.local/wp-content/plugins/dds-dashboard/assets/dds-grid.js" type="text/javascript"></script>

</body>

</html>


<?php 

// $allposts= get_posts( array('post_type'=>'autos','numberposts'=>-1) );
// foreach ($allposts as $post) {
//   display_admin_card($post);
// }

?>
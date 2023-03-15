<style>
 .navwrapper {
    min-width: 260px;
    background: #ffffff;
    width: 20%;
    padding: 20px 0px;
    border-right: 1px solid rgba(120, 130, 140, 0.13);
    position: fixed;
    height: 100%;
  }

  .archieflink {
    font-weight: 500;    
   
    text-align: left;

    color: #5b6271;
    cursor: pointer;
    text-align: center;
    display: flex;
    justify-content: flex-start;
    align-items: flex-end;
    padding: 15px 25px;
    font-size:16px;
  }
  .archieflink:hover{
    opacity: 0.9;
    transition: 0.2s;
    color:#20aee3;
  }
  .menuitemwrap div {
    padding: 5px 0;
    color: #353535;
    font-size: 16px;
  }

  .dashboard_sidebar_filter {
    padding-top: 25px;
    border-top: 1px solid #efefef;    padding-left: 25px;
    margin-top: 25px;
  }
.uitgelichtelink{
  color: #e3a820 !important;
  background: #e3a82121;
  
}
.activespan{
  display:none;
  font-weight:600;
}
.uwactive{
  display:inline-block;
}
  </style>

<div class="navwrapper">

<div style="display: flex;justify-content: space-between;margin-right: 40px;">
  <img class="dslogo" src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/logo.svg" style="width:125px;"/>
  <div class="topnavtoggle toggleinmenu"><img src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/menu.svg" style="width: 25px;" /></div>
</div>

<a href="<?php echo get_home_url();?>/dashboard/" class="archieflink dsactive" style="margin-top:40px;"><i class="icon-grid" style="font-size:20px;" ></i> <span style="margin-left:10px;">Inventaris</span></a>
<a href="#" class="archieflink archieflow"><span style="margin-left: 10px;
    font-size: 14px;
    color: #20aee3;
    font-weight: 600;">Bewerken</span></a>
<a href="<?php echo get_home_url();?>/dashboard/archief/" class="archieflink"><i class="icon-drawer" style="font-size:20px;" ></i> <span style="margin-left:10px;">Archief</span></a>
<a href="<?php echo get_permalink($post->ID); ?>" class="archieflink" target="_blank"><i class="icon-eye" style="font-size:20px;" ></i> <span style="margin-left:10px;">Bekijken</span></a>

<?php

$uitgelichte_opt = get_option("uitgelichtewagens");

if(is_array($uitgelichte_opt)){
  if(in_array($post->ID,$uitgelichte_opt)){
    $uitgelichtelink_class = " uitgelichtelink";
    $uitgelichte_actief = " uwactive";
  }
}




?>
<a class="uitlichten archieflink<?php echo $uitgelichtelink_class; ?>" data-car-id="<?php echo($post->ID); ?>"><i class="fa fa-star" style="font-size:20px;" ></i> <span style="margin-left:10px;">Uitlichten</span></a>






</div>
</div>
<div class="contentwrap">
      <div class="topnav">
      <div class="topnavtoggle"><img src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/menu.svg" style="width: 25px;" /></div>
      <a class="loguitlink" id="loguit" target="_blank"><i class="icon-logout" style="font-size:20px;" ></i> <span style="margin-left:10px;">Uitloggen</span></a></div>
      
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous"></script>

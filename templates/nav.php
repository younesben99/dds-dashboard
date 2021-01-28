
<style>


html.wp-toolbar {
    padding-top: 0 !important;
}
body {
    background: #f6f9fa !important;
}
a{
    text-decoration:none !important;
}
.wrap {
    margin-top: 100px !important;
}
input#publish:hover {
    background: #e8f1f5;
    transition: 0.5s;
}
.navwrapper {
    min-width: 260px !important;
    background: #ffffff !important;;
    flex-basis:20%;
    padding: 20px 0px !important;;
    border-right: 1px solid rgba(120, 130, 140, 0.13) !important;;
    position:fixed;
    height: 100%;
  }.postbox {
    border: 1px solid rgba(120, 130, 140, 0.13) !important;
}

  .dslogo {
    padding-left: 25px;
    width: 125px;
  }
  .dsactive{
    background: #f0f5f7;
    border-left: 4px solid #20aee3;
  }
  .archieflink {
    font-weight: 500;    
    font-size: 16px;
    text-align: left;
    color: #5b6271;
    cursor: pointer;
    text-align: center;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    padding: 15px 25px !important;;
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

  .menuitems {
    padding-top: 25px;
    border-top: 1px solid #efefef;    padding-left: 25px;
  }

  .menuitemwrap {
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    margin-top: 20px;
  }

  .filterlabel {
    font-variant: all-small-caps;
    font-size: 19px;
    font-weight: 500;
    margin-bottom: 15px;
  }

.showallcars{
 cursor:pointer;
 font-weight: 500;

}
.merkitem{
  cursor:pointer;
}.ds-selected {
  color: rgb(31 104 138) !important;
  transition: 0.4s;
  font-weight: bold;
}
@media only screen and (max-width: 700px) {
 
.navwrapper{
  width:100%;
  max-width: 100%;
  padding:0;
  align-items: left;
}
.menuitems {
  width: 80%;
  margin-bottom: 50px;
}
.additem,.archieflink {
 
  width: 60%;
}
.dashhead{


  margin: 22px 40px 14px;
  text-align: left;
}
}
</style>
<div class="navwrapper">

<div style="margin-top:20px">
  <img class="dslogo" src="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/logo.svg" style="width: 125px;" />
</div>

<a href="<?php echo get_home_url();?>/dashboard/" class="archieflink dsactive" style="margin-top:40px;"><i class="icon-grid" style="font-size:20px;" ></i> <span style="margin-left:10px;">Inventaris</span></a>
<a href="#" class="archieflink archieflow"><span style="margin-left: 10px;
    font-size: 14px;
    color: #20aee3;
    font-weight: 600;">Bewerken</span></a>
<a href="<?php echo get_home_url();?>/dashboard/archief/" class="archieflink"><i class="icon-drawer" style="font-size:20px;" ></i> <span style="margin-left:10px;">Archief</span></a>
<a href="<?php echo get_home_url();?>/" class="archieflink" target="_blank"><i class="icon-eye" style="font-size:20px;" ></i> <span style="margin-left:10px;">Website bekijken</span></a>
<a class="archieflink" id="loguit" target="_blank"><i class="icon-logout" style="font-size:20px;" ></i> <span style="margin-left:10px;">Uitloggen</span></a>



</div>
</div>
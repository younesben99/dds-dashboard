(function($) {

    $(document).ready(function(){

      $("#my-accordion").accordionjs();

      if($("#post_title").val() !== undefined){
        document.title = $("#post_title").val() + " Bewerken";
      }
     

        $("#Beschrijving").trumbowyg({
          btns: [
            ['strong', 'em', 'del'],
            ['unorderedList', 'orderedList'],
            ['horizontalRule'],
            ['removeformat'],
            ['fullscreen']
        ]
        });



        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-bottom-right",
          "preventDuplicates": true,
          "onclick": null,
          "showDuration": "200",
          "hideDuration": "500",
          "timeOut": "3500",
          "extendedTimeOut": "2500",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
 

   


    if($("#inmotiv_apikey").val() == ""){
      $("#Gegevensophalen").prop("disabled","disabled");
      $("#create_car_inmotiv").prop("disabled","disabled");
      
    }
    if($("#ab_checked").val() == ""){
      $("#Aankoopborderel").prop("disabled","disabled");
    }
    if($("#bb_checked").val() == ""){
      $("#Bestelbon").prop("disabled","disabled");
    }
    if($("#bb_checked").val() == ""){
      $("#Bestelbon").prop("disabled","disabled");
    }
    if($("#billit_apikey").val() == ""){
      $("#Offerteaanmaken").prop("disabled","disabled");
    }
    if($("#facebook_apikey").val() == ""){
      $("#Facebookdelen").prop("disabled","disabled");
    }
    if($("#instagram_apikey").val() == ""){
      $("#Instagramdelen").prop("disabled","disabled");
    }

    $("#carmerk-input").select2({placeholder: "Selecteer Merk",disabled: true});
    $("#carmodel-input").select2({placeholder: "Selecteer Model",disabled: true}); 

    //nieuw
    $(".car-merk").select2({placeholder: "Selecteer Merk",disabled: false}); 
    $(".car-model").select2({placeholder: "Selecteer Model",disabled: false});
    $("#Carrosserievorm").select2({placeholder: "Carrosserievorm",disabled: false});
    $("#Brandstof").select2({placeholder: "Brandstof",disabled: false});
    $("#Transmissie").select2({placeholder: "Transmissie",disabled: false});
    $("#Staat").select2({placeholder: "Staat",disabled: false});
    $("#Kleurexterieur").select2({placeholder: "Kleurexterieur",disabled: false});
    $("#Kleurinterieur").select2({placeholder: "Kleurinterieur",disabled: false});
    $("#Emissieklasse").select2({placeholder: "Emissieklasse",disabled: false});
    $("#BTWaftrekbaar").select2({placeholder: "BTWaftrekbaar",disabled: false});
    //selecteer merk en model

    currentmerk = $("#merkcfid").text();
    currentmodel = $("#modelcfid").text();


    //console.log(currentmerk);
    $(".car-merk").val(currentmerk).trigger('change');
    $('.car-merk').trigger('change');
    $( ".car-model > option" ).each(function( index ) {
      $( this ).prop("disabled",true);
    });
    if(currentmodel.length == 0){
      merkid = $(".car-merk").find('option:selected').attr("data-merkid");
    
      $( ".car-model > option" ).each(function( index ) {
        
            if($( this ).attr("data-merkid") == merkid){
            
              $( this ).prop("disabled",false);
            }
      });
    }
    else{
      merkid = $(".car-merk").find('option:selected').attr("data-merkid");
    
      $( ".car-model > option" ).each(function( index ) {
        
            if($( this ).attr("data-merkid") == merkid){
            
              $( this ).prop("disabled",false);
            }
      });
      $(".car-model").val(currentmodel).trigger('change');
      $('.car-model').trigger('change');
    }
    


    $(".car-merk").on("change",function(){

     


      //hide alles
      $(".modeloption").prop("disabled",true);


      $(".currentmodel").prop("disabled",true);
      $(".currentmodel").prop("selected",false);


      

      merkid = $(this).find('option:selected').attr("data-merkid");
      // console.log(merkid);
      $( ".car-model > option" ).each(function( index ) {
        
            if($( this ).attr("data-merkid") == merkid){
            
              $( this ).prop("disabled",false);
            }
      });

      
      $(".selecteermodel").prop("disabled",true);
      $(".selecteermodel").prop('selected', true);
      $(".car-model").val("select");
      $('.car-model').trigger('change');

 });


  $('#as_linked_switch').change(function()
  {
    console.log("test");
    if ($(this).is(':checked')) {
        $("#Wagenstatus").val("YES");
        $("#Wagenstatus").trigger("change");
    }else{
        $("#Wagenstatus").val("NO");
        $("#Wagenstatus").trigger("change");
    }
  });




  $('.verkoopstatus_group input').on("click",function()
  {

    var selected = $(this).val();
 
    $('.verkoopstatus_group input').each(function(){

      if($(this).val() !== selected){
        $(this).prop("checked",false);
      }
      

    });

    if ($(this).is(':checked')) {
        $("#Verkoopstatus").val($(this).val());
        $("#Verkoopstatus").trigger("change");
        $("#Poststatus").val("actief");
        $("#Poststatus").trigger("change");
        if($(".wagen_status_wrap_btn").hasClass("inactive_car")){
          $(".wagen_status_wrap_btn").toggleClass("inactive_car");
        };
        $(".wagen_status_wrap_btn_inner").text("Actief");
      
    
    }
    else{
 
      $("#Poststatus").val("concept");
      $("#Poststatus").trigger("change");
      if(!$(".wagen_status_wrap_btn").hasClass("inactive_car")){
        $(".wagen_status_wrap_btn").toggleClass("inactive_car");
      };
      $(".wagen_status_wrap_btn_inner").text("Concept");

    }

   
  
  });
  

 
  
  $( "#dds-grid" ).on( "change",".verkoopstatus_group_dash input",function()
  {

    var selected = $(this).val();

    $(this).parents(".dds-group-button").find("input").each(function(){

      if($(this).val() !== selected){
        $(this).prop("checked",false);
      }
      

    });

    
    
    if ($(this).is(':checked')) {
      console.log("checked");
      $(this).parents(".dds-group-button").find(".Verkoopstatus").val($(this).val());
      $(this).parents(".dds-group-button").find(".Verkoopstatus").trigger("change");
      $(this).parents(".dds-group-button").find(".Poststatus").val("actief");
      $(this).parents(".dds-group-button").find(".Poststatus").trigger("change");
    }
    else{
      console.log("unchecked");
      $(this).parents(".dds-group-button").find(".Poststatus").val("concept");
      $(this).parents(".dds-group-button").find(".Poststatus").trigger("change");
    }
    
  });




  var carid = jQuery(".uitlichten").attr("data-car-id");

  $(".uitlichten").on("click",function(){
    $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
    {
      push: "uitlichten",
      carid: carid
    },
    function(data){
      console.log(data);
      if(jQuery.trim(data) == "toegevoegd"){
        
        $(".uitlichten").addClass("uitgelichtelink");
      }

      if(jQuery.trim(data) == "verwijderd"){
        
        $(".uitlichten").removeClass("uitgelichtelink");

      }
    });
  });

  $(".dslogo").on("click",function(){

    window.location.replace("/dashboard/");



  });





  //inmotiv calls START

  function DDS_data_call(vin ,postid = "",codes = "BXERSTPCVF"){
          
    console.log(vin+ " " + codes);
   
    var apikey =  $("#inmotiv_apikey").val();

    if(apikey !== ""){
      var apiurl = "http://api.inmotiv.be/rest/lookup/1.6/" + apikey + "/" + vin  + "/" + codes; 

      // var newpost = $(".typeofpage").html();
      var newpost = "notnew";
  
      if(postid == ""){
        var postid = $("#post_ID").val();
      }
     
      console.log(postid);
  
      $.post("https://" + document.domain + "/wp-content/plugins/carsync/php/ajax_data_extern_ophalen.php", {"data_tp": apiurl,"typeofpost":newpost,"vin":vin,"post_id":postid}, function(data) {
    
      var cardata = JSON.parse(data);
      
      console.log(cardata);
      
      if(cardata[0] == "new" || cardata[0] == "notnew"){
          var newid = cardata[1];
         
       window.location.replace("https://" + document.domain + "/dashboard/edit/?id="+newid);
         
  
      }
      else{
         // $(".ddsloadingwrap").hide();
        //  Swal.fire({
        //   icon: 'error',
        //   text: cardata[1]
        // });
  
        toastr.error('Error: Gelieve de geldigheid van het Chassisnr na te kijken.');
        $("#create_car_inmotiv").prop('disabled', false);
        $("#create_car_basic").prop('disabled', false);
        $("#create_car_inmotiv").html("Gegevens ophalen");
      }
  });
    }

  

}



$('#Gegevensophalen').on("click",function(e){ 
  e.preventDefault();

  //$(".ddsloadingwrap").show();
  console.log(this);
  $(this).attr("disabled", true);

  var codes = $(this).attr("data-codes");  

  if($("#Chassisnr").val().length == 17){
      var vin = $("#Chassisnr").val();
      console.log(vin);
     DDS_data_call(vin,"", codes);

  //   $(this).removeAttr('disabled');

      
     
  }
  else{
    $(this).removeAttr('disabled');
    //  $(".ddsloadingwrap").hide();
      
      alert("Chassisnummer is incorrect");
      $("#Chassisnr").prop('disabled','false');

      // Swal.fire({
      //     icon: 'error',
      //     text: 'Chassisnummer is incorrect'
      //   });
  }

  
});


$("#cardatashow").on("click",function(e){
  e.preventDefault();
 // $(".ddsloadingwrap").show();
  var postid = $("#post_ID").val();
 
  var url = "https://" + document.domain + "/wp-content/plugins/carsync/php/pdf_gen/cardata.php?pid="+postid;
  window.open(url, '_blank').focus();

  //$(".ddsloadingwrap").hide();

});

$("#cardatacsv").on("click",function(e){
  e.preventDefault();
 // $(".ddsloadingwrap").show();
  var postid = $("#post_ID").val();
 
  var url = "https://" + document.domain + "/wp-content/plugins/carsync/php/pdf_gen/cardata_csv.php?pid="+postid;
  window.open(url, '_blank').focus();
  //$(".ddsloadingwrap").hide();
  
});
  //inmotiv calls END

//aankoopborderel en bestelbon

$("#ab_aanmaken").on("click",function(e){
  e.preventDefault();     

  

  var postid = $("#post_ID").val();

  var fields = {};

  $(".aankoopborderel_popup input").each(function(x,s){
      var name = $(s).attr("name");
      fields[name] = $(s).val();

  });

  $(".aankoopborderel_popup input[type=checkbox]").each(function(x,s){
      var name = $(s).attr("name");
      
      if($(this).is(":checked")){
          fields[name] = "yes";
      }
      else{
          fields[name] = "no";
      }

  });
  fields["pid"] = postid;

  var url = "https://" + document.domain + "/wp-content/plugins/carsync/php/pdf_gen/mPDF_aankoop.php?"+ $.param(fields);
  window.open(url, '_blank').focus();

  $(this).closest(".aankoopborderel_popup_wrap").fadeOut();

});

$("#bb_aanmaken").on("click",function(e){
  e.preventDefault();     

  

  var postid = $("#post_ID").val();

  var fields = {};

  $(".bestelbon_popup input").each(function(x,s){
      var name = $(s).attr("name");
      fields[name] = $(s).val();

  });

  $(".bestelbon_popup input[type=checkbox]").each(function(x,s){
      var name = $(s).attr("name");
      
      if($(this).is(":checked")){
          fields[name] = "yes";
      }
      else{
          fields[name] = "no";
      }

  });
  fields["pid"] = postid;

  var url = "https://" + document.domain + "/wp-content/plugins/carsync/php/pdf_gen/bestelbon.php?"+ $.param(fields);
  window.open(url, '_blank').focus();

  $(this).closest(".aankoopborderel_popup_wrap").fadeOut();

});

$("#ab_aanmaken").on("click",function(e){
  e.preventDefault();     

  

  var postid = $("#post_ID").val();

  var fields = {};

  $(".aankoopborderel_popup input").each(function(x,s){
      var name = $(s).attr("name");
      fields[name] = $(s).val();

  });

  $(".aankoopborderel_popup input[type=checkbox]").each(function(x,s){
      var name = $(s).attr("name");
      
      if($(this).is(":checked")){
          fields[name] = "yes";
      }
      else{
          fields[name] = "no";
      }

  });
  fields["pid"] = postid;

  var url = "https://" + document.domain + "/wp-content/plugins/carsync/php/pdf_gen/mPDF_aankoop.php?"+ $.param(fields);
  window.open(url, '_blank').focus();

  $(this).parents(".dds_pop_close").trigger("click");

});
$("#bb_aanmaken").on("click",function(e){
  e.preventDefault();     

  

  var postid = $("#post_ID").val();

  var fields = {};

  $(".bestelbon_popup input").each(function(x,s){
      var name = $(s).attr("name");
      fields[name] = $(s).val();

  });

  $(".bestelbon_popup input[type=checkbox]").each(function(x,s){
      var name = $(s).attr("name");
      
      if($(this).is(":checked")){
          fields[name] = "yes";
      }
      else{
          fields[name] = "no";
      }

  });
  fields["pid"] = postid;

  var url = "https://" + document.domain + "/wp-content/plugins/carsync/php/pdf_gen/bestelbon.php?"+ $.param(fields);
  window.open(url, '_blank').focus();

  $(this).parents(".dds_pop_close").trigger("click");

});



$("#Offerteaanmaken").on("click",function(){

  $(this).attr("disabled", true);

  var postid = $("#post_ID").val();

  $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
  {
    offerte_aanmaken: postid
  },
  function(data){
    data = data.trim();
    if(data == "offerte"){
      toastr.success('Offerte aangemaakt');
      
      var siteurl =  "/wp-content/plugins/carsync/php/zapier/zapier_delay.php" + "?postid="+postid;
      
      window.open(siteurl, '_blank').focus();
      location.reload();
    }
    else{
      toastr.error("Er liep iets mis, neem contact op met info@digiflow.be");
      $(this).attr("disabled", false);
    }
    
  });

});


$("#offerteopenen").on("click",function(e){
  e.preventDefault();

  var postid = $(this).attr("data-post-id");
  var siteurl = $(this).attr("data-site-url") + "/wp-content/plugins/carsync/php/zapier/zapier_delay.php" + "?postid="+postid;
  window.open(siteurl, '_blank');

});



  $( "#dds-grid" ).on( "click",".archive_action",function(){

        var id = $(this).attr("data-post-id");
        var post = $(this);

        console.log(post);
        $(this).find("img").attr("src","/wp-content/plugins/carsync/assets/img/unarchive-svgrepo-com.svg");
      
        $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
        {
          archivepost: id
        },
        function(data, status){
          window.setTimeout(function(){
            $(post).parents(".card").fadeOut();
            toastr.info('Gearchiveerd');
             }, 700);
        });

});
$( "#dds-grid" ).on( "click",".unarchive_action",function(){

  var id = $(this).attr("data-post-id");
  var post = $(this);
  console.log(post);
  $(this).find("img").attr("src","/wp-content/plugins/carsync/assets/img/archive-svgrepo-com.svg");

  $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
  {
    unarchivepost: id
  },
  function(data, status){
    window.setTimeout(function(){
      $(post).parents(".card").fadeOut();
      toastr.success('Gepubliceerd');
       }, 700);

  });

});
$(".archive_action_edit").on( "click",function(){

  var id = $(this).attr("data-post-id");
  var post = $(this);
  $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
  {
    archivepost: id
  },
  function(data, status){
    location.reload();
  });

});
$(".unarchive_action_edit").on( "click",function(){

  var id = $(this).attr("data-post-id");
  var post = $(this);
  $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
  {
    unarchivepost: id
  },
  function(data, status){
    location.reload();
  
  });

});
$(".uitgelicht_toggle_edit" ).on( "click", function( event ) {

  var uitgelicht = $(this);

  $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
  {
    push: "uitlichten",
    carid: $(this).attr("data-car-id")
  },
  function(data){
    console.log(data);
    data = data.trim();
    if(data == "toegevoegd"){
      $(".uitlichten").addClass("uitgelichtelink");
      $(uitgelicht).find("i").removeClass();
      $(uitgelicht).find("i").addClass("fa fa-star");
    }

    if(data == "verwijderd"){
      $(".uitlichten").removeClass("uitgelichtelink");
      $(uitgelicht).find("i").removeClass();
      $(uitgelicht).find("i").addClass("fa fa-star-o");

    }
  });
});


$("#create_car_basic").on("click",function(){

  
  var vin = $("#new_chassisnr").val();

  if(vin == ""){
    vin = "00000000000000000";
  }

  $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
  {
    create_car_basic: vin
  },
  function(data, status){

   data = jQuery.trim(data);
    window.location.href = "/dashboard/edit/?id="+data;
  
  });

});

$("#create_car_inmotiv").on("click",function(){



console.log("hit");
  
  var vin = $("#new_chassisnr").val();

  if(vin == ""){
    toastr.clear()
    toastr.error('Chassisnr is verplicht bij het ophalen van de gegevens');
  }
  else{
 
    if(vin.length == 17){


      $(this).html("<img width='40' height='40' style='width:40px;height:40px;' src='/wp-content/plugins/carsync/assets/img/loading.gif' />");
      $(this).prop('disabled', true);
      $("#create_car_basic").prop('disabled', true);

    $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
    {
      create_car_inmotiv: vin
    },
    function(data, status){
  
     newid = jQuery.trim(data);
     DDS_data_call(vin,newid);
    
    });

    }else{
      toastr.clear()
    toastr.error('Error: Gelieve het formaat van het Chassisnr na te kijken.');
    

    }

  }

  

});




$(".option_wrap input").on("click",function(element){

  var postid = $("#post_ID").val();
  var carcomfort = [];
  var carveiligheid = [];
  var carextra = [];
  var carmedia = [];

  $(".option_wrap input").each(function(index,element){


    if($(element).attr("name") == "carveiligheid"){
      if($(element).is(":checked")){
        carveiligheid.push($(element).val());
      }
    }
    if($(element).attr("name") == "carenter_media"){
      if($(element).is(":checked")){
        carmedia.push($(element).val());
      }
    }
    if($(element).attr("name") == "carextra"){
      if($(element).is(":checked")){
        carextra.push($(element).val());
      }
    }
    if($(element).attr("name") == "carcomfort"){
      if($(element).is(":checked")){
        carcomfort.push($(element).val());
      }
    }

  
 
  });
    
  $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
  {
    car_opties_updaten: postid,
    carcomfort: carcomfort,
    carmedia:carmedia,
    carextra:carextra,
    carveiligheid,carveiligheid

  },
  function(data){
    console.log(data);
  });

});

function checkGUID() {
  var carpassValue = $("#Carpass").val();
  var guidPattern = /[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}/i;
  var urlPattern = /^https?:\/\/[\w\-]+(\.[\w\-]+)+[/#?]?.*$/;
  var isGUID = guidPattern.test(carpassValue);
  var isURL = urlPattern.test(carpassValue);
  var isValidInput = isGUID || isURL;
  $("#downloadPDF").prop("disabled", !isValidInput);
  if (isGUID) {
    var guid = carpassValue.match(guidPattern)[0];
    console.log(guid);
    $("#downloadPDF").off("click").on("click", function() {
      var url = "https://professionals.car-pass.be/request-vehicle-history/rendered-document/" + guid;
      window.open(url, "_blank");
    });
  } else {
    $("#downloadPDF").off("click");
  }
}




// check on page load
checkGUID();
// check on change, keydown, and input events
$("#Carpass").on("change keydown input", checkGUID);





  });



  })(jQuery);    
  
  
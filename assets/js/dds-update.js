(function($) {

    $(document).ready(function(){

var post_id = $("#post_ID").val();

function dds_update_fields(id,value,meta){



        $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
        {
          dds_update_fields: true,
          dds_update_fields_id:id,
          dds_update_fields_value: value,
          dds_update_fields_meta:meta
        },
        function(data){
          console.log(data);
          
        });


}
function dds_update_merk_model(id,merk = "",model = ""){



  $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
  {
    dds_update_fields_merk_model: true,
    dds_update_fields_merk:merk,
    dds_update_fields_model: model,
    dds_update_fields_id:id
  },
  function(data){
    console.log(data);
    
  });


}





        //inputs
$(".edit_input_wrapper input[type=text],.edit_input_wrapper input[type=date],.edit_input_wrapper input[type=number]").on("change",function(){
    var value =  $(this).val();
    var meta = $(this).attr("data-meta");
    //console.log(meta+value);
    dds_update_fields(post_id,value,meta);
});

$(".car-merk").on("change",function(){


  var value =  $(this).val();

  console.log("merk: "+value);
  dds_update_merk_model(post_id,value);



});

$(".car-model").on("change",function(){


  var model =  $(this).val();
  var merk = $(".car-merk").val();
  console.log("merk: "+merk);
  console.log("model: "+model);
  dds_update_merk_model(post_id,merk,model);



});


$("#Beschrijving").on("tbwblur",function(){
    var value =  $(this).val();
    var meta = $(this).attr("data-meta");
    console.log(meta+value);
    dds_update_fields(post_id,value,meta);
});


$(".edit_input_wrapper .edit-select").on("change",function(){
    var value =  $(this).val();
    var meta = $(this).attr("data-meta");
    console.log(meta);
    if(meta !== undefined){
      console.log(meta+value);
      dds_update_fields(post_id,value,meta);
    }
});


//dash verkoopstatus update

$( "#dds-grid" ).on( "change",".edit_input_wrapper_dash .Verkoopstatus",function(){
  var value =  $(this).val();
  var meta = $(this).attr("data-meta");
  var id = $(this).attr("data-post-id");
  dds_update_fields(id,value,meta);
  toastr.success($(this).parents(".card-body").find(".card-title").text()+': Geupdate');
});

$( "#dds-grid" ).on( "change",".edit_input_wrapper_dash .Poststatus",function(){
  var value =  $(this).val();
  var meta = $(this).attr("data-meta");
  var id = $(this).attr("data-post-id");
  dds_update_fields(id,value,meta);
  if(value == "concept"){
    toastr.info($(this).parents(".card-body").find(".card-title").text()+': Concept');
    $(this).parents(".card-body").find(".card-concept").show();
  }
  else{
    $(this).parents(".card-body").find(".card-concept").hide();
  }
 
});

  });
  
  })(jQuery);    
  
  
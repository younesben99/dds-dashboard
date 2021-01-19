(function($) {

    $(document).ready(function(){
    
  
      $.post("https://cmpluginzone.local/wp-content/plugins/dds-dashboard/templates/dashboard-card-aanmaken.php",
      {
        archive: "allcars"
      },
      function(data, status){
        $("#dds-grid").html(data);
      });
  
      $(".showallcars").on("click",function(){
        $(".menuitemwrap div").removeClass("ds-selected");
        $(this).addClass("ds-selected");
        $.post("https://cmpluginzone.local/wp-content/plugins/dds-dashboard/templates/dashboard-card-aanmaken.php",
      {
        archive: "allcars"
      },
      function(data, status){
        $("#dds-grid").html(data);
      });
  
      });
      $(".merkitem").on("click",function(){

        $(".menuitemwrap div").removeClass("ds-selected");
        $(this).addClass("ds-selected");
        $.post("https://cmpluginzone.local/wp-content/plugins/dds-dashboard/templates/dashboard-card-aanmaken.php",
      {
        archive: "merkpush",
        merk: $(this).attr("data-slug"),
        termid: $(this).attr("data-id")
      },
      function(data, status){
        
        $("#dds-grid").html(data);
        console.log(data);
      });
      });
    
});

})(jQuery);    
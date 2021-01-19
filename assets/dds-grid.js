(function($) {

    $(document).ready(function(){
    
  
      $.post("https://cmpluginzone.local/wp-content/plugins/dds-dashboard/templates/dashboard-card-aanmaken.php",
      {
        push: "allcars"
      },
      function(data, status){
        $("#dds-grid").html(data);
      });
  
      $(".showallcars").on("click",function(){
        $(".menuitemwrap div").removeClass("ds-selected");
        $(this).addClass("ds-selected");
        $.post("https://cmpluginzone.local/wp-content/plugins/dds-dashboard/templates/dashboard-card-aanmaken.php",
      {
        push: "allcars"
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
        push: "merkpush",
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
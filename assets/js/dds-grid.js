(function($) {

    $(document).ready(function(){
    
  
      $.post("https://cmpluginzone.local/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
      {
        push: "allcars"
      },
      function(data, status){
        $("#dds-grid").html(data);
        
      });
  
      $(".showallcars").on("click",function(){
        $(".menuitemwrap div").removeClass("ds-selected");
        $(this).addClass("ds-selected");
        $.post("https://cmpluginzone.local/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
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
        $.post("https://cmpluginzone.local/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
      {
        push: "merkpush",
        merk: $(this).attr("data-slug"),
        termid: $(this).attr("data-id")
      },
      function(data, status){
        
        $("#dds-grid").html(data);
        
      });
      });


      $("#loguit").on("click",function(){
        $.post("https://cmpluginzone.local/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
        {
          logout: "true"
        },
        function(data, status){
          console.log("test");
          location.reload();
        });
      });
    
});

})(jQuery);    
(function($) {

    $(document).ready(function(){

      $(".innercontent").on("click",function(){
        if ($('.navwrapper').is(":visible") && $(window).width() < 700) {
          anime({
            targets: '.navwrapper',
            translateX: ["0%", "-110%"],
            duration: 700,
            easing: 'easeInOutQuart',
            opacity:1
          });
          $('.navwrapper').fadeOut();
        }
      });
      $(".topnavtoggle img").on("click",function(){
        
    if ($('.navwrapper').is(":visible") ) {
     
      anime({
        targets: '.navwrapper',
        translateX: ["0%", "-110%"],
        duration: 700,
        easing: 'easeInOutQuart',
        opacity:1
      });
      $('.navwrapper').fadeOut();
      
      
    } else {
      $('.navwrapper').show();
      anime({
        targets: '.navwrapper',
        translateX: ["-110%", "0%"],
        duration: 700,
        easing: 'easeInOutQuart',
        opacity:1
      });
      
    }
      });

      $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
      {
        push: "allcars"
      },
      function(data, status){
        $("#dds-grid").html(data);
      });
  
      $(".showallcars").on("click",function(){
        $(".menuitemwrap div").removeClass("ds-selected");
        $(this).addClass("ds-selected");
        $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
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
        $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
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
        $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
        {
          logout: "true"
        },
        function(data, status){
          window.location.href = "/login.php";
        });
      });
      
      $( "#dds-grid" ).on( "change", "#dash-status", function( event ) {
        event.preventDefault();
        console.log( $( this ).val() );
        var opt = $( this ).val();
        if(opt == "archief"){
          $(this).prev(".dash-status-dot").find("span").removeClass();
          $(this).prev(".dash-status-dot").find("span").addClass("archief");  

          $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
          {
            dashstatus: "archief",
            postid: $(this).find("option").attr("data-post-id")
          },
          function(data,status){
            console.log(data + status);
            toastr.success('Wagen succesvol geupdate');
          });
        }
        if(opt == "nglive"){
          $(this).prev(".dash-status-dot").find("span").removeClass();
          $(this).prev(".dash-status-dot").find("span").addClass("nglive");
          $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
          {
            dashstatus: "nglive",
            postid: $(this).find("option").attr("data-post-id")
          },
          function(data,status){
            console.log(data + status);
            toastr.success('Wagen succesvol geupdate');
          });
        }
        if(opt == "live"){
          $(this).prev(".dash-status-dot").find("span").removeClass();
          $(this).prev(".dash-status-dot").find("span").addClass("live");
          $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
          {
            dashstatus: "live",
            postid: $(this).find("option").attr("data-post-id")
          },
          function(data,status){
            console.log(data + status);
            toastr.success('Wagen succesvol geupdate');
          });
        }
        if(opt == "concept"){
          $(this).prev(".dash-status-dot").find("span").removeClass();
          $(this).prev(".dash-status-dot").find("span").addClass("concept");
          console.log($(this).find("option").attr("data-post-id"));
          $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
          {
            dashstatus: "concept",
            postid: $(this).find("option").attr("data-post-id")
          },
          function(data,status){
            console.log(data + status);
            toastr.success('Wagen succesvol geupdate');
          });
        }
    });


    $( "#dds-grid" ).on( "change", "#dash-post-status", function( event ) {
      event.preventDefault();
      console.log( $( this ).val() );
      var opt = $( this ).val();
      if(opt == "tekoop"){
        $(this).prev(".dash-post-status-dot").find("span").removeClass();
        $(this).prev(".dash-post-status-dot").find("span").addClass("tekoop");  

        $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
        {
          dashpoststatus: "tekoop",
          postid: $(this).find("option").attr("data-post-id")
        },
        function(data,status){
          console.log(data + status);
          toastr.success('Wagen succesvol geupdate');
        });


      }
      if(opt == "gereserveerd"){
        $(this).prev(".dash-post-status-dot").find("span").removeClass();
        $(this).prev(".dash-post-status-dot").find("span").addClass("gereserveerd");
        $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
        {
          dashpoststatus: "gereserveerd",
          postid: $(this).find("option").attr("data-post-id")
        },
        function(data,status){
          console.log(data + status);
          toastr.success('Wagen succesvol geupdate');
        });
      }
      if(opt == "verkocht"){
        $(this).prev(".dash-post-status-dot").find("span").removeClass();
        $(this).prev(".dash-post-status-dot").find("span").addClass("verkocht");
        $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
        {
          dashpoststatus: "verkocht",
          postid: $(this).find("option").attr("data-post-id")
        },
        function(data,status){
          console.log(data + status);
          toastr.success('Wagen succesvol geupdate');
        });
      }
  });

  $( "#dds-grid" ).on( "click", ".uitgelicht_toggle", function( event ) {

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
       
        $(uitgelicht).find("i").removeClass();
        $(uitgelicht).find("i").addClass("fa fa-star");
        toastr.success('Wagen uitgelicht');
      }

      if(data == "verwijderd"){
        
        $(uitgelicht).find("i").removeClass();
        $(uitgelicht).find("i").addClass("fa fa-star-o");
        toastr.warning('Wagen niet meer uitgelicht');

      }
    });
  });
  
    
});

})(jQuery);    
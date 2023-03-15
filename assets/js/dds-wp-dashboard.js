(function($) {

  $(document).ready(function(){


    $(".pop_close").on("click",function(e){
      e.preventDefault();

      $(this).closest(".dds_popup_wrap").fadeOut();

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
        if(data == "toegevoegd"){
          
          $(".uitlichten").addClass("uitgelichtelink");
        }

        if(data == "verwijderd"){
          
          $(".uitlichten").removeClass("uitgelichtelink");

        }
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
      $(".wrap").on("click",function(){
          if ($('.navwrapper').is(":visible") && $(window).width() < 1250) {
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


});

})(jQuery);    


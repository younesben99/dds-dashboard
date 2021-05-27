(function($) {

    $(document).ready(function(){
      
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
          $(".topnavtoggle").on("click",function(){
            
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
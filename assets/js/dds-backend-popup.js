jQuery( document ).ready(function() {

    var popup = "";
    jQuery(".pop_open").on("click",function(e){
    e.preventDefault();
    popup = "." + jQuery(this).attr("data-popup");
 
    jQuery(popup).parents(".dds_pop_background").fadeIn();
    jQuery(".trumbowyg-button-pane").hide();
    jQuery(popup).show();
    
    if ($(window).width() < 770) {
        jQuery(popup).animate({
            'opacity': '1',
            'top': '3%',
            'left:': '50%'
}, 300);
     }
     else {
        jQuery(popup).animate({
            'opacity': '1',
            'top': '7%',
            'left:': '50%'
}, 300);
     }
});

jQuery(".dds_pop_close,.pop_close,.dds_dialog_pop_close,.dds_pop_background").on('click', function (e) {
    e.preventDefault();
    jQuery(".trumbowyg-button-pane").show();
    jQuery(popup).parents(".dds_pop_background").fadeOut();
    jQuery(popup).animate({
        'opacity': '0',
        'top': '100%',
        'left:': '50%'
    }, 300);
    setTimeout(function () {
        jQuery(popup).hide();
      
    }, 300);
}).on('click', 'div', function (e) {
    e.stopPropagation();
});


});
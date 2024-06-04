Dropzone.autoDiscover = false;
jQuery(document).ready(function($){





    var siteurl = $("#dds_siteurl").val();
    var postid = $("#post_ID").val();

    
    
    
     

    $('.fotos_drag').sortable({
      
    
        handle: '.dz-preview',
        filter: ".dz-remove",
        delay: 100,
        delayOnTouchOnly:true,
        sort: true,
        direction: 'horizontal',
        animation: 250, 
        easing: "cubic-bezier(1, 0, 0, 1)",
        onEnd: function (evt) {
            g_ids = [];
            var itemEl = evt.item; 
            $(".fotos_drag .dz-preview").each(function(){
                g_ids.push($(this).attr("data-img-id"));
            });
            

            $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
            {
            dds_dropzone_sort: true,
            dds_update_fields_id:postid,
            dds_update_fields_value: g_ids.join(',')
            },
            function(data){
            console.log(data);
            
            });
        },
        
    })

    var $dropzone_exists = $('div.dropzone_edit');

    if ( $dropzone_exists.length){
      
        var dropzone = new Dropzone("div.dropzone_edit", {
            url: siteurl + "/wp-content/plugins/dds-dashboard/templates/dash-ajax.php",
            acceptedFiles: "image/*",
            maxFiles: 40,
            maxFilesize: 20,
            uploadMultiple: false,
            parallelUploads: 1, 
            createImageThumbnails: true,
            thumbnailWidth: 120,
            thumbnailHeight: 120,
            addRemoveLinks: false,
            timeout: 180000,
            // Language Strings
            dictFileTooBig: "Huidige grootte: ({{filesize}}mb). Maximale bestandsgrootte: {{maxFilesize}}mb",
            dictInvalidFileType: "Ongeldig bestandstype: Upload .jpg of .png",
            dictMaxFilesExceeded: "Maximale aantal bestanden: {{maxFiles}}",
            dictDefaultMessage: "<img src='"+siteurl+"/wp-content/plugins/dds-tools/assets/images/add_img.png' style='width: 70px;opacity: 0.7;'>",
            params: {'dds_edit_dropzone':postid},
            success:function(file, response){
                file.previewElement.parentNode.removeChild(file.previewElement);
    
            console.log(response);
              if (response == "") {
                 
              } else {
                
              }
            }
        });
  
    

    dropzone.on('queuecomplete', function() {
     document.location.reload(true);

    });
}
    $("#btn_upload_foto").on("click",function(e){

        e.preventDefault();

        $(".dropzone_edit").trigger("click");


    });

    $(document).on("click", ".dz-remove-local", function(e) {
        e.preventDefault();
        $(this).html('<img src="/wp-content/plugins/dds-dashboard/assets/img/loading-remove.gif" height="15px" width="15px" />');
        var imgid = $(this).attr("data-img-id");
        var $this = $(this); // Cache the reference to $(this)
      
        $.post("/wp-content/plugins/dds-dashboard/templates/dash-ajax.php", {
          dds_remove_dropzone_img: imgid,
          postid: postid // Make sure postid is defined in the outer scope
        }, function(data) {
          console.log(data);
          
          var preview = $this.parents(".dz-preview");
            preview.fadeOut(function() {
            preview.remove();
            });

        });
      });
      
    
    



});
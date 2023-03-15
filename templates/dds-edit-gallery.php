<?php

function dds_edit_gallery($id){
    ?>

<div class="edit_input_wrapper" style="border-top:1px solid lightgrey; margin-top:25px;padding-top:25px;">
<label for="Afbeeldingen" style="margin-bottom:5px;">Afbeeldingen</label>
<input type="hidden" id="gallery_ids" value="<?php 

$g_ids = get_post_meta($id, 'vdw_gallery_id', true);

echo(json_encode($g_ids));
?>" />
<div class="fotos_drag">
<?php
  $local_images = get_post_meta($id, 'vdw_gallery_id', true);
  if(!empty($local_images)){
    foreach ($local_images as $img) {

  
      $dds_dragzone .= '<div class="dz-preview" data-img-id="'.$img.'">  <div class="dz-image"><img src="';
      $dds_dragzone .= wp_get_attachment_url($img);
      $dds_dragzone .= '"></div><a class="dz-remove dz-remove-local" data-img-id="'.$img.'">✕</a></div>';
     
      }
    
      echo $dds_dragzone;
  }
  
?>
</div>

<div class="fotos_list">
    <?php


    $dds_dropzone .= '<div style="width: 100%;">';
    $dds_dropzone .= '<form action="" method="post"  enctype="multipart/form-data">';
    $dds_dropzone .= '<div class="dropzone dropzone_edit" id="dds_dropzone_edit" data-hide="true">';
    $dds_dropzone .= '</div>';
    $dds_dropzone .= '</form>';
    $dds_dropzone .= '</div>';
    echo $dds_dropzone;

?>
</div>
<button id="btn_upload_foto">+ Upload foto's</button>
</div>
<?php
}


?>
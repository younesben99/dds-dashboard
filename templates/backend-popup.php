<?php


function popup_backend_open($popup_name){
    ?>
    <div class="dds_pop_background">
    <div class="dds_pop_wrap <?php echo $popup_name; ?>">
    <div class="dds_pop_inner">
    <div class="dds_pop_close"><span>&#x2715</span></div>
    <div class="dds_pop_content">
    <?php
    }

function popup_backend_close(){
    
        ?>
        </div>
        </div>
        </div>

</div>
        <?php
    }


    ?>
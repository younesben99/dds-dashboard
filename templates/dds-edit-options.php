<?php

function dds_edit_options($id){

    $opt_comfort = array("Achterbank 1/3 - 2/3", "Airconditioning", "Armsteun", "Automatische klimaatregeling", "Cruise Control", "Electrische ruiten", "Electrische zetelverstelling", "Elektrisch verstelbare buitenspiegels", "Elektrische achterklep", "Getinte ramen", "Hill-Hold Control", "Lederen stuurwiel", "Lendensteun", "Lichtsensor", "Massagestoelen", "Multifunctioneel stuur", "Navigatiesysteem", "Open dak", "Parkeerhulp", "Parkeerhulp achter", "Parkeerhulp voor", "Regensensor", "Start/Stop systeem", "Zetelverwarming");
    $opt_enter_media = array("Bluetooth", "Boordcomputer", "CD", "Digitale radio-ontvangst", "Handsfree", "MP3", "Radio", "Sound system", "USB");
    $opt_extra = array("Aanraakscherm", "Bagagerek", "Lichtmetalen velgen", "Schakelpaddles", "Schuifdeur", "Skiluik", "Sneeuwbanden", "Sportzetels", "Spraakbediening", "Trekhaak");
    $opt_veiligheid = array("ABS", "Achter airbag", "Airbag bestuurder", "Airbag passagier", "Alarm", "Automatische Tractie Controle", "Centrale deurvergrendeling met afstandsbediening", "Centrale vergrendeling", "Dagrijlichten", "Dodehoekdetectie", "Electronic Stability Program", "Hoofd airbag", "Isofix", "LED verlichting", "Mistlampen", "Startonderbreker", "Stuurbekrachtiging", "Xenon Lichten", "Zij-airbags", "Bandenspanningscontrolesysteem");
    
    $value_enter_media = get_post_meta($id, '_car_enter_media_key', true );
    if(empty($value_enter_media)){
        $value_enter_media = array();
    }
    $value_comfort = get_post_meta($id, '_car_comfort_key', true );
    if(empty($value_comfort)){
        $value_comfort = array();
    }
    
    $value_extra = get_post_meta($id, '_car_extra_key', true );
    if(empty($value_extra)){
        $value_extra = array();
    }
    $value_veiligheid = get_post_meta($id, '_car_veiligheid_key', true );
    if(empty($value_veiligheid)){
        $value_veiligheid = array();
    }
  ?>



<ul id="my-accordion" class="accordionjs">

    <!-- Section 1 -->
    <li>
        <div>Comfort en gemak</div>
        <div>
        <div id="comfort_options" class="option_wrap">
        





        <?php foreach ($opt_comfort as $opt) {
           ?>

    
    <label><input type="checkbox" name="carcomfort" value="<?php echo $opt; ?>" <?php foreach($value_comfort as $value){
               if($value == $opt){
                   echo("checked");
               }
           } ?> /> <?php echo $opt; ?></label>

    <?php
         } 
         ?>






        </div>

        </div>
    </li>

    <!-- Section 2 -->
    <li>
        <div>Entertainment en media</div>
        <div>
        <div id="media_options" class="option_wrap">

        <?php foreach ($opt_enter_media as $opt) {
           ?>
    <label><input type="checkbox" name="carenter_media" value="<?php echo $opt; ?>" <?php foreach($value_enter_media as $value){
               if($value == $opt){
                   echo("checked");
               }
           } ?> /> <?php echo $opt; ?></label>

    <?php
         } 
         ?>


    </div>
        </div>
    </li>

    <!-- Section 3 -->
    <li>
        <div>Veiligheid</div>
        <div>
        <div id="veiligheid_options" class="option_wrap">

        <?php foreach ($opt_veiligheid as $opt) {
           ?>
    <label><input type="checkbox" name="carveiligheid" value="<?php echo $opt; ?>" <?php foreach($value_veiligheid as $value){
               if($value == $opt){
                   echo("checked");
               }
           } ?> /> <?php echo $opt; ?></label>

    <?php
         } 
         ?>


    </div>
        </div>
    </li>

    <!-- Section 3 -->
    <li>
        <div>Extra</div>
        <div>
        <div id="extra_options" class="option_wrap">


        <?php foreach ($opt_extra as $opt) {
           ?>
    <label style="font-weight:400;"><input type="checkbox" name="carextra" value="<?php echo $opt; ?>" <?php foreach($value_extra as $value){
               if($value == $opt){
                   echo("checked");
               }
           } ?> /> <?php echo $opt; ?></label>

    <?php
         } 
         ?>
 </div>

        </div>
    </li>
</ul>

<?php

}


?>

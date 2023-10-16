<div class="edit_wrapper_sidebar_group_sticky">
<div class="edit_wrapper_sidebar_group">
<div class="edit_wrapper_sidebar">
<h2 class="edit_wrapper_fields_h2">Administratie</h2>

<div class="action_btn_list">

<?php


$inmotivopgehaald = get_post_meta( $id, 'inmotiv_data_opgehaald', true );

if($inmotivopgehaald !== "YES"){
    ?>

<button id="Gegevensophalen" data-codes="BXERSTPCAVF"><img src="<?php echo(get_site_url()); ?>/wp-content/plugins/carsync/assets/img/pdf-down.svg" width="30" style="padding-right:20px;"> Gegevens ophalen</button>

<?php
}
else{

    ?>

<button id="Toongegevens" class="pop_open" data-popup="Toongegevens"><img src="<?php echo(get_site_url()); ?>/wp-content/plugins/carsync/assets/img/pdf-show.svg" width="30" style="padding-right:20px;"> Gegevens weergeven</button>


<?php
}
?>


<button id="Aankoopborderel" class="pop_open" data-popup="Aankoopborderel"><img src="<?php echo(get_site_url()); ?>/wp-content/plugins/carsync/assets/img/pdf_3.svg" width="30" style="padding-right:20px;"> Aankoopborderel</button>
<button id="Bestelbon" class="pop_open" data-popup="Bestelbon"><img src="<?php echo(get_site_url()); ?>/wp-content/plugins/carsync/assets/img/pdf_3.svg" width="30" style="padding-right:20px;"> Bestelbon</button>







<?php

$offerte_aangemaakt = get_post_meta( $id, '_offerte_aangemaakt', true );
$offerte_url = get_post_meta( $id, '_offerte_url', true );

if(!empty($offerte_url)){
    $offerte_aangemaakt = "YES";
    ?>
<button class="edit_btn offerteopenen" id="offerteopenen" data-site-url="<?php echo(get_site_url()); ?>" data-post-id="<?php echo($id); ?>"><img src="<?php echo(get_site_url()); ?>/wp-content/plugins/carsync/assets/img/pdf-show.svg" width="30" style="padding-right:20px;"  /> Offerte Openen</button>
    <?php

}
else{
    $offerte_aangemaakt = "NO";
    ?>

<button class="edit_btn offerteaanmaken" id="Offerteaanmaken" data-post-id="<?php echo($id); ?>"><img src="<?php echo(get_site_url()); ?>/wp-content/plugins/carsync/assets/img/pdf_3.svg" width="30" style="padding-right:20px;"> Offerte aanmaken</button> 
        <?php
}

?>

<input type="hidden" id="vraag_offerte_aanmaken" name="offerte_aanmaken" value="<?php echo($offerte_aangemaakt); ?>"  />
<input type="hidden" id="offerte_url" name="offerte_url" value="<?php echo($offerte_url); ?>"  />






</div>
</div>

<div class="edit_wrapper_sidebar" style="margin-top: 25px;">
<h2 class="edit_wrapper_fields_h2">Marketing</h2>

<div class="action_btn_list">
<button id="Facebookdelen" class="pop_open" data-popup="Facebookdelen"><img src="<?php echo(get_site_url()); ?>/wp-content/plugins/carsync/assets/img/fb_favi_3.svg" width="30" style="padding-right:20px;"> Delen op facebook</button>
<button id="Instagramdelen" class="pop_open" data-popup="Instagramdelen"><img src="<?php echo(get_site_url()); ?>/wp-content/plugins/carsync/assets/img/ig_favi.svg" width="30" style="padding-right:20px;"> Delen op instagram</button>

</div>
</div>
</div>
</div>
<?php

popup_backend_open("Toongegevens");
$pdficon = get_site_url().'/wp-content/plugins/carsync/assets/img/pdf_3.svg';
$excelicon =  get_site_url().'/wp-content/plugins/carsync/assets/img/pdf-show.svg';
echo "<div class='auto_gegevens_wrap'>";
echo "<button class='show_content_btn' id='cardatashow'><img src='".$pdficon."' width='27' style='padding-right:20px;' />Open PDF</button><button class='show_content_btn' id='cardatacsv'><img src='".$excelicon."' width='27' style='padding-right:20px;' />Download .CSV</button>";
echo "</div>";
popup_backend_close();

popup_backend_open("Aankoopborderel");
?>
<div class="aankoopborderel_popup">
<h3 style="padding: 0;margin-bottom:25px;">Aankoopborderel PDF aanmaken</h3>


     <label>Klant / Firma naam</label>
     <input type="text" id="klantnaam" name="klantnaam" value="<?php echo get_post_meta($id,"klantnaam",true); ?>">
     <label>Klant adres</label>
     <input type="text" id="klantadres" name="klantadres" value="<?php echo get_post_meta($id,"klantadres",true); ?>">
     <label>Klant telefoonnummer</label>
     <input type="text" id="klanttel" name="klanttel" value="<?php echo get_post_meta($id,"klanttel",true); ?>">
  
     <label>Afgesproken prijs</label>
     <input type="text" id="aankoop_boekhoudkundige" name="aankoop_boekhoudkundige" value="<?php echo get_post_meta($id,"aankoop_boekhoudkundige",true); ?>">
     <label>Rekeningnummer</label>
     <input type="text" id="reknr" name="reknr" value="<?php echo get_post_meta($id,"reknr",true); ?>">
     <label>Datum aankoop</label>
     <input type="date" id="aankoopdatum" name="aankoopdatum" pattern="\d{4}-\d{2}-\d{2}" value="<?php echo get_post_meta($id,"aankoopdatum",true); ?>">
 <h4 style="margin-top:15px;">In bezit van</h4>
<?php



$aankoopbd_add_fields = [
    "_car_inschrijvingdocument_key" => get_post_meta($id,"_car_inschrijvingdocument_key",true),
    "_car_gelijkvormigheids_attest_key" => get_post_meta($id,"_car_gelijkvormigheids_attest_key",true),
    "_car_keuringsbewijs_key" => get_post_meta($id,"_car_keuringsbewijs_key",true),
    "_car_onderhoudsboekje_key" => get_post_meta($id,"_car_onderhoudsboekje_key",true),
    "_car_gebruikershandleiding_key" => get_post_meta($id,"_car_gebruikershandleiding_key",true),
    "_car_aankoopfactuur_key" => get_post_meta($id,"_car_aankoopfactuur_key",true),
    "_car_alarm_attest_key" => get_post_meta($id,"_car_alarm_attest_key",true),
    "_car_2_sleutels_key" => get_post_meta($id,"_car_2_sleutels_key",true)
];
$bandendiepte_voor = get_post_meta($id,"_car_bandenstaat_voor_key",true);
$bandendiepte_achter = get_post_meta($id,"_car_bandenstaat_achter_key",true);

foreach($aankoopbd_add_fields as $key => $field){
    $labelformatted = mb_substr($key, 5);
    $labelformatted = mb_substr($labelformatted, 0, -4);
    $labelformatted = ucwords($labelformatted);
    $labelformatted = str_replace("_"," ",$labelformatted);
?>
<div class="ab_cb_group">
    <label for="<?php echo $key; ?>"><?php echo $labelformatted; ?></label>
    <input type="checkbox" id="<?php echo $key; ?>" name="<?php echo $key; ?>" value="<?php echo $field; ?>" <?php
            if($field == "yes"){ echo(" checked"); }        
    ?>>
    </div>


<?php
}




?>
   
<div  style="width: 400px;">
<br>
<label style="width: 183px;
    padding-right: 20px;
    display: inline-block;" for="_car_bandenstaat_voor_key">Voor banden diepte (mm)</label>
<input type="number" id="_car_bandenstaat_voor_key" name="_car_bandenstaat_voor_key" min="0" max="6" style="border-radius: 5px;padding: 5px 15px;border: 1px solid #d4d4d4;width:100px !important;" value="<?php echo $bandendiepte_voor; ?>">

<label style="width: 183px;
    padding-right: 20px;
    display: inline-block;" for="_car_bandenstaat_achter_key">Achter banden diepte (mm)</label>
<input type="number" id="_car_bandenstaat_achter_key" name="_car_bandenstaat_achter_key" min="0" max="6" style="border-radius: 5px;padding: 5px 15px;border: 1px solid #d4d4d4;width:100px !important;" value="<?php echo $bandendiepte_achter; ?>">
</div>

     <button id="ab_aanmaken" class="pdfbtn">Borderel aanmaken</button>
</div>
<?php
popup_backend_close();

popup_backend_open("Bestelbon");
?>

<div class="bestelbon_popup">
<?php
$klantnaam = get_post_meta( $id, 'klantnaam', true );
$klantennummer = get_post_meta( $id, 'klantennummer', true );
$klantadres = get_post_meta( $id, 'klantadres', true );
$klanttel = get_post_meta( $id, 'klanttel', true );
$aangepasteprijs = get_post_meta( $id, 'aangepasteprijs', true );
$btw_percentage = get_post_meta( $id, 'btw_percentage', true );
$bestelbonnummer = get_post_meta( $id, 'bestelbonnummer', true );
$datumbestelbon = get_post_meta( $id, 'datumbestelbon', true );
$datumlevering = get_post_meta( $id, 'datumlevering', true );
$datumvervaldag = get_post_meta( $id, 'datumvervaldag', true );
$bb_opmerkingen = get_post_meta( $id, 'bb_opmerkingen', true );
$bb_voorakkoord = get_post_meta( $id, 'bb_voorakkoord', true );

?>



    <h3 style="padding: 0;margin-bottom:25px;">Bestelbon PDF aanmaken</h3>
 
     <label>Klant / Firma naam</label>
     <input type="text" id="klantnaam" name="klantnaam" value="<?php echo($klantnaam); ?>">
     <label>Klanten Nummer</label>
     <input type="number" name="klantennummer" value="<?php echo($klantennummer) ?>">
     <label>Klant adres</label>
     <input type="text" id="klantadres" name="klantadres" value="<?php echo($klantadres) ?>">
     <label>Klant telefoonnummer</label>
     <input type="number" id="klanttel" name="klanttel" value="<?php echo($klanttel) ?>">

     <label>Prijs (optioneel)</label>
     <input type="number" id="aangepasteprijs" name="aangepasteprijs" value="<?php echo($aangepasteprijs) ?>">
     <!-- <div class="toonhiddenfields">Toon meer</div>
     <div class="hidefields">
     <label>BTW Percentage</label>
     <input  type="number" name="btw_percentage" value="0" value="<?php //echo($btw_percentage) ?>">
     </div>  -->
     <label>Bestelbon Nummer</label>
     <input type="text" name="bestelbonnummer" value="<?php echo($bestelbonnummer) ?>">
     <label>Datum Bestelbon</label>
     <input type="date" name="datumbestelbon" pattern="\d{4}-\d{2}-\d{2}" value="<?php echo($datumbestelbon) ?>">
     <label>Datum Levering/Dienstprestatie</label>
     <input type="date" name="datumlevering" pattern="\d{4}-\d{2}-\d{2}" value="<?php echo($datumlevering) ?>"> 
     <label>Datum Vervaldag</label>
     <input type="date" name="datumvervaldag" pattern="\d{4}-\d{2}-\d{2}" value="<?php echo($datumvervaldag) ?>">
     <label>Opmerking</label>
     <input type="text" name="bb_opmerkingen" value="<?php echo($bb_opmerkingen) ?>">
     <label>Voor akkoord</label>
     <input type="text" name="bb_voorakkoord" value="<?php echo($bb_voorakkoord) ?>">
     <button id="bb_aanmaken" class="pdfbtn">Bestelbon aanmaken</button>
</div>
<?php
popup_backend_close();

popup_backend_open("Offerteaanmaken");
echo("<h2>Offerteaanmaken</h2>");
popup_backend_close();

popup_backend_open("Facebookdelen");
echo("<h2>Facebook delen</h2>");
popup_backend_close();

popup_backend_open("Instagramdelen");
echo("<h2>Instagram delen</h2>");
popup_backend_close();

?>
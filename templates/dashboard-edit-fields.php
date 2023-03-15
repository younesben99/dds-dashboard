<?php 


$meta = get_post_meta($id); 
$terms = get_the_terms($id, "merkenmodel");


$opties_brandstof = ['Benzine',
        'Diesel',
        'Ethanol',
        'Elektrisch',
        'Waterstof',
        'LPG',
        'CNG',
        'Elektrisch/Benzine',
        'Elektrisch/Diesel',
        'Benzine 2 T',
        'Andere'];

$opties_transmissie = ['Manueel',
        'Automatisch',
        'Halfautomaat'];

$opties_kleurinterieur = ['Zwart',
        'Wit',
        'Grijs',
        'Zilver',
        'Beige',
        'Rood',
        'Bruin',
        'Geel',
        'Groen',
        'Paars',
        'Oranje',
        'Blauw',
        'Brons',
    'Andere'];

$carrosserie_opties = ['Stadswagen',
'Cabriolet',
'Coupé',
'SUV/4x4/Pick-up',
'Break',
'Berline',
'Monovolume',
'Bestelwagen',
'Camper',
'Andere',
'Supersport',
'Sport touring',
'Chopper/Cruiser',
'Touring',
'Streetfighter',
'Enduro',
'Motocross',
'Sidecar',
'Oldtimer',
'Trike',
'Scooter',
'Bromfiets',
'Super Moto',
'Minibike',
'Naked Bike',
'Quad',
'Rally',
'Trials Bike',
'Racing',
'Tourer',
'Alkhoof',
'Integraal',
'Gesloten bestelwagen',
'Cabine',
'Afzetunits',
'Caravan overige',
'Caravans',
'Roll-off-kiepwagen',
'Takelwagen',
'Kiepwagen',
'Vrachtwagen met kraan',
'Autotransporter',
'Driezijdige kiepwagen',
'Chassis',
'Verkeerswerkzaamheden',
'Koel/geisoleerde',
'Geldtransport',
'Drankenopbouw',
'Glastransport',
'Hydraulisch werkplatform',
'Verhoogde bestelwagen',
'Kipper',
'Gesloten opbouw',
'Combi/Van',
'Veetransport',
'Open Laadbak',
'Dekzeil',
'Koeltransport',
'Aanhangwagen (auto)',
'Motoraanhanger',
'Boottrailer',
'Platform',
'Laadbak open',
'Verkoopaanhanger'];

$opties_kleurinterieur = ['Zwart',
        'Wit',
        'Grijs',
        'Zilver',
        'Beige',
        'Rood',
        'Bruin',
        'Geel',
        'Groen',
        'Paars',
        'Oranje',
        'Blauw',
        'Brons',
    'Andere'];

$opties_kleurexterieur = ['Zwart',
        'Wit',
        'Grijs',
        'Zilver',
        'Beige',
        'Bruin',
        'Geel',
        'Groen',
        'Paars',
        'Rood',
        'Oranje',
        'Blauw',
        'Brons',
    'Andere'];

$opties_emissieklasse = ['Euro 1',
        'Euro 2',
        'Euro 3',
        'Euro 4',
        'Euro 5',
        'Euro 6',
        'Euro 6b',
        'Euro 6c',
        'Euro 6d',
        'Euro 6dTemp'];

$opties_staat = ['Tweedehands','Nieuw'];
$opties_btw = ['Ja','Nee','NVT'];




$dds_settings_options = get_option( 'dds_settings_option_name' ); 
$inmotiv_key = $dds_settings_options['inmotiv_key']; 
$bb_checked = $dds_settings_options['bb_checked']; 
$ab_checked = $dds_settings_options['ab_checked']; 
$facebook_key = $dds_settings_options['zapier_facebook_key_2']; 
$instagram_key = $dds_settings_options['zapier_instagram_key_3']; 
?>


<div class="edit_wrapper_fields">

<h2 class="edit_wrapper_fields_h2">Bewerken</h2>

<input type="hidden" id="dds_siteurl" value="<?php echo(get_site_url()); ?>"/>
<input type="hidden" id="inmotiv_apikey" value="<? echo $inmotiv_key; ?>"/>
<input type="hidden" id="facebook_apikey" value="<? echo $facebook_key; ?>"/>
<input type="hidden" id="instagram_apikey" value="<? echo $instagram_key; ?>"/>
<input type="hidden" id="billit_apikey" value="<? echo $billit_key; ?>"/>
<input type="hidden" id="bb_checked" value="<? echo $bb_checked; ?>"/>
<input type="hidden" id="ab_checked" value="<? echo $ab_checked; ?>"/>

<input type="hidden" id="post_ID" value="<?php echo($id) ?>"/>
<input type="hidden" id="post_title" value="<?php echo get_the_title($id); ?>"/>
<input type="hidden" id="inmotiv_data_opgehaald" value="<?php echo($meta["inmotiv_data_opgehaald"][0]); ?>"/>

<div class="edit_input_wrapper" style="display:none;">
<label for="Wagenstatus">Synced met autoscout</label>
<input id="Wagenstatus" data-meta="_car_sync_key" type="text" value="<?php echo($meta["_car_sync_key"][0]); ?>">
</div>


<div class="edit_input_wrapper" style="display:none;">
<label for="Verkoopstatus">Verkoopstatus</label>
<input id="Verkoopstatus" data-meta="_car_status_key" type="text" value="<?php echo($meta["_car_status_key"][0]); ?>">
</div>


<div class="edit_input_wrapper" style="display:none;">
<label for="Poststatus">Poststatus</label>
<input id="Poststatus" data-meta="_car_post_status_key" type="text" value="<?php echo($meta["_car_post_status_key"][0]); ?>">
</div>




<!-- merk model -->
    <?php
     //data ophalen en in klaarmaken voor parsing
        $allemerken = get_terms( array(
            'taxonomy' => 'merkenmodel',
            'hide_empty' => false,
            'parent' => 0
        ) );
        $term_list_merk = wp_get_post_terms( $id, 'merkenmodel', array( 'fields' => 'names','parent' => 0 ));
        $term_list_merk_ids = wp_get_post_terms( $id, 'merkenmodel', array( 'fields' => 'ids','parent' => 0 ));	
        $merkophalen;
        $modelophalen;
        foreach($term_list_merk_ids as $term_id){
            $termid=$term_id;
        }	
        $term_list_model = wp_get_post_terms( $id, 'merkenmodel', array( 'fields' => 'names','parent' => $termid ));
        
        foreach($term_list_merk as $term){
            $merkophalen = $term;
            
        }
        
        foreach($term_list_model as $term){
            $modelophalen = $term;
            
        }
        
        $value_merk = $merkophalen;
        $value_model = $modelophalen;
        $value_merkcf = get_post_meta( $id, '_car_merkcf_key', true );
        $value_modelcf = get_post_meta( $id, '_car_modelcf_key', true );
    
        $merken = merken_ophalen();
        $modellen = modellen_ophalen();
        
        $merken = json_decode($merken,true);
        $modellen = json_decode($modellen,true);

        //merk en model klaarmaken voor jquery 
    ?>




<div class="edit_input_wrapper">
    <div style="display:none" id="merkcfid"><?php echo $value_merk; ?></div>
    <div style="display:none" id="modelcfid"><?php echo $value_model; ?></div>
    <label>Merk</label>
    <select class="car-merk"  name='carmerk-input'>
    <option selected disabled>Selecteer Merk</option>
    
    <?php
    foreach($merken as $merk){
    echo("<option value='".$merk["merk"]."' data-merkid='".$merk["merkid"]."'>".$merk["merk"]."</option>");
    }
    ?>
    </select>
</div>




<div class="edit_input_wrapper">

    <label>Model</label>
    <select class="car-model" name='carmodel-input'>
    

    <option selected class="selecteermodel">Selecteer Model</option>
  
    <?php
    foreach($modellen as $model){
    if($model["model"] !== "model"){
        echo("<option class='modeloption' value='".$model["model"]."' data-merkid='".$model["merkid"]."' data-modelid='".$model["modelid"]."'>".$model["model"]."</option>");

    }
    }
    ?>
    </select>
</div>






<!-- end merk model -->

<div class="edit_input_wrapper">
<label for="Wagentitel">Wagentitel</label>
<input id="Wagentitel" type="text" data-meta="_car_wagentitel_key" value="<?php echo($meta["_car_wagentitel_key"][0]); ?>">
</div>

<div class="edit_input_wrapper">
<label for="Badge">Badge</label>
<input id="Badge" type="text" data-meta="_car_badge_key" value="<?php echo($meta["_car_badge_key"][0]); ?>">
</div>

<div class="edit_input_wrapper">
<label for="Eersteinschrijving">Eerste inschrijving</label>
<input id="Eersteinschrijving" data-meta="_car_eersteinschrijving_key" type="date" min="1900-01-01" max="2030-12-31" value="<?php

$eersteinsch = $meta["_car_eersteinschrijving_key"][0];
$eersteinsch = str_replace("/","-",$eersteinsch);
$eersteinsch = date("Y-m-d", strtotime($eersteinsch));
echo($eersteinsch); ?>">
</div>


<div class="edit_input_wrapper">
<label for="Carrosserievorm">Carrosserievorm</label>
<select class="edit-select" name="Carrosserievorm" data-meta="_car_carrosserievorm_key" id="Carrosserievorm">
<option selected disabled>Selecteer Optie</option>
<?php

foreach ($carrosserie_opties as $optie) {
    ?>

    <option value="<?php echo($optie); ?>" <?php
    
    if($optie == $meta["_car_carrosserievorm_key"][0]){
        echo(" selected");
    }

    ?>><?php echo($optie); ?></option>

<?php
}

?>

</select>
</div>


<div class="edit_input_wrapper">
<label for="Zitplaatsen">Zitplaatsen</label>
<input id="Zitplaatsen" type="number" data-meta="_car_zitplaatsen_key" value="<?php echo($meta["_car_zitplaatsen_key"][0]); ?>">
</div>

<div class="edit_input_wrapper">
<label for="Brandstof">Brandstof</label>

<select  class="edit-select" name="Brandstof" data-meta="_car_brandstof_key" id="Brandstof">
<option selected disabled>Selecteer Optie</option>
<?php

foreach ($opties_brandstof as $optie) {
    ?>

    <option value="<?php echo($optie); ?>" <?php
    
    if($optie == $meta["_car_brandstof_key"][0]){
        echo(" selected");
    }

    ?>><?php echo($optie); ?></option>

<?php
}

?>

</select>
</div>

<div class="edit_input_wrapper">
<label for="Aantaldeuren">Aantal deuren</label>
<input id="Aantaldeuren" type="number" data-meta="_car_aantaldeuren_key" value="<?php echo($meta["_car_aantaldeuren_key"][0]); ?>">
</div>

<div class="edit_input_wrapper">
<label for="Staat">Staat</label>

<select  class="edit-select" name="Staat" data-meta="_car_staat_key" id="Staat">
<option selected disabled>Selecteer Optie</option>
<?php

foreach ($opties_staat as $optie) {
    ?>

    <option value="<?php echo($optie); ?>" <?php
    
    if($optie == $meta["_car_staat_key"][0]){
        echo(" selected");
    }

    ?>><?php echo($optie); ?></option>

<?php
}

?>

</select>
</div>

<div class="edit_input_wrapper">
<label for="Kilometerstand">Kilometerstand</label>
<input id="Kilometerstand" data-meta="_car_kilometerstand_key" type="number" value="<?php echo($meta["_car_kilometerstand_key"][0]); ?>">
</div>

<div class="edit_input_wrapper">
<label for="Transmissie">Transmissie</label>

<select  class="edit-select" name="Transmissie" data-meta="_car_transmissie_key" id="Transmissie">
<option selected disabled>Selecteer Optie</option>
<?php

foreach ($opties_transmissie as $optie) {
    ?>

    <option value="<?php echo($optie); ?>" <?php
    
    if($optie == $meta["_car_transmissie_key"][0]){
        echo(" selected");
    }

    ?>><?php echo($optie); ?></option>

<?php
}

?>

</select>
</div>

<div class="edit_input_wrapper">
<label for="Bouwjaar">Bouwjaar</label>
<input id="Bouwjaar" type="number" data-meta="_car_bouwjaar_key" value="<?php echo($meta["_car_bouwjaar_key"][0]); ?>">
</div>

<div class="edit_input_wrapper">
<label for="Kw">Kw</label>
<input id="Kw" type="number" data-meta="_car_kw_key" value="<?php echo($meta["_car_kw_key"][0]); ?>">
</div>

<div class="edit_input_wrapper">
<label for="Pk">Pk</label>
<input id="Pk" type="number" data-meta="_car_pk_key" value="<?php echo($meta["_car_pk_key"][0]); ?>">
</div>

<div class="edit_input_wrapper">
<label for="Cilinderinhoud">Cilinderinhoud</label>
<input id="Cilinderinhoud" type="number" data-meta="_car_cilinderinhoud_key" value="<?php echo($meta["_car_cilinderinhoud_key"][0]); ?>">
</div>

<div class="edit_input_wrapper">
<label for="Kleurinterieur">Kleur interieur</label>

<select  class="edit-select" name="Kleurinterieur" data-meta="_car_kleurinterieur_key" id="Kleurinterieur">
<option selected disabled>Selecteer Optie</option>
<?php

foreach ($opties_kleurinterieur as $optie) {
    ?>

    <option value="<?php echo($optie); ?>" <?php
    
    if($optie == $meta["_car_kleurinterieur_key"][0]){
        echo(" selected");
    }

    ?>><?php echo($optie); ?></option>

<?php
}

?>

</select>

</div>

<div class="edit_input_wrapper">
<label for="Kleurexterieur">Kleur exterieur</label>


<select  class="edit-select" name="Kleurexterieur" data-meta="_car_kleurexterieur_key" id="Kleurexterieur">
<option selected disabled>Selecteer Optie</option>
<?php

foreach ($opties_kleurexterieur as $optie) {
    ?>

    <option value="<?php echo($optie); ?>" <?php
    
    if($optie == $meta["_car_kleurexterieur_key"][0]){
        echo(" selected");
    }

    ?>><?php echo($optie); ?></option>

<?php
}

?>

</select>
</div>

<div class="edit_input_wrapper">
<label for="Emissieklasse">Emissieklasse</label>

<select  class="edit-select" name="Emissieklasse" data-meta="_car_emissieklasse_key" id="Emissieklasse">
<option selected disabled>Selecteer Optie</option>
<?php

foreach ($opties_emissieklasse as $optie) {
    ?>

    <option value="<?php echo($optie); ?>" <?php
    
    if($optie == $meta["_car_emissieklasse_key"][0]){
        echo(" selected");
    }

    ?>><?php echo($optie); ?></option>

<?php
}

?>

</select>



</div>

<div class="edit_input_wrapper">
<label for="Prijs">Prijs</label>
<input id="Prijs" type="number"  data-meta="_car_prijs_key" value="<?php echo($meta["_car_prijs_key"][0]); ?>">
</div>

<div class="edit_input_wrapper">
<label for="Oudeprijs">Oudeprijs</label>
<input id="Oudeprijs" type="number"  data-meta="_car_oudeprijs_key" value="<?php echo($meta["_car_oudeprijs_key"][0]); ?>">
</div>

<div class="edit_input_wrapper">
<label for="BTWaftrekbaar">BTW aftrekbaar</label>
<select  class="edit-select" name="BTWaftrekbaar"  data-meta="_car_btwaftrekbaar_key" id="BTWaftrekbaar">
<option selected disabled>Selecteer Optie</option>
<?php

foreach ($opties_btw as $optie) {
    ?>

    <option value="<?php echo($optie); ?>" <?php
    
    if($optie == $meta["_car_btwaftrekbaar_key"][0]){
        echo(" selected");
    }

    ?>><?php echo($optie); ?></option>

<?php
}

?>

</select>
</div>
<div class="edit_input_wrapper">
  <label for="Carpass">Carpass</label>
  <div class="input-group">
    <input id="Carpass" type="text" data-meta="_car_carpass_key" value="<?php echo($meta["_car_carpass_key"][0]); ?>" style="flex-basis: 80%;">
    <button id="downloadPDF" type="button" class="download-btn" style="cursor:pointer;flex-basis: 20%;">PDF</button>
  </div>
</div>

<style>
  .edit_input_wrapper {
    display: flex;
    flex-direction: column;
  }
  
  .input-group {
    display: flex;
    align-items: center;
  }
  
  /* Add some space between the label and input field */
  label {
    margin-bottom: 5px;
  }
  
  /* Add some space between the input field and button */
  input {
    margin-right: 5px;
  }
</style>




<div class="edit_input_wrapper">
<label for="Chassisnr">Chassis Nummer</label>

<input id="Chassisnr" maxlength="17" type="text" data-meta="_car_vin_key" value="<?php echo($meta["_car_vin_key"][0]); ?>" <?php





$sync = $meta["_car_sync_key"][0];

if(!empty($meta["_car_vin_key"][0]) && strlen($meta["_car_vin_key"][0]) == 17 && $sync == "YES"){
    echo("disabled");
}

?>>

</div>


<div class="edit_input_wrapper">
<label for="Wagen opties">Auto Opties</label>

<?php

dds_edit_options($id);

?>
</div>



<div class="edit_input_wrapper">
<label for="Beschrijving">Beschrijving</label>
<textarea id="Beschrijving"  data-meta="_car_description_key" type="textarea"><?php echo($meta["_car_description_key"][0]); ?></textarea>
</div>

<?php

dds_edit_gallery($id);


?>


<div class="pop_meta_wrap">
<?php
popup_backend_open("metadata");
echo("<h2>metadata</h2>");

echo("<table>");

foreach($meta as $key => $value){

    echo("<tr class='meta_row_highlight'>");

    echo("<td>".$key."</td>");
    echo("<td>".$value[0]."</td>");
    echo("</tr>");
}

if(is_array($terms)){
    foreach($terms as $value){

        echo("<tr class='meta_row_highlight'>");
    
        echo("<td>Merk model terms: </td>");
        echo("<td>".$value->name."</td>");
        echo("</tr>");
    }
}
else{
    var_dump($terms);
}


echo("</table>");

popup_backend_close();

?>

</div>
</div>
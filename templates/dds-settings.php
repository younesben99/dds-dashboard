<?php

class DDSSettings {
	private $dds_settings_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'dds_settings_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'dds_settings_page_init' ) );
	}

	public function dds_settings_add_plugin_page() {
		
        add_menu_page( 'Backoffice', 'Backoffice', 'manage_options', get_site_url() . "/dashboard/", null, 'dashicons-menu-alt', 1  );
        add_submenu_page(get_site_url() . "/dashboard/","Instellingen","Instellingen","manage_options","dds-settings",array( $this, 'dds_settings_create_admin_page' ));
        
	}
    
	public function dds_settings_create_admin_page() {
		$this->dds_settings_options = get_option( 'dds_settings_option_name' ); ?>

		<div class="wrap">
			<h2>DDS Settings</h2>
			<p>Digiflow Dealership Solutions settings</p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'dds_settings_option_group' );
					do_settings_sections( 'dds-settings-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function dds_settings_page_init() {
		register_setting(
			'dds_settings_option_group', // option_group
			'dds_settings_option_name', // option_name
			array( $this, 'dds_settings_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'dds_settings_setting_section', // id
			'Settings', // title
			array( $this, 'dds_settings_section_info' ), // callback
			'dds-settings-admin' // page
		);

		add_settings_field(
			'autoscout_graphql_api_key_0', // id
			'Autoscout GraphQL API key', // title
			array( $this, 'autoscout_graphql_api_key_0_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);

		add_settings_field(
			'autoscout_customer_id_1', // id
			'Autoscout Customer ID', // title
			array( $this, 'autoscout_customer_id_1_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);
		add_settings_field(
			'inmotiv_key', // id
			'inMotiv API key', // title
			array( $this, 'inmotiv_key_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);
		add_settings_field(
			'zapier_facebook_key_2', // id
			'Zapier Facebook Key', // title
			array( $this, 'zapier_facebook_key_2_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);

		add_settings_field(
			'zapier_instagram_key_3', // id
			'Zapier Instagram Key', // title
			array( $this, 'zapier_instagram_key_3_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);

		add_settings_field(
			'zapier_twitter_key_4', // id
			'Zapier Twitter Key', // title
			array( $this, 'zapier_twitter_key_4_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);

		add_settings_field(
			'zapier_billit_key', // id
			'Zapier Billit Link', // title
			array( $this, 'zapier_billit_key_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);

		add_settings_field(
			'zapier_extra_key_2_6', // id
			'Zapier Extra key 2', // title
			array( $this, 'zapier_extra_key_2_6_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);

		add_settings_field(
			'zapier_extra_key_2_7', // id
			'Zapier Extra key 2', // title
			array( $this, 'zapier_extra_key_2_7_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);

		add_settings_field(
			'dealer_handelsnaam_8', // id
			'Dealer handelsnaam', // title
			array( $this, 'dealer_handelsnaam_8_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);

		add_settings_field(
			'dealer_adres_9', // id
			'Dealer Adres', // title
			array( $this, 'dealer_adres_9_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);
		add_settings_field(
			'dealer_city_9', // idµ
			'Dealer city', // title
			array( $this, 'dealer_city_9_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);
		add_settings_field(
			'dealer_tel_1_10', // id
			'Dealer Tel 1', // title
			array( $this, 'dealer_tel_1_10_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);

		add_settings_field(
			'dealer_tel_2_11', // id
			'Dealer Tel 2', // title
			array( $this, 'dealer_tel_2_11_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);

		add_settings_field(
			'dealer_tel_3_12', // id
			'Dealer Tel 3', // title
			array( $this, 'dealer_tel_3_12_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);

		add_settings_field(
			'dealer_contact_mail', // id
			'Dealer Mail', // title
			array( $this, 'dealer_contact_mail_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);
		add_settings_field(
			'dealer_btw', // id
			'Dealer BTW nr', // title
			array( $this, 'dealer_btw_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);
		add_settings_field(
			'dealer_bank', // id
			'Dealer Bank gegevens', // title
			array( $this, 'dealer_bank_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);
		add_settings_field(
			'primary_color', // id
			'Primary Color', // title
			array( $this, 'primary_color_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);

		add_settings_field(
			'hover_color', // id
			'Hover Color', // title
			array( $this, 'hover_color_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);
		add_settings_field(
			'troeven_shortcode', // id
			'Troeven shortcode', // title
			array( $this, 'troeven_shortcode_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);
		add_settings_field(
			'slideshow_type', // id
			'Slideshow type', // title
			array( $this, 'slideshow_type_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);
		add_settings_field(
			'sp_locatie_link', // id
			'Locatie link', // title
			array( $this, 'sp_locatie_link_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);
		add_settings_field(
			'sp_contact_shortcode', // id
			'SCP Contact shortcode <br><small style="font-size:8px;color:grey;font-weight:300;">[dds_form style="modern" name="scpbeschikbaarheid" type="beschikbaarheid"]
			[dds_input name="Volledige naam" lb="Volledige naam"]
			[dds_input name="emailadres" lb="E-mailadres"]
			[dds_input name="telefoonnummer" lb="Telefoonnummer"]
			[dds_input ty="textarea" len="1000" name="bericht" ph="" lb="Bericht (optioneel)"]
			[dds_submit]
			[close_dds_form]</small>', // title
			array( $this, 'sp_contact_shortcode_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);
		add_settings_field(
			'sp_testrit_shortcode', // id
			'SCP Testrit shortcode <br><small style="font-size:8px;color:grey;font-weight:300;">[dds_form style="modern" name="scptestrit" type="afspraak"]
			[dds_select name="datum" ph="Selecteer datum" lb="Datum"]
			[dds_select name="tijd" ph="Selecteer tijd" lb="Tijd"]
			[dds_input name="Volledige naam" lb="Volledige naam"]
			[dds_input name="emailadres" lb="E-mailadres"]
			[dds_input name="telefoonnummer" lb="Telefoonnummer"]
			[dds_input ty="textarea" len="1000" name="bericht" ph="" lb="Bericht (optioneel)"]
			[dds_submit] [close_dds_form]</small>', // title
			array( $this, 'sp_testrit_shortcode_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);
		add_settings_field(
			'carousel_grid_id', // id
			'carousel_grid_id', // title
			array( $this, 'carousel_grid_id_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);
		add_settings_field(
			'pdf_logo_base64', // id
			'pdf_logo_base64', // title
			array( $this, 'pdf_logo_base64_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);
		add_settings_field(
			'inmotiv_allow', // id
			'Inmotiv metabox?', // title
			array( $this, 'inmotiv_allow_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);
		
		add_settings_field(
			'bb_checked', // id
			'Bestelbon actief?', // title
			array( $this, 'bb_checked_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);

		add_settings_field(
			'ab_checked', // id
			'Aankoopborderel actief?', // title
			array( $this, 'ab_checked_callback' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);
		add_settings_field(
			'archive_margin', // id
			'Archive page margin', // title
			array( $this, 'archive_margin' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);
		add_settings_field(
			'sp_margin', // id
			'Single car page margin', // title
			array( $this, 'sp_margin' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);
		add_settings_field(
			'coming_soon_img', // id
			'Coming soon image', // title
			array( $this, 'coming_soon_img' ), // callback
			'dds-settings-admin', // page
			'dds_settings_setting_section' // section
		);
	}

	public function dds_settings_sanitize($input) {
		$sanitary_values = array();
		
		if ( isset( $input['inmotiv_allow'] ) ) {
			$sanitary_values['inmotiv_allow'] = sanitize_text_field( $input['inmotiv_allow'] );
		}
		if ( isset( $input['inmotiv_key'] ) ) {
			$sanitary_values['inmotiv_key'] = sanitize_text_field( $input['inmotiv_key'] );
		}
		if ( isset( $input['bb_checked'] ) ) {
			$sanitary_values['bb_checked'] = sanitize_text_field( $input['bb_checked'] );
		}
		if ( isset( $input['ab_checked'] ) ) {
			$sanitary_values['ab_checked'] = sanitize_text_field( $input['ab_checked'] );
		}
		if ( isset( $input['autoscout_graphql_api_key_0'] ) ) {
			$sanitary_values['autoscout_graphql_api_key_0'] = sanitize_text_field( $input['autoscout_graphql_api_key_0'] );
		}

		if ( isset( $input['autoscout_customer_id_1'] ) ) {
			$sanitary_values['autoscout_customer_id_1'] = sanitize_text_field( $input['autoscout_customer_id_1'] );
		}

		if ( isset( $input['zapier_facebook_key_2'] ) ) {
			$sanitary_values['zapier_facebook_key_2'] = sanitize_text_field( $input['zapier_facebook_key_2'] );
		}

		if ( isset( $input['zapier_instagram_key_3'] ) ) {
			$sanitary_values['zapier_instagram_key_3'] = sanitize_text_field( $input['zapier_instagram_key_3'] );
		}

		if ( isset( $input['zapier_twitter_key_4'] ) ) {
			$sanitary_values['zapier_twitter_key_4'] = sanitize_text_field( $input['zapier_twitter_key_4'] );
		}

		if ( isset( $input['zapier_billit_key'] ) ) {
			$sanitary_values['zapier_billit_key'] = sanitize_text_field( $input['zapier_billit_key'] );
		}

		if ( isset( $input['zapier_extra_key_2_6'] ) ) {
			$sanitary_values['zapier_extra_key_2_6'] = sanitize_text_field( $input['zapier_extra_key_2_6'] );
		}

		if ( isset( $input['zapier_extra_key_2_7'] ) ) {
			$sanitary_values['zapier_extra_key_2_7'] = sanitize_text_field( $input['zapier_extra_key_2_7'] );
		}

		if ( isset( $input['dealer_handelsnaam_8'] ) ) {
			$sanitary_values['dealer_handelsnaam_8'] = sanitize_text_field( $input['dealer_handelsnaam_8'] );
		}

		if ( isset( $input['dealer_adres_9'] ) ) {
			$sanitary_values['dealer_adres_9'] = sanitize_text_field( $input['dealer_adres_9'] );
		}

		if ( isset( $input['dealer_city_9'] ) ) {
			$sanitary_values['dealer_city_9'] = sanitize_text_field( $input['dealer_city_9'] );
		}

		if ( isset( $input['dealer_tel_1_10'] ) ) {
			$sanitary_values['dealer_tel_1_10'] = sanitize_text_field( $input['dealer_tel_1_10'] );
		}

		if ( isset( $input['dealer_tel_2_11'] ) ) {
			$sanitary_values['dealer_tel_2_11'] = sanitize_text_field( $input['dealer_tel_2_11'] );
		}

		if ( isset( $input['dealer_tel_3_12'] ) ) {
			$sanitary_values['dealer_tel_3_12'] = sanitize_text_field( $input['dealer_tel_3_12'] );
		}

		if ( isset( $input['dealer_contact_mail'] ) ) {
			$sanitary_values['dealer_contact_mail'] = sanitize_text_field( $input['dealer_contact_mail'] );
		}

		if ( isset( $input['primary_color'] ) ) {
			$sanitary_values['primary_color'] = sanitize_text_field( $input['primary_color'] );
		}

		if ( isset( $input['hover_color'] ) ) {
			$sanitary_values['hover_color'] = sanitize_text_field( $input['hover_color'] );
		}

		if ( isset( $input['troeven_shortcode'] ) ) {
			$sanitary_values['troeven_shortcode'] = sanitize_text_field( $input['troeven_shortcode'] );
		}

		if ( isset( $input['slideshow_type'] ) ) {
			$sanitary_values['slideshow_type'] = sanitize_text_field( $input['slideshow_type'] );
		}

		if ( isset( $input['sp_locatie_link'] ) ) {
			$sanitary_values['sp_locatie_link'] = sanitize_text_field( $input['sp_locatie_link'] );
		}
		
		if ( isset( $input['sp_contact_shortcode'] ) ) {
			$sanitary_values['sp_contact_shortcode'] = $input['sp_contact_shortcode'];
		}

		if ( isset( $input['sp_testrit_shortcode'] ) ) {
			$sanitary_values['sp_testrit_shortcode'] = $input['sp_testrit_shortcode'];
		}
		if ( isset( $input['carousel_grid_id'] ) ) {
			$sanitary_values['carousel_grid_id'] = $input['carousel_grid_id'];
		}
		if ( isset( $input['pdf_logo_base64'] ) ) {
			$sanitary_values['pdf_logo_base64'] = $input['pdf_logo_base64'];
		}
		if ( isset( $input['dealer_btw'] ) ) {
			$sanitary_values['dealer_btw'] = $input['dealer_btw'];
		}
		if ( isset( $input['dealer_bank'] ) ) {
			$sanitary_values['dealer_bank'] = $input['dealer_bank'];
		}
		if ( isset( $input['archive_margin'] ) ) {
			$sanitary_values['archive_margin'] = $input['archive_margin'];
		}
		if ( isset( $input['sp_margin'] ) ) {
			$sanitary_values['sp_margin'] = $input['sp_margin'];
		}
		if ( isset( $input['coming_soon_img'] ) ) {
			$sanitary_values['coming_soon_img'] = $input['coming_soon_img'];
		}
		return $sanitary_values;
	}

	public function dds_settings_section_info() {
		
	}

	public function autoscout_graphql_api_key_0_callback() {
		printf(
			'<input class="regular-text graphfield" type="text" name="dds_settings_option_name[autoscout_graphql_api_key_0]" id="autoscout_graphql_api_key_0" value="%s">',
			isset( $this->dds_settings_options['autoscout_graphql_api_key_0'] ) ? esc_attr( $this->dds_settings_options['autoscout_graphql_api_key_0']) : ''
		);
	}

	public function autoscout_customer_id_1_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[autoscout_customer_id_1]" id="autoscout_customer_id_1" value="%s">',
			isset( $this->dds_settings_options['autoscout_customer_id_1'] ) ? esc_attr( $this->dds_settings_options['autoscout_customer_id_1']) : ''
		);
	}

	public function zapier_facebook_key_2_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[zapier_facebook_key_2]" id="zapier_facebook_key_2" value="%s">',
			isset( $this->dds_settings_options['zapier_facebook_key_2'] ) ? esc_attr( $this->dds_settings_options['zapier_facebook_key_2']) : ''
		);
	}

	public function zapier_instagram_key_3_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[zapier_instagram_key_3]" id="zapier_instagram_key_3" value="%s">',
			isset( $this->dds_settings_options['zapier_instagram_key_3'] ) ? esc_attr( $this->dds_settings_options['zapier_instagram_key_3']) : ''
		);
	}

	public function zapier_twitter_key_4_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[zapier_twitter_key_4]" id="zapier_twitter_key_4" value="%s">',
			isset( $this->dds_settings_options['zapier_twitter_key_4'] ) ? esc_attr( $this->dds_settings_options['zapier_twitter_key_4']) : ''
		);
	}

	public function zapier_billit_key_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[zapier_billit_key]" id="zapier_billit_key" value="%s">',
			isset( $this->dds_settings_options['zapier_billit_key'] ) ? esc_attr( $this->dds_settings_options['zapier_billit_key']) : ''
		);
	}

	public function zapier_extra_key_2_6_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[zapier_extra_key_2_6]" id="zapier_extra_key_2_6" value="%s">',
			isset( $this->dds_settings_options['zapier_extra_key_2_6'] ) ? esc_attr( $this->dds_settings_options['zapier_extra_key_2_6']) : ''
		);
	}

	public function zapier_extra_key_2_7_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[zapier_extra_key_2_7]" id="zapier_extra_key_2_7" value="%s">',
			isset( $this->dds_settings_options['zapier_extra_key_2_7'] ) ? esc_attr( $this->dds_settings_options['zapier_extra_key_2_7']) : ''
		);
	}

	public function dealer_handelsnaam_8_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[dealer_handelsnaam_8]" id="dealer_handelsnaam_8" value="%s">',
			isset( $this->dds_settings_options['dealer_handelsnaam_8'] ) ? esc_attr( $this->dds_settings_options['dealer_handelsnaam_8']) : ''
		);
	}

	public function dealer_adres_9_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[dealer_adres_9]" id="dealer_adres_9" value="%s">',
			isset( $this->dds_settings_options['dealer_adres_9'] ) ? esc_attr( $this->dds_settings_options['dealer_adres_9']) : ''
		);
	}

	public function dealer_city_9_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[dealer_city_9]" id="dealer_city_9" value="%s">',
			isset( $this->dds_settings_options['dealer_city_9'] ) ? esc_attr( $this->dds_settings_options['dealer_city_9']) : ''
		);
	}
	
	public function sp_locatie_link_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[sp_locatie_link]" id="sp_locatie_link" value="%s" placeholder="Google maps link">',
			isset( $this->dds_settings_options['sp_locatie_link'] ) ? esc_attr( $this->dds_settings_options['sp_locatie_link']) : ''
		);
	}

	public function dealer_tel_1_10_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[dealer_tel_1_10]" id="dealer_tel_1_10" value="%s">',
			isset( $this->dds_settings_options['dealer_tel_1_10'] ) ? esc_attr( $this->dds_settings_options['dealer_tel_1_10']) : ''
		);
	}

	public function dealer_tel_2_11_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[dealer_tel_2_11]" id="dealer_tel_2_11" value="%s">',
			isset( $this->dds_settings_options['dealer_tel_2_11'] ) ? esc_attr( $this->dds_settings_options['dealer_tel_2_11']) : ''
		);
	}

	public function dealer_tel_3_12_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[dealer_tel_3_12]" id="dealer_tel_3_12" value="%s">',
			isset( $this->dds_settings_options['dealer_tel_3_12'] ) ? esc_attr( $this->dds_settings_options['dealer_tel_3_12']) : ''
		);
	}

	public function dealer_contact_mail_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[dealer_contact_mail]" id="dealer_contact_mail" value="%s">',
			isset( $this->dds_settings_options['dealer_contact_mail'] ) ? esc_attr( $this->dds_settings_options['dealer_contact_mail']) : ''
		);
	}

	public function primary_color_callback() {
		printf(
			'<input class="regular-text" type="color" name="dds_settings_option_name[primary_color]" id="primary_color" value="%s">',
			isset( $this->dds_settings_options['primary_color'] ) ? esc_attr( $this->dds_settings_options['primary_color']) : ''
		);
	}

	public function hover_color_callback() {
		printf(
			'<input class="regular-text" type="color" name="dds_settings_option_name[hover_color]" id="hover_color" value="%s">',
			isset( $this->dds_settings_options['hover_color'] ) ? esc_attr( $this->dds_settings_options['hover_color']) : ''
		);
	}
	
	public function troeven_shortcode_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[troeven_shortcode]" id="troeven_shortcode" value="%s" placeholder="[shortcode]">',
			isset( $this->dds_settings_options['troeven_shortcode'] ) ? esc_attr( $this->dds_settings_options['troeven_shortcode']) : ''
		);
	}

	public function slideshow_type_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[slideshow_type]" id="slideshow_type" value="%s" placeholder="slideshow | grid">',
			isset( $this->dds_settings_options['slideshow_type'] ) ? esc_attr( $this->dds_settings_options['slideshow_type']) : ''
		);
	}

	public function sp_contact_shortcode_callback() {
		printf(
			'<textarea class="regular-text" type="text" name="dds_settings_option_name[sp_contact_shortcode]" id="sp_contact_shortcode"  rows="8"  placeholder="sp_contact_shortcode">%s</textarea>',
			isset( $this->dds_settings_options['sp_contact_shortcode'] ) ? esc_attr( $this->dds_settings_options['sp_contact_shortcode']) : ''
		);
	}

	public function sp_testrit_shortcode_callback() {
		printf(
			'<textarea class="regular-text" type="text" name="dds_settings_option_name[sp_testrit_shortcode]" id="sp_testrit_shortcode"  rows="8"  placeholder="sp_testrit_shortcode">%s</textarea>',
			isset( $this->dds_settings_options['sp_testrit_shortcode'] ) ? esc_attr( $this->dds_settings_options['sp_testrit_shortcode']) : ''
		);
	}
   
	public function carousel_grid_id_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[carousel_grid_id]" id="carousel_grid_id" value="%s" placeholder="grid id nr">',
			isset( $this->dds_settings_options['carousel_grid_id'] ) ? esc_attr( $this->dds_settings_options['carousel_grid_id']) : ''
		);
	}

	public function pdf_logo_base64_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[pdf_logo_base64]" id="pdf_logo_base64" value="%s" placeholder="pdf_logo_base64">',
			isset( $this->dds_settings_options['pdf_logo_base64'] ) ? esc_attr( $this->dds_settings_options['pdf_logo_base64']) : ''
		);
	}

	public function dealer_btw_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[dealer_btw]" id="dealer_btw" value="%s" placeholder="dealer_btw">',
			isset( $this->dds_settings_options['dealer_btw'] ) ? esc_attr( $this->dds_settings_options['dealer_btw']) : ''
		);
	}

	public function dealer_bank_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[dealer_bank]" id="dealer_bank" value="%s" placeholder="dealer_bank">',
			isset( $this->dds_settings_options['dealer_bank'] ) ? esc_attr( $this->dds_settings_options['dealer_bank']) : ''
		);
	}

	public function inmotiv_allow_callback() {
		printf(
			'<input type="text" name="dds_settings_option_name[inmotiv_allow]" id="inmotiv_allow" value="%s" placeholder="">',
			isset( $this->dds_settings_options['inmotiv_allow'] ) ? esc_attr( $this->dds_settings_options['inmotiv_allow']) : ''
		);
	}
	public function inmotiv_key_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[inmotiv_key]" id="inmotiv_key" value="%s" placeholder="">',
			isset( $this->dds_settings_options['inmotiv_key'] ) ? esc_attr( $this->dds_settings_options['inmotiv_key']) : ''
		);
	}
	public function bb_checked_callback() {
		printf(
			'<input type="text" name="dds_settings_option_name[bb_checked]" id="bb_checked" value="%s" placeholder="">',
			isset( $this->dds_settings_options['bb_checked'] ) ? esc_attr( $this->dds_settings_options['bb_checked']) : ''
		);
	}
	public function ab_checked_callback() {
		printf(
			'<input type="text" name="dds_settings_option_name[ab_checked]" id="ab_checked" value="%s" placeholder="">',
			isset( $this->dds_settings_options['ab_checked'] ) ? esc_attr( $this->dds_settings_options['ab_checked']) : ''
		);
	}
	public function sp_margin() {
		printf(
			'<input type="text" name="dds_settings_option_name[sp_margin]" id="sp_margin" value="%s" placeholder="">',
			isset( $this->dds_settings_options['sp_margin'] ) ? esc_attr( $this->dds_settings_options['sp_margin']) : ''
		);
	}

	public function archive_margin() {
		printf(
			'<input type="text" name="dds_settings_option_name[archive_margin]" id="archive_margin" value="%s" placeholder="">',
			isset( $this->dds_settings_options['archive_margin'] ) ? esc_attr( $this->dds_settings_options['archive_margin']) : ''
		);
	}
	
	public function coming_soon_img() {
		printf(
			'<input type="text" name="dds_settings_option_name[coming_soon_img]" id="coming_soon_img" value="%s" placeholder="">',
			isset( $this->dds_settings_options['coming_soon_img'] ) ? esc_attr( $this->dds_settings_options['coming_soon_img']) : ''
		);
	}

}
if ( is_admin() ){
    $dds_settings = new DDSSettings();
}


//   Retrieve this value with:
//   $dds_settings_options = get_option( 'dds_settings_option_name' ); // Array of All Options
//   $autoscout_graphql_api_key_0 = $dds_settings_options['autoscout_graphql_api_key_0']; // Autoscout GraphQL API key
//   $autoscout_customer_id_1 = $dds_settings_options['autoscout_customer_id_1']; // Autoscout Customer ID
//   $zapier_facebook_key_2 = $dds_settings_options['zapier_facebook_key_2']; // Zapier Facebook Key
//   $zapier_instagram_key_3 = $dds_settings_options['zapier_instagram_key_3']; // Zapier Instagram Key
//   $zapier_twitter_key_4 = $dds_settings_options['zapier_twitter_key_4']; // Zapier Twitter Key
//   $zapier_billit_key = $dds_settings_options['zapier_billit_key']; // Zapier Extra key 1
//   $zapier_extra_key_2_6 = $dds_settings_options['zapier_extra_key_2_6']; // Zapier Extra key 2
//   $zapier_extra_key_2_7 = $dds_settings_options['zapier_extra_key_2_7']; // Zapier Extra key 2
//   $dealer_handelsnaam_8 = $dds_settings_options['dealer_handelsnaam_8']; // Dealer handelsnaam
//   $dealer_adres_9 = $dds_settings_options['dealer_adres_9']; // Dealer Adres
//   $dealer_tel_1_10 = $dds_settings_options['dealer_tel_1_10']; // Dealer Tel 1
//   $dealer_tel_2_11 = $dds_settings_options['dealer_tel_2_11']; // Dealer Tel 2
//   $dealer_tel_3_12 = $dds_settings_options['dealer_tel_3_12']; // Dealer Tel 3
//   INMOTIV API KEY 46e5e34b-62aa-4b05-a9c7-35d256ab8c41

 ?>
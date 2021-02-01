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
			'zapier_extra_key_1_5', // id
			'Zapier Extra key 1', // title
			array( $this, 'zapier_extra_key_1_5_callback' ), // callback
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
	}

	public function dds_settings_sanitize($input) {
		$sanitary_values = array();
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

		if ( isset( $input['zapier_extra_key_1_5'] ) ) {
			$sanitary_values['zapier_extra_key_1_5'] = sanitize_text_field( $input['zapier_extra_key_1_5'] );
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

		if ( isset( $input['dealer_tel_1_10'] ) ) {
			$sanitary_values['dealer_tel_1_10'] = sanitize_text_field( $input['dealer_tel_1_10'] );
		}

		if ( isset( $input['dealer_tel_2_11'] ) ) {
			$sanitary_values['dealer_tel_2_11'] = sanitize_text_field( $input['dealer_tel_2_11'] );
		}

		if ( isset( $input['dealer_tel_3_12'] ) ) {
			$sanitary_values['dealer_tel_3_12'] = sanitize_text_field( $input['dealer_tel_3_12'] );
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

	public function zapier_extra_key_1_5_callback() {
		printf(
			'<input class="regular-text" type="text" name="dds_settings_option_name[zapier_extra_key_1_5]" id="zapier_extra_key_1_5" value="%s">',
			isset( $this->dds_settings_options['zapier_extra_key_1_5'] ) ? esc_attr( $this->dds_settings_options['zapier_extra_key_1_5']) : ''
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
   

}
if ( is_admin() ){
    $dds_settings = new DDSSettings();
}

/* 
 * Retrieve this value with:
 * $dds_settings_options = get_option( 'dds_settings_option_name' ); // Array of All Options
 * $autoscout_graphql_api_key_0 = $dds_settings_options['autoscout_graphql_api_key_0']; // Autoscout GraphQL API key
 * $autoscout_customer_id_1 = $dds_settings_options['autoscout_customer_id_1']; // Autoscout Customer ID
 * $zapier_facebook_key_2 = $dds_settings_options['zapier_facebook_key_2']; // Zapier Facebook Key
 * $zapier_instagram_key_3 = $dds_settings_options['zapier_instagram_key_3']; // Zapier Instagram Key
 * $zapier_twitter_key_4 = $dds_settings_options['zapier_twitter_key_4']; // Zapier Twitter Key
 * $zapier_extra_key_1_5 = $dds_settings_options['zapier_extra_key_1_5']; // Zapier Extra key 1
 * $zapier_extra_key_2_6 = $dds_settings_options['zapier_extra_key_2_6']; // Zapier Extra key 2
 * $zapier_extra_key_2_7 = $dds_settings_options['zapier_extra_key_2_7']; // Zapier Extra key 2
 * $dealer_handelsnaam_8 = $dds_settings_options['dealer_handelsnaam_8']; // Dealer handelsnaam
 * $dealer_adres_9 = $dds_settings_options['dealer_adres_9']; // Dealer Adres
 * $dealer_tel_1_10 = $dds_settings_options['dealer_tel_1_10']; // Dealer Tel 1
 * $dealer_tel_2_11 = $dds_settings_options['dealer_tel_2_11']; // Dealer Tel 2
 * $dealer_tel_3_12 = $dds_settings_options['dealer_tel_3_12']; // Dealer Tel 3
 */
?>
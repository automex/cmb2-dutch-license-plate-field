<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Plugin Name: Dutch License Plate Field for CMB2
 * Plugin URI: https://github.com/automex/cmb2-dutch-license-plate-field
 * GitHub Plugin URI: https://github.com/automex/cmb2-dutch-license-plate-field
 * Description: Dutch License Plate Field for CMB2
 * Version: 1.0.0
 * Author: Automex.website
 * Author URI: http://automex.website
 * License: GPLv3
 * Text Domain: amex-dutch-license-plate
 * Domain Path: /languages
 */

class AMEX_Dutch_License_Plate {


	const VERSION = '1.0.0';


	public function __construct() {
		/* CMB2 Dutch License Plate Field Small */
		add_filter( 'cmb2_render_dutch_license_plate_small', array( $this, 'render_callback_for_dutch_license_plate_small' ), 10, 5 );
		add_filter( 'cmb2_sanitize_dutch_license_plate_small', array( $this, 'sanitize_dutch_license_plate'), 10, 2 );
		/* CMB2 Dutch License Plate Field Large */
		add_filter( 'cmb2_render_dutch_license_plate_large', array( $this, 'render_callback_for_dutch_license_plate_large' ), 10, 5 );
		add_filter( 'cmb2_sanitize_dutch_license_plate_large', array( $this, 'sanitize_dutch_license_plate'), 10, 2 );
	}
	
	/* CMB2 Dutch License Plate Field Small */
	public function render_callback_for_dutch_license_plate_small( $field, $escaped_value, $object_id, $object_type, $field_type_object ) { 
		$this->amex_css_js( $field ); ?> 
		<span class="kenteken small">
			<span class="blue">
				<span><img src="<?php echo plugins_url('assets/images/stars.svg', __FILE__ ); ?>" alt=""></span>
				<span class="countrycode">nl</span>
			</span>
			<?php echo $field_type_object->input( array( 
				'type' => 'text', 
				'name' => 'dutch_license_plate_small',
				'id' => 'dutch_license_plate_small',s
				'class' => 'nl',
				'placeholder' => 'XP-004-T',
				'spellcheck' => 'false',
				'autocomplete' => 'off',
				'maxlength' => '8',
				'desc' => ''
			) ); ?>
		</span>
		<?php echo $field_type_object->_desc( true );
	} 

	/* CMB2 Dutch License Plate Field Large */
	public function render_callback_for_dutch_license_plate_large( $field, $escaped_value, $object_id, $object_type, $field_type_object ) {
		$this->amex_css_js( $field ); ?> 
		<span class="kenteken">
			<span class="blue">
				<span><img src="<?php echo plugins_url('assets/images/stars.svg', __FILE__ ); ?>" alt=""></span>
				<span class="countrycode">nl</span>
			</span>
			<?php echo $field_type_object->input( array( 
				'type' => 'text', 
				'name' => 'dutch_license_plate_large',
				'id' => 'dutch_license_plate_large',
				'class' => 'nl',
				'placeholder' => 'XP-004-T',
				'spellcheck' => 'false',
				'autocomplete' => 'off',
				'maxlength' => '8',
				'desc' => '' 
			) ); ?>
		</span>
		<?php echo $field_type_object->_desc( true );
	}
	
	/* Sanitize */
	public function sanitize_dutch_license_plate( $null, $new ) {
		$new = preg_replace('/[^a-zA-Z0-9]/', '', $new);
		return $new;
	}

	public function amex_css_js( $field ) {	
		$asset_path = apply_filters( 'sa_cmb2_field_faiconselect_asset_path', plugins_url( '', __FILE__ ) );
		wp_enqueue_style('amex_kentekenplaat_css', $asset_path . '/assets/css/style.min.css', array(), self::VERSION );
		wp_enqueue_script('amex_kentekenplaat_js', $asset_path . '/assets/js/kentekenplaat.min.js', array( 'jquery' ), self::VERSION, true );
		wp_enqueue_script('amex_main_js', $asset_path . '/assets/js/main.js', array( 'jquery' ), self::VERSION, true );
	} 

}

new AMEX_Dutch_License_Plate();

?>

<?php
namespace Emerce\VariationSwatches\Customize;

defined( 'ABSPATH' ) || exit;

class Customizer  extends \stdClass {
	/**
	 * The setting API
	 *
	 * @var \Emerce\VariationSwatches\Admin\Settings
	 */
	public $setting_api;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->settings_api = \Emerce\VariationSwatches\Admin\Settings::instance();

		// Set priority to 20 to ensure WooCommerce section is added.
		add_action( 'customize_register', [ $this, 'add_sections' ], 20 );
		add_action( 'customize_controls_enqueue_scripts', [ $this, 'enqueue_scripts' ], 30 );
		add_action( 'customize_controls_print_styles', [ $this, 'add_styles' ] );
	}

	/**
	 * Add settings to the customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function add_sections( $wp_customize ) {
		$section_name = 'emerce_variation_swatches';

		$wp_customize->add_section(
			$section_name,
			[
				'title'    => esc_html__( 'Variation Swatches', 'emerce-variation-swatches' ),
				'description' => esc_html__( 'Some of these options can be overidden in product data settings.', 'emerce-variation-swatches' ),
				'priority' => 30,
				'panel'    => 'woocommerce',
			]
		);

		$wp_customize->add_setting(
			$this->settings_api->get_option_name( 'shape' ),
			[
				'default'              => $this->settings_api->get_default( 'shape' ),
				'type'                 => 'option',
				'capability'           => 'manage_woocommerce',
				'sanitize_callback'    => [ $this->settings_api, 'sanitize_shape' ],
			]
		);

		$wp_customize->add_control(
			$this->settings_api->get_option_name( 'shape' ),
			[
				'label'       => esc_html__( 'Swatches Shape', 'woocommerce' ),
				'description' => esc_html__( 'Choose the shape style of variation swatches', 'woocommerce' ),
				'section'     => $section_name,
				'type'        => 'select',
				'choices'     => $this->settings_api->get_shape_options(),
			]
		);

		include_once dirname( __FILE__ ) . '/size-control.php';

		$wp_customize->add_setting(
			$this->settings_api->get_option_name( 'size' ),
			[
				'default'              => $this->settings_api->get_default( 'size' ),
				'type'                 => 'option',
				'capability'           => 'manage_woocommerce',
				'sanitize_callback'    => [ $this->settings_api, 'sanitize_size' ],
			]
		);

		$wp_customize->add_control(
			new Size_Control(
				$wp_customize,
				$this->settings_api->get_option_name( 'size' ),
				[
					'label'       => esc_html__( 'Swatches Size', 'emerce-variation-swatches' ),
					'description' => esc_html__( 'Set the default size of variation swatches.', 'woocommerce' ),
					'section'     => $section_name,
				]
			)
		);

		$wp_customize->add_setting(
			$this->settings_api->get_option_name( 'tooltip' ),
			[
				'default'              => $this->settings_api->get_default( 'tooltip' ),
				'type'                 => 'option',
				'capability'           => 'manage_woocommerce',
				'sanitize_callback'    => 'wc_bool_to_string',
				'sanitize_js_callback' => 'wc_string_to_bool',
			]
		);

		$wp_customize->add_control(
			$this->settings_api->get_option_name( 'tooltip' ),
			[
				'label'    => esc_html__( 'Enable tooltip', 'emerce-variation-swatches' ),
				'section'  => $section_name,
				'type'     => 'checkbox',
			]
		);

		$wp_customize->add_setting(
			$this->settings_api->get_option_name( 'auto_button' ),
			[
				'default'              => $this->settings_api->get_default( 'auto_button' ),
				'type'                 => 'option',
				'capability'           => 'manage_woocommerce',
				'sanitize_callback'    => 'wc_bool_to_string',
				'sanitize_js_callback' => 'wc_string_to_bool',
			]
		);

		$wp_customize->add_control(
			$this->settings_api->get_option_name( 'auto_button' ),
			[
				'label'    => esc_html__( 'Convert default dropdowns to buttons', 'emerce-variation-swatches' ),
				'section'  => $section_name,
				'type'     => 'checkbox',
			]
		);

		$wp_customize->add_setting(
			$this->settings_api->get_option_name( 'show_selected_label' ),
			[
				'default'              => $this->settings_api->get_default( 'show_selected_label' ),
				'type'                 => 'option',
				'capability'           => 'manage_woocommerce',
				'sanitize_callback'    => 'wc_bool_to_string',
				'sanitize_js_callback' => 'wc_string_to_bool',
			]
		);

		$wp_customize->add_control(
			$this->settings_api->get_option_name( 'show_selected_label' ),
			[
				'label'    => esc_html__( "Show the selected attribute's label", 'emerce-variation-swatches' ),
				'section'  => $section_name,
				'type'     => 'checkbox',
			]
		);
	}

	/**
	 * CSS styles to improve our form.
	 */
	public function add_styles() {
		?>
		<style type="text/css">
			.customize-control-emerce-variation-swatches-size .customize-control-inside input[type="text"] {
				width: auto;
				display: inline-block;
			}
		</style>
		<?php
	}

	/**
	 * Customizer scritps
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'emerce-variation-swatches-customizer', plugins_url( 'assets/js/customizer.js', EMERCE_VARIATION_SWATCHES_FILE ), [ 'jquery', 'customize-base' ], '20210722', true );
	}
}

new Customizer();

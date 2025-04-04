<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://teconce.com
 * @since      1.0.0
 *
 * @package    Emerce_Core
 * @subpackage Emerce_Core/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Emerce_Core
 * @subpackage Emerce_Core/admin
 * @author     Teconce <hello@teconce.com>
 */
class Emerce_Core_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Emerce_Core_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Emerce_Core_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/emerce-core-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Emerce_Core_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Emerce_Core_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/emerce-core-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script('emerce-lib', plugin_dir_url( __FILE__ ) . 'js/emerce-library.js', array( 'jquery' ), $this->version, false );
		

	}
	
	public function emerce_remove_footer_admin () {
		echo '<span id="footer_text">'. esc_html__('Emerce Woocommerce Theme Developed by','emerce-core') .' <a href="https://teconce.com/" target="_blank">'. esc_html__('Teconce', 'emerce-core') .'</a>'. esc_html__(' For Woocommerce Marketplace by wordpress','emerce-core')  . '</span>';
	}

	public function emerce_remove_adminbar() {
		if (!current_user_can('administrator') && !current_user_can('author') &&  !current_user_can('editor') && !is_admin()) {
			show_admin_bar(false);
		}
	}

	public function emerce_login_logo_url_title() {
		return get_bloginfo( 'name' );
	}
	
	public function emerce_loginlogo_url($url) {

		return  esc_url( home_url( '/' ) );

	}

	public function emerce_login_logo() { ?>
		<?php
		 $emerce_options = get_option( 'emerce_options' );
		$adminlogo= $emerce_options['admin_logo']['url'];
		$loginbgtype= $emerce_options['admin_login_bg_type'];
		$loginbgimage= $emerce_options['admin_login_bg']['url'];
		
		
		$loginbuttoncolor= $emerce_options['login_button_admin'];
		$loginbuttontxtcolor= $emerce_options['login_button_admin_txt'];
		$loginbuttoncolorhvr= $emerce_options['login_button_admin_hvr'];
		$loginbuttontxtcolorhvr= $emerce_options['login_button_admin_txt_hvr'];

		$overlaycolor= $emerce_options['admin_overlay_color'];
		$mainbgcolor= $emerce_options['admin_login_bg_color'];

		$customcode= $emerce_options['admin_login_custom_code_setting'];

		$adminboxbgcolor = $emerce_options['admin_login_box_color'];
		$adminboxbgradiustop = $emerce_options['admin_login_box_radius']['top'];
		$adminboxbgradiusrght = $emerce_options['admin_login_box_radius']['right'];
		$adminboxbgradiusbtm = $emerce_options['admin_login_box_radius']['bottom'];
		$adminboxbgradiusleft = $emerce_options['admin_login_box_radius']['left'];
		
		$adminboxbgradiusunit = $emerce_options['admin_login_box_radius']['unit'];

		$textcolor = $emerce_options['admin_login_box_text_color'];
		
		$admin_fields_color = $emerce_options['admin_input_fields_color'];
		$admin_login_style = $emerce_options['admin_login_style'];



		$adminbtnbgradiustop = $emerce_options['admin_login_button_radius']['top'];
		$adminbtnbgradiusrght = $emerce_options['admin_login_button_radius']['right'];
		$adminbtnbgradiusbtm = $emerce_options['admin_login_button_radius']['bottom'];
		$adminbtnbgradiusleft = $emerce_options['admin_login_button_radius']['left'];
		
		$adminbtnbgradiusunit = $emerce_options['admin_login_button_radius']['unit'];
		
		
		$inpuftop = $emerce_options['admin_input_field_radius']['top'];
		$inpufrght = $emerce_options['admin_input_field_radius']['right'];
		$inpufsbtm = $emerce_options['admin_input_field_radius']['bottom'];
		$inpufleft = $emerce_options['admin_input_field_radius']['left'];
		
		$inpufunit = $emerce_options['admin_input_field_radius']['unit'];


		?>
		<style type="text/css">
			body.login form{
				border:0 !important;
			}
			.wp-core-ui .button-group.button-large .button, .wp-core-ui .button.button-large {
				line-height: 48px !important;
				text-align: center;
			}
			<?php if ($admin_login_style== "style2"){?>
			#login {
				margin: inherit !important;
				height: 100% !important;
				border-radius:0 !important;
			}
			@media (min-width:767px){
				body{
					overflow:hidden;
				}
				#login{
					padding:6% 50px 20px 50px !important;
				}
			}
			@media (min-width:1400px){
				#login{
					padding:10% 50px 20px 50px !important;
				}
			}

			<?php } else { ?>

			#login{
				padding: 26px 50px 20px 50px !important;
			}
			<?php } ?>

			input[type=checkbox]:focus, input[type=color]:focus, input[type=date]:focus, input[type=datetime-local]:focus, input[type=datetime]:focus, input[type=email]:focus, input[type=month]:focus, input[type=number]:focus, input[type=password]:focus, input[type=radio]:focus, input[type=search]:focus, input[type=tel]:focus, input[type=text]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus, select:focus, textarea:focus{
				box-shadow: 0 0 0 1px  <?php echo esc_html($loginbuttoncolor);  ?> !important;
			}
			.login form .input, .login input[type=text] {
				background: <?php echo esc_html($admin_fields_color);?> !important;
				border: 2px solid <?php echo esc_html($admin_fields_color);?> !important;
				border-radius: <?php echo esc_html($inpuftop.$inpufunit); ?> <?php echo esc_html($inpufrght.$inpufunit); ?>  <?php echo esc_html($inpufsbtm.$inpufunit); ?>
				<?php echo esc_html($inpufleft.$inpufunit); ?>;
				padding: 0 10px !important;
				height: 50px;
			}
			body.login-action-login.wp-core-ui, body.login-action-lostpassword,body.login,body{
				display:flex;
				flex-wrap:wrap;
				align-items:center;
			}
			#login_error strong{
				color: #cc2944;
			}
			body.login h1 {
				text-align: center;
				float: left;
				width: 100%;
				background: transparent;
				margin-top: 20px;
				margin-left: 0;
				margin-bottom:30px;
				padding: 40px 0;
				box-sizing: border-box;
				max-height: 60px;
				border-top-left-radius: 3px;
				border-top-right-radius: 3px;
				font-family: Lato, Helvetica, Arial, sans-serif;
			}
			body.login div#login h1 a {
				background-image: url(<?php echo esc_url($adminlogo);  ?> );
				padding-bottom: 0px;
				width:130px !important;
				background-size:100%;
				height: 90px;
				font-family: Lato, Helvetica, Arial, sans-serif;
				outline:none !important;
					box-shadow:none !important;
			}
			body.login form {
				margin-top: 0;
				margin-left: 0;
				padding: 0 24px 12px !important;
				background: transparent;
				-webkit-box-shadow:none;
				box-shadow: none;
				font-family: Lato, Helvetica, Arial, sans-serif;

			}
			body.login label {
				font-size: 14px;
			}.wp-core-ui p .button {
				 vertical-align: baseline;
				 background: <?php echo esc_html($loginbuttoncolor);  ?>;
				 border-color: <?php echo esc_html($loginbuttoncolor);  ?>;
				 color: <?php echo esc_html($loginbuttontxtcolor);  ?>;
				 box-shadow: none;
				 font-family: Lato, Helvetica, Arial, sans-serif;
				 transition:all .2s;
				 	border-radius: <?php echo esc_html($adminbtnbgradiustop.$adminbtnbgradiusunit); ?> <?php echo esc_html($adminbtnbgradiusrght.$adminbtnbgradiusunit); ?>  <?php echo esc_html($adminbtnbgradiusbtm.$adminbtnbgradiusunit); ?>
				<?php echo esc_html($adminbtnbgradiusleft.$adminbtnbgradiusunit); ?>;
			 }
			 .wp-core-ui p .button:hover{
			      background: <?php echo esc_html($loginbuttoncolorhvr);  ?>;
				 border-color: <?php echo esc_html($loginbuttoncolorhvr);  ?>;
				 color: <?php echo esc_html($loginbuttontxtcolorhvr);  ?>;
			     
			 }
			.login form{border:none !important;}
			body.login #login_error, body.login .message {

				border-left: 4px solid #ff043f;
				padding: 12px;
				margin-left: 0;
				background-color: rgba(255, 5, 63, 0.12);
				-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
				box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
				color: #ff053f;
				font-family: Lato, Helvetica, Arial, sans-serif;
				display: inline-block;
				border-radius: 3px;
				width: 89%;
			}

		<?php if($loginbgtype== "image") { ?>
			body.login-action-login.wp-core-ui,body.login-action-lostpassword,body,body.login {
				background:url(<?php echo esc_url($loginbgimage)?>);
				background-size:cover;
				background-repeat:no-repeat;
			}
			body.login-action-login.wp-core-ui:after, body.login-action-lostpassword:after,body:after,body.login:after{
				content:"";
				width: 100%;
				height: 100%;
				position: absolute;
				background: <?php echo esc_html($overlaycolor);?>;
				top:0;
				left:0;
				z-index: -1;
			}
			<?php } elseif($loginbgtype== "customcode") { ?>
			body.login-action-login.wp-core-ui,body.login-action-lostpassword,body.login,body{
			<?php echo esc_html($customcode);?>
			}

			<?php } else {?>
			body.login-action-login.wp-core-ui,body.login-action-lostpassword,body.login,body{
				background:<?php echo esc_html($mainbgcolor);?>;
			}
			<?php } ?>

			.wp-core-ui .button-group.button-large .button, .wp-core-ui .button.button-large {
				line-height: 28px;
				padding: 0 12px 2px;
				width: 100%;
				height: 50px !important;
				font-size: 16px;
				font-weight: 900;
				text-shadow: none;
				text-transform: uppercase;
				margin-top: 20px;
				font-family: Lato, Helvetica, Arial, sans-serif;
			}
			.wp-core-ui p .button:hover{
				opacity:.75;
			}
			#login{
				background:<?php echo esc_html($adminboxbgcolor);?>;
				border-radius: <?php echo esc_html($adminboxbgradiustop.$adminboxbgradiusunit); ?> <?php echo esc_html($adminboxbgradiusrght.$adminboxbgradiusunit); ?>  <?php echo esc_html($adminboxbgradiusbtm.$adminboxbgradiusunit); ?>
				<?php echo esc_html($adminboxbgradiusleft.$adminboxbgradiusunit); ?>;
			}
			.login #backtoblog a, .login #nav a,body.login label,body.login{
				color:<?php echo esc_html($textcolor);?> !important;
			}
			@media (min-width:991px){
				#login {
					width: 420px !important;
				}

				.login #nav {
					margin: 0;
					text-align: center;

				}
				.login #backtoblog, .login #nav {
					font-size: 14px;
					font-style: italic;
					margin: 0 !important;

				}
				.login #backtoblog{

					text-align: center;
					padding-bottom:77px !important;
					border-bottom-left-radius:3px;
					border-bottom-right-radius:3px;
				}
				.login #nav a{
					margin-top:20px !important;
				}

				.login form .input, .login input[type=text]{
					margin-top:10px;
				}
			}


		</style>
	<?php }


}

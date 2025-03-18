<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://teconce.com
 * @since             1.0
 * @package           Emerce_Core
 *
 * @wordpress-plugin
 * Plugin Name:       Emerce Core
 * Plugin URI:        https://teconce.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.8
 * Author:            Teconce
 * Author URI:        https://teconce.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       emerce-core
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'EMERCE_CORE_VERSION', '1.8' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-emerce-core-activator.php
 */
function activate_emerce_core() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-emerce-core-activator.php';
	Emerce_Core_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-emerce-core-deactivator.php
 */
function deactivate_emerce_core() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-emerce-core-deactivator.php';
	Emerce_Core_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_emerce_core' );
register_deactivation_hook( __FILE__, 'deactivate_emerce_core' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-emerce-core.php';
require plugin_dir_path( __FILE__ ) . 'elementor/class-elementor-main.php';
require plugin_dir_path( __FILE__ ) . 'library/codestar/codestar-framework.php';
require plugin_dir_path( __FILE__ ) . 'library/theme-options/theme-options.php';
require plugin_dir_path( __FILE__ ) . 'library/theme-options/theme-panels.php';
require plugin_dir_path( __FILE__ ) . 'library/social-share.php';
require plugin_dir_path( __FILE__ ) . 'library/emerce-cpt.php';
require plugin_dir_path( __FILE__ ) . 'library/emerce-helper.php';
require plugin_dir_path( __FILE__ ) . 'library/theme-options/extends/custom-color-options.php';
require plugin_dir_path( __FILE__ ) . 'library/theme-options/extends/custom-gradient-options.php';
require plugin_dir_path( __FILE__ ) . 'library/theme-options/extends/custom-color-group.php';


require plugin_dir_path( __FILE__ ) . 'library/metabox/page-meta.php';
require plugin_dir_path( __FILE__ ) . 'library/metabox/user-meta.php';
require plugin_dir_path( __FILE__ ) . 'library/emerce-nav-options.php';
require plugin_dir_path( __FILE__ ) . 'library/emerce-custom-css.php';
require plugin_dir_path( __FILE__ ) . 'library/emerce-custom-widget.php';

require plugin_dir_path( __FILE__ ) . 'library/widgets/recent-post.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/post-tags.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/subscribe.php';

require plugin_dir_path( __FILE__ ) . 'library/license/EmerceLicense.php';
$woo_plugin_path = trailingslashit( WP_PLUGIN_DIR ) . 'woocommerce/woocommerce.php';
if( is_multisite() ){
	$networkplugins = wp_get_active_network_plugins();
} else {
    $networkplugins =  wp_get_active_and_valid_plugins();
}

if (
    
    in_array( $woo_plugin_path, wp_get_active_and_valid_plugins() ) || in_array( $woo_plugin_path, $networkplugins )

) {
  require plugin_dir_path( __FILE__ ) . 'library/widgets/recent-products.php';
    require plugin_dir_path( __FILE__ ) . 'library/metabox/woo-meta.php';
    require plugin_dir_path( __FILE__ ) . 'library/extension/woo-swatches/index.php';
    require plugin_dir_path( __FILE__ ) . 'library/extension/emerce-live-search/product-search.php';
    require plugin_dir_path( __FILE__ ) . 'library/extension/woo-sale-countdown/woo-sale-countdown.php';
    require plugin_dir_path( __FILE__ ) . 'library/extension/woo-stuffs/login.php';
    require plugin_dir_path( __FILE__ ) . 'library/extension/woo-stuffs/register.php';
    require plugin_dir_path( __FILE__ ) . 'library/extension/woo-stuffs/custom-taxonomy-options.php';
    require plugin_dir_path( __FILE__ ) . 'library/extension/woo-stuffs/wishlist.php';
   require plugin_dir_path( __FILE__ ) . 'library/extension/woo-quick-view/init.php';
    
    
}








/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_emerce_core() {

	$plugin = new Emerce_Core();
	$plugin->run();

}
run_emerce_core();

<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
define( 'EMERCE_ELEMENTOR_URL', plugins_url( '/', __FILE__ ) );
define( 'EMERCE_ELEMENTOR_PATH', plugin_dir_path( __FILE__ ) );
define( 'EMERCE_ELEMENTOR_ROOT_URL', plugins_url( __FILE__ ) );
define( 'EMERCE_ELEMENTOR_PL_ROOT_URL', plugin_dir_url(  __FILE__ ) );
define( 'EMERCE_ELEMENTOR_MODULES_PATH', EMERCE_ELEMENTOR_PATH . 'modules/' );
define( 'EMERCE_PL_ASSETS', trailingslashit( EMERCE_ELEMENTOR_PL_ROOT_URL . 'assets' ) );
define( 'EMERCE_STICKY_ASSETS_URL', EMERCE_ELEMENTOR_URL . 'assets/' );
define( 'EMERCE_HEADER_MODULES_URL', EMERCE_ELEMENTOR_URL . 'modules/' );
define( 'EMERCE_ELEMENTOR_STICKY_TPL', EMERCE_ELEMENTOR_PATH . 'library/sticky-header/' );

define( 'EMERCE_TEMPLATES_FOR_ELEMENTOR_VERSION', '2.9' );
 define( 'EMERCE_ROOT_FILE__', __FILE__ );

require_once EMERCE_ELEMENTOR_PATH.'inc/emerce-element-cat.php';
require_once EMERCE_ELEMENTOR_PATH.'inc/emerce-elementor-assets.php';
require_once EMERCE_ELEMENTOR_PATH.'inc/emerce-custom-icon.php';
require_once EMERCE_ELEMENTOR_PATH.'inc/emerce-elementor-functions.php';
require_once EMERCE_ELEMENTOR_PATH.'library/template-importer/index.php';
require_once EMERCE_ELEMENTOR_PATH.'library/sticky-header/xpsc-elementor.php';




function emerce_elementor_widget_categorie( $elements_manager ) {

	$elements_manager->add_category(
		'emerce-ele-widgets-cat',
		[
			'title' => __( 'Emerce Elements', 'emerce-core' ),
			'icon' => 'eicon-plug',
		]
	);
	
	$elements_manager->add_category(
		'emerce-header-elements',
		[
			'title' => __( 'Emerce Header', 'emerce-core' ),
			'icon' => 'eicon-plug',
		]
	);
	
	$elements_manager->add_category(
		'emerce-footer-elements',
		[
			'title' => __( 'Emerce Footer', 'emerce-core' ),
			'icon' => 'eicon-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'emerce_elementor_widget_categorie' );


function emerce_elementor_elements(){
    require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-home-slider.php';
    require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-home-grocery-banner.php';
    require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-home-decor-banner.php';
	require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-section-heading.php';
	require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-default-post.php';
	require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-client-review.php';
	require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-timing-counter.php';
	require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-video-icon-canvas.php';
	require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-instagram.php';
	
	
	require_once EMERCE_ELEMENTOR_PATH.'widgets/header/logo.php';
	require_once EMERCE_ELEMENTOR_PATH.'widgets/header/main-nav.php';
	require_once EMERCE_ELEMENTOR_PATH.'widgets/header/search.php';
	require_once EMERCE_ELEMENTOR_PATH.'widgets/header/my-account.php';
	require_once EMERCE_ELEMENTOR_PATH.'widgets/header/vertical-menu.php';
	
	
	require_once EMERCE_ELEMENTOR_PATH.'widgets/footer/footer-common-widget.php';


if ( class_exists( 'WooCommerce' ) ) {
	require_once EMERCE_ELEMENTOR_PATH.'widgets/header/cart.php';
	require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-product-category-carousel.php';
	require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-product-category-grid.php';
    require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-product-category-block-grid.php';
	require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-product-custom-category-grid.php';
	require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-offer-banner.php';
	require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-woo-products.php';
    require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-products-with-category-list.php';
    require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-category-list-block.php';
    require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-product-featured-grid.php';
	require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-counter-product.php';
	require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-unevent-product-grid.php';
	  require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-product-carousel.php';
    require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-flash-sale-product-grid.php';
    require_once EMERCE_ELEMENTOR_PATH.'widgets/emerce-hotspot-product.php';

    
    
		if (class_exists('YITH_WCWL')){
		    	require_once EMERCE_ELEMENTOR_PATH.'widgets/header/wishlist.php';
		}
	
}
	
	
}
add_action('elementor/widgets/widgets_registered','emerce_elementor_elements');


add_action('elementor/editor/before_enqueue_scripts', function() {
    wp_enqueue_style(
   	'emerce-elpreview-style',
   EMERCE_PL_ASSETS . 'css/emerce-editor-style.css',
   	[],
   	'1.0'
   );
  
});
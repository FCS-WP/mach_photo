<?php
include_once(dirname( __FILE__ ).'/global/global-color.php'); 
include_once(dirname( __FILE__ ).'/global/global-typography.php'); 
include_once(dirname( __FILE__ ).'/header/header.php');
include_once(dirname( __FILE__ ).'/footer/footer.php');
include_once(dirname( __FILE__ ).'/blog/blog.php'); 
if ( !class_exists( 'WooCommerce' ) ) {
include_once(dirname( __FILE__ ).'/woocommerce/single-product.php'); 
include_once(dirname( __FILE__ ).'/woocommerce/grid.php'); 
include_once(dirname( __FILE__ ).'/woocommerce/archive.php'); 
include_once(dirname( __FILE__ ).'/woocommerce/counter.php');
include_once(dirname( __FILE__ ).'/woocommerce/login-register.php'); 

}

include_once(dirname( __FILE__ ).'/extras/extras.php'); 
include_once(dirname( __FILE__ ).'/white-label/white-label.php'); 
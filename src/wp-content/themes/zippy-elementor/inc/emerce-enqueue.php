<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
if( !class_exists('emerce_theme_script') ) {

    class emerce_theme_script {


        public function __construct() {


            add_action('wp_enqueue_scripts',array( $this, 'emerce_scripts' ));

            add_action('admin_enqueue_scripts',array( $this, 'emerce_register_admin_styles' ));



        }


      
#-----------------------------------------------------------------#
# Enqueue Styles & scripts
#-----------------------------------------------------------------#/

        public function emerce_scripts()
        {

            wp_enqueue_style('bootstrap', EMERCE_URL . '/assets/css/bootstrap.min.css', false, EMERCE_VERSION, 'all');
            wp_enqueue_style('zero-icon', EMERCE_URL . '/assets/css/zero-icon-line.css', false, EMERCE_VERSION, 'all');
            wp_enqueue_style('remix-icon', EMERCE_URL . '/assets/css/remixicon.css', false, EMERCE_VERSION, 'all');
            wp_enqueue_style('emerce-default', EMERCE_URL . '/assets/css/theme-default.css', false, EMERCE_VERSION, 'all');
            wp_style_add_data( 'emerce-default', 'rtl', 'replace' );

            wp_enqueue_style('emerce-style', EMERCE_URL . '/assets/css/emerce-style.css', false, EMERCE_VERSION, 'all');
            wp_style_add_data( 'emerce-style', 'rtl', 'replace' );

            wp_enqueue_style('emerce-responsive', EMERCE_URL . '/assets/css/emerce-responsive.css', false, EMERCE_VERSION, 'all');
            wp_enqueue_style('emerce-style', get_stylesheet_uri(), array(), EMERCE_VERSION);
            wp_style_add_data('emerce-rtl', 'rtl', 'replace');

            wp_enqueue_style('emerce-google-fonts', emerce_fonts_url(), array(), null);

            wp_enqueue_script('bootstrap', EMERCE_URL . '/assets/js/bootstrap.bundle.min.js', array('jquery'), EMERCE_VERSION, true);
            wp_enqueue_script('emerce-navigation', EMERCE_URL . '/assets/js/navigation.js', array(), EMERCE_VERSION, true);

            wp_enqueue_script('modernizr', EMERCE_URL . '/assets/js/mordenizer.js', array('jquery'), EMERCE_VERSION, true);
            wp_enqueue_script('isotope', EMERCE_URL . '/assets/js/isotope.js', array('jquery'), EMERCE_VERSION, true);
            wp_enqueue_script('gridzy', EMERCE_URL . '/assets/js/gridzy.js', array('jquery'), EMERCE_VERSION, true);
            wp_enqueue_script('niceselect', EMERCE_URL . '/assets/js/nice-select.js', array('jquery'), EMERCE_VERSION, true);
            wp_enqueue_script('lity', EMERCE_URL . '/assets/js/lity.js', array('jquery'), EMERCE_VERSION, true);

            wp_enqueue_script('emerce-main-script', EMERCE_URL . '/assets/js/emerce-main-script.js', array('jquery'), EMERCE_VERSION, true);


            if (class_exists('Emerce_Core')) {
                if (class_exists('WooCommerce')) {
                    
                     if ( !wp_script_is( 'wc-cart-fragments', 'enqueued') && wp_script_is( 'wc-cart-fragments', 'registered' ) ) {

                        // Enqueue the wc-cart-fragments script
                        
                        wp_enqueue_script( 'wc-cart-fragments' );
                        
                         }
                         
                    wp_enqueue_script('emerce-woo', EMERCE_URL . '/assets/js/emerce-wc.js', array('jquery'), EMERCE_VERSION, true);

                }
            }

            $stickybarenable = cs_get_option('sticky_bar_enable');
            if ($stickybarenable == 'enabled') {
                wp_enqueue_script('emerce-notification', EMERCE_URL . '/assets/js/jquery.notification.min.js', array('jquery'), EMERCE_VERSION, true);
            }


            if (is_singular() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }

            if (class_exists('WooCommerce')) {
                
                
                wp_enqueue_style('flickity', EMERCE_URL . '/assets/css/flickity.css', false, EMERCE_VERSION, 'all');
                wp_enqueue_script('flickity', EMERCE_URL . '/assets/js/flickity.pkgd.min.js', array(), EMERCE_VERSION, true);

            }
        }




#-----------------------------------------------------------------#
# Register/Enqueue JS/CSS In Admin Panel
#-----------------------------------------------------------------#

        public function emerce_register_admin_styles()
        {

            wp_enqueue_style('emerce-admin-css', EMERCE_URL . '/assets/css/admin.css');

        }


    }
    new emerce_theme_script;
}
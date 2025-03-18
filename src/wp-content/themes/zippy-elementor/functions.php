<?php
/**
 * Mayosis functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package emerce
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

#-----------------------------------------------------------------#
# Defined Constants
#-----------------------------------------------------------------#/
define('EMERCE_THEME_NAME', 'emerce');
if (!defined('EMERCE_PATH')) define('EMERCE_PATH', get_template_directory());
if (!defined('EMERCE_URL')) define('EMERCE_URL', get_template_directory_uri());
define('EMERCE_THEME_DIR', wp_normalize_path(EMERCE_PATH . '/'));
define('EMERCE_THEME_URI', preg_replace('/^http(s)?:/', '', EMERCE_URL) . '/');
define('EMERCE_CHILD_PATH', get_stylesheet_directory());
defined('EMERCE_USER_LOGGED') or define('EMERCE_USER_LOGGED', is_user_logged_in());

#-----------------------------------------------------------------#
# Site Content Width
#-----------------------------------------------------------------#/
if( !isset($content_width) ) $content_width = 640;

if( !class_exists('emerce_theme_setup') ) {

    class emerce_theme_setup {

        public function __construct() {

            /* includes_files Theme Files */

            add_action('after_setup_theme', array( $this, 'includes_files' ), 4 );

            /* Main Theme Options */

            add_action('after_setup_theme', array( $this, 'theme_support') );
            
            /* Register Widget */
            add_action('widgets_init', array( $this, 'emerce_widgets_init'));

        }

        public function includes_files(){
            /**
             * Implement the Custom Header feature.
             */
            require EMERCE_PATH . '/inc/custom-header.php';
            
            
            /**
             * Theme Option Implement.
             */
            require EMERCE_PATH . '/inc/emerce-theme-options.php';
            
            
            /**
             * Implement Enqueue CSS & Javascript.
             */
            require EMERCE_PATH . '/inc/emerce-enqueue.php';
            

            /**
             * Custom template tags for this theme.
             */
            require EMERCE_PATH . '/inc/template-tags.php';

            /**
             * Functions which enhance the theme by hooking into WordPress.
             */
            require EMERCE_PATH . '/inc/template-functions.php';
            require EMERCE_PATH . '/inc/template-post.php';

            /**
             * Customizer additions.
             */
            require EMERCE_PATH . '/inc/customizer.php';


            /**
             * Navwalker additions.
             */
            require EMERCE_PATH . '/inc/bootstrap-navwalker.php';
            require EMERCE_PATH . '/inc/emerce-nav-walker.php';

            require EMERCE_PATH . '/inc/emerce-accordion-walker.php';

            /**
             * Comment.
             */
            require EMERCE_PATH . '/inc/emerce_comment.php';

            /**
             * Admin Page.
             */
            require EMERCE_PATH . '/inc/admin/admin.php';
            require EMERCE_PATH . '/inc/admin/admin-init.php';

            /**
             * Breadcrumb.
             */
            require EMERCE_PATH . '/inc/breadcrumb.php';

            /**
             * Load Jetpack compatibility file.
             */
            if (defined('JETPACK__VERSION')) {
                require EMERCE_PATH . '/inc/jetpack.php';
            }

            /**
             * Load WooCommerce compatibility file.
             */
            if (class_exists('WooCommerce')) {
                require EMERCE_PATH . '/inc/woocommerce.php';
                require EMERCE_PATH . '/inc/template-product.php';
                require EMERCE_PATH . '/inc/vendor/woo-single-product-structure.php';
            }

            if (!is_customize_preview()  && is_admin() ) {
               require_once (EMERCE_PATH. '/inc/admin/merlin/vendor/autoload.php' );
                require_once (EMERCE_PATH. '/inc/admin/merlin/class-merlin.php' );
                require_once (EMERCE_PATH. '/inc/admin/merlin/merlin-config.php' );
                require_once (EMERCE_PATH. '/inc/admin/merlin/merlin-filters.php' );
            }




        }


        public function theme_support(){
            // Set our theme version.
           if (!defined('EMERCE_VERSION')) {
                // Replace the version number of the theme on each release.
                define('EMERCE_VERSION', '1.8');
            }
            /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on Emerce, use a find and replace
        * to change 'emerce' to the name of your theme in all the template files.
        */
            load_theme_textdomain('emerce', EMERCE_PATH . '/languages');

            // Add default posts and comments RSS feed links to head.
            add_theme_support('automatic-feed-links');

            /*
             * Let WordPress manage the document title.
             * By adding theme support, we declare that this theme does not use a
             * hard-coded <title> tag in the document head, and expect WordPress to
             * provide it for us.
             */
            add_theme_support('title-tag');

            /*
             * Enable support for Post Thumbnails on posts and pages.
             *
             * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
             */
            add_theme_support('post-thumbnails');

            add_image_size('emerce-default-post', 450, 300, true);
            add_image_size('emerce-default-post-st-one', 416, 300, true);
            add_image_size('emerce-default-post-st-two', 416, 290, true);
            add_image_size('emerce-default-post-st-three', 416, 460, true);
            add_image_size('emerce-slider-bg', 1920, 850, true);
            add_image_size('emerce-slider-top', 750, 750, true);
            add_image_size('emerce-home-banner', 864, 550, true);
            add_image_size('emerce-woo-product-square', 300, 300, true);
            add_image_size('emerce-woo-product-semi-wide', 274, 240, true);
            add_image_size('emerce-woo-product-sports', 307, 327, true);
            add_image_size('emerce-woo-product-st-eight', 307, 360, true);
            add_image_size('emerce-grid-post', 370, 400, true);
            add_image_size('emerce-grid-alt-post', 416, 570, true);
            add_image_size('emerce-unevent-product1', 416, 600, true);
            add_image_size('emerce-unevent-product2', 416, 416, true);
            add_image_size('emerce-navigation-image', 150, 150, true);
            add_image_size('emerce-quick-view-image', 400, 500, true);
            add_image_size('product-featured-grid', 138, 154, true);
            add_image_size('category-list-block', 244, 195, true);


            // This theme uses wp_nav_menu() in one location.
            register_nav_menus(
                array(
                    'main' => esc_html__('Main Menu', 'emerce'),
                    'vertical-menu' => esc_html__('Vertical Menu', 'emerce'),
                    'account-menu' => esc_html__('Account Menu', 'emerce'),
                )
            );

            /*
             * Switch default core markup for search form, comment form, and comments
             * to output valid HTML5.
             */
            add_theme_support(
                'html5',
                array(
                    'search-form',
                    'comment-form',
                    'comment-list',
                    'gallery',
                    'caption',
                    'style',
                    'script',
                )
            );

            // Set up the WordPress core custom background feature.
            add_theme_support(
                'custom-background',
                apply_filters(
                    'emerce_custom_background_args',
                    array(
                        'default-color' => 'ffffff',
                        'default-image' => '',
                    )
                )
            );

            // Add theme support for selective refresh for widgets.
            add_theme_support('customize-selective-refresh-widgets');


            /**
             * Add support for core custom logo.
             *
             * @link https://codex.wordpress.org/Theme_Logo
             */
            add_theme_support(
                'custom-logo',
                array(
                    'height' => 250,
                    'width' => 250,
                    'flex-width' => true,
                    'flex-height' => true,
                )
            );


            #-----------------------------------------------------------------#
            # Gutenberg
            #-----------------------------------------------------------------#/
            // Theme supports wide images, galleries and videos.
            add_theme_support('align-wide');
            add_theme_support('wp-block-styles');
            add_theme_support('editor-styles');
            add_theme_support('responsive-embeds');
            add_theme_support('custom-units');

            remove_theme_support('widgets-block-editor');

            add_editor_style('style-editor.css');
            add_editor_style('https://fonts.googleapis.com/css2?family=Open+Sans&family=Quicksand:wght@500;600;700&display=swap');


            // Add custom editor font sizes.
            add_theme_support(
                'editor-font-sizes',
                array(
                    array(
                        'name' => esc_attr__('Small', 'emerce'),
                        'shortName' => esc_attr__('S', 'emerce'),
                        'size' => 16,
                        'slug' => 'small',
                    ),
                    array(
                        'name' => esc_attr__('Normal', 'emerce'),
                        'shortName' => esc_attr__('M', 'emerce'),
                        'size' => 18,
                        'slug' => 'normal',
                    ),
                    array(
                        'name' => esc_attr__('Large', 'emerce'),
                        'shortName' => esc_attr__('L', 'emerce'),
                        'size' => 24,
                        'slug' => 'large',
                    ),
                    array(
                        'name' => esc_attr__('Huge', 'emerce'),
                        'shortName' => esc_attr__('XL', 'emerce'),
                        'size' => 42,
                        'slug' => 'huge',
                    ),
                )
            );

            // Make specific theme colors available in the editor.
            add_theme_support('editor-color-palette', array(
                array(
                    'name' => __('Light gray', 'emerce'),
                    'slug' => 'light-gray',
                    'color' => '#f5f5f5',
                ),
                array(
                    'name' => __('Medium gray', 'emerce'),
                    'slug' => 'medium-gray',
                    'color' => '#999',
                ),
                array(
                    'name' => __('Dark gray', 'emerce'),
                    'slug' => 'dark-gray',
                    'color' => '#222a36',
                ),

                array(
                    'name' => __('Purple', 'emerce'),
                    'slug' => 'purple',
                    'color' => '#5a00f0',
                ),

                array(
                    'name' => __('Dark Blue', 'emerce'),
                    'slug' => 'dark-blue',
                    'color' => '#28375a',
                ),

                array(
                    'name' => __('Red', 'emerce'),
                    'slug' => 'red',
                    'color' => '#c44d58',
                ),

                array(
                    'name' => __('Yellow', 'emerce'),
                    'slug' => 'yellow',
                    'color' => '#ecca2e',
                ),

                array(
                    'name' => __('Green', 'emerce'),
                    'slug' => 'green',
                    'color' => '#64a500',
                ),

                array(
                    'name' => __('White', 'emerce'),
                    'slug' => 'white',
                    'color' => '#ffffff',
                ),
            ));

            add_theme_support('editor-font-sizes', array(
                array(
                    'name' => __('Small', 'emerce'),
                    'size' => 14,
                    'slug' => 'small'
                ),
                array(
                    'name' => __('Normal', 'emerce'),
                    'size' => 16,
                    'slug' => 'normal'
                ),
                array(
                    'name' => __('Large', 'emerce'),
                    'size' => 36,
                    'slug' => 'large'
                ),
                array(
                    'name' => __('Huge', 'emerce'),
                    'size' => 40,
                    'slug' => 'huge'
                )
            ));

        }
        
        
public function emerce_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'emerce'),
            'id' => 'emerce-sidebar',
            'description' => esc_html__('Add widgets here.', 'emerce'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name' => esc_html__('Woo Archive', 'emerce'),
            'id' => 'emerce-woo-sidebar',
            'description' => esc_html__('Add widgets here.', 'emerce'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}


    }

    new emerce_theme_setup;

}
<?php
/**
 * Available filters for extending Merlin WP.
 *
 * @package   Merlin WP
 * @version   @@pkg.version
 * @link      https://merlinwp.com/
 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com
 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC
 * @license   Licensed GPLv3 for Open Source Use
 */

/**
 * Filter the home page title from your demo content.
 * If your demo's home page title is "Home", you don't need this.
 *
 * @param string $output Home page title.
 */
function prefix_merlin_content_home_page_title( $output ) {
	return 'My front page';
}
add_filter( 'merlin_content_home_page_title', 'prefix_merlin_content_home_page_title' );

/**
 * Filter the blog page title from your demo content.
 * If your demo's blog page title is "Blog", you don't need this.
 *
 * @param string $output Index blogroll page title.
 */
function prefix_merlin_content_blog_page_title( $output ) {
	return 'Journal';
}
add_filter( 'merlin_content_blog_page_title', 'prefix_merlin_content_blog_page_title' );

/**
 * Add your widget area to unset the default widgets from.
 * If your theme's first widget area is "sidebar-1", you don't need this.
 *
 * @see https://stackoverflow.com/questions/11757461/how-to-populate-widgets-on-sidebar-on-theme-activation
 *
 * @param  array $widget_areas Arguments for the sidebars_widgets widget areas.
 * @return array of arguments to update the sidebars_widgets option.
 */
function prefix_merlin_unset_default_widgets_args( $widget_areas ) {

	$widget_areas = array(
		'sidebar-1' => array(),
	);

	return $widget_areas;
}
add_filter( 'merlin_unset_default_widgets_args', 'prefix_merlin_unset_default_widgets_args' );

/**
 * Custom content for the generated child theme's functions.php file.
 *
 * @param string $output Generated content.
 * @param string $slug Parent theme slug.
 */
function prefix_generate_child_functions_php( $output, $slug ) {

	$slug_no_hyphens = strtolower( preg_replace( '#[^a-zA-Z]#', '', $slug ) );

	$output = "
		<?php
		/**
		 * Theme functions and definitions.
		 */
		function {$slug_no_hyphens}_child_enqueue_styles() {
		    if ( SCRIPT_DEBUG ) {
		        wp_enqueue_style( '{$slug}-style' , get_template_directory_uri() . '/style.css' );
		    } else {
		        wp_enqueue_style( '{$slug}-minified-style' , get_template_directory_uri() . '/style.min.css' );
		    }
		    wp_enqueue_style( '{$slug}-child-style',
		        get_stylesheet_directory_uri() . '/style.css',
		        array( '{$slug}-style' ),
		        wp_get_theme()->get('Version')
		    );
		}
		add_action(  'wp_enqueue_scripts', '{$slug_no_hyphens}_child_enqueue_styles' );\n
	";

	// Let's remove the tabs so that it displays nicely.
	$output = trim( preg_replace( '/\t+/', '', $output ) );

	// Filterable return.
	return $output;
}
add_filter( 'merlin_generate_child_functions_php', 'prefix_generate_child_functions_php', 10, 2 );


/**
 * Define the demo import files (local files).
 *
 * You have to use the same filter as in above example,
 * but with a slightly different array keys: local_*.
 * The values have to be absolute paths (not URLs) to your import files.
 * To use local import files, that reside in your theme folder,
 * please use the below code.
 * Note: make sure your import files are readable!
 */
function mayosis_merlin_import_file_urls() {
    return array(
   array(
            'import_file_name' => 'Main Demo',
            'categories' => array('Elementor'),
            'import_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/Emerce/main-demo/sitecontent.xml',
            'import_widget_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/Emerce/main-demo/widget.wie',
            'local_import_csf' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/admin/import/main-demo/themeoption.json',
                    'option_name' => 'emerce_options',
                ),
            ),
            'import_preview_image_url' => EMERCE_URL .'/assets/images/demos/1.jpg',
            'preview_url' => 'https://teconce.com/emerce-maindemo/',
            'import_notice' => __
            ('Before Setup Demo Please Install All Plugin Requireds.Intall Elementor as Page Builder.For Import You Need to wait 3-5 Mintues.', '@@textdomain'),
        ),
        
        
        array(
            'import_file_name' => 'Fashion Demo',
            'categories' => array('Elementor'),
            'import_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/Emerce/fashion/emerce-fashion.xml',
            'import_widget_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/Emerce/fashion/widgets.wie',
            'local_import_csf' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/admin/import/main-demo/themeoption.json',
                    'option_name' => 'emerce_options',
                ),
            ),
            'import_preview_image_url' => EMERCE_URL .'/assets/images/demos/2.jpg',
            'preview_url' => 'https://teconce.com/emerce-maindemo/',
            'import_notice' => __
            ('Before Setup Demo Please Install All Plugin Requireds.Intall Elementor as Page Builder.For Import You Need to wait 3-5 Mintues.', '@@textdomain'),
        ),
        
        
        
         array(
            'import_file_name' => 'Classic Demo',
            'categories' => array('Elementor'),
            'import_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/Emerce/classic/site-content.xml',
            'import_widget_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/Emerce/classic/widgets.wie',
            'local_import_csf' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/admin/import/classic-demo/themeoption.json',
                    'option_name' => 'emerce_options',
                ),
            ),
             'import_preview_image_url' => EMERCE_URL .'/assets/images/demos/3.png',
            'preview_url' => 'https://teconce.com/emerce-maindemo/',
            'import_notice' => __
            ('Before Setup Demo Please Install All Plugin Requireds.Intall Elementor as Page Builder.For Import You Need to wait 3-5 Mintues.', '@@textdomain'),
        ),

        array(
            'import_file_name' => 'Sports Demo',
            'categories' => array('Elementor'),
            'import_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/Emerce/sports/sitecontent.xml',
            'import_widget_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/Emerce/sports/widget.wie',
            'local_import_csf' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/admin/import/sports-demo/themeoption.json',
                    'option_name' => 'emerce_options',
                ),
            ),
            'import_preview_image_url' => EMERCE_URL .'/assets/images/demos/4.jpg',
            'preview_url' => 'https://teconce.com/emerce-maindemo/',
            'import_notice' => __
            ('Before Setup Demo Please Install All Plugin Requireds.Intall Elementor as Page Builder.For Import You Need to wait 3-5 Mintues.', '@@textdomain'),
        ),

        array(
            'import_file_name' => 'Jewellery Demo',
            'categories' => array('Elementor'),
            'import_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/Emerce/jewellery/sitecontent.xml',
            'import_widget_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/Emerce/jewellery/widget.wie',
            'local_import_csf' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/admin/import/jewellery-demo/themeoption.json',
                    'option_name' => 'emerce_options',
                ),
            ),
            'import_preview_image_url' => EMERCE_URL .'/assets/images/demos/5.jpg',
            'preview_url' => 'https://teconce.com/emerce-maindemo/',
            'import_notice' => __
            ('Before Setup Demo Please Install All Plugin Requireds.Intall Elementor as Page Builder.For Import You Need to wait 3-5 Mintues.', '@@textdomain'),
        ),
        
        array(
            'import_file_name' => 'Grocery Demo',
            'categories' => array('Elementor'),
            'import_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/Emerce/grocery/site-content.xml',
            'import_widget_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/Emerce/grocery/widgets.wie',
            'local_import_csf' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/admin/import/grocery-demo/themeoptions.json',
                    'option_name' => 'emerce_options',
                ),
            ),
             'import_preview_image_url' => EMERCE_URL .'/assets/images/demos/6.jpg',
            'preview_url' => 'https://teconce.com/emerce-maindemo/',
            'import_notice' => __
            ('Before Setup Demo Please Install All Plugin Requireds.Intall Elementor as Page Builder.For Import You Need to wait 3-5 Mintues.', '@@textdomain'),
        ),
        
          array(
            'import_file_name' => 'Multimerce Multivendor Demo',
            'categories' => array('Elementor'),
            'import_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/Emerce/multivendor-demo/site-content.xml',
            'import_widget_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/Emerce/multivendor-demo/widgets.wie',
            'local_import_csf' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/admin/import/multivendor-demo/themeoptions.json',
                    'option_name' => 'emerce_options',
                ),
            ),
             'import_preview_image_url' => EMERCE_URL .'/assets/images/demos/7.jpg',
            'preview_url' => 'https://teconce.com/emerce-maindemo/',
            'import_notice' => __
            ('Before Setup Demo Please Install All Plugin Requireds.Intall Elementor as Page Builder.For Import You Need to wait 3-5 Mintues.', '@@textdomain'),
        ),




    );
}
add_filter( 'merlin_import_files', 'mayosis_merlin_import_file_urls' );


/**
 * Execute custom code after the whole import has finished.
 */
function prefix_merlin_after_import_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

	set_theme_mod(
		'nav_menu_locations', array(
			'main-menu' => $main_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
	update_option( 'elementor_experiment-e_font_icon_svg', 'inactive' );
	

}
add_action( 'merlin_after_all_import', 'prefix_merlin_after_import_setup' );
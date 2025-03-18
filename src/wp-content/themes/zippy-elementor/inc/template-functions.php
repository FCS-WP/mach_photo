<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Emerce
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function emerce_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}

add_filter('body_class', 'emerce_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function emerce_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}

add_action('wp_head', 'emerce_pingback_header');


/**
 * Excertp Function
 */
function emerce_get_excerpt($limit, $source = null)
{

    $excerpt = $source == "content" ? get_the_content() : get_the_excerpt();
    $excerpt = preg_replace(" (\[.*?\])", '', $excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
    $excerpt = $excerpt . '<div class="xpc-post-read-more-box"><a class="read-more" href="' . get_permalink() . '"> Read More <i class="zil zi-arrow-right"></i></a></div>';
    return $excerpt;
}

function emerce_get_excerpt_alt($limit, $source = null)
{

    $excerpt = $source == "content" ? get_the_content() : get_the_excerpt();
    $excerpt = preg_replace(" (\[.*?\])", '', $excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
    $excerpt = $excerpt;
    return $excerpt;
}

#-----------------------------------------------------------------#
# Emerce Paginantion
#-----------------------------------------------------------------#/
if (!function_exists('emerce_page_navs')): /**
 * Displays post pagination links
 *
 * @since emerce 1.0
 */
    function emerce_page_navs($query = false)
    {
        global $wp_query;
        if ($query) {
            $temp_query = $wp_query;
            $wp_query = $query;
        }
        // Return early if there's only one page.
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return;
        }
        ?>
        <div class="emerce-common-paginav text-center">
            <div class="pagination">
                <?php
                $big = 999999999; // need an unlikely integer
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $wp_query->max_num_pages,
                    'type' => 'list',
                    'prev_text' => '<i class="ri-arrow-left-line"></i>',
                    'next_text' => '<i class="ri-arrow-right-line"></i>'
                ));
                ?>
            </div>
        </div>
        <?php
        if (isset($temp_query)) {
            $wp_query = $temp_query;
        }
    }
endif;


if (!function_exists('emerce_page_paging_nav')) {
    function emerce_page_paging_nav($max_num_pages = false, $args = array())
    {

        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        if ($max_num_pages === false) {
            global $wp_query;
            $max_num_pages = $wp_query->max_num_pages;
        }


        $defaults = array(
            'nav' => 'load',
            'posts_per_page' => get_option('posts_per_page'),
            'max_pages' => $max_num_pages,
            'post_type' => 'post',
        );


        $args = wp_parse_args($args, $defaults);

        if ($max_num_pages < 2) {
            return;
        }


        $big = 999999999; // need an unlikely integer

        $links = paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => $paged,
            'total' => $max_num_pages,
            'prev_next' => true,
            'prev_text' => esc_html__('Previous', 'emerce'),
            'next_text' => esc_html__('Next', 'emerce'),
            'end_size' => 1,
            'mid_size' => 2,
            'type' => 'list',
        ));

        if (!empty($links)): ?>
            <div class="emerce-common-paginav emerce-page-pagination flex text-center">
                <?php echo wp_filter_kses($links); ?>
            </div>
            <div class="empty-space marg-sm-b60"></div>
        <?php endif;
    }


}


#-----------------------------------------------------------------#
# Emerce Header Builder
#-----------------------------------------------------------------#/

if (!function_exists('emerce_header_builder')) {
    function emerce_header_builder()
    {
        $page_meta = get_post_meta(get_the_ID(), 'emerce_page_options', true);
        $custom_options = (!empty($page_meta['global_page_meta'])) ? $page_meta['global_page_meta'] : 'disabled';
        if ($custom_options == 'enabled') {
            $header = $page_meta['select_header_blocks_meta'];
        } else {
            $header = cs_get_option('select_header_blocks');
        }

        $stacked_header_enable = cs_get_option('stacked_header_enable');

        if (!empty($stacked_header_enable)) {
            $stackclass = 'stacked-header';
        } else {
            $stackclass = 'no-stacked-header';
        }
        if (!empty($header)) {
            echo '<header class="emerce-header-builder emerce-site-header ' . $stackclass . '"><div class="header-content-holder">' . \Elementor\Plugin::$instance->frontend->get_builder_content(intval($header)) . '</div></header>';
        } else {
            echo '<header class="emerce-header emerce-site-header ' . $stackclass . '"><div class="header-content-holder">';
            get_template_part('template-parts/header/header', 'deafult');
            echo '</div></header>';
        }


    }

}

add_action('wp_enqueue_scripts', function () {
    if (!class_exists('\Elementor\Core\Files\CSS\Post')) {
        return;
    }
    $page_meta = get_post_meta(get_the_ID(), 'emerce_page_options', true);
    $custom_options = (!empty($page_meta['global_page_meta'])) ? $page_meta['global_page_meta'] : 'disabled';
    if ($custom_options == 'enabled') {
        $headerid = $page_meta['select_header_blocks_meta'];
    } else {
        $headerid = cs_get_option('select_header_blocks');
    }
    $template_id = $headerid;

    $css_file = new \Elementor\Core\Files\CSS\Post($template_id);
    $css_file->enqueue();
}, 500);


#-----------------------------------------------------------------#
# Emerce Footer Builder
#-----------------------------------------------------------------#/


if (!function_exists('emerce_footer_builder')) {
    function emerce_footer_builder()
    {

        $page_meta = get_post_meta(get_the_ID(), 'emerce_page_options', true);
        $custom_options = (!empty($page_meta['global_page_meta'])) ? $page_meta['global_page_meta'] : 'disabled';

        if ($custom_options == 'enabled') {
            $footer = $page_meta['select_footer_blocks_meta'];
        } else {
            $footer = cs_get_option('select_footer_blocks');
        }

        if (!empty($footer)) {
            echo '<footer class="emerce-footer">' . \Elementor\Plugin::$instance->frontend->get_builder_content(intval($footer)) . '</footer>';
        } else {

            get_template_part('template-parts/footer/footer', 'default');

        }

    }

}

add_action('wp_enqueue_scripts', function () {
    if (!class_exists('\Elementor\Core\Files\CSS\Post')) {
        return;
    }
    $page_meta = get_post_meta(get_the_ID(), 'emerce_page_options', true);
    $custom_options = (!empty($page_meta['global_page_meta'])) ? $page_meta['global_page_meta'] : 'disabled';
    if ($custom_options == 'enabled') {
        $footer = $page_meta['select_footer_blocks_meta'];
    } else {
        $footer = cs_get_option('select_footer_blocks');
    }
    $template_id = $footer;

    $css_file = new \Elementor\Core\Files\CSS\Post($template_id);
    $css_file->enqueue();
}, 500);


#-----------------------------------------------------------------#
# Emerce Elementor CPT Support
#-----------------------------------------------------------------#/
function emerce_add_cpt_support()
{

    //if exists, assign to $cpt_support var
    $cpt_support = get_option('elementor_cpt_support');

    //check if option DOESN'T exist in db
    if (!$cpt_support) {
        $cpt_support = ['page', 'post', 'emerce_header', 'emerce_footer', 'emerce_block']; //create array of our default supported post types
        update_option('elementor_cpt_support', $cpt_support); //write it to the database
    } //if it DOES exist, but emerce_header is NOT defined
    else if (!in_array('emerce_header', $cpt_support)) {
        $cpt_support[] = 'emerce_header'; //append to array
        update_option('elementor_cpt_support', $cpt_support); //update database
    } else if (!in_array('emerce_footer', $cpt_support)) {
        $cpt_support[] = 'emerce_footer'; //append to array
        update_option('elementor_cpt_support', $cpt_support); //update database
    }
    //otherwise do nothing, emerce_header already exists in elementor_cpt_support option
}

add_action('after_switch_theme', 'emerce_add_cpt_support');

#-----------------------------------------------------------------#
# Title Trim
#-----------------------------------------------------------------#/
function emerce_title_trim($maxchar = 90)
{

    $fullTitle = get_the_title();

    // get the length of the title
    $titleLength = strlen($fullTitle);

    if ($maxchar > $titleLength) {
        return $fullTitle;
    } else {
        $shortTitle = substr($fullTitle, 0, $maxchar);
        return $shortTitle . " &hellip;";
    }
}

if(!function_exists('emerce__wp_kses')):
	/**
	 * Allow basic tags
	 *
	 * @since 1.0.0
	 **/
	function emerce__wp_kses($string = '')
	{
		return wp_kses($string, [
			'a' => [
				'class' => [],
				'href' => [],
				'target' => []
			],
			'code' => [
				'class' => []
			],
			'strong' => [],
			'br' => [],
			'em' => [],
			'p' => [
				'class' => []
			],
			'span' => [
				'class' => []
			],
		]);
	}
endif;


if(!function_exists('emerce__implode_html_attributes')):
	/**
	 * Implode and escape HTML attributes for output.
	 *
	 * @since 1.9.4
	 * @param array $raw_attributes Attribute name value pairs.
	 * @return string
	 */
	function emerce__implode_html_attributes( $raw_attributes ) {

		$rendered_attributes = [];

		foreach ( $raw_attributes as $attribute_key => $attribute_values ) {
			if ( is_array( $attribute_values ) ) {
				$attribute_values = implode( ' ', $attribute_values );
			}

			$rendered_attributes[] = sprintf( '%1$s="%2$s"', $attribute_key, esc_attr( $attribute_values ) );
		}

		return implode( ' ', $rendered_attributes );
	}
endif;


if(!function_exists('emerce__valid_url')):
	/**
	 * Checks for valid 200 response code
	 *
	 * @since 2.4.0
	 **/
	function emerce__valid_url($url)
	{

		$response = wp_safe_remote_get( $url );

		if ( is_wp_error( $response ) ) {
			return false;
		}

		return 200 === wp_remote_retrieve_response_code( $response );
	}
endif;

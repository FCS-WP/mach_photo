<?php
// Register Custom Post Type Emerce Header
function emerceheader_cpt() {

	$labels = array(
		'name' => _x( 'Emerce Headers', 'Post Type General Name', 'emerce' ),
		'singular_name' => _x( 'Emerce Header', 'Post Type Singular Name', 'emerce' ),
		'menu_name' => _x( 'Emerce Headers', 'Admin Menu text', 'emerce' ),
		'name_admin_bar' => _x( 'Emerce Header', 'Add New on Toolbar', 'emerce' ),
		'archives' => __( 'Emerce Header Archives', 'emerce' ),
		'attributes' => __( 'Emerce Header Attributes', 'emerce' ),
		'parent_item_colon' => __( 'Parent Emerce Header:', 'emerce' ),
		'all_items' => __( 'Header Blocks', 'emerce' ),
		'add_new_item' => __( 'Add New Emerce Header', 'emerce' ),
		'add_new' => __( 'Add New Header', 'emerce' ),
		'new_item' => __( 'New Emerce Header', 'emerce' ),
		'edit_item' => __( 'Edit Emerce Header', 'emerce' ),
		'update_item' => __( 'Update Emerce Header', 'emerce' ),
		'view_item' => __( 'View Emerce Header', 'emerce' ),
		'view_items' => __( 'View Emerce Headers', 'emerce' ),
		'search_items' => __( 'Search Emerce Header', 'emerce' ),
		'not_found' => __( 'Not found', 'emerce' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'emerce' ),
		'featured_image' => __( 'Featured Image', 'emerce' ),
		'set_featured_image' => __( 'Set featured image', 'emerce' ),
		'remove_featured_image' => __( 'Remove featured image', 'emerce' ),
		'use_featured_image' => __( 'Use as featured image', 'emerce' ),
		'insert_into_item' => __( 'Insert into Emerce Header', 'emerce' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Emerce Header', 'emerce' ),
		'items_list' => __( 'Emerce Headers list', 'emerce' ),
		'items_list_navigation' => __( 'Emerce Headers list navigation', 'emerce' ),
		'filter_items_list' => __( 'Filter Emerce Headers list', 'emerce' ),
	);

	$args = array(
		'label' => __( 'Emerce Header', 'emerce' ),
		'description' => __( '', 'emerce' ),
		'labels' => $labels,
		'menu_icon' => '',
		'supports' => array('title', 'editor'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => 'emerce-admin-menu',
		'menu_position' =>3,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => false,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'rewrite' => false,
	);
	register_post_type( 'emerce_header', $args );

}
add_action( 'init', 'emerceheader_cpt', 0 );

function emercefooter_cpt() {

	$labels = array(
		'name' => _x( 'Emerce Footers', 'Post Type General Name', 'emerce' ),
		'singular_name' => _x( 'Emerce Footer', 'Post Type Singular Name', 'emerce' ),
		'menu_name' => _x( 'Emerce Footers', 'Admin Menu text', 'emerce' ),
		'name_admin_bar' => _x( 'Emerce Footer', 'Add New on Toolbar', 'emerce' ),
		'archives' => __( 'Emerce Footer Archives', 'emerce' ),
		'attributes' => __( 'Emerce Footer Attributes', 'emerce' ),
		'parent_item_colon' => __( 'Parent Emerce Footer:', 'emerce' ),
		'all_items' => __( 'Footer Blocks', 'emerce' ),
		'add_new_item' => __( 'Add New Emerce Footer', 'emerce' ),
		'add_new' => __( 'Add New', 'emerce' ),
		'new_item' => __( 'New Emerce Footer', 'emerce' ),
		'edit_item' => __( 'Edit Emerce Footer', 'emerce' ),
		'update_item' => __( 'Update Emerce Footer', 'emerce' ),
		'view_item' => __( 'View Emerce Footer', 'emerce' ),
		'view_items' => __( 'View Emerce Footers', 'emerce' ),
		'search_items' => __( 'Search Emerce Footer', 'emerce' ),
		'not_found' => __( 'Not found', 'emerce' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'emerce' ),
		'featured_image' => __( 'Featured Image', 'emerce' ),
		'set_featured_image' => __( 'Set featured image', 'emerce' ),
		'remove_featured_image' => __( 'Remove featured image', 'emerce' ),
		'use_featured_image' => __( 'Use as featured image', 'emerce' ),
		'insert_into_item' => __( 'Insert into Emerce Footer', 'emerce' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Emerce Footer', 'emerce' ),
		'items_list' => __( 'Emerce Footers list', 'emerce' ),
		'items_list_navigation' => __( 'Emerce Footers list navigation', 'emerce' ),
		'filter_items_list' => __( 'Filter Emerce Footers list', 'emerce' ),
	);

	$args = array(
		'label' => __( 'Emerce Footer', 'emerce' ),
		'description' => __( '', 'emerce' ),
		'labels' => $labels,
		'menu_icon' => '',
		'supports' => array('title', 'editor'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => 'emerce-admin-menu',
		'menu_position' => 4,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => false,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'rewrite' => false,
	);
	register_post_type( 'emerce_footer', $args );

}
add_action( 'init', 'emercefooter_cpt', 0 );


// Get block id by ID or slug.
function emerce_get_block_id( $post_id ) {
  global $wpdb;

  if ( empty ( $post_id ) ) {
    return null;
  }

  // Get post ID if using post_name as id attribute.
  if ( ! is_numeric( $post_id ) ) {
    $post_id = $wpdb->get_var(
      $wpdb->prepare(
        "SELECT ID FROM $wpdb->posts WHERE post_type = 'emerce_block' AND post_name = %s",
        $post_id
      )
    );
  }

  // Polylang support.
  if ( function_exists( 'pll_get_post' ) ) {
    if ( $lang_id = pll_get_post( $post_id ) ) {
      $post_id = $lang_id;
    }
  }

  // WPML Support.
  if ( function_exists( 'icl_object_id' ) ) {
    if ( $lang_id = icl_object_id( $post_id, 'emerce_block', false, ICL_LANGUAGE_CODE ) ) {
      $post_id = $lang_id;
    }
  }

  return $post_id;
}
// Register Custom Post Type emerce_block
function emerce_create_block_cpt() {

	$labels = array(
		'name' => _x( 'Emerce Blocks', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Emerce Block', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Emerce Block', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Emerce Block', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Block Archives', 'textdomain' ),
		'attributes' => __( 'Block Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent emerce_block:', 'textdomain' ),
		'all_items' => __( 'Emerce Blocks', 'textdomain' ),
		'add_new_item' => __( 'Add New Block', 'textdomain' ),
		'add_new' => __( 'Add New Block', 'textdomain' ),
		'new_item' => __( 'New Block', 'textdomain' ),
		'edit_item' => __( 'Edit Block', 'textdomain' ),
		'update_item' => __( 'Update Block', 'textdomain' ),
		'view_item' => __( 'View Block', 'textdomain' ),
		'view_items' => __( 'View Block', 'textdomain' ),
		'search_items' => __( 'Search Block', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Block', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Block', 'textdomain' ),
		'items_list' => __( 'Block list', 'textdomain' ),
		'items_list_navigation' => __( 'Block list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Block list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Block', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-editor-ul',
		'supports' => array('title', 'editor', 'thumbnail'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => 'emerce-admin-menu',
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => false,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => true,
		'show_in_rest' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'emerce_block', $args );

}
add_action( 'init', 'emerce_create_block_cpt', 0 );
function my_edit_emerce_block_columns() {
	$columns = array(
		'cb'        => '<input type="checkbox" />',
		'title'     => __( 'Title', 'emerce' ),
		'shortcode' => __( 'Shortcode', 'emerce' ),
		'date'      => __( 'Date', 'emerce' ),
	);

	return $columns;
}

add_filter( 'manage_edit-emerce_block_columns', 'my_edit_emerce_block_columns' );

function my_manage_emerce_block_columns( $column, $post_id ) {
	$post_data = get_post( $post_id, ARRAY_A );
	$slug      = $post_data['post_name'];
	add_thickbox();
	switch ( $column ) {
		case 'shortcode':
			echo '<textarea style="min-width: 60%;
    max-height: 27px;
    background: #FBEEE6;
    border-color: #FBEEE6;
    color: #28170E;
    font-size: 14px;
    margin-top: 5px;
">[emerce_block id="' . $slug . '"]</textarea>';
			break;
	}
}

add_action( 'manage_emerce_block_posts_custom_column', 'my_manage_emerce_block_columns', 10, 2 );


/**
 * Disable gutenberg support for now.
 *
 * @param bool   $use_emerce_block_editor Whether the post type can be edited or not. Default true.
 * @param string $post_type        The post type being checked.
 *
 * @return bool
 */
function emerce_block_disable_gutenberg( $use_emerce_block_editor, $post_type ) {
	return $post_type === 'emerce_block' ? false : $use_emerce_block_editor;
}

add_filter( 'use_emerce_block_editor_for_post_type', 'emerce_block_disable_gutenberg', 10, 2 );
add_filter( 'gutenberg_can_edit_post_type', 'emerce_block_disable_gutenberg', 10, 2 );


/**
 * Update emerce_block preview URL
 */
function setec_emerce_block_scripts() {
	global $typenow;
	if ( 'emerce_block' == $typenow && isset( $_GET["post"] ) ) {
		?>
		<script>
          jQuery(document).ready(function ($) {
            var emerce_block_id = $('input#post_name').val()
            $('#submitdiv').
              after('<div class="postbox"><h2 class="hndle">Shortcode</h2><div class="inside"><p><textarea style="width:100%; max-height:30px;">[emerce_block id="' + emerce_block_id +
                '"]</textarea></p></div></div>')
          })
		</script>
		<?php
	}
}

add_action( 'admin_head', 'setec_emerce_block_scripts' );

function setec_emerce_block_frontend() {
	if ( isset( $_GET["emerce_block"] ) ) {
		?>
		<script>
          jQuery(document).ready(function ($) {
            $.scrollTo('#<?php echo esc_attr( $_GET["emerce_block"] );?>', 300, {offset: -200})
          })
		</script>
		<?php
	}
}

add_action( 'wp_footer', 'setec_emerce_block_frontend' );

function emerce_block_shortcode( $atts, $content = null ) {
	global $post;

	extract( shortcode_atts( array(
			'id' => '',
		),
			$atts
		)
	);

	// Abort if ID is empty.
	if ( empty ( $id ) ) {
		return '<p><mark>No emerce_block ID is set</mark></p>';
	}



	if ( is_home() ) $post = get_post( get_option('page_for_posts') );

	$post_id  = emerce_get_block_id( $id );
	$the_post = $post_id ? get_post( $post_id, OBJECT, 'display' ) : null;

	if ( $the_post ) {
	      if (  did_action( 'elementor/loaded' ) ) {
	        $html = \Elementor\Plugin::$instance->frontend->get_builder_content( intval($post_id) );
	    } else {
		$html = $the_post->post_content;
	    }

		if ( empty( $html ) ) {
			$html = '<p class="lead shortcode-error">Open this in Elementor to add and edit content</p>';
		}

		// Add edit link for admins.
		if ( isset( $post ) && current_user_can( 'edit_pages' )
		     && ! is_customize_preview()
		     && function_exists( 'setec_builder_is_active' )
		     && ! setec_builder_is_active() ) {
			$edit_link         = setec_builder_edit_url( $post->ID, $post_id );
			$edit_link_backend = admin_url( 'post.php?post=' . $post_id . '&action=edit' );
			$html              = '<div class="emerce_block-edit-link" data-title="Edit Block: ' . get_the_title( $post_id ) . '"   data-backend="' . esc_url( $edit_link_backend )
			                     . '" data-link="' . esc_url( $edit_link ) . '"></div>' . $html . '';
		}
	} else {
		$html = '<p class="text-center"><mark>Block <b>"' . esc_html( $id ) . '"</b> not found</mark></p>';
	}

	return do_shortcode( $html );
}

add_shortcode( 'emerce_block', 'emerce_block_shortcode' );


if ( ! function_exists( 'emerce_block_categories' ) ) {
	/**
	 * Add emerce_block categories support
	 */
	function emerce_block_categories() {
		$args = array(
			'hierarchical'      => true,
			'public'            => false,
			'show_ui'           => true,
			'show_in_nav_menus' => true,
		);
		register_taxonomy( 'emerce_block_categories', array( 'emerce_block' ), $args );

	}

	// Hook into the 'init' action
	add_action( 'init', 'emerce_block_categories', 0 );
}

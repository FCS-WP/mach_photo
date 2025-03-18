<?php

if ( ! function_exists( 'emerce_custom_widget_init' ) ) {
	function emerce_custom_widget_init() {
	    $emerce_options = get_option( 'emerce_options' );
	    $emerce_custom_sidebars = $emerce_options['custom_sidebar'];
			if ($emerce_custom_sidebars) {
				foreach($emerce_custom_sidebars as $emerce_custom_sidebar) :
				$heading = $emerce_custom_sidebar['sidebar_name'];
				$own_id = preg_replace('/[^a-z]/', "-", strtolower($heading));
				$desc = $emerce_custom_sidebar['sidebar_desc'];

				register_sidebar( array(
					'name' => esc_html($heading),
					'id' => $own_id,
					'description' => esc_html($desc),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h3 class="widget-title">',
					'after_title' => '</h3>',
				) );
				endforeach;
			}
		}
	add_action( 'widgets_init', 'emerce_custom_widget_init' );
}
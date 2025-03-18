<?php
/* Compress CSS */
if ( ! function_exists( 'emerce_compress_css_lines' ) ) {
  function emerce_compress_css_lines( $css ) {
    $css  = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
    $css  = str_replace( ': ', ':', $css );
    $css  = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );
    return $css;
  }
}

/* Inline Style */
global $all_inline_styles;
$all_inline_styles = array();
if( ! function_exists( 'add_inline_style' ) ) {
  function add_inline_style( $style ) {
    global $all_inline_styles;
    array_push( $all_inline_styles, $style );
  }
}

/* Support WordPress uploader to following file extensions */
if( ! function_exists( 'emerce_upload_mimes' ) ) {
  function emerce_upload_mimes( $mimes ) {

    $mimes['ttf']   = 'font/ttf';
    $mimes['eot']   = 'font/eot';
    $mimes['svg']   = 'font/svg';
    $mimes['woff']  = 'font/woff';
    $mimes['otf']   = 'font/otf';

    return $mimes;

  }
  add_filter( 'upload_mimes', 'emerce_upload_mimes' );
}
#-----------------------------------------------------------------#
# RGB to HEX Converter
#-----------------------------------------------------------------#/

if ( ! function_exists( 'emerce_rgb_to_hex' ) ) :
function emerce_rgb_to_hex( $color ) {

	$pattern = "/(\d{1,3})\,?\s?(\d{1,3})\,?\s?(\d{1,3})/";

	// Only if it's RGB
	if ( preg_match( $pattern, $color, $matches ) ) {
	  $r = $matches[1];
	  $g = $matches[2];
	  $b = $matches[3];

	  $color = sprintf("#%02x%02x%02x", $r, $g, $b);
	}

	return $color;
}
endif;

#-----------------------------------------------------------------#
# HEX to RGB Converter
#-----------------------------------------------------------------#/

function emerce_hexto_rgb($color, $opacity = false) {

    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if(empty($color))
        return $default;

    //Sanitize $color if "#" is provided
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    $rgb =  array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if($opacity){
        if(abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
        $output = 'rgb('.implode(",",$rgb).')';
    }

    //Return rgb(a) color string
    return $output;
}

if ( ! function_exists( 'emerce_single_blog_social' ) ) :
function emerce_single_blog_social() {

    $dmsocialURL = urlencode(get_permalink());

    // Get current page title
    $dmsocialTitle = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));


    // Construct sharing URL without using any script
    $twitterURL = 'https://twitter.com/share?url=' . $dmsocialURL . '&amp;text=' . $dmsocialTitle;
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$dmsocialURL;
    $googleURL = 'https://plus.google.com/share?url='.$dmsocialURL;
    $bufferURL = 'https://bufferapp.com/add?url='.$dmsocialURL.'&amp;text='.$dmsocialTitle;
    $whatsappURL = 'whatsapp://send?text='.$dmsocialTitle . ' ' . $dmsocialURL;
    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$dmsocialURL.'&amp;title='.$dmsocialTitle;

    // Based on popular demand added Pinterest too
    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$dmsocialURL.'&amp;description='.$dmsocialTitle;

    echo '<ul class="emerce-single-social-button">';
    echo '<li><a href="'.$facebookURL.'" target="_blank" class="facebook"><i class="ri-facebook-fill"></i></a></li>';
    echo '<li><a href="'.$twitterURL.'" target="_blank" class="twitter"><i class="ri-twitter-fill"></i></a></li>';
    echo '<li><a href="'.$pinterestURL.'" target="_blank" class="pinterest"><i class="ri-pinterest-fill"></i></a></li>';
     echo '<li><a href="'.$linkedInURL.'" target="_blank" class="linkedin"><i class="ri-linkedin-fill"></i></a></li>';
    echo'</ul>';


};
endif;
<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
#-----------------------------------------------------------------#
# Theme Option Compatibility
#-----------------------------------------------------------------#/
if (class_exists('Emerce_Core')) {

    function cs_get_option($option, $name = NULL, $default = NULL)
    {
        $base_options = get_option('emerce_options');

        if ($name == NULL) {

            if (isset($base_options[$option])) {
                return $base_options[$option];
            } else {
                return false;
            }

        } else if (isset($base_options[$option][$name])) {

            return $base_options[$option][$name];

        } else if ($default != NULL) {

            return $default;

        } else {

            return false;

        }
    }


} else {
    function cs_get_option($option_name = '', $default = '')
    {
        return false;
    }

}

/*
      Register Fonts
      */
function emerce_fonts_url()
{
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $quicksand = _x('on', 'Lora font: on or off', 'emerce');

    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x('on', 'Open Sans font: on or off', 'emerce');

    if ('off' !== $quicksand || 'off' !== $open_sans) {
        $font_families = array();

        if ('off' !== $quicksand) {
            $font_families[] = 'Quicksand:500,600,700';
        }

        if ('off' !== $open_sans) {
            $font_families[] = 'Open Sans:700italic,400,800,600';
        }

        $query_args = array(
            'family' => urlencode(implode('|', $font_families)),
            'subset' => urlencode('latin,latin-ext'),
        );

        $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
    }

    return esc_url_raw($fonts_url);
}
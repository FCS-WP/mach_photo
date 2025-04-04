<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined('ABSPATH') || exit;
$productglobalmeta = get_post_meta(get_the_ID(), 'woo_Gallery_option_global', true);

if ($productglobalmeta == true) {
    $gallerytoption = get_post_meta(get_the_ID(), 'meta_woo_thumb_style', true);

} else {
    $gallerytoption = cs_get_option('main_woo_thumb_style');
}
// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
//if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
//return;
//}

if ($gallerytoption == 'lside') {
    wc_get_template_part('single-product/product-image', 'left');
    return;
}

if ($gallerytoption == 'rside') {
    wc_get_template_part('single-product/product-image', 'right');
    return;
}

if ($gallerytoption == 'grid') {
    wc_get_template_part('single-product/product-image', 'grid');
    return;
}

if ($gallerytoption == 'single') {
    wc_get_template_part('single-product/product-image', 'single');
    return;
}
global $product, $post;





$columns = apply_filters('woocommerce_product_thumbnails_columns', 4);
$post_thumbnail_id = get_post_thumbnail_id($post->ID);
$full_size_image = wp_get_attachment_image_src($post_thumbnail_id, 'full');
$image_title = get_post_field('post_excerpt', $post_thumbnail_id);
$placeholder = $product->get_image_id() ? 'with-images' : 'without-images';
$wrapper_classes = apply_filters('woocommerce_single_product_image_gallery_classes', array(
    'woocommerce-product-gallery',
    'woocommerce-product-gallery--' . ($product->get_image_id() ? 'with-images' : 'without-images'),
    'woocommerce-product-gallery--columns-' . absint($columns),
    'images',
));


$attachment_ids = $product->get_gallery_image_ids();
$thumb_count = count($attachment_ids);
if ($thumb_count < 2) {
   $slider_classes =  array('product-gallery-slider', 'slider', 'slider-nav-bottom', 'has-image-zoom','emrce_slider-single-image');
} else {
$slider_classes = array('product-gallery-slider', 'slider', 'slider-nav-bottom', 'has-image-zoom');
}


$rtl = 'false';
if (is_rtl()) $rtl = 'true';
?>
<div class="pivoo-product-sale-tag absolute flex items-start">
    <?php
    $postdate = get_the_time('Y-m-d'); // Post date
    $postdatestamp = strtotime($postdate);

    $riboontext = get_theme_mod('recent_ribbon_text', 'New'); // Newness in days

    $newness = get_theme_mod('recent_ribbon_time', '30'); // Newness in days
    if ((time() - (60 * 60 * 24 * $newness)) < $postdatestamp) { // If the product was published within the newness time frame display the new badge
        echo '<span class="pivoo-new-tag">NEW</span>';
    }

    ?>

    <?php woocommerce_show_product_loop_sale_flash(); ?>
    <?php pivoo_woo_sale_hook(); ?>

</div>
<div class="single-emerce-img-bpx-css <?php echo esc_attr(implode(' ', array_map('sanitize_html_class', $wrapper_classes))); ?>"
     data-columns="<?php echo esc_attr($columns); ?>">

    <figure class="woocommerce-product-gallery__wrapper <?php echo implode(' ', $slider_classes); ?>"
            data-flickity='{
                "cellAlign": "center",
                "wrapAround": true,
                "autoPlay": false,
                "prevNextButtons":true,
                "adaptiveHeight": true,
                "imagesLoaded": true,
                "lazyLoad": 1,
                "dragThreshold" : 15,
                "pageDots": false,
                "rightToLeft": <?php echo esc_attr($rtl); ?>
       }'>
        <?php
        $attributes = array(
            'class' => 'single-product-img',
            'title' => get_post_field('post_title', $post_thumbnail_id),
            'data-caption' => get_post_field('post_excerpt', $post_thumbnail_id),
            'data-src' => $full_size_image[0],
            'data-large_image' => $full_size_image[0],
            'data-flickity-lazyload' => $full_size_image[0],
            'data-large_image_width' => $full_size_image[1],
            'data-large_image_height' => $full_size_image[2],
        );

        if (has_post_thumbnail()) {
            $html = '<div data-thumb="' . get_the_post_thumbnail_url($post->ID, 'shop_thumbnail') . '" class="woocommerce-product-gallery__image product-gallery-cell">';
            $html .= get_the_post_thumbnail($post->ID, 'shop_single', $attributes);
            $html .= '</div>';
        } else {
            $html = '<div class="woocommerce-product-gallery__image--placeholder product-gallery-cell">';
            $html .= sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src('woocommerce_single')), esc_html__('Awaiting product image', 'emerce'));
            $html .= '</div>';
        }

        echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id($post->ID));

        do_action('woocommerce_product_thumbnails');
        ?>


    </figure>
</div>

<?php wc_get_template('single-product/product-gallery-thumbnails.php'); ?>

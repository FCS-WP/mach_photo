<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;
$page_meta = get_post_meta(get_the_ID(), 'pivoo_page_options', true);

if (class_exists('Emerce_Core')) {
    if (is_tax('product_cat')) {
        $catmeta = get_term_meta(get_queried_object_id(), 'emerce_woo_cat_options', true);
        $emerce_gallery_opt = $catmeta['category_gallery_em'];
        $emcat_gallery_ids = explode(',', $emerce_gallery_opt);

        $thumb_count = count($emcat_gallery_ids) + 1;

        if ($thumb_count <= 2) {
            $gallery_class = 'slider-no-dot';
        } else {
            $gallery_class = 'slider-with-dot';
        }
    }
}
$hide_breadcrumb = (!empty($page_meta['page_breadcrumb'])) ? $page_meta['page_breadcrumb'] : '';
$page_width = (!empty($page_meta['page_width'])) ? $page_meta['page_width'] : 'container';
$page_b_style = (!empty($page_meta['page_breadcrumb_style'])) ? $page_meta['page_breadcrumb_style'] : '';
if ($page_b_style == 'custom-style') {
    $global_page_icon = (!empty($page_meta['custom_page_icon'])) ? $page_meta['custom_page_icon'] : '';
} else {
    $global_page_icon = cs_get_option('global_page_icon');
}
$desktopcol = cs_get_option('emerce-archive-col');
$mobcol = cs_get_option('emerce-archive-col-mob');
$filterpanel = cs_get_option('emerce-ach-filter-type');
$mobicustomgap = cs_get_option('mob_custom_row_gap');
$filtertext = cs_get_option('emerce-filter-shortcode');

$archivelayout = cs_get_option('emerce-archive-type');
$sidebarposition = cs_get_option('archive-sidebar-position');

$title_hide_wd = cs_get_option('x_bd_width_set');
if ($title_hide_wd == true) {
    $containerxpc = 'container emerce-extended-container';
} else {
    $containerxpc = 'w-100';
}
$customrow_space = "";
if ($mobicustomgap=="on"){
    $customrow_space = "row-mob-smaller";
}
get_header('shop');


/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20 (Removed)
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

?>

<section class="<?php echo esc_html($containerxpc); ?>">
    <div class="emerce-common-breadcrumbs ">
        <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
            <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
            <?php woocommerce_breadcrumb(); ?>
        <?php endif; ?>

        <?php
        /**
         * Hook: woocommerce_archive_description.
         *
         * @hooked woocommerce_taxonomy_archive_description - 10
         * @hooked woocommerce_product_archive_description - 10
         */
        do_action('woocommerce_archive_description');
        ?>
    </div>
</section>

<section class="emerce-woo-archive-main">
    <div class="container">


        <?php if ($archivelayout == "sidebar"){ ?>
        <div class="row gx-6">
            <?php } else { ?>
            <div class="without-sidebar">
                <?php } ?>
                <?php if ($archivelayout == "sidebar" && $sidebarposition == "left") { ?>
                    <div class="d-none d-md-block col-12 col-md-3 emerce-product-archive-sidebar">
                        <?php dynamic_sidebar('emerce-woo-sidebar'); ?>
                    </div>
                <?php } ?>

                <?php if ($archivelayout == 'sidebar'){ ?>
                <div class="col-12 col-md-9">
                    <?php } else { ?>
                    <div class="w-100">
                        <?php } ?>

                        <?php
                        if (is_tax('product_cat')) {
                            if (!empty($emerce_gallery_opt)) {
                                ?>
                                <div class="emerce-woo-cat-carousel carousel <?php echo esc_html($gallery_class); ?>"
                                     data-flickity='{
                                    "cellAlign": "center",
                                    "wrapAround": true,
                                    "autoPlay": false,
                                    "prevNextButtons":false,
                                    "adaptiveHeight": true,
                                    "imagesLoaded": true,
                                    "lazyLoad": 1,
                                    "dragThreshold" : 15,
                                    "pageDots": true,
                                    "rightToLeft": false}'>
                                    <?php
                                    foreach ($emcat_gallery_ids as $em_gallery_id) {
                                        ?>
                                        <div class="emerce_cat_gallery_slider_item carousel-cell">
                                            <img src="<?php echo wp_get_attachment_url($em_gallery_id); ?>"
                                                 alt="<?php esc_html_e('Product Thumbnail', 'emerce'); ?>"
                                                 class="carousel-cell-image">
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php }
                        } ?>


                        <div class="row align-items-center">
                            <div class="col-12 col-md-4 pivoo-total-product-count">
                                <?php woocommerce_result_count(); ?>
                            </div>

                            <div class="col-4 col-md-4 emerce-product-filter-b">

                                <?php if ($archivelayout == "sidebar") { ?>
                                    <div class="d-md-none emerce-mobile-filter-sidebar">
                                        <button class="emerce-m-filter-btn" type="button" data-bs-toggle="offcanvas"
                                                data-bs-target="#emerceCatCanvas" aria-controls="emerceCatCanvas">
                                            <i class="ri-equalizer-line"></i>
                                        </button>

                                        <div class="offcanvas offcanvas-start" tabindex="-1" id="emerceCatCanvas"
                                             aria-labelledby="emerceCatCanvasLabel">

                                            <div class="offcanvas-body">
                                                <?php dynamic_sidebar('emerce-woo-sidebar'); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php if ($filterpanel == "droppanel") { ?>
                                    <a href="javascript:void(0);" class="emerce-product-toogle-btn"><i
                                                class="ri-equalizer-line"></i>
                                        <span><?php esc_html_e('Filter', 'emerce'); ?></span></a>
                                <?php } elseif ($filterpanel == "off-canvas") { ?>
                                    <button class="emerce-filter-offcanvas-btn" data-bs-toggle="offcanvas"
                                            data-bs-target="#emerceproductfilter" aria-controls="emerceproductfilter">
                                        <i class="ri-equalizer-line"></i>
                                        <span><?php esc_html_e('Filter', 'emerce'); ?></span>
                                    </button>
                                <?php } ?>
                            </div>
                            <div class="col-8 col-md-4 pivoo-product-filter text-md-end">
                                <?php woocommerce_catalog_ordering(); ?>
                            </div>
                        </div>
                        <?php if ($filterpanel == "droppanel") { ?>
                            <div class="emerce-filter-toogle-box">
                                <?php echo do_shortcode('[yith_wcan_filters slug="' . $filtertext . '"]'); ?>
                            </div>
                        <?php } elseif ($filterpanel == "off-canvas") { ?>
                            <div class="emerce-filter-canvas offcanvas offcanvas-start" tabindex="-1"
                                 id="emerceproductfilter" aria-labelledby="emerceproductfilterLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="emerceproductfilterLabel">Filter</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <?php echo do_shortcode('[yith_wcan_filters slug="' . $filtertext . '"]'); ?>

                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($desktopcol){ ?>
                        <div class="pivoo-shop-product-grid row <?php echo esc_html($customrow_space);?> row-<?php echo esc_html($mobcol); ?> row-cols-<?php echo esc_html($desktopcol); ?>">
                            <?php } else { ?>
                            <div class="pivoo-shop-product-grid row row-cols-1 row-cols-md-3">
                                <?php } ?>


                                <?php if (wc_get_loop_prop('total')) {
                                    while (have_posts()) {
                                        the_post();

                                        /**
                                         * Hook: woocommerce_shop_loop.
                                         */
                                        do_action('woocommerce_shop_loop');

                                        wc_get_template_part('content', 'product');
                                    }
                                }


                                ?>
                            </div>
                            <?php
                            /**
                             * Hook: woocommerce_after_shop_loop.
                             *
                             * @hooked woocommerce_pagination - 10
                             */
                            do_action('woocommerce_after_shop_loop');

                            ?>


                            <?php if ($archivelayout == "sidebar" && $sidebarposition == "right") { ?>
                                <div class="col-12 d-none d-md-block col-md-3 emerce-product-archive-sidebar">
                                    <?php dynamic_sidebar('emerce-woo-sidebar'); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

</section>

<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

?>
<?php

get_footer('shop');

?>

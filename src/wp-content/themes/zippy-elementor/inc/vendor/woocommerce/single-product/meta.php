<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce/Templates
 * @version     3.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

global $product;
?>
<div class="product_meta flex">

    <?php do_action('woocommerce_product_meta_start'); ?>
    <?php do_action('emerce_seller_information_main');?>

    <?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>

        <span class="sku_wrapper d-flex meta-m-b"><span
                    class="pivoo-meta-titles"><?php esc_html_e('SKU:', 'emerce'); ?> </span> <span
                    class="sku"><?php echo maybe_unserialize($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'emerce'); ?></span></span>

    <?php endif; ?>

    <?php echo wc_get_product_category_list($product->get_id(), ', ', '<span class="posted_in d-flex meta-m-b"> <span class="pivoo-meta-titles">' . _n('Category:</span>', 'Categories: </span>', count($product->get_category_ids()), 'emerce') . ' ', '</span>'); ?>

    <?php echo wc_get_product_tag_list($product->get_id(), ', ', '<span class="tagged_as d-flex meta-m-b"> <span class="pivoo-meta-titles">' . _n('Tag: </span>', 'Tags: </span>', count($product->get_tag_ids()), 'emerce') . '  ', '</span>'); ?>

    <?php do_action('woocommerce_product_meta_end'); ?>

</div>

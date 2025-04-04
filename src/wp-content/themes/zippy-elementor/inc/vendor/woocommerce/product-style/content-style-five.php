<?php
global $product;
$product_id = get_the_ID();

?>
<div class="trending-products-st1">
    <div class="trending-product-st1-img">
        <a href="<?php the_permalink(); ?>" class="emerce-hover-thumb-woo">
            <?php
            /**
             *
             * @hooked emerce_woo_thumbnail - 11
             */
            do_action('emerce_woocommerce_shop_loop_images');
            ?>

        </a>
    </div>
    <div class="onesale">
        <?php pivoo_woo_sale_hook(); ?>
    </div>
    <?php emerce_out_of_stock(); ?>
    <div class="producticons-st3">
        <?php emerce_product_cart_card(); ?>
        <?php emerce_add_quick_view_card(); ?>
        <?php emerce_wishlist_icon_in_product_grid(); ?>
        <?php emerce_compare_icon_in_product_card(); ?>
    </div>
    <div class="product-content">

        <div class="gridSwatches">
            <?php
            do_action('emerce_swatches_grid_action');
            ?>

        </div>

        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <div class="sell-pro-price">
            <?php echo maybe_unserialize($product->get_price_html()); ?>
        </div>
    </div>
</div>
                        
    
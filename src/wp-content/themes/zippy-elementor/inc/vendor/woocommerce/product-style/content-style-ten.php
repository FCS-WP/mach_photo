<?php
global $product;
$product_id = get_the_ID();
?>


<div class="trending-products-v6-single emerce-product-stl-ten">
    <div class="product-img-v6">
    <a href="<?php the_permalink(); ?>" class="emerce-hover-thumb-woo">
            <?php
            /**
             *
             * @hooked emerce_woo_thumbnail - 11
             */
            do_action('emerce_woocommerce_shop_loop_images');
            ?>
        </a>

        <div class="product-icons-v6">
            <?php emerce_add_quick_view_card(); ?>
            <?php emerce_wishlist_icon_in_product_grid(); ?>
            <?php emerce_compare_icon_in_product_card(); ?>
        </div>
    </div>

    <div class="product-content-v6">
        <div class="product-seller-info">
            <?php do_action('emerce_seller_information_main'); ?>
        </div>
         <div class="pro-review">
                                <?php emerce_get_star_rating(); ?>
                                    <span class="product-review-count">
                                        (<?php echo $product->get_review_count(); ?> <?php _e('Review', 'emerce-core'); ?>)
                                    </span>
                                </div>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="sell-pro-price">
        <?php echo maybe_unserialize($product->get_price_html()); ?>
        </div>
        <div class="product-spacification-v6">
            <ul>
                <?php if(wc_get_product_category_list($product->get_id())){?>
                <li><?php echo wc_get_product_category_list($product->get_id()); ?></li>
                <?php } ?>
                <?php if(wc_get_product_tag_list($product->get_id())){?>
                <li><?php echo wc_get_product_tag_list($product->get_id()); ?></li>
                <?php } ?>
            </ul>
        </div>                                        
    </div>
</div>
<?php
global $product;
$product_id = get_the_ID();
?>


  <div class="weekly-deal-single-product product-style-eleven">                                
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('emerce-woo-product-square'); ?>
                                </a>
                                <div class="onesale">
                                    <?php pivoo_woo_sale_hook();?>
                                </div>
                                <div class="weekly-deal-single-product-icons">
                                   <?php emerce_add_quick_view_card(); ?>
                                    <?php emerce_wishlist_icon_in_product_grid(); ?>
                                    <?php emerce_compare_icon_in_product_card(); ?>
                                </div>
                                <div class="weekly-deal-single-product-cat">
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
                                <div class="weekly-deal-single-product-cart-btn">
                                <?php
        if (function_exists('woocommerce_template_loop_add_to_cart')) {
            woocommerce_template_loop_add_to_cart();
        }   ?>
                                </div>                            
                            </div>
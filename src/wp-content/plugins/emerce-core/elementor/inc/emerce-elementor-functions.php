<?php

function show_reviewer_image($reviewlist)
{ ?>
    <div id="clientthumbmySwiper" class="swiper clientthumbmySwiper">
        <div class="swiper-wrapper">
            <?php foreach ($reviewlist as $review) { ?>
                <div class="swiper-slide">
                    <img src="<?php echo esc_url($review['reviewer_image']['url']); ?>" alt="">
                </div>
            <?php } ?>
        </div>
    </div>
    <?php  }






if (!function_exists('emerce_product_featured_grid_one')) {

    function emerce_product_featured_grid_one($the_query, $settings)
    { ?>

        <div class="top-selling-product-v6-area">

            <div class="row">
                <div class="col-lg-4 g-0">

                    <?php
                    if ($the_query) {
                        for ($i = 0; $i < 3; $i++) {
                            $the_query->the_post();
                            global $product;
                    ?>

                            <div class="v6-single-top-selling-product">
                                <div class="v6-single-top-selling-image">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('product-featured-grid'); ?></a>
                                    <div class="wishlist-icon-v6">
                                        <?php emerce_add_quick_view_card(); ?>
                                        <?php emerce_wishlist_icon_in_product_grid(); ?>
                                    </div>
                                </div>
                                <div class="v6-single-top-selling-content">
                                    <div class="tsp-cat">
                                        <?php  if (class_exists('WeDevs_Dokan')) { ?>
                                        <?php do_action('emerce_seller_information_main');?>
                                        <?php } else { ?>
                                        <?php echo wc_get_product_category_list($product->get_id()); ?>
                                        <?php } ?>
                                    </div>
                                    <div class="pro-review-v6">
                                        <?php emerce_get_star_rating(); ?>
                                        <span class="product-review-count">(<?php echo  $product->get_review_count(); ?> <?php _e('Review', 'emerce-core'); ?>)</span>
                                    </div>
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <div class="price-cart">
                                        <div class="sell-pro-price">
                                            <?php woocommerce_template_loop_price(); ?>
                                        </div>                                        
                                    </div>                                    
                                </div>
                                <div class="cart-icon-v6">
                                            <?php emerce_product_cart_card(); ?>
                                    </div>
                            </div>
                    <?php

                        }
                    } ?>

                </div>



                <div class="col-lg-4 g-0">
                    <?php $featured_grid_count = $the_query->post_count - 3;
                    if ($the_query->have_posts() && $featured_grid_count > 0) {

                        for ($i = 0; $i < 1; $i++) {
                            $the_query->the_post();
                            global $product;
                    ?>
                            <div class="v6-single-top-selling-product-offer">
                                <div class="sp-offer-top-selling-image">
                                    <a href="<?php the_permalink(); ?>" class="emerce-hover-thumb-woo">
                                        <?php
                                        /**
                                         *
                                         * @hooked emerce_woo_thumbnail - 11
                                         */
                                        do_action('emerce_woocommerce_shop_loop_images');
                                        ?>
                                    </a>
                                    <span class="offer-text-v6"><?php echo $settings['extra_text_one']; ?></span>
                                    <div class="product-icons-v6">
                                        <?php emerce_product_cart_card(); ?>
                                        <?php emerce_add_quick_view_card(); ?>
                                        <?php emerce_wishlist_icon_in_product_grid(); ?>
                                    </div>

                                </div>
                                <div class="v6-single-top-selling-content">
                                    <div class="pro-review-v6">
                                        <?php emerce_get_star_rating(); ?>
                                        <span class="product-review-count">(<?php echo  $product->get_review_count(); ?> <?php _e('Review', 'emerce-core'); ?>)</span>
                                    </div>
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <div class="price-cart">
                                        <div class="sp-offer-pro-price">
                                            <?php woocommerce_template_loop_price(); ?>
                                        </div>
                                    </div>
                                    <?php 

                                        $p_stock = $product->get_manage_stock();                                       
                                        $p_sale = $product->get_total_sales();
                                        if($p_stock){
                                        $progress_cal = $p_stock *  $p_sale / $p_stock;
                                        $progress_pr = 100 - $progress_cal;
                                        }

                                    ?>
                                    
                                    <div class="product-progress-status">
                                        <style>
                                            .product-progress-status:before{
                                                width: <?php echo $progress_pr; ?>%
                                            }
                                        </style>
                                    </div>
                                    <?php if($p_stock){ ?>
                                    <div class="product-availablity">
                                        <p><?php _e('Avaiable', 'emerce-core'); ?>: <span><?php echo $product->get_stock_quantity(); ?></span></p>
                                        <p><?php _e('Sell Product', 'emerce-core'); ?>: <span><?php  echo $product->get_total_sales(); ?></span></p>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>

                <div class="col-lg-4 g-0">

                    <?php
                    $featured_grid_count = $the_query->post_count - 4;
                    if ($the_query->have_posts() && $featured_grid_count > 0) {

                        for ($i = 0; $i < $featured_grid_count; $i++) {
                            $the_query->the_post();
                            global $product;
                    ?>


                            <div class="v6-single-top-selling-product">
                                <div class="v6-single-top-selling-image">

                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('product-featured-grid'); ?></a>

                                    <div class="wishlist-icon-v6">
                                        <?php emerce_add_quick_view_card(); ?>
                                        <?php emerce_wishlist_icon_in_product_grid(); ?>
                                    </div>
                                </div>
                                <div class="v6-single-top-selling-content">
                                    <div class="tsp-cat">
                                        <?php  if (class_exists('WeDevs_Dokan')) { ?>
                                        <?php do_action('emerce_seller_information_main');?>
                                        <?php } else { ?>
                                        <?php echo wc_get_product_category_list($product->get_id()); ?>
                                        <?php } ?>
                                    </div>
                                    <div class="pro-review-v6">
                                        <?php emerce_get_star_rating(); ?>
                                        <span class="product-review-count">(<?php echo  $product->get_review_count(); ?> <?php _e('Review', 'emerce-core'); ?>)</span>
                                    </div>
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <div class="price-cart">
                                        <div class="sell-pro-price">
                                            <?php woocommerce_template_loop_price(); ?>
                                        </div>
                                        <div class="cart-icon-v6">
                                            <?php emerce_product_cart_card(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <?php }
                    } ?>

                </div>
            </div>
        </div>


<?php
    }
}


if (!function_exists('emerce_product_featured_grid_two')) {

    function emerce_product_featured_grid_two($the_query, $settings)
    { ?>

<section class="recommend-product-grid-v6" style="margin-bottom: 100px;">                

                <div class="row">
                    <div class="col-lg-4">
                    <?php
                    if ($the_query) {
                        for ($i = 0; $i < 3; $i++) {
                            $the_query->the_post();
                            global $product;
                    ?>
                        <div class="single-recommend-v6">
                            <div class="recommend-v6-img">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('product-featured-grid'); ?></a>
                            </div>
                            <div class="recommend-v6-content">
                              <?php  if (class_exists('WeDevs_Dokan')) { ?>
                                        <?php do_action('emerce_seller_information_main');?>
                                        <?php } else { ?>
                                        <?php echo wc_get_product_category_list($product->get_id()); ?>
                                        <?php } ?>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="price-cart">
                                    <div class="sell-pro-price">
                                        <?php woocommerce_template_loop_price(); ?>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="cart-icon-v6">
                                <?php emerce_product_cart_card(); ?>
                            </div>
                        </div>
                        <?php }
                    } ?>
                    </div>


                    <div class="col-lg-4">
                    <?php $featured_grid_count = $the_query->post_count - 3;
                    if ($the_query->have_posts() && $featured_grid_count > 0) {

                        for ($i = 0; $i < 3; $i++) {
                            $the_query->the_post();
                            global $product;
                    ?>
                        <div class="single-recommend-v6">
                            <div class="recommend-v6-img">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('product-featured-grid'); ?></a>
                            </div>
                            <div class="recommend-v6-content">
                             <?php  if (class_exists('WeDevs_Dokan')) { ?>
                                        <?php do_action('emerce_seller_information_main');?>
                                        <?php } else { ?>
                                        <?php echo wc_get_product_category_list($product->get_id()); ?>
                                        <?php } ?>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="price-cart">
                                    <div class="sell-pro-price">
                                        <?php woocommerce_template_loop_price(); ?>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="cart-icon-v6">
                                <?php emerce_product_cart_card(); ?>
                            </div>
                        </div>
                        <?php }
                    } ?>
                    </div>

                    <div class="col-lg-4">
                    <?php $featured_grid_count = $the_query->post_count - 6;
                    if ($the_query->have_posts() && $featured_grid_count > 0) {

                        for ($i = 0; $i < 1; $i++) {
                            $the_query->the_post();
                            global $product;
                    ?>
                        <div class="single-recommend-v6-offer">
                            <div class="recommend-v6-offer-img">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('emerce-default-post-st-one'); ?></a>
                                
                                
                                <span class="recommend-offer-text-v6"><?php echo $settings['extra_text_one']; ?></span>
                                <div class="recommend-product-icons-v6">
                                    <?php emerce_product_cart_card(); ?>
                                    <?php emerce_add_quick_view_card(); ?>
                                    <?php emerce_wishlist_icon_in_product_grid(); ?>
                                </div>
                            </div>
                            <div class="recommend-v6-offer-content">                                 
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="price-cart">
                                    <div class="sp-offer-pro-price">
                                        <?php woocommerce_template_loop_price(); ?>
                                    </div>                                    
                                </div> 
                                
                                <div class="recommend-hurryup-text"><?php echo $settings['extra_text_two']; ?></div>
                                <div class="recommend-offer-countdown">
                                    <div class="days">
                                        <h5>07</h5>
                                        <p>Days</p>
                                    </div>
                                    <span> : </span>
                                    <div class="hours">
                                        <h5>06</h5>
                                        <p>Hrs</p>
                                    </div>
                                    <span> : </span>
                                    <div class="minutes">
                                        <h5>12</h5>
                                        <p>Mins</p>
                                    </div>
                                    <span> : </span>
                                    <div class="seconds">
                                        <h5>19</h5>
                                        <p>Secs</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } } ?>
                    </div>


                </div>




<?php
    }
}
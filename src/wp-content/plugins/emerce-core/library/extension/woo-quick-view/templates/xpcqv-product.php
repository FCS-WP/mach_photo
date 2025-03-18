<?php

global $post, $woocommerce, $product;
?>
<!-- close modal markup -->
<div class="modal-close">
	<a href="#" class="quick-view-close">
      <i class="ri-close-line"></i>
	</a>
</div>
<!-- close modal markup -->

<!-- product wrapper -->
<div <?php post_class('product product-wrapper'); ?>>
<div class="row">
  <div class="col-12 col-md-6 emerce-quick-v-thumb">
  <?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail(); ?>
    </a>
<?php endif; ?>
  </div>
  
   <div class="col-12 col-md-6">
     <div class="emerce-quickv-product-details">
          
                 <a href="<?php the_permalink();?>"> <h2 class="woocommerce-loop-product__title"><?php the_title();?></h2></a>
            
                    
              <?php do_action( 'woocommerce_single_product_quickview_summary' ); ?>


        </div>
  </div>
  </div>
	
	
</div>
<!-- product wrapper -->

<div class="clear quick-view-nav-wrapper">
	<?php if ( !empty( $prev_id ) ): ?>
		<a href="#" class="button <?php echo $prev_class; ?>">Prev</a>
	<?php endif; ?>
	<?php if ( !empty( $next_id ) ): ?>
		<a href="#" class="button <?php echo $next_class; ?>">Next</a>
	<?php endif; ?>
</div>
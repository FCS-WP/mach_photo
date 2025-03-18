<?php
/**
 *  Add Dynamic css to header
 * @version    1.0
 * @author        Teconce
 * @URI        http://teconce.com
 */




  /**
	 * Add extension CSS.
	 */
       function emerce_dynamic_css() {
           
           ob_start();
            $emerce_options = get_option( 'emerce_options' );
            $primarycolor = $emerce_options['color-set']['primary_color'];
            $primarytxcolor = $emerce_options['color-set']['primary-text-color'];
            $secndcolor = $emerce_options['color-set']['secondary-color'];
            $secndtxtcolor = $emerce_options['color-set']['secondary-text-color'];
             $globalwdth1400 = $emerce_options['gloabal_width_1400'];
             $globalwdth1200 = $emerce_options['gloabal_width_1200'];
             
              $altfontfamily = $emerce_options['alt_typo']['font-family'];
              $maintxtcolor = $emerce_options['color-set']['main_text_colot'];
              $altcolortxt = $emerce_options['alter_text_color'];
              $lightcolor = $emerce_options['light_color'];
              $elementorwdthebl= $emerce_options['elementor-width-overwrite'];
              $elementorwdthmain= $emerce_options['overwrite-elem-width'];
             $srcbtnclr=$emerce_options['elementor_content']['search_icon_clr'];
             
             
             $primarycolorrgb= emerce_rgb_to_hex($primarycolor);
             $primarycolor1p = emerce_hexto_rgb($primarycolorrgb, 0.1);
		?>
		:root{
		  --main-color:<?php echo esc_html($primarycolor );?>;
		  --main-top-text-color:<?php echo esc_html($primarytxcolor );?>;
		   --main-text-color:<?php echo esc_html($maintxtcolor);?>;
		   --sec-color:<?php echo esc_html($secndcolor);?>;
		  --light-color:<?php echo esc_html_e($lightcolor);?>;
		  --alt-text-color:<?php echo esc_html_e($altcolortxt);?>;
		   --alt-font-family: <?php echo esc_html($altfontfamily);?>;
         

		}
	    .emerce-single-product-box p.price,
	    .woocommerce-tabs ul.tabs li.active a{
	    color:<?php echo esc_html($primarycolor);?>
	    }
	    
	    .single_add_to_cart_button, .added_to_cart.wc-forward,
	    span.emerce-new-tag,
	    .woocommerce-tabs ul.tabs li.active a:before{
	    background-color:<?php echo esc_html($primarycolor);?>
	    }
	    
	    .single_add_to_cart_button, .added_to_cart.wc-forward{
	    border-color:<?php echo esc_html($primarycolor);?>
	    }
	    
	    .single_add_to_cart_button, .added_to_cart.wc-forward,
	    span.emerce-new-tag{
	    color:<?php echo esc_html($primarytxcolor);?>
	    }
	   .search-wrapper svg{
	   fill:<?php echo esc_html($srcbtnclr); ?>
	   }
	 .weekly-deal-single-product-cart-btn a{
	 background:<?php echo esc_html($primarycolor1p);?>;
	 }
@media (min-width: 1200px){
    .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
        max-width: <?php echo esc_html($globalwdth1200);?>px;
    }
}

  @media (min-width: 1400px){
    .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
        max-width: <?php echo esc_html($globalwdth1400);?>px;
    }
}

<?php if($elementorwdthebl){ ?>
.elementor-section.elementor-section-boxed > .elementor-container{
 max-width: <?php echo esc_html($elementorwdthmain);?>px !important;
 }
<?php } ?>

	    <?php
		$output = ob_get_clean();

		if ( ! $output ) {
			return;
		}

		$css  = '<style id="emerce-swatches-css" type="text/css">';
		$css .= $output;
		$css .= '</style>';

		echo emerce_compress_css_lines( $css ); 
	}

add_action('wp_head', 'emerce_dynamic_css');
<?php
  // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'woocommerce', // The slug id of the parent section
    'title'  => 'Grid Style',
    'fields' => array(
         
         array(
  'id'            => 'xpc_woo_grid_style',
  'type'          => 'tabbed',
  'title'         => 'Product Grid Style',
  'tabs'          => array(
    array(
      'title'     => 'Title & Price',
      'icon'      => '',
      'fields'    => array(
      
       array(
          'id'          => 'xpc_product_grid_title',
          'type'        => 'teconce_color',
          'title'       => 'Product Title Color',
          'default'     => '#222',
          'output'      => '.product-content h4,
					.product-content h4 a,
					.sell-pro-content h4 a,
					.sell-pro-content h4',
          'output_mode' => 'color', // Supports css properties like ( border-color, color, background-color etc )
        ),
        
          array(
  'id'      => 'xpc_product_grid_title_typo',
  'type'    => 'typography',
  'title'   => 'Product Title Typography',
  'output'  => '.product-content h4,
					.product-content h4 a,
					.sell-pro-content h4 a,
					.sell-pro-content h4',
  'text_align' => false,
),

 array(
          'id'          => 'xpc_product_grid_price',
          'type'        => 'teconce_color',
          'title'       => 'Product Price Color',
          'default'     => '#222',
          'output'      => '.sell-pro-price .amount,
					span.price',
          'output_mode' => 'color', // Supports css properties like ( border-color, color, background-color etc )
        ),
        
          array(
  'id'      => 'xpc_product_grid_price_typo',
  'type'    => 'typography',
  'title'   => 'Product Price Typography',
  'output'  => '.sell-pro-price .amount,
					span.price',
  'text_align' => false,
 
),

      )
    ),
    
    
    array(
      'title'     => 'Button Style',
      'icon'      => '',
      'fields'    => array(
         array(
          'id'          => 'xpc_product_g_btn_bg',
          'type'        => 'teconce_color',
          'title'       => 'Button Background Color',
          'default'     => '#222',
          'output'      => '.trending-pro-cart-btn a,
                .trending-cart-st1-btn a,
                .green-bg-btn a',
          'output_mode' => 'background', // Supports css properties like ( border-color, color, background-color etc )
        ),
        
          array(
          'id'          => 'xpc_product_g_btn_border',
          'type'        => 'teconce_color',
          'title'       => 'Button Border Color',
          'default'     => '#222',
          'output'      => '.trending-pro-cart-btn a,
                .trending-cart-st1-btn a,
                .green-bg-btn a',
          'output_mode' => 'border-color', // Supports css properties like ( border-color, color, background-color etc )
        ),
        
           array(
          'id'          => 'xpc_product_g_btn_txt',
          'type'        => 'teconce_color',
          'title'       => 'Button Text Color',
          'default'     => '#fff',
          'output'      => '.trending-pro-cart-btn a,
                .trending-cart-st1-btn a,
                .green-bg-btn a',
          'output_mode' => 'color', // Supports css properties like ( border-color, color, background-color etc )
        ),
        
        array(
          'id'          => 'xpc_product_g_btn_bg_hvr',
          'type'        => 'teconce_color',
          'title'       => 'Button Background Hover Color',
          'default'     => '#222',
          'output'      => '.trending-pro-cart-btn a:hover,
                .trending-cart-st1-btn a:hover,
                .green-bg-btn a:hover',
          'output_mode' => 'background', // Supports css properties like ( border-color, color, background-color etc )
        ),
        
          array(
          'id'          => 'xpc_product_g_btn_borde_hvrr',
          'type'        => 'teconce_color',
          'title'       => 'Button Border Hover Color',
          'default'     => '#222',
          'output'      => '.trending-pro-cart-btn a:hover,
                .trending-cart-st1-btn a:hover,
                .green-bg-btn a:hover',
          'output_mode' => 'border-color', // Supports css properties like ( border-color, color, background-color etc )
        ),
        
           array(
          'id'          => 'xpc_product_g_btn_txt_hvr',
          'type'        => 'teconce_color',
          'title'       => 'Button Text Hover Color',
          'default'     => '#fff',
          'output'      => '.trending-pro-cart-btn a:hover,
                .trending-cart-st1-btn a:hover,
                .green-bg-btn a:hover',
          'output_mode' => 'color', // Supports css properties like ( border-color, color, background-color etc )
        ),
        
      )
    ),
    
    
       array(
      'title'     => 'Other Style',
      'icon'      => '',
      'fields'    => array(
           array(
          'id'          => 'xpc_sale_label_bg',
          'type'        => 'teconce_color',
          'title'       => 'Sale label Background',
          'default'     => '#FA6C2D',
          'output'      => '.onesale span',
          'output_mode' => 'background', // Supports css properties like ( border-color, color, background-color etc )
        ),
        
        array(
          'id'          => 'xpc_sale_label_txt',
          'type'        => 'teconce_color',
          'title'       => 'Sale label Text',
          'default'     => '#fff',
          'output'      => '.onesale span',
          'output_mode' => 'color', // Supports css properties like ( border-color, color, background-color etc )
        ),
        
         array(
          'id'          => 'xpc_side_icon_set_bg',
          'type'        => 'teconce_color',
          'title'       => 'Hoverable Button Set Background',
          'default'     => '#222',
          'output'      => '.producticons a,
                .producticons-st3 a',
          'output_mode' => 'background', // Supports css properties like ( border-color, color, background-color etc )
        ),
        
         array(
          'id'          => 'xpc_side_icon_set_txt',
          'type'        => 'teconce_color',
          'title'       => 'Hoverable Button Set Icon',
          'default'     => '#fff',
          'output'      => '.producticons a,
                .producticons-st3 a',
          'output_mode' => 'color', // Supports css properties like ( border-color, color, background-color etc )
        ),
        
           array(
          'id'          => 'xpc_side_icon_set_bg_hvr',
          'type'        => 'teconce_color',
          'title'       => 'Hoverable Button Set Background Hover',
          'default'     => '#222',
          'output'      => '.producticons a:hover,
                .producticons-st3 a:hover',
          'output_mode' => 'background', // Supports css properties like ( border-color, color, background-color etc )
        ),
        
         array(
          'id'          => 'xpc_side_icon_set_txt_hvr',
          'type'        => 'teconce_color',
          'title'       => 'Hoverable Button Set Icon Hover',
          'default'     => '#fff',
          'output'      => '.producticons a:hover,
                .producticons-st3 a:hover',
          'output_mode' => 'color', // Supports css properties like ( border-color, color, background-color etc )
        ),
        
        
          )
          
          ),
  )
),

array(
  'id'      => 'emerce_compare_text',
  'type'    => 'text',
  'title'   => 'Grid Tooltip Compare Text',
  'default' => 'Add To Compare'
),

         )
        
        
        
        ));
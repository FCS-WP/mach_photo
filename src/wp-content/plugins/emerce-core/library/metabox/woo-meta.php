<?php

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'emerce_woo_options';

  //
  // Create a metabox
  CSF::createMetabox( $prefix, array(
    'title'              => 'Emerce Woo Options',
    'post_type'          => 'product',
    'data_type'          => 'unserialize',
    'context'            => 'advanced',
    'priority'           => 'default',
    'exclude_post_types' => array(),
    'page_templates'     => '',
    'post_formats'       => '',
    'show_restore'       => false,
    'enqueue_webfont'    => true,
    'async_webfont'      => false,
    'output_css'         => true,
    'theme'              => 'dark',
    'class'              => '',
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Breadcrumb Options',
    'fields' => array(

      array(
          'id'      => 'woo_breadcrumb',
          'type'    => 'switcher',
          'title'   => 'Disable Global Option',
          'default' => false
        ),
         array(
          'id'          => 'metas_woo_breadcumb_padding',
          'type'        => 'spacing',
          'title'       => 'Breradcrumb Padding',
          'output'      => '.emerce-single-woo-breadcrumbs.emerce-woo-breadcumb',
          'output_mode' => 'padding', // or margin, relative
          'dependency' => array( 'woo_breadcrumb', '==', 'true' ),
          'default'     => array(
            'top'       => '65',
            'right'     => '15',
            'bottom'    => '58',
            'left'      => '15',
            'unit'      => 'px',
          ),
        ),
        
        array(
          'id'          => 'metas_bd_woo_bg_color',
          'type'        => 'teconce_gradient',
          'title'       => 'Breadcrumb Background Color',
          'output'      => '.emerce-single-woo-breadcrumbs.emerce-woo-breadcumb',
          'dependency' => array( 'woo_breadcrumb', '==', 'true' ),
          'output_mode' => 'background' // Supports css properties like ( border-color, color, background-color etc )
        ),
        
         array(
          'id'          => 'metas_bd_woo_txt_color',
          'type'        => 'teconce_gradient',
          'title'       => 'Breadcrumb Text Color',
          'output'      => '.emerce-single-woo-breadcrumbs.emerce-woo-breadcumb,
          .emerce-single-woo-breadcrumbs.emerce-woo-breadcumb h1, 
          .emerce-single-woo-breadcrumbs.emerce-woo-breadcumb .emerce-breadcrumb a, 
          .emerce-single-woo-breadcrumbs.emerce-woo-breadcumb .emerce-breadcrumb, 
          .emerce-single-woo-breadcrumbs.emerce-woo-breadcumb .woocommerce-breadcrumb a, 
          .emerce-single-woo-breadcrumbs.emerce-woo-breadcumb .woocommerce-breadcrumb',
          'dependency' => array( 'woo_breadcrumb', '==', 'true' ),
          'output_mode' => 'color' // Supports css properties like ( border-color, color, background-color etc )
        ),
        
        
        array(
          'id'         => 'metas_title_hide_woo',
          'type'       => 'switcher',
          'title'      => 'Product Title Hide from Breadcrumb',
          'text_on'    => 'Show',
          'text_off'   => 'Hide',
          'dependency' => array( 'woo_breadcrumb', '==', 'true' ),
          'text_width' => 120
        ),
        
        
        
    )
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Product Options',
    'fields' => array(

       array(
          'id'      => 'woo_Gallery_option_global',
          'type'    => 'switcher',
          'title'   => 'Disable Global Option',
          'default' => false
        ),
        
        array(
  'id'          => 'meta_s_woo_layout',
  'type'        => 'select',
  'title'       => 'Product Layout Style',
  'placeholder' => 'Select an option',
  'options'     => array(
    'style_one'  => 'Style One',
    'style_two'  => 'Style Two',
    
  ),
  'default'     => 'style_one',
  'dependency' => array( 'woo_Gallery_option_global', '==', 'true' ),
),
        
        array(
          'id'       => 'meta_woo_thumb_style',
          'type'     => 'button_set',
          'title'    => 'Gallery Thumbnail Style',
          'multiple' => false,
          'options'  => array(
            'lside'   => 'Left Side',
            'bottom'   => 'Bottom',
            'rside' => 'Right Side',
            'grid' => 'Grid',
            'single' => 'Single',
            
          ),
          'default'  =>'bottom',
          
           'dependency' => array( 'woo_Gallery_option_global', '==', 'true' ),
        ),
        
        array(
              'id'       => 'meta_tab_style_woo',
              'type'     => 'button_set',
              'title'    => 'Description Style',
              'multiple' => false,
              'options'  => array(
                'accordion'   => 'Accordion',
                'vtab'   => 'Vertical Tab',
                'tab' => 'Tab',
                
              ),
              'default'  =>'vtab',
              'dependency' => array( 'woo_Gallery_option_global', '==', 'true' ),
            ),
    )
  ) );
  
 

}


// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'emerce_woo_cat_options';

  //
  // Create taxonomy options
  CSF::createTaxonomyOptions( $prefix, array(
    'taxonomy'  => 'product_cat',
    'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'fields' => array(

      array(
  'id'    => 'xpc-woo-cat-bg',
  'type'  => 'teconce_gradient',
  'title' => 'Background Color',
),

array(
  'id'    => 'category_gallery_em',
  'type'  => 'gallery',
  'title' => 'Category Slider',
),


    )
  ) );

}

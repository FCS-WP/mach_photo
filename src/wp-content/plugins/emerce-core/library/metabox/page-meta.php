<?php

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'emerce_page_options';

  //
  // Create a metabox
  CSF::createMetabox( $prefix, array(
    'title'              => 'Page Options',
    'post_type'          => 'page',
    'data_type'          => 'serialize',
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
          'id'      => 'page_breadcrumb',
          'type'    => 'switcher',
          'title'   => 'Disable Page Breadcrumb',
          'default' => false
        ),
        
        array(
          'id'         => 'page_breadcrumb_style',
          'type'       => 'button_set',
          'title'      => 'Breadcrumb Style',
          'options'    => array(
            'global-style'  => 'Global',
            'custom-style' => 'Custom',
          ),
          'default'    => 'global-style'
        ),
       array(
          'id'    => 'page_breadcrumb_color',
          'type'  => 'teconce_gradient',
          'title' => 'Breadcrumb Background Color',
          'default'=>'#f4f3fb',
          'output'      => '.custom-style .emerce-hero',
          'output_mode' => 'background',
          'dependency' => array( 'page_breadcrumb_style', '==', 'custom-style' ),
        ),
        array(
          'id'     => 'opt-background-output-1',
          'type'   => 'background',
          'title'  => 'Breadcrumb Background Image',
          'background_color' => false,
          'output' => '.custom-style .emerce-hero',
          'dependency' => array( 'page_breadcrumb_style', '==', 'custom-style' ),
        ),
         array(
          'id'          => 'breadcumb-padding_cs',
          'type'        => 'spacing',
          'title'       => 'Padding',
          'output'      => '.custom-style .emerce-hero',
          'output_mode' => 'padding', // or margin, relative
          'dependency' => array( 'page_breadcrumb_style', '==', 'custom-style' ),
          'default'     => array(
            'top'       => '30',
            'right'     => '0',
            'bottom'    => '30',
            'left'      => '0',
            'unit'      => 'px',
          ),
        ),
     
       array(
          'id'    => 'page_breadcrumb_text_color',
          'type'  => 'teconce_color',
          'title' => 'Breadcrumb Text Color',
          'default'=>'#ffffff',
          'output'      => '.custom-style .emerce-hero,.custom-style .emerce-hero a,.custom-style .emerce-hero h1',
          'output_mode' => 'color',
          'dependency' => array( 'page_breadcrumb_style', '==', 'custom-style' ),
        ),
        array(
          'id'      => 'page_breadcrumb_typo',
          'type'    => 'typography',
          'title'   => 'Breadcrumb Typography',
          'dependency' => array( 'page_breadcrumb_style', '==', 'custom-style' ),
          'color' => false,
          'font_size' => false,
          'letter_spacing' => false,
          'line_height' => false,
          'default' => array(
            'font-family' => 'Open Sans',
            'type'        => 'google',
            'text_align' => 'left',
          ),
          'output' => '.custom-style .emerce-hero h1',
        ),
        
         array(
          'id'    => 'custom_page_icon',
          'type'  => 'icon',
          'title' => 'Breadcrumb Icon',
          'dependency' => array( 'page_breadcrumb_style', '==', 'custom-style' ),
        ),
        
    )
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Page Options',
    'fields' => array(

       array(
          'id'         => 'page_width',
          'type'       => 'button_set',
          'title'      => 'Set page width',
          'options'    => array(
            'container'  => 'Boxed',
            'container-fluid' => 'Full Width',
          ),
          'default'    => 'container'
        ),
        
        array(
          'id'         => 'global_page_meta',
          'type'       => 'button_set',
          'title'      => 'Post Options Type',
          'options'    => array(
            'disabled' => 'Global',
            'enabled'  => 'Custom',
           
          ),
          'default'    => 'disabled'
        ),
        
        array(
          'id'          => 'select_header_blocks_meta',
          'type'        => 'select',
          'title'       => 'Select Custom Header',
          'placeholder' => 'Select a Header',
          'dependency' => array( 'global_page_meta', '==', 'enabled' ),
          'options'     => 'posts',
          'query_args'  => array(
            'post_type' => 'emerce_header',
          ),
        ),
        
         array(
          'id'          => 'select_footer_blocks_meta',
          'type'        => 'select',
          'title'       => 'Select Custom Footer',
          'placeholder' => 'Select a Footer',
          'dependency' => array( 'global_page_meta', '==', 'enabled' ),
          'options'     => 'posts',
          'query_args'  => array(
            'post_type' => 'emerce_footer',
          ),
        ),

    )
  ) );
  
 

}

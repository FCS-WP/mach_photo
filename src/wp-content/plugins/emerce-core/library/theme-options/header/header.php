<?php
// Create a top-tab
  CSF::createSection( $prefix, array(
    'id'    => 'header', // Set a unique slug-like ID
    'title' => 'Header',
    'icon'     => 'fa fa-arrow-up',
  ) );
  
   // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'header', // The slug id of the parent section
    'title'  => 'Logo',
    'fields' => array(
        array(
          'id'    => 'main-logo',
          'type'  => 'media',
          'title' => 'Logo',
        ),
        
         array(
          'id'    => 'main-logo-retina',
          'type'  => 'media',
          'title' => 'Retina Logo',
        ),
        
        array(
          'id'    => 'emerce-favicon',
          'type'  => 'media',
          'title' => 'Favicon',
        ),
        
        array(
          'id'      => 'logo-width',
          'type'    => 'slider',
          'title'   => 'Logo Width',
          'min'     => 10,
          'max'     => 300,
          'step'    => 1,
          'unit'    => 'px',
          'default' => 180,
          'output' => '.site-main-logo img',
          'output_mode' => 'width',
        ),
        )
        
        
        
        ));
        
 // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'header', // The slug id of the parent section
    'title'  => 'Header Blocks',
    'fields' => array(
         array(
          'id'          => 'select_header_blocks',
          'type'        => 'select',
          'title'       => 'Select Global Header',
          'placeholder' => 'Select a Header',
          'options'     => 'posts',
          'query_args'  => array(
            'post_type' => 'emerce_header',
          ),
        ),
        
    
        
        array(
          'id'    => 'stacked_header_enable',
          'type'  => 'switcher',
          'title' => 'Stacked Header',
          'default' => false,
        ),
        
        
        
        
        
        )
        
        
        
        ));
        
        
  CSF::createSection( $prefix, array(
     'parent' => 'header', // The slug id of the parent section
    'title'  => 'Header Sticky Notification Bar',
    'fields' => array(
        
           array(
          'id'         => 'sticky_bar_enable',
          'type'       => 'button_set',
          'title'      => 'Sticky Bar Enable/Disable',
          'options'    => array(
            'enabled'  => 'Enable',
            'disabled' => 'Disable',
          ),
          'default'    => 'disabled'
        ),
       
       
          array(
          'id'         => 'sticky_bar_hide_mob',
          'type'       => 'button_set',
          'title'      => 'Sticky Bar Hide on Mobile',
          'options'    => array(
            'enabled'  => 'Display',
            'disabled' => 'Hide',
          ),
          'default'    => 'enabled'
        ),

            
        
             array(
          'id'         => 'sticky_bar_style',
          'type'       => 'button_set',
          'title'      => 'Sticky Bar Color Style',
          'options'    => array(
            'standard'  => 'Standard',
            'custom' => 'Custom',
          ),
          'default'    => 'standard'
        ),
        
        array(
          'id'       => 'custom_code_notification',
          'type'     => 'code_editor',
          'title'    => 'CSS Editor',
          'settings' => array(
            'theme'  => 'mbo',
            'mode'   => 'css',
          ),
          'default'  => '',
           'dependency' => array( 'sticky_bar_style', '==', 'custom' ),
        ),

       array(
          'id'    => 'sticky_bg_color',
          'type'  => 'teconce_gradient',
          'title' => 'Background Color',
          'default'=>'#FF3366',
          'output'      => '.mayosis-standard-bar',
          'output_mode' => 'background',
          'dependency' => array( 'sticky_bar_style', '==', 'standard' ),
          
        ),
        
         array(
          'id'    => 'sticky_text_color',
          'type'  => 'teconce_color',
          'title' => 'Text Color',
          'default'=>'#ffffff',
          'output'      => '.mayosis-standard-bar',
          'output_mode' => 'color',
          
        ),
        
        array(
          'id'    => 'sticky_btn_color',
          'type'  => 'teconce_gradient',
          'title' => 'Button Background Color',
          'default'=>'#222',
          'output'      => '.mayosis-sticky-bar-btn',
          'output_mode' => 'background',
          
        ),
        
          array(
          'id'    => 'sticky_btn_text_color',
          'type'  => 'teconce_color',
          'title' => 'Button Text Color',
          'default'=>'#ffffff',
          'output'      => '.btn.mayosis-sticky-bar-btn',
          'output_mode' => 'color',
          
        ),
        
        array(
          'id'    => 'sticky_header_content',
          'type'  => 'wp_editor',
          'title' => 'Notification Header Content',
        ),
        
        array(
          'id'      => 'sticky_button_text',
          'type'    => 'text',
          'title'   => 'Button Text',
          'default' => 'Get Started'
        ),
        array(
          'id'      => 'sticky_button_url',
          'type'    => 'text',
          'title'   => 'Button Url',
          'default' => ''
        ),
        
    array(
          'id'         => 'button_target',
          'type'       => 'button_set',
          'title'      => 'Button Target',
          'options'    => array(
            'blank'  => 'Blank',
            'self' => 'Self',
          ),
          'default'    => 'self'
        ),
        
        array(
          'id'          => 'padding_on_box',
          'type'        => 'spacing',
          'title'       => 'Padding on Notification Bar',
          'output'      => '#mayosis-sticky-bar',
          'output_mode' => 'padding', // or margin, relative
          'default'     => array(
            'top'       => '10',
            'right'     => '0',
            'bottom'    => '10',
            'left'      => '0',
            'unit'      => 'px',
          ),
        ),
        
        
         array(
          'id'          => 'padding_on_button',
          'type'        => 'spacing',
          'title'       => 'Padding on Button',
          'output'      => '.mayosis-sticky-bar-btn',
          'output_mode' => 'padding', // or margin, relative
          'default'     => array(
            'top'       => '6',
            'right'     => '12',
            'bottom'    => '6',
            'left'      => '12',
            'unit'      => 'px',
          ),
        ),

    )
    
    
  ) );
  
  
   CSF::createSection( $prefix, array(
     'parent' => 'header', // The slug id of the parent section
    'title'  => 'Header Style',
    'fields' => array(
        array(
          'id'      => 'main_header_color',
          'type'    => 'teconce_gradient',
          'title'   => 'Main Header Background',
          'default' => '#fffdfa',
          'output'      => '.emerce-header,.emerce-header-builder',
           'output_mode' => 'background',
        ),
        array(
          'id'      => 'sticky_header_color',
          'type'    => 'teconce_gradient',
          'title'   => 'Sticky Header Background',
          'default' => '#E0DCCC',
          'output'      => '.emerce-header.fixed,.emerce-header-builder.fixed',
           'output_mode' => 'background',
        ),
        
        array(
          'id'      => 'sticky_header_text_color',
          'type'    => 'teconce_gradient',
          'title'   => 'Sticky Header Text Color',
          'default' => '#26211D',
          'output'      => '.emerce-header.fixed,.emerce-header-builder.fixed,header.fixed #emercemenu > ul > li > a',
           'output_mode' => 'color',
           'output_important' => true,
        ),
        
        array(
          'id'          => 'sticky-header-padding',
          'type'        => 'spacing',
          'title'       => 'Sticky Header Padding',
          'output'      => '.emerce-header.fixed, .emerce-header-builder.fixed',
          'output_mode' => 'padding', // or margin, relative
          'default'     => array(
            'top'       => '0',
            'right'     => '0',
            'bottom'    => '0',
            'left'      => '0',
            'unit'      => 'px',
          ),
        ),
        
        
        array(
          'id'      => 'header_height',
          'type'    => 'number',
          'title'   => 'Header Height',
        ),
        
         array(
          'id'      => 'sticky_header_height',
          'type'    => 'number',
          'title'   => 'Stikcy Header Height',
        ),

        )
        
        ));
        
        
           // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'header', // The slug id of the parent section
    'title'  => 'Breadcrumb',
    'fields' => array(
        
        array(
          'id'         => 'x_bd_width_set',
          'type'       => 'switcher',
          'title'      => 'Breadcrumb Width Type',
          'text_on'    => 'Boxed',
          'text_off'   => 'Full Width',
          'text_width' => 100
        ),
       array(
          'id'          => 'x_breadcrumb_margin',
          'type'        => 'spacing',
          'title'       => 'Margin',
          'output'      => '.emerce-common-breadcrumbs',
          'output_mode' => 'margin', // or margin, relative
          'default'     => array(
            'top'       => '0',
            'right'     => '0',
            'bottom'    => '0',
            'left'      => '0',
            'unit'      => 'px',
          ),
        ),
        
         array(
          'id'          => 'x_breadcrumb_padding',
          'type'        => 'spacing',
          'title'       => 'Padding',
          'output'      => '.emerce-common-breadcrumbs',
          'output_mode' => 'padding', // or margin, relative
          'default'     => array(
            'top'       => '65',
            'right'     => '15',
            'bottom'    => '58',
            'left'      => '15',
            'unit'      => 'px',
          ),
        ),
        
        
        array(
          'id'    => 'x_breadcumb_bg',
          'type'  => 'teconce_gradient',
          'title' => 'Background Color',
          'default'=>'#F5F5F5',
          'output'      => '.emerce-common-breadcrumbs',
          'output_mode' => 'background',
          
        ),
        
        
        
          array(
          'id'    => 'x_breadcumb_color',
          'type'  => 'teconce_color',
          'title' => 'Color',
          'default'=>'#222',
          'output'      => '.emerce-common-breadcrumbs,.emerce-common-breadcrumbs h1,.emerce-common-breadcrumbs .emerce-breadcrumb a,.emerce-common-breadcrumbs .emerce-breadcrumb,
          .emerce-common-breadcrumbs .woocommerce-breadcrumb a,
          .emerce-common-breadcrumbs .woocommerce-breadcrumb',
          'output_mode' => 'color',
          
        ),

        )
        
        
        
        ));
        
                   // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'header', // The slug id of the parent section
    'title'  => 'Loader',
    'fields' => array(
        array(
  'id'         => 'enable_dbl_loader',
  'type'       => 'button_set',
  'title'      => 'Loader Enable/Disable',
  'options'    => array(
    'enabled'  => 'Enabled',
    'disabled' => 'Disabled',
  ),
  'default'    => 'disabled'
),


array(
          'id'    => 'ldr_bg',
          'type'  => 'teconce_gradient',
          'title' => 'Background Color',
          'default'=>'#FBEEE6',
          'output'      => '.emerce-loader,.circle-core',
          'output_mode' => 'background',
          
        ),
        
        array(
          'id'    => 'ldr_cirl_clr',
          'type'  => 'teconce_gradient',
          'title' => 'Circle Color',
          'default'=>'',
          'output'      => '.circle-border',
          'output_mode' => 'background',
          
        ),
        )
         ));
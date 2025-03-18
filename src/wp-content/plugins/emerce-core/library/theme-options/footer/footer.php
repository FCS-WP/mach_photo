<?php
// Create a top-tab
  CSF::createSection( $prefix, array(
    'id'    => 'footer', // Set a unique slug-like ID
    'title' => 'Footer',
    'icon'     => 'fa fa-arrow-down',
  ) );
 // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'footer', // The slug id of the parent section
    'title'  => 'Footer Blocks',
    'fields' => array(
        
         array(
          'id'          => 'select_footer_blocks',
          'type'        => 'select',
          'title'       => 'Select Global Footer',
          'placeholder' => 'Select a Footer',
          'options'     => 'posts',
          'query_args'  => array(
            'post_type' => 'emerce_footer',
          ),
        ),
       
           array(
  'id'         => 'back-top-top-enable',
  'type'       => 'button_set',
  'title'      => 'Back To Top Button',
  'options'    => array(
    'enabled'  => 'Enabled',
    'disabled' => 'Disabled',
  ),
  'default'    => 'enabled'
),

 array(
          'id'      => 'backto_top_bg',
          'type'    => 'teconce_gradient',
          'title'   => 'Back To Top Button Background Color',
          'default' => '#c8c8d7',
          'output'      => '.back-to-top',
           'output_mode' => 'background',
           'dependency' => array( 'back-top-top-enable', '==', 'enabled' ),
        ),
        
        array(
          'id'      => 'backto_top_txt',
          'type'    => 'teconce_color',
          'title'   => 'Back To Top Button Text Color',
          'default' => '#222',
          'output'      => '.back-to-top',
          'output_mode' => 'color',
          'dependency' => array( 'back-top-top-enable', '==', 'enabled' ),
        ),
        
         array(
          'id'      => 'backto_top_bg_hvr',
          'type'    => 'teconce_gradient',
          'title'   => 'Back To Top Button Background Hover Color',
          'default' => '#c8c8d7',
          'output'      => '.back-to-top:hover',
           'output_mode' => 'background',
           'dependency' => array( 'back-top-top-enable', '==', 'enabled' ),
        ),
        
        array(
          'id'      => 'backto_top_txt_hvr',
          'type'    => 'teconce_color',
          'title'   => 'Back To Top Button Text Hover Color',
          'default' => '#222',
          'output'      => '.back-to-top:hover',
          'output_mode' => 'color',
          'dependency' => array( 'back-top-top-enable', '==', 'enabled' ),
        ),
                
        )
        ));
        
        
         // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'footer', // The slug id of the parent section
    'title'  => 'Footer Copyright',
    'fields' => array(
         array(
          'id'    => 'footer_copyright_enable',
          'type'  => 'switcher',
          'title' => 'Footer Copyright Enable/Disable',
          'default' => true,
        ),
        
        array(
              'id'            => 'copyright_text',
              'type'          => 'wp_editor',
              'title'         => 'Copyright Text',
              'tinymce'       => true,
              'quicktags'     => true,
              'media_buttons' => true,
              'height'        => '100px',
              'default'   =>'© copyright 2020 Emerce I by Teconce',
              'dependency' => array( 'footer_copyright_enable', '==', 'true', 'all' ),
            ),
        )
        
        ));
        
        
               // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'footer', // The slug id of the parent section
    'title'  => 'Footer Style',
    'fields' => array(
        
        array(
          'id'      => 'copyright_footer_bg',
          'type'    => 'teconce_gradient',
          'title'   => 'Copyright Background Color',
          'default' => '#F7F5E5',
          'output'      => '.emerce-copyright',
           'output_mode' => 'background',
        ),
        
        array(
          'id'      => 'copyright_footer_text',
          'type'    => 'teconce_color',
          'title'   => 'Copyright Text Color',
          'default' => '#74716E',
          'output'      => '.emerce-copyright',
          'output_mode' => 'color',
        ),
        
         array(
          'id'        => 'copyright_footer_link',
          'type'      => 'teconce_link',
          'title'     => 'Copyright Link Color',
          'output'  => '.emerce-copyright a',
          'active' => true,
          'default'   => array(
            'color' => '#74716E',
            'hover' => '#423e3a',
            'active' => '#423e3a',
          )
        ),
        
        )
        
        ));
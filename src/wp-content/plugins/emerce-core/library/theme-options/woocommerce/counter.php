<?php
  // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'woocommerce', // The slug id of the parent section
    'title'  => 'Sale Counter',
    'fields' => array(
         array(
              'id'      => 'countdown_ttl',
              'type'    => 'text',
              'title'   => 'Countdown Title',
              'default' => 'Hurry up! Sale Ends in'
            ),
            
            array(
              'id'          => 'count_style',
              'type'        => 'select',
              'title'       => 'Countdown Style',
              'placeholder' => 'Select an option',
              'options'     => array(
                'style-one'  => 'Style One',
                'style-two'  => 'Style Two',
              ),
              'default'     => 'style-one'
            ),
            
            array(
              'id'    => 'stl_1_bg',
              'type'  => 'teconce_gradient',
              'title' => 'Background Color',
              'default' =>'#f5f5f5',
              'output'      => '.emerce-timer-style-one #emercetimer .countdown',
              'output_mode' => 'background' ,
               'dependency' => array( 'count_style', '==', 'style-one' ),
            ),
            array(
              'id'     => 'stl_1_border',
              'type'   => 'border',
              'title'  => 'Border',
              'output' => array( '.emerce-timer-style-one #emercetimer .countdown' ),
              'dependency' => array( 'count_style', '==', 'style-one' ),
            ),
             array(
              'id'          => 'stl_shadow_enable',
              'type'        => 'select',
              'title'       => 'Shadow Enable/ Disable',
              'placeholder' => 'Select an option',
              'options'     => array(
                'sdw_enable'  => 'Enable',
                'sdw_disable'  => 'Disable',
              ),
              'default'     => 'sdw_enable'
            ),
             array(
              'id'    => 'stl_2_bg',
              'type'  => 'teconce_gradient',
              'title' => 'Background Color',
              'default' =>'#05a845',
              'output'      => '.emerce-timer-style-two .emerce-count-value',
              'output_mode' => 'background' ,
               'dependency' => array( 'count_style', '==', 'style-two' ),
            ),
            
            array(
              'id'    => 'stl_count_value_color',
              'type'  => 'teconce_color',
              'title' => 'Countdown Number Color',
              'default' =>'#fa6d2d',
              'output'      => '.emerce-timer-for-countdown .emerce-count-value',
              'output_mode' => 'color' ,
               
            ),
            
             array(
              'id'    => 'stl_count_label_color',
              'type'  => 'teconce_color',
              'title' => 'Countdown Label Color',
              'default' =>'#222',
              'output'      => '.emerce-timer-for-countdown .emerce-count-value .label,#emercetimer .countdown .separator',
              'output_mode' => 'color' ,
               
            ),

        
        array(
          'id'         => 'stockbar_progress',
          'type'       => 'switcher',
          'title'      => 'Enable Product Stock Progress bar?',
          'text_on'    => 'Enabled',
          'text_off'   => 'Disabled',
          'text_width' => 100
        ),
        
        array(
  'id'      => 'stockbar_progress_text',
  'type'    => 'text',
  'title'   => 'Stock Progressbar Text',
  'description' => '{{quantity}} is mandatory to be replaced with the product stock number!',
  'default' => 'Only {{quantity}} Items Left in stock!'
),
array(
              'id'    => 'stock_bar_progress_color',
              'type'  => 'teconce_gradient',
              'title' => 'Progress Color',
              'default' =>'#05a845',
              'output'      => '.xpsc-product-coutdown-wrapper .product-stock .percent',
              'output_mode' => 'background' ,
            ),
            
            
            

        )
        
        
        
        ));
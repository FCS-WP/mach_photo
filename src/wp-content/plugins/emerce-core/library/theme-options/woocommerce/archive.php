<?php
    // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'woocommerce', // The slug id of the parent section
    'title'  => 'Product Archive',
    'fields' => array(
        array(
              'id'          => 'emerce-archive-type',
              'type'        => 'select',
              'title'       => 'Archive Layout Type',
              'placeholder' => 'Select an option',
              'options'     => array(
                'full-width'  => 'Full Width',
                'sidebar'  => 'With Sidebar',
              ),
              'default'     => 'full-width'
            ),
            
            array(
              'id'          => 'archive-sidebar-position',
              'type'        => 'select',
              'title'       => 'Sidebar Position',
              'placeholder' => 'Select an option',
              'options'     => array(
                'left'  => 'Left',
                'right'  => 'Right',
              ),
              'default'     => 'left',
                'dependency' => array( 'emerce-archive-type', '==', 'sidebar' ),
            ),
            array(
              'id'          => 'emerce-archive-style',
              'type'        => 'select',
              'title'       => 'Archive Product Style',
              'placeholder' => 'Select an option',
              'options'     => array(
                'style-one'  => 'Style One',
                'style-two'  => 'Style Two',
               'style-three'  => 'Style Three',
               'style-four'  => 'Style Four',
               'style-five'  => 'Style Five',
               'style-six'  => 'Style Six',
               'style-seven'  => 'Style Seven',
                'style-eight'  => 'Style Eight',
                'style-nine'  => 'Style Nine',
                'style-ten'  => 'Style Ten',
                'style-eleven'  => 'Style Eleven',
              ),
              'default'     => 'style-one'
            ),
            
             array(
              'id'          => 'emerce-archive-col',
              'type'        => 'select',
              'title'       => 'Archive Product Column (Desktop)',
              'placeholder' => 'Select an option',
              'options'     => array(
                'md-1'  => 'One Column',
                'md-2'  => 'Two Column',
               'md-3'  => 'Three Column',
               'md-4'  => 'Four Column',
               'md-5'  => 'Five Column',
               'md-6'  => 'Six Column',
              ),
              'default'     => 'md-3'
            ),
            
            
                array(
              'id'          => 'emerce-archive-col-mob',
              'type'        => 'select',
              'title'       => 'Archive Product Column (Mobile)',
              'placeholder' => 'Select an option',
              'options'     => array(
                'cols-1'  => 'One Column',
                'cols-2'  => 'Two Column',
               'cols-3'  => 'Three Column',
              ),
              'default'     => 'cols-1'
            ),
            
             array(
              'id'          => 'mob_custom_row_gap',
              'type'        => 'select',
              'title'       => 'Mobile Smaller Column Gap',
              'placeholder' => 'Select an option',
              'options'     => array(
                'on'  => 'On',
                'off'  => 'Off',
             
              ),
              'default'     => 'off'
            ),
            
            
            array(
              'id'       => 'emerce-ach-filter-type',
              'type'     => 'button_set',
              'title'    => 'Archive Filter Type',
              'options'  => array(
                'none'   => 'None',
                'droppanel'   => 'Drop Panel',
                'off-canvas' => 'Off Canvas',
              ),
              'default'  => 'none',
            ),
            
            
          
            
             array(
          'id'          => 'emerce-filter-shortcode',
          'type'        => 'select',
          'title'       => 'Product Filter',
          'placeholder' => 'Select a Filter',
          'options'     => 'posts',
          'query_args'  => array(
            'post_type' => 'yith_wcan_preset',
          ),
          
           'dependency' => array( 'emerce-ach-filter-type', '!=', 'none' ),
        ),
            

        )
        
        
        
        ));
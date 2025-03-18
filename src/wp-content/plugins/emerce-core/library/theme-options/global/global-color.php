<?php
// Create a top-tab
  CSF::createSection( $prefix, array(
    'id'    => 'global_style', // Set a unique slug-like ID
    'title' => 'Global Style',
    'icon'     => 'fa fa-magic',
  ) );


 // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'global_style', // The slug id of the parent section
    'title'  => 'Global Color',
    'fields' => array(
       
       array(
          'id'            => 'color-set',
          'type'          => 'tabbed',
          'title'         => 'Site Colors',
          'tabs'          => array(
              array(
                  'title'     => 'Body Color',
                  'icon'      => 'fa fa-paint-brush',
                  'fields'    => array(
                      array(
                           'id' => 'site-bg-color-main',
                           'type'        => 'teconce_color',
                           'title' => 'Site Background Color',
                           'default' => '#fffdfa',
                           'output' => 'body',
                           'output_mode' => 'background'
                           ),
                        
                        array(
                          'id'    => 'main_text_colot',
                          'type'  => 'teconce_color',
                          'title' => 'Text Color',
                          'default'=>'#26211d',
                           'help' => 'This is the text color of Whole Website',
                           'output'      => 'body,p,.pivoo-ingredients-items li, li',
                          'output_mode' => 'color',
                        ),
                        )),
              array(
                  'title'     => 'Primary Color',
                  'icon'      => 'fa fa-paint-brush',
                  'fields'    => array(
           array(
          'id'    => 'primary_color',
          'type'  => 'teconce_color',
          'title' => 'Primary Color',
          'default'=>'#FF3366',
          'help' => 'This is the primary color for whole website.If you change it whole site main color will be changed.',
          'output'      => '.pivoo-section-title.title-style-one h3:before,.pivoo-post.style-one .pivoo-category-list a,
          .pivoo-nutritional-information h5,
          span.pivoo-new-tag,.plyr__control--overlaid,.pivoo-author-follow a
          ',
          'output_mode' => 'background',
          
        ),
        
        array(
          'id'    => 'primary-text-color',
          'type'  => 'teconce_color',
          'title' => 'Primary Text Color',
          'default'=>'#FFEBF0',
           'help' => 'This is the text color of primary color',
           'output'      => '.pivoo-section-title.title-style-one h3:before,.pivoo-post.style-one .pivoo-category-list a,
          .pivoo-nutritional-information h5,
          span.pivoo-new-tag,.plyr__control--overlaid,.pivoo-author-follow a',
          'output_mode' => 'color',
          'output_important' => true,
        ),
          )),
          
           array(
                  'title'     => 'Secondary Color',
                  'icon'      => 'fa fa-paint-brush',
                  'fields'    => array(
                       array(
              'id'    => 'secondary-color',
              'type'  => 'teconce_color',
              'title' => 'Secondary Color',
              'default'=>'#FFDD33',
              'help' => 'This is the secondary color for whole website.If you change it whole site main color will be changed.',
              'output'      => '.pivoo-product-sale-tag span.onsale,.plyr--video .plyr__control.plyr__tab-focus, .plyr--video .plyr__control:hover, .plyr--video .plyr__control[aria-expanded=true]',
              'output_mode' => 'background',
              
            ),
            
                 array(
              'id'    => 'secondary-text-color',
              'type'  => 'teconce_color',
              'title' => 'Secondary Text Color',
              'default'=>'#402500',
              'output'      => '.pivoo-product-sale-tag span.onsale,.plyr--video .plyr__control.plyr__tab-focus, .plyr--video .plyr__control:hover, .plyr--video .plyr__control[aria-expanded=true]',
                'output_mode' => 'color',
               'help' => 'This is the text color of secondary color',
            ),
        
                      )),
                      
                       array(
                  'title'     => 'Input Field Color',
                  'icon'      => 'fa fa-paint-brush',
                  'fields'    => array(
                      
                         array(
              'id'    => 'global_input_bg',
              'type'  => 'teconce_color',
              'title' => 'Input Field Background Color',
              'default'=>'#f8f5f5',
              'help' => 'This is the input field background color for whole website',
              'output'      => 'input[type="text"], input[type="email"], input[type="url"], 
              input[type="password"], input[type="search"],
              input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], 
              input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], 
              input[type="color"], select, textarea,
              .select2-container--default .select2-selection--single,.dokan-form-control',
              'output_mode' => 'background-color',
              
            ),
            
              array(
              'id'    => 'global_input_border',
              'type'  => 'teconce_color',
              'title' => 'Input Field Border Color',
              'default'=>'#f8f5f5',
              'help' => 'This is the input field border color for whole website',
              'output'      => 'input[type="text"], input[type="email"], input[type="url"], 
              input[type="password"], input[type="search"],
              input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], 
              input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], 
              input[type="color"], select, textarea,
              .select2-container--default .select2-selection--single,.dokan-form-control',
              'output_mode' => 'border-color',
              
            ),
            
            array(
              'id'    => 'global_input_text',
              'type'  => 'teconce_color',
              'title' => 'Input Field Text Color',
              'default'=>'#373833',
              'help' => 'This is the input field Text color for whole website',
              'output'      => 'input[type="text"], input[type="email"], input[type="url"], 
              input[type="password"], input[type="search"],
              input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], 
              input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], 
              input[type="color"], select, textarea,
              .select2-container--default .select2-selection--single,.dokan-form-control',
              'output_mode' => 'color',
              
            ),
            
            
                      
                      )),
              
              
              )),
              
              
              
              
      array(
          'id'            => 'btn_color',
          'type'          => 'tabbed',
          'title'         => 'Site Buttons Colors',
          'tabs'          => array(
               array(
                  'title'     => 'Button Normal State',
                  'icon'      => 'fa fa-paint-brush',
                  'fields'    => array(
                       array(
                      'id'    => 'global_btn_bg',
                      'type'  => 'teconce_gradient',
                      'title' => 'Button Background',
                      'default'=>'#fd604f',
                      'help' => 'Site common button background color',
                      'output'      => 'button, input[type="button"], input[type="submit"], [type=button], [type=submit],
                      .comment-content .comment-reply-link,.piv-lrn-button',
                      'output_mode' => 'background',
                      
                    ),
                    
                    array(
                      'id'    => 'global_btn_border',
                      'type'  => 'teconce_color',
                      'title' => 'Button Border',
                      'default'=>'#fd604f',
                      'help' => 'Site common button border color',
                      'output'      => 'button, input[type="button"], input[type="submit"], [type=button], [type=submit],
                      .comment-content .comment-reply-link,.piv-lrn-button',
                      'output_mode' => 'border-color',
                      
                    ),
                    
                    array(
                      'id'    => 'global_btn_text',
                      'type'  => 'teconce_color',
                      'title' => 'Button Text',
                      'default'=>'#ffffff',
                      'help' => 'Site common button text color',
                      'output'      => 'button, input[type="button"], input[type="submit"], [type=button], [type=submit],
                      .comment-content .comment-reply-link,.piv-lrn-button',
                      'output_mode' => 'color',
                      
                      
                    ),
                       )),
                       
                       array(
                  'title'     => 'Button Hover State',
                  'icon'      => 'fa fa-paint-brush',
                  'fields'    => array(
                      
                       array(
                      'id'    => 'global_btn_bg_hvr',
                      'type'  => 'teconce_gradient',
                      'title' => 'Button Background',
                      'default'=>'#fd604f',
                      'help' => 'Site common button background color',
                      'output'      => 'button:hover, input[type="button"]:hover, input[type="submit"]:hover, [type=button]:hover, [type=submit]:hover,
                      .comment-content .comment-reply-link:hover,.piv-lrn-button:hover',
                      'output_mode' => 'background',
                      
                    ),
                    
                    array(
                      'id'    => 'global_btn_border_hvr',
                      'type'  => 'teconce_color',
                      'title' => 'Button Border',
                      'default'=>'#fd604f',
                      'help' => 'Site common button border color',
                      'output'      => 'button:hover, input[type="button"]:hover, input[type="submit"]:hover, [type=button]:hover, [type=submit]:hover,
                      .comment-content .comment-reply-link:hover,.piv-lrn-button:hover',
                      'output_mode' => 'border-color',
                      
                    ),
                    
                    array(
                      'id'    => 'global_btn_text_hvr',
                      'type'  => 'teconce_color',
                      'title' => 'Button Text',
                      'default'=>'#ffffff',
                      'help' => 'Site common button text color',
                      'output'      => 'button:hover, input[type="button"]:hover, input[type="submit"]:hover, [type=button]:hover, [type=submit]:hover,
                      .comment-content .comment-reply-link:hover,.piv-lrn-button:hover',
                      'output_mode' => 'color',
                      
                      
                    ),
                      
                       )),
              
               )),
              
    
    array(
          'id'        => 'link_color',
          'type'      => 'teconce_link',
          'title'     => 'Link Color',
          'output'      => 'a',
          'visited' => true,
          'default'   => array(
            'color' => '#ff3366',
            'hover' => '#402500',
            'visited' => '#ff3366',
          )
        ),
        
         array(
                          'id'    => 'alter_text_color',
                          'type'  => 'teconce_color',
                          'title' => 'Alter Text Color',
                          'default'=>'#666666',
                           'help' => 'This is the alternative text color',
                        ),
                        
                          array(
                          'id'    => 'light_color',
                          'type'  => 'teconce_color',
                          'title' => 'Light Color',
                          'default'=>'#f5f5f5',
                           'help' => 'This is the light color',
                        ),
    )
    
  ) );
  

        
         // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'global_style', // The slug id of the parent section
    'title'  => 'Page Builder Style',
    'fields' => array(
      
      
      array(
  'id'            => 'elementor_content',
  'type'          => 'tabbed',
  'title'         => 'Elements Style',
  'tabs'          => array(
      array(
      'title'     => 'Search Style',
      'icon'      => 'emerceo-semi-solid cs-orange',
      'fields'    => array(
          
               array(
              'id'    => 'search-overlay',
              'type'  => 'teconce_color',
              'title' => 'Search Overlay Color',
              'default'=>'#e2e0f5',
              'output' => '.emerce-ajax-s-offcanvas,#emerce-search-box-popup,.emerce-ajax-s-offcanvas .emerce-search-result',
              'output_mode' => 'background',
              
            ),
            array(
              'id'          => 'ftitle_colose_color',
              'type'        => 'teconce_color',
              'title'       => 'Title color',
              'default'=>'#ffffff',
              'output'      => '.emerce-ajax-search-title',
              'output_mode' => 'color' // Supports css properties like ( border-color, color, background-color etc )
            ),
            
            array(
              'id'          => 'search_input',
              'type'        => 'teconce_color',
              'title'       => 'Search Input Background',
              'default'=>'#e2e0f5',
              'output'      => '.emerce-ajax-search-bar .search-wrapper input[type="text"],
              .emerce-search-style-two .search-wrapper input[type="text"]',
              'output_mode' => 'background' // Supports css properties like ( border-color, color, background-color etc )
            ),
            
             array(
              'id'          => 'search_input_border',
              'type'        => 'teconce_color',
              'title'       => 'Search Input Border Color',
              'default'=>'#e2e0f5',
              'output'      => '.emerce-ajax-search-bar .search-wrapper input[type="text"],
              .emerce-search-style-two .search-wrapper input[type="text"]',
              'output_mode' => 'border-color' // Supports css properties like ( border-color, color, background-color etc )
            ),
            
            array(
              'id'          => 'search_input_txt',
              'type'        => 'teconce_color',
              'title'       => 'Search Input Text Color',
              'default'=>'#26211d',
              'output'      => '.emerce-ajax-search-bar .search-wrapper input[type="text"],
              .emerce-search-style-two .search-wrapper input[type="text"]',
              'output_mode' => 'color' // Supports css properties like ( border-color, color, background-color etc )
            ),
            
            array(
              'id'          => 'search_cat_bg',
              'type'        => 'teconce_color',
              'title'       => 'Search Category Panel Background',
              'default'=>'#05A845',
              'output'      => '.emerce-ajax-search-bar .nice-select',
              'output_mode' => 'background' // Supports css properties like ( border-color, color, background-color etc )
            ),
             array(
              'id'          => 'search_cat_bar_border',
              'type'        => 'teconce_color',
              'title'       => 'Search Category Panel Border',
              'default'=>'#05A845',
              'output'      => '.emerce-ajax-search-bar .nice-select',
              'output_mode' => 'border-color' // Supports css properties like ( border-color, color, background-color etc )
            ),
            
            array(
              'id'          => 'search_cat_bar_text',
              'type'        => 'teconce_color',
              'title'       => 'Search Category Panel Text',
              'default'=>'#ffffff',
              'output'      => '.emerce-ajax-search-bar .nice-select',
              'output_mode' => 'color' // Supports css properties like ( border-color, color, background-color etc )
            ),
             array(
              'id'          => 'search_icon_bg_clr',
              'type'        => 'teconce_color',
              'title'       => 'Search Button Background',
              'default'=>'#ffffff',
              'output'      => '.emerce-ajax-search-btn,.search-wrapper svg',
              'output_mode' => 'background' // Supports css properties like ( border-color, color, background-color etc )
            ),
            
            array(
              'id'          => 'search_icon_clr',
              'type'        => 'teconce_color',
              'title'       => 'Search Icon Color',
              'default'=>'#222',
              'output'      => '.search-wrapper i',
              'output_mode' => 'color' // Supports css properties like ( border-color, color, background-color etc )
            ),
            
             array(
              'id'          => 'product_bg_color_src',
              'type'        => 'teconce_color',
              'title'       => 'Search Product Background',
              'default'=>'#fff',
              'output'      => '.emerce-search-result ul li a',
              'output_mode' => 'background' // Supports css properties like ( border-color, color, background-color etc )
            ),
            array(
              'id'          => 'product_text_color_src',
              'type'        => 'teconce_color',
              'title'       => 'Search Product Title Color',
              'default'=>'#222',
              'output'      => '.emerce-ajax-product-data h3',
              'output_mode' => 'color' // Supports css properties like ( border-color, color, background-color etc )
            ),
            
           
          
          )),
      )),
      
       array(
              'id'       => 'search_product_style',
              'type'     => 'button_set',
              'title'    => 'Search Product Style',
              'options'  => array(
                'list'   => 'List',
                'grid'   => 'Grid',
                
              ),
              'default'  => 'list'
            ),
            
            array(
              'id'          => 'search_product_grid_count',
              'type'        => 'select',
              'title'       => 'Grid Column Count',
              'placeholder' => 'Select an option',
                'dependency' => array( 'search_product_style', '==', 'grid' ),
              'options'     => array(
                '1'  => 'One Column',
                '2'  => 'Two Column',
                '3'  => 'Three Column',
                '4'  => 'Four Column',
                '5'  => 'Five Column',
                '6'  => 'Six Column',
              ),
              'default'     => '6'
            ),
            array(
              'id'       => 'search_category_ds',
              'type'     => 'button_set',
              'title'    => 'Search Category',
              'options'  => array(
                'show'   => 'Show',
                'hide'   => 'Hide',
                
              ),
              'default'  => 'show'
            ),
            
            array(
              'id'       => 'search_style_ds',
              'type'     => 'button_set',
              'title'    => 'Search Style',
              'options'  => array(
                'one'   => 'One',
                'two'   => 'Two',
                
              ),
              'default'  => 'one'
            ),
    
        )
        
        ));
  
  
   // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'global_style', // The slug id of the parent section
    'title'  => 'Global Options',
    'fields' => array(
        array(
          'id'      => 'gloabal_width_1400',
          'type'    => 'slider',
          'title'   => 'Global Container Width (From 1400px)',
          'min'     => 600,
          'max'     => 1600,
          'step'    => 100,
          'unit'    => 'px',
          'default' => 1320,
        ),
        
         array(
          'id'      => 'gloabal_width_1200',
          'type'    => 'slider',
          'title'   => 'Global Container Width (From 1200px)',
          'min'     => 600,
          'max'     => 1400,
          'step'    => 100,
          'unit'    => 'px',
          'default' => 1140,
        ),
        
        array(
  'id'    => 'elementor-width-overwrite',
  'type'  => 'switcher',
  'title' => 'Elementor Container Width Overwrite',
),

array(
          'id'      => 'overwrite-elem-width',
          'type'    => 'slider',
          'title'   => 'Elementor Container Width',
          'min'     => 600,
          'max'     => 1400,
          'step'    => 100,
          'unit'    => 'px',
          'default' => 1140,
          
            'dependency' => array( 'elementor-width-overwrite', '==', 'true' ),
        ),

        )
        
        ));


<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_wishlist extends Widget_Base {
     public function get_name() {
        return 'emerce_wishlist_mini';
    }

    public function get_title() {
        return __( 'Emerce Wishlist', 'emerce' );
    }
    public function get_categories() {
        return [ 'emerce-header-elements' ];
    }
    public function get_icon() {
        return 'emerceo-semi-solid cs-orange';
    }
    
 
    
      protected function register_controls() {
          
          $this->start_controls_section(
            'emerce_wishlist_section_control',
            [
                'label' => __( 'Emerce Wishlist', 'elementor' ),
            ]
        );
        
        
		
		$this->add_responsive_control(
                'align_wishlist_icon',
                [
                    'label'        => __( 'Icon Alignment', 'mayosis' ),
                    'type'         => Controls_Manager::CHOOSE,
                    'options'      => [
                        'left'   => [
                            'title' => __( 'Left', 'mayosis' ),
                            'icon'  => 'eicon-h-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'mayosis' ),
                            'icon'  => 'eicon-h-align-center',
                        ],
                        'right'  => [
                            'title' => __( 'Right', 'mayosis' ),
                            'icon'  => 'eicon-h-align-right',
                        ],
                    ],
                    'prefix_class' => 'elementor-align-%s',
                    'default'      => 'left',
                    'selectors' => [
                                '{{WRAPPER}} .emerce-wishlist-icon' => 'text-align: {{VALUE}} !important',
                            ],
                ]
            );
		
			$this->add_control(
			'icon_size',
			[
				'label' => __( 'Icon Size', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					
				],
				'default' => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .emerce-wishlist-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
			$this->add_control(
			'line_height',
			[
				'label' => __( 'Line Height', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .emerce-wishlist-icon .emerce-wishlist-header-bar' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
        $this->end_controls_section();
        
        $this->start_controls_section(
			'wishlist_style',
			[
				'label' => __( 'Wishlist Style', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
			'wishlist_icon_color',
			[
				'label' => __( 'Wishlist Icon Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#e2e0f5',
				'selectors' => [
					'{{WRAPPER}} .emerce-wishlist-header-bar i' => 'color: {{VALUE}}',
				],
			]
		);
		
		 $this->add_control(
			'wishlist_icon_hvr_color',
			[
				'label' => __( 'Wishlist Icon Hover Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#e2e0f5',
				'selectors' => [
					'{{WRAPPER}} .emerce-wishlist-header-bar i:hover' => 'color: {{VALUE}}',
				],
			]
		);
		
		
		 $this->add_control(
			'wishlist_counter_txt_color',
			[
				'label' => __( 'Wishlist Counter Text Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .yith-wcwl-items-count' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'wishlist_counter_bg_color',
			[
				'label' => __( 'Wishlist Counter Background Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .yith-wcwl-items-count' => 'background: {{VALUE}}',
				],
			]
		);
       
            $this->end_controls_section();
            
            

      }
      
      
          protected function render() {
           $settings = $this->get_settings_for_display();
              global $woocommerce;
              ?>
    
           <div class="emerce-wishlist-icon">
            
         
               
               
                      
                                 
                             
    <?php if( Plugin::instance()->editor->is_edit_mode() ){
                     echo do_shortcode('[emerce_wcwl_items_count]');
            
                    } else{ 
                       
                       echo do_shortcode('[emerce_wcwl_items_count]');
                    } ?>
                    
       
               
           </div>
           
         
           <?php 
       }
       
       protected function content_template() {
        ?>

        <?php
    }

    public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_wishlist );
?>
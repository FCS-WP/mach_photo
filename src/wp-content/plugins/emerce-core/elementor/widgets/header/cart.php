<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_cart extends Widget_Base {
     public function get_name() {
        return 'emerce_cart_mini';
    }

    public function get_title() {
        return __( 'Emerce Cart', 'emerce' );
    }
    public function get_categories() {
        return [ 'emerce-header-elements' ];
    }
    public function get_icon() {
        return 'emerceo-semi-solid cs-orange';
    }
    
 
    
      protected function register_controls() {
          
          $this->start_controls_section(
            'emerce_cart_section_control',
            [
                'label' => __( 'Emerce Cart', 'elementor' ),
            ]
        );
        
        
      
		$this->add_control(
			'cart_icon',
			[
				'label' => __( 'Icon', 'text-domain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'ri-shopping-cart-line',
				],
			]
		);
		
		$this->add_responsive_control(
                'align_cart_icon',
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
                                '{{WRAPPER}} .emerce-cart-icon' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .emerce-cart-icon-mini i' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .emerce-cart-icon-mini' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'offcanvas-width',
			[
				'label' => __( 'Off Canvas Width', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 500,
				],
				'selectors' => [
					'{{WRAPPER}} .emerce-cart-off-canvas' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_section();
        
        $this->start_controls_section(
			'cart_style',
			[
				'label' => __( 'Icon Style', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
			'cart_icon_color',
			[
				'label' => __( 'Cart Icon Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#e2e0f5',
				'selectors' => [
					'{{WRAPPER}} .emerce-cart-icon-mini i' => 'color: {{VALUE}}',
				],
			]
		);
		
		 $this->add_control(
			'cart_icon_hvr_color',
			[
				'label' => __( 'Cart Icon Hover Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#e2e0f5',
				'selectors' => [
					'{{WRAPPER}} .emerce-cart-icon-mini i:hover' => 'color: {{VALUE}}',
				],
			]
		);
		
		
		 $this->add_control(
			'cart_counter_txt_color',
			[
				'label' => __( 'Cart Counter Text Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .emerce-count-tooltip' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'cart_counter_bg_color',
			[
				'label' => __( 'Cart Counter Background Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .emerce-count-tooltip' => 'background: {{VALUE}}',
				],
			]
		);
       
            $this->end_controls_section();
            
            $this->start_controls_section(
			'cart_offcanvas_style',
			[
				'label' => __( 'Offcanvas Style', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'offcanvas_bg',
			[
				'label' => __( 'Offcanvas Background Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .emerce-cart-off-canvas' => 'background: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'offcanvas_txt',
			[
				'label' => __( 'Offcanvas Text Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .emerce-cart-off-canvas,
					{{WRAPPER}} .emerce-min-cart-content h4,
					{{WRAPPER}} .emerce-cart-off-canvas .offcanvas-title,
					{{WRAPPER}} .emerce-cart-off-canvas p' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'offcanvas_common',
			[
				'label' => __( 'Offcanvas Common Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#fa6d2d',
				'selectors' => [
					'{{WRAPPER}} .min-cart-quantity .amount,
					{{WRAPPER}} .mini-cart-bottom-set p.total .amount' => 'color: {{VALUE}}',
					
					'{{WRAPPER}} .remove.remove_from_cart_button' => 'background: {{VALUE}}'
				],
			]
		);
		
		$this->add_control(
			'offcanvas_common_alt',
			[
				'label' => __( 'Offcanvas Common Alter Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .remove.remove_from_cart_button' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'offcanvas_broder_clr',
			[
				'label' => __( 'Offcanvas Border Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#ccc',
				'selectors' => [
					'{{WRAPPER}} .mini-cart-bottom-set,
					{{WRAPPER}} .mini-cart-bottom-set p.total' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'cartbtn_title',
			[
				'label' => __( 'Cart Button', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs(
			'cartbutton_style'
		);

		$this->start_controls_tab(
			'cart_btn_normal',
			[
				'label' => __( 'Normal', 'plugin-name' ),
			]
		);

        $this->add_control(
			'cart_btn_bg',
			[
				'label' => __( 'Background Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.wc-forward' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'cart_btn_border',
			[
				'label' => __( 'Border Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.wc-forward' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'cart_btn_txt',
			[
				'label' => __( 'Text Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.wc-forward' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'cart_btn_hover',
			[
				'label' => __( 'Hover', 'plugin-name' ),
			]
		);

	        $this->add_control(
			'cart_btn_hvr_bg',
			[
				'label' => __( 'Background Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.wc-forward:hover' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'cart_btn_hvr_border',
			[
				'label' => __( 'Border Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.wc-forward:hover' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'cart_btn_hvr_txt',
			[
				'label' => __( 'Text Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.wc-forward:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		
		
		$this->add_control(
			'checkoutbtn_title',
			[
				'label' => __( 'Checkout Button', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs(
			'checkoutbutton_style'
		);

		$this->start_controls_tab(
			'checkout_btn_normal',
			[
				'label' => __( 'Normal', 'plugin-name' ),
			]
		);

    $this->add_control(
    			'checkout_btn_bg',
    			[
    				'label' => __( 'Background Color', 'emerce' ),
    				'type' => \Elementor\Controls_Manager::COLOR,
    				'scheme' => [
    					'type' => \Elementor\Core\Schemes\Color::get_type(),
    					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
    				],
    				'default' => '#fa6d2d',
    				'selectors' => [
    					'{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.checkout.wc-forward' => 'background-color: {{VALUE}}',
    				],
    			]
    		);
    		
    		$this->add_control(
    			'checkout_btn_border',
    			[
    				'label' => __( 'Border Color', 'emerce' ),
    				'type' => \Elementor\Controls_Manager::COLOR,
    				'scheme' => [
    					'type' => \Elementor\Core\Schemes\Color::get_type(),
    					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
    				],
    				'default' => '#fa6d2d',
    				'selectors' => [
    					'{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.checkout.wc-forward' => 'border-color: {{VALUE}}',
    				],
    			]
    		);
    		
    		$this->add_control(
    			'checkout_btn_txt',
    			[
    				'label' => __( 'Text Color', 'emerce' ),
    				'type' => \Elementor\Controls_Manager::COLOR,
    				'scheme' => [
    					'type' => \Elementor\Core\Schemes\Color::get_type(),
    					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
    				],
    				'default' => '#fff',
    				'selectors' => [
    					'{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.checkout.wc-forward' => 'color: {{VALUE}}',
    				],
    			]
    		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'checkout_btn_hover',
			[
				'label' => __( 'Hover', 'plugin-name' ),
			]
		);

	
	        $this->add_control(
    			'checkout_btn_hvr_bg',
    			[
    				'label' => __( 'Background Color', 'emerce' ),
    				'type' => \Elementor\Controls_Manager::COLOR,
    				'scheme' => [
    					'type' => \Elementor\Core\Schemes\Color::get_type(),
    					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
    				],
    				'default' => '#fa6d2d',
    				'selectors' => [
    					'{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.checkout.wc-forward:hover' => 'background-color: {{VALUE}}',
    				],
    			]
    		);
    		
    		$this->add_control(
    			'checkout_btn_hvr_border',
    			[
    				'label' => __( 'Border Color', 'emerce' ),
    				'type' => \Elementor\Controls_Manager::COLOR,
    				'scheme' => [
    					'type' => \Elementor\Core\Schemes\Color::get_type(),
    					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
    				],
    				'default' => '#fa6d2d',
    				'selectors' => [
    					'{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.checkout.wc-forward:hover' => 'border-color: {{VALUE}}',
    				],
    			]
    		);
    		
    		$this->add_control(
    			'checkout_btn_hvr_txt',
    			[
    				'label' => __( 'Text Color', 'emerce' ),
    				'type' => \Elementor\Controls_Manager::COLOR,
    				'scheme' => [
    					'type' => \Elementor\Core\Schemes\Color::get_type(),
    					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
    				],
    				'default' => '#fff',
    				'selectors' => [
    					'{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.checkout.wc-forward:hover' => 'color: {{VALUE}}',
    				],
    			]
    		);

		$this->end_controls_tab();

		$this->end_controls_tabs();


		$this->end_controls_section();

      }
      
      
          protected function render() {
           $settings = $this->get_settings_for_display();
    
              global $woocommerce;
              ?>
    
           <div class="emerce-cart-icon">
            
         
               
                <button class="emerce-cart-icon-mini" type="button" data-bs-toggle="offcanvas" data-bs-target="#emerce-cart-off-canvas" aria-controls="emerce-cart-off-canvas">
  <?php \Elementor\Icons_Manager::render_icon( $settings['cart_icon'], [ 'aria-hidden' => 'true' ] ); ?>

                <span class="emerce-count-tooltip" id="mini-cart-count"> 
                <?php if( Plugin::instance()->editor->is_edit_mode() ){ ?>
                0
                <?php }else { ?>
                <?php echo WC()->cart->get_cart_contents_count();?>
                <?php } ?>
                </span>
               
                </button>
                      
                                 
                                 <div class="emerce-cart-off-canvas offcanvas offcanvas-end" tabindex="-1" id="emerce-cart-off-canvas" data-bs-scroll="true" aria-labelledby="emerce-cart-off-canvasLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="emerce-cart-off-canvasLabel">Cart</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="widget_shopping_cart_content">
    <?php if( Plugin::instance()->editor->is_edit_mode() ){
            
                    } else{ 
                       
                        woocommerce_mini_cart();
                    } ?>
                    
       </div>          
  </div>
</div>
                
                    
               
           </div>
           
         
           <?php 
       }
       
       protected function content_template() {
        ?>

        <?php
    }

    public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_cart );
?>
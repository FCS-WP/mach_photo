<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_home_grocery_banner extends Widget_Base {

   public function get_name() {
      return 'emerce_home_grocery_banner';
   }

   public function get_title() {
      return __( 'Home Grocery Banner', 'emerce' );
   }
public function get_categories() {
		return [ 'emerce-ele-widgets-cat' ];
	}
   public function get_icon() { 
        return 'emerceo-semi-solid cs-orange';
   }

   protected function register_controls() {
       
       $this->start_controls_section(
			'banner_left_item',
			[
				'label' => __( 'Banner Left Item', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'banner_left_title',
			[
				'label' => __( 'Title', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Welcome To Our Fresh & Organic Store', 'emerce' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'banner_left_btn_text',
			[
				'label' => __( 'Button Text', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Shop Now', 'emerce' ),
			]
		);
		$this->add_control(
			'banner_left_btn_link',
			[
				'label' => __( 'Button Link', 'emerce' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'emerce' ),
				'show_external' => true,
			]
		);
		$this->add_control(
			'banner_left_img',
			[
				'label' => __( 'Choose Image', 'emerce' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'banner_right_item1',
			[
				'label' => __( 'Banner Right Item 1', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'banner_right_sub_title1',
			[
				'label' => __( 'Sub Title', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Hurry Up!', 'emerce' ),
			]
		);
		$this->add_control(
			'banner_right_title1',
			[
				'label' => __( 'Title', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Accessories', 'emerce' ),
			]
		);
		$this->add_control(
			'banner_right_btn_text1',
			[
				'label' => __( 'Button Text', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Shop Now', 'emerce' ),
			]
		);
		
		$this->add_control(
			'banner_right_btn_link1',
			[
				'label' => __( 'Link', 'emerce' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'emerce' ),
				'show_external' => true,
			]
		);
		$this->add_control(
			'banner_right_image1',
			[
				'label' => __( 'Choose Image', 'emerce' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'banner_right_background1',
			[
				'label' => __( 'Background Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider2-small-bg1' => 'background: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'banner_right_item2',
			[
				'label' => __( 'Banner Right Item 2', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'banner_right_sub_title2',
			[
				'label' => __( 'Sub Title', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Hurry Up!', 'emerce' ),
			]
		);
		$this->add_control(
			'banner_right_title2',
			[
				'label' => __( 'Title', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Accessories', 'emerce' ),
			]
		);
		$this->add_control(
			'banner_right_btn_text2',
			[
				'label' => __( 'Button Text', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Shop Now', 'emerce' ),
			]
		);
		
		$this->add_control(
			'banner_right_btn_link2',
			[
				'label' => __( 'Link', 'emerce' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'emerce' ),
				'show_external' => true,
			]
		);
		$this->add_control(
			'banner_right_image2',
			[
				'label' => __( 'Choose Image', 'emerce' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'banner_right_background2',
			[
				'label' => __( 'Background Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider2-small-bg2' => 'background: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
		
		// Style Tab
		
		$this->start_controls_section(
			'banner_left_style',
			[
				'label' => __( 'Banner Left', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'banner_left_title_color',
			[
				'label' => __( 'Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider2-content h1' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'banner_left_title_typo',
				'label' => __( 'Typography', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .slider2-content h1',
			]
		);
        
        $this->start_controls_tabs(
            'btn_left_style_tabs'
        );
        $this->start_controls_tab(
            'btn_left_style_normal_tab',
            [
                'label' => __( 'Normal', 'emerce' ),
            ]
        );
        $this->add_control(
            'btn_left_bg_color',
            [
                'label' => __( 'Background Color', 'emerce' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .green-bg-btn a' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_left_text_color',
            [
                'label' => __( 'Text Color', 'emerce' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .green-bg-btn a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'btn_left_text_typo',
                'label' => __( 'Typography', 'emerce' ),
                'selector' => '{{WRAPPER}} .green-bg-btn a',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'btn_left_border',
                'label' => __( 'Border', 'emerce' ),
                'selector' => '{{WRAPPER}} .green-bg-btn a',
            ]
        );
        $this->add_responsive_control(
            'btn_left_padding',
            [
                'label' => __( 'Padding', 'emerce' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .green-bg-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'btn_left_style_hover_tab',
            [
                'label' => __( 'Hover', 'emerce' ),
            ]
        );
        $this->add_control(
            'btn_left_bg_hover_color',
            [
                'label' => __( 'Background Color', 'emerce' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .green-bg-btn a:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_left_text_hover_color',
            [
                'label' => __( 'Color', 'emerce' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .green-bg-btn a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'btn__left_text_hover_typo',
                'label' => __( 'Typography', 'emerce' ),
                'selector' => '{{WRAPPER}} .green-bg-btn a:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'btn_left_hover_border',
                'label' => __( 'Border', 'emerce' ),
                'selector' => '{{WRAPPER}} .green-bg-btn a:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'banner_right_sub_style',
			[
				'label' => __( 'Banner Right', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'banner_right_sub_title_color',
			[
				'label' => __( 'Sub Title Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner-cat p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'banner_right_sub_title_typo',
				'label' => __( 'Sub Title Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .banner-cat p',
			]
		);

		$this->add_control(
			'banner_right_title_color',
			[
				'label' => __( 'Title Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner-cat h3' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'banner_right_title_typo',
				'label' => __( 'Title Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .banner-cat h3',
			]
		);
		
		$this->start_controls_tabs(
			'style_tabs'
		);
		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => __( 'Normal', 'emerce' ),
			]
		);
        $this->add_control(
			'banner_right_link_color',
			[
				'label' => __( 'Link Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .green-btn a' => 'color: {{VALUE}};border-color: {{VALUE}}',
				
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'banner_right_link_typo',
				'label' => __( 'Link Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .green-btn a',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'banner_right_link_border',
				'label' => __( 'Link Border', 'emerce' ),
				'selector' => '{{WRAPPER}} .green-btn a',
			]
		);
      $this->end_controls_tab();
      $this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => __( 'Hover', 'emerce' ),
			]
		);
        $this->add_control(
			'banner_right_link_hover_color',
			[
				'label' => __( 'Link Hover Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .green-btn a:hover' => 'color: {{VALUE}}; border-color:{{VALUE}}',
					
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'banner_right_link_hover_typo',
				'label' => __( 'Link Hover Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .green-btn a:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'banner_right_link_hover_border',
				'label' => __( 'Link Hover Border', 'emerce' ),
				'selector' => '{{WRAPPER}} .green-btn a:hover',
			]
		);


      $this->end_controls_tab();
      $this->end_controls_tabs();
      
	$this->add_responsive_control(
        'banner_right_height',
        [
            'label' => esc_html__( 'Banner Height', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'range' => [
                'px' => [
                    'min' => 50,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 1,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 250,
            ],
            'selectors' => [
                '{{WRAPPER}} .emerce-slider2-small' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    
    $this->add_responsive_control(
        'banner_right_image_size',
        [
            'label' => esc_html__( 'Banner Image Size', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'range' => [
                'px' => [
                    'min' => 50,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 1,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 230,
            ],
            'selectors' => [
                '{{WRAPPER}} .banner-img img' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
		
	$this->end_controls_section();
		
		

    
   }
   

   

   protected function render( $instance = [] ) {
       $settings = $this->get_settings_for_display();
       
       
       ?>
       
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="emerce-slider2">
                        <div class="slider2-img">
                            <?php if($settings['banner_left_img']['url']){ ?>
                            <img src="<?php echo wp_get_attachment_image_url($settings['banner_left_img']['id'], 'emerce-home-banner'); ?>" alt="<?php echo esc_html(get_the_title( $settings['banner_left_img']['id'] )); ?>">
                            <?php } ?>
                        </div>
                        <div class="slider2-content">
                            <h1><?php echo esc_html($settings['banner_left_title']); ?></h1>
                            <div class="green-bg-btn">
                                <a href="<?php echo esc_url($settings['banner_left_btn_link']['url']); ?>"><?php echo esc_html($settings['banner_left_btn_text']); ?> <i class="zil zi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="emerce-slider2-small slider2-small-bg1 mb-30">
                        <div class="banner-cat">
                            <p><?php echo esc_html($settings['banner_right_sub_title1']); ?></p>
                            <h3><?php echo esc_html($settings['banner_right_title1']); ?></h3>
                            <div class="green-btn">
                                <a href="<?php echo esc_url($settings['banner_right_btn_link1']['url']); ?>"><?php echo esc_html($settings['banner_right_btn_text1']); ?></a>
                            </div>
                        </div>
                        <div class="banner-img">
                            <?php if($settings['banner_right_image1']['url']){ ?>
                            <img src="<?php  echo wp_get_attachment_image_url($settings['banner_right_image1']['id'], 'medium'); ?>" alt="<?php echo esc_html(get_the_title( $settings['banner_right_image1']['id'] )); ?>">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="emerce-slider2-small slider2-small-bg2">
                        <div class="banner-cat">
                            <p><?php echo esc_html($settings['banner_right_sub_title2']); ?></p>
                            <h3><?php echo esc_html($settings['banner_right_title2']); ?></h3>
                            <div class="green-btn">
                                <a href="<?php echo esc_url($settings['banner_right_btn_link2']['url']); ?>"><?php echo esc_html($settings['banner_right_btn_text2']); ?></a>
                            </div>
                        </div>
                        <div class="banner-img">
                            <?php if($settings['banner_right_image2']['url']){ ?>
                            <img src="<?php  echo wp_get_attachment_image_url($settings['banner_right_image2']['id'], 'medium'); ?>" alt="<?php echo esc_html(get_the_title( $settings['banner_right_image2']['id'] )); ?>">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        
       
       <?php
       
}  
protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_home_grocery_banner );
?>
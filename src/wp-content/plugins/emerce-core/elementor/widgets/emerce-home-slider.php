<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_home_slider extends Widget_Base {

   public function get_name() {
      return 'emerce_home_slider';
   }

   public function get_title() {
      return __( 'Slider', 'emerce' );
   }
public function get_categories() {
		return [ 'emerce-ele-widgets-cat' ];
	}
   public function get_icon() { 
        return 'emerceo-semi-solid cs-orange';
   }

   protected function register_controls() {

      $this->start_controls_section(
			'slider_content_section',
			[
				'label' => __( 'Slider Content', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


      $repeater = new \Elementor\Repeater();
      
      $repeater->add_control(
			'slider_sub_title',
			[
				'label' => __( 'Slider Sub Title', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'rows' => 4,
				'default' => __( 'Amazing Online Store', 'emerce' ),
				'label_block' => true,
				
			]
		);
      $repeater->add_control(
			'slider_title',
			[
				'label' => __( 'Slider Title', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'rows' => 4,
				'default' => __( 'Look Elegant And Shine Bright', 'emerce' ),
				'label_block' => true,
			]
		);
      $repeater->add_control(
			'slider_description',
			[
				'label' => __( 'Slider Description', 'emerce' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'rows' => 4,
				'placeholder' => __( 'Type your slider description', 'emerce' ),
				
			]
		);
      $repeater->add_control(
			'slider_btn_text1',
			[
				'label' => __( 'Button Text', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Type your button text', 'emerce' ),
				'default' => __( 'Explore Now', 'emerce' ),
			]
		);
      $repeater->add_control(
			'slider_btn_link1',
			[
				'label' => __( 'Button URL', 'emerce' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'emerce' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);
		$repeater->add_control(
			'slider_icon_link1',
			[
				'label' => esc_html__( 'Button Icon', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);
	    $repeater->add_control(
			'slider_btn_text2',
			[
				'label' => __( 'Button Text', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'separator' => 'before',
				'placeholder' => __( 'Type your button text', 'emerce' ),
			]
		);
      $repeater->add_control(
			'slider_btn_link2',
			[
				'label' => __( 'Button URL', 'emerce' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'emerce' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);
		$repeater->add_control(
			'slider_icon_link2',
			[
				'label' => esc_html__( 'Button Icon', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);
		
	// Slider Background 
		$repeater->add_control(
			'options_separator',
			[
				'label' => __( 'Slider Background Image or Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$repeater->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'sp_bg_main',
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}',
			]
		);
		$repeater->add_control(
			'sp_ctn_color',
			[
				'label' => esc_html__( 'Slider Title Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .slider-content h1' => 'color: {{VALUE}}',
				],
			]
		);
			$repeater->add_control(
			'sp_ptn_color',
			[
				'label' => esc_html__( 'Slider Content Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'separator' => 'after',
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .slider-content p' => 'color: {{VALUE}}',
				],
			]
		);
		
		     
    $repeater->add_control(
			'content_align',
			[
				'label' => esc_html__( 'Content Alignment', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'separator' => 'after',
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'emerce-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'emerce-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'emerce-core' ),
						'icon' => 'eicon-text-align-right',
					],
                    'justify' => [
						'title' => esc_html__( 'Justify', 'emerce-core' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'text-align: {{VALUE}}',
				],
			]
		);

		$repeater->add_control(
			'slides_top_image',
			[
				'label' => __( 'Slider Top Image', 'emerce' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
	$repeater->add_control(
			'slides_elips1',
			[
				'label' => __( 'Upload for Elips 1', 'emerce' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_control(
			'slides_elips2',
			[
				'label' => __( 'Upload for Elips 2', 'emerce' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_control(
			'slides_elips3',
			[
				'label' => __( 'Upload for Elips 3', 'emerce' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
		
		$repeater->add_responsive_control(
			'top_image_position',
			[
				'label' => __( 'Slider Top Image Vertical Position', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 5,
				],
				
			]
		);
		
		$repeater->add_responsive_control(
			'top_image_l_position',
			[
				'label' => __( 'Slider Top Image Horizontal Position', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 0,
				],
				
			]
		);
		
		$repeater->add_control(
			'col_alter',
			[
				'label' => __( 'Reverse Column', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'normal',
				'options' => [
					'normal'  => __( 'Normal', 'plugin-domain' ),
					'reverse' => __( 'Reverse', 'plugin-domain' ),
					
				],
			]
		);
      $this->add_control(
			'slides_list',
			[
				'label' => __( 'Slides List', 'emerce' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'slider_title' => __( 'Look Elegant And Shine Bright', 'emerce' ),
                        'slider_btn_text' => __( 'Explore Now', 'emerce' ),
					],
				],
				'title_field' => '{{{ slider_title }}}',
			]
		);
		$this->end_controls_section();


      // Settings Tab
      $this->start_controls_section(
			'slider_settings_section',
			[
				'label' => __( 'Slider Settings', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'show_navigation',
			[
				'label' => __( 'Show Navigation Button', 'emerce' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'emerce' ),
				'label_off' => __( 'No', 'emerce' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control(
			'show_pagination',
			[
				'label' => __( 'Show Pagination Dots', 'emerce' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'emerce' ),
				'label_off' => __( 'No', 'emerce' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$this->add_responsive_control(
			'slider_content_width',
			[
				'label' => __( 'Content Area Width', 'emerce' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1200,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 600,
				],
				'selectors' => [
					'{{WRAPPER}} .slider-content' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
				
		
		
		$this->add_responsive_control(
			'slider_content_padding',
			[
				'label' => __( 'Content Padding', 'emerce' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .slider-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_responsive_control(
			'slider_main_padding',
			[
				'label' => __( 'Slide Padding', 'emerce' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .slider-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		
		
		$this->add_responsive_control(
			'slider_height',
			[
				'label' => __( 'Slider Height', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%','vh' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 855,
				],
				
				'selectors' => [
					'{{WRAPPER}} .emerceSlider .flickity-slider .slide-full-width,{{WRAPPER}} .emerceSlider .slider-img' => 'min-height: {{SIZE}}{{UNIT}};',
				],
				
			]
		);
		
		$this->add_control(
			'slider_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100000,
				'step' => 5,
				'default' => 5000,
			]
		);

		$this->end_controls_section();
		
	// Style Tabs
	// Sub Title Style
		$this->start_controls_section(
			'sub_title_style',
			[
				'label' => __( 'Sub Title', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'sub_title_color',
			[
				'label' => __( 'Color', 'emercen' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-content h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'sub_title_typo',
				'label' => __( 'Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .slider-content h4',
			]
		);
		$this->end_controls_section();
		
	// Title Style
		$this->start_controls_section(
			'title_style',
			[
				'label' => __( 'Title', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-content h1' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typo',
				'label' => __( 'Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .slider-content h1',
			]
		);
        $this->add_responsive_control(
			'title_bm',
			[
				'label' => esc_html__( 'Title Bottom Spacing', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 2,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 60,
				],
				'selectors' => [
					'{{WRAPPER}} .slider-content h1' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		
	// Description Style
		$this->start_controls_section(
			'description_style',
			[
				'label' => __( 'Description', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'description_color',
			[
				'label' => __( 'Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-content p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'description_typo',
				'label' => __( 'Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .slider-content p',
			]
		);
        $this->add_responsive_control(
			'description_bm',
			[
				'label' => esc_html__( 'Description Bottom Spacing', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 2,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .slider-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		
	// Button Style
		$this->start_controls_section(
			'slider_btn_style',
			[
				'label' => __( 'Button', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

  $this->add_control(
			'buttnon_a_style',
			[
				'label' => __( 'Left Hand Button Style', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs(
			'btn_style_tabs'
		);
		$this->start_controls_tab(
			'btn_style_normal_tab',
			[
				'label' => __( 'Normal', 'emerce' ),
			]
		);
		$this->add_control(
			'btn_bg_color',
			[
				'label' => __( 'Background Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .white-bg-btn a.emerce-slider-left-btn' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'btn_text_color',
			[
				'label' => __( 'Text Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .white-bg-btn a.emerce-slider-left-btn' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_text_typo',
				'label' => __( 'Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .white-bg-btn a.emerce-slider-left-btn',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'btn_border',
				'label' => __( 'Border', 'emerce' ),
				'selector' => '{{WRAPPER}} .white-bg-btn a.emerce-slider-left-btn',
			]
		);
		$this->add_control(
			'btn_padding',
			[
				'label' => __( 'Padding', 'emerce' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .white-bg-btn a.emerce-slider-left-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
      $this->end_controls_tab();
      $this->start_controls_tab(
			'btn_style_hover_tab',
			[
				'label' => __( 'Hover', 'emerce' ),
			]
		);
	    $this->add_control(
			'btn_bg_hover_color',
			[
				'label' => __( 'Background Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .white-bg-btn a.emerce-slider-left-btn:hover' => 'background: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'btn_text_hover_color',
			[
				'label' => __( 'Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .white-bg-btn a.emerce-slider-left-btn:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_text_hover_typo',
				'label' => __( 'Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .white-bg-btn a.emerce-slider-left-btn:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'btn_hover_border',
				'label' => __( 'Border', 'emerce' ),
				'selector' => '{{WRAPPER}} .white-bg-btn a.emerce-slider-left-btn:hover',
			]
		);
      $this->end_controls_tab();
      $this->end_controls_tabs();
      
      $this->add_control(
			'buttnon_b_style',
			[
				'label' => __( 'Right Hand Button Style', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
      $this->start_controls_tabs(
			'btn_b_style_tabs'
		);
		$this->start_controls_tab(
			'btn_b_style_normal_tab',
			[
				'label' => __( 'Normal', 'emerce' ),
			]
		);
		$this->add_control(
			'btn_b_bg_color',
			[
				'label' => __( 'Background Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .white-bg-btn a.emerce-slider-right-btn' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'btn_b_text_color',
			[
				'label' => __( 'Text Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .white-bg-btn a.emerce-slider-right-btn' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_b_text_typo',
				'label' => __( 'Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .white-bg-btn a.emerce-slider-right-btn',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'btn_b_border',
				'label' => __( 'Border', 'emerce' ),
				'selector' => '{{WRAPPER}} .white-bg-btn a.emerce-slider-right-btn',
			]
		);
		$this->add_control(
			'btn_b_padding',
			[
				'label' => __( 'Padding', 'emerce' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .white-bg-btn a.emerce-slider-right-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
      $this->end_controls_tab();
      $this->start_controls_tab(
			'btn_b_style_hover_tab',
			[
				'label' => __( 'Hover', 'emerce' ),
			]
		);
	    $this->add_control(
			'btn_b_bg_hover_color',
			[
				'label' => __( 'Background Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .white-bg-btn a.emerce-slider-right-btn:hover' => 'background: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'btn_b_text_hover_color',
			[
				'label' => __( 'Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .white-bg-btn a.emerce-slider-right-btn:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_b_text_hover_typo',
				'label' => __( 'Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .white-bg-btn a.emerce-slider-right-btn:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'btn_b_hover_border',
				'label' => __( 'Border', 'emerce' ),
				'selector' => '{{WRAPPER}} .white-bg-btn a.emerce-slider-right-btn:hover',
			]
		);
      $this->end_controls_tab();
      $this->end_controls_tabs();
      
	$this->end_controls_section();
    
    
    // Button Style
		$this->start_controls_section(
			'slider_arrow_style',
			[
				'label' => __( 'Arrow Style', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->start_controls_tabs(
			'emerce_arrow_tab'
		);
		$this->start_controls_tab(
			'emerce_arrowstyle_normal_tab',
			[
				'label' => __( 'Normal', 'emerce' ),
			]
		);
		$this->add_control(
			'emerce_arrowbg_color',
			[
				'label' => __( 'Background Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .flickity-prev-next-button.previous,
					{{WRAPPER}} .flickity-prev-next-button.next' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'emerce_arrowtext_color',
			[
				'label' => __( 'Text Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .flickity-prev-next-button.previous,
					{{WRAPPER}} .flickity-prev-next-button.next' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'emerce_arrowborder',
				'label' => __( 'Border', 'emerce' ),
				'selector' => '{{WRAPPER}} .flickity-prev-next-button.previous,
					{{WRAPPER}} .flickity-prev-next-button.next',
			]
		);
		
      $this->end_controls_tab();
      $this->start_controls_tab(
			'emerce_arrowstyle_hover_tab',
			[
				'label' => __( 'Hover', 'emerce' ),
			]
		);
	    $this->add_control(
			'emerce_arrowbg_hover_color',
			[
				'label' => __( 'Background Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .flickity-prev-next-button.previous:hover,
					{{WRAPPER}} .flickity-prev-next-button.next:hover' => 'background: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'emerce_arrowtext_hover_color',
			[
				'label' => __( 'Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .flickity-prev-next-button.previous:hover,
					{{WRAPPER}} .flickity-prev-next-button.next:hover' => 'color: {{VALUE}}',
				],
			]
		);
	
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'emerce_arrowhover_border',
				'label' => __( 'Border', 'emerce' ),
				'selector' => '{{WRAPPER}} .flickity-prev-next-button.previous:hover,
					{{WRAPPER}} .flickity-prev-next-button.next:hover',
			]
		);
      $this->end_controls_tab();
      $this->end_controls_tabs();
      
      
      
       
	$this->end_controls_section();
	
	
	// Button Style
		$this->start_controls_section(
			'slider_pagination_style',
			[
				'label' => __( 'Pagination Style', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'pagination_position',
			[
				'label' => __( 'Position', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'bottom',
				'options' => [
					'bottom'  => __( 'Bottom', 'plugin-domain' ),
					'left' => __( 'Left', 'plugin-domain' ),
					'right' => __( 'Right', 'plugin-domain' ),
				],
			]
		);

		$this->add_control(
			'emerce_dot_color',
			[
				'label' => __( 'Pagination Dot Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .emerceSlider .flickity-page-dots .dot:after' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'emerce_dot_border_color',
			[
				'label' => __( 'Pagination Dot Border Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .emerceSlider .flickity-page-dots .dot.is-selected' => 'border-color: {{VALUE}}',
				],
			]
		);
	
		     
	$this->end_controls_section();

   }
   

   protected function render( $instance = [] ) {

      $settings = $this->get_settings_for_display();
      $slides_list = $settings['slides_list'];
      $arrow = $settings['show_navigation'];
      $pagination = $settings['show_pagination'];
      $page_position = $settings['pagination_position'];
      $autoplay = $settings['slider_autoplay'];
      
      if ($arrow==true){
          $arrow ="true";
      } else {
           $arrow ="false";
      }
  
  
      if ($pagination==true){
          $pagination ="true";
      } else {
           $pagination ="false";
      }
  ?>
  
        <section class="slider-full">
            <div class="emerceSlider">
                <div class="emerceSlider_box emerce-alter-pos-dot-<?php echo esc_html($page_position);?>"  data-flickity='{ "cellAlign": "center",
                "wrapAround": true,
                "autoPlay": <?php echo esc_html($autoplay);?>,
                "prevNextButtons":<?php echo esc_html($arrow);?>,
                "adaptiveHeight": true,
                "imagesLoaded": true,
                "lazyLoad": 1,
                "dragThreshold" : 15,
                "pageDots": <?php echo esc_html($pagination);?>}'>
                    
                    <?php if($slides_list):
                    foreach($slides_list as $slide):
                        
                      
                        if ($slide['col_alter'] == 'reverse' ){
                            $orderf = 'order-lg-last';
                            
                        } else {
                              $orderf = '';
                        }
                        
                    ?>
                    
                    <div class="slide-full-width">
                        <div class="slider-img elementor-repeater-item-<?php echo esc_attr( $slide['_id'] ); ?>"  >
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-xl-5 <?php echo $orderf; ?>">
                                        <div class="slider-content">
                                            <?php if($slide['slider_sub_title']) { ?>
                                            <h4><?php echo esc_html($slide['slider_sub_title']); ?></h4>
                                            <?php } 
                                                if($slide['slider_title']) {
                                            ?>
                                            <h1><?php echo esc_html($slide['slider_title']); ?></h1>
                                            <?php } 
                                                if($slide['slider_description']) {
                                            ?>
                                            <p><?php echo $slide['slider_description']; ?></p>
                                            <?php } ?>
                                                <?php if($slide['slides_top_image']['url']) { ?>
                                                    <div class="xpc-mob-slide-img d-block d-lg-none">
                                                         <?php echo wp_get_attachment_image( $slide['slides_top_image']['id'], 'full' ); ?>
                                                    </div>
                                                <?php } ?>
                                            <?php if($slide['slider_btn_text1'] || $slide['slider_btn_text2']) { ?>
                                            <div class="white-bg-btn">
                                                <?php if($slide['slider_btn_text1']) {?>
                                                <a href="<?php echo esc_url($slide['slider_btn_link1']['url']); ?>" class="emerce-slider-left-btn"><?php echo esc_html($slide['slider_btn_text1']); ?> 
                                                <?php \Elementor\Icons_Manager::render_icon( $slide['slider_icon_link1'], [ 'aria-hidden' => 'true' ] ); ?>
                                                </a>
                                                <?php } 
                                                    if($slide['slider_btn_text2']) {
                                                ?>
                                                <a href="<?php echo esc_url($slide['slider_btn_link2']['url']); ?>" class="emerce-slider-right-btn"><?php echo esc_html($slide['slider_btn_text2']); ?>  <?php \Elementor\Icons_Manager::render_icon( $slide['slider_icon_link2'], [ 'aria-hidden' => 'true' ] ); ?>
                                                <?php } ?>
                                                </a>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-7 xop-sli-<?php echo $slide['col_alter']; ?>">
                                        <div class="slider3-img d-none d-lg-block">
                                            
                                            <div class="slider-3-avb-img" style="bottom:<?php echo $slide['top_image_position']['size'];?><?php echo $slide['top_image_position']['unit'];?>;
                                            left:<?php echo $slide['top_image_l_position']['size'];?><?php echo $slide['top_image_l_position']['unit'];?>">
                                         <?php if($slide['slides_top_image']['url']) { ?>
                                        
                                            <?php echo wp_get_attachment_image( $slide['slides_top_image']['id'], 'full' ); ?>
                                            
                                             <?php } ?>
                                             </div>
                                             
                                             <ul id="emercehero-<?php echo $slide['_id'];?>" class="emerce-slide-paralax layer d-none d-lg-block" data-hover-only="true">
                                            <?php if($slide['slides_elips1']['url']) { ?>
                                            <li class="layer bg-circle" data-depth="0.8">
                                                <img src="<?php echo esc_url($slide['slides_elips1']['url']); ?>" alt="<?php echo get_the_title( $slide['slides_elips1']['id'] ); ?>">
                                            </li>
                                            <?php } ?>
                                            <?php if($slide['slides_elips2']['url']) { ?>
                                            <li class="bg-circle2 layer" data-depth="0.6">
                                                <img src="<?php echo esc_url($slide['slides_elips2']['url']); ?>" alt="<?php echo get_the_title( $slide['slides_elips2']['id'] ); ?>">
                                            </li>
                                            <?php } ?>
                                            <?php if($slide['slides_elips3']['url']) { ?>
                                            <li class="bg-circle3 layer" data-depth="0.2">
                                                <img src="<?php echo esc_url($slide['slides_elips3']['url']); ?>" alt="<?php echo get_the_title( $slide['slides_elips3']['id'] ); ?>">
                                            </li>
                                            <?php } ?>
                                            
                                            </ul>
                                            
                                            <?php if($slide['slides_elips1']['url']) { ?>
                                            <script>
                                              jQuery(window).on('elementor/frontend/init', function () {
                                           jQuery(document).ready(function ($) {
                                    var scene = $('#emercehero-<?php echo $slide['_id'];?>').get(0);
                                    var parallaxInstance = new Parallax(scene)
                                    
                                    });
                                                });
                                </script>
                                <?php } ?>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php endforeach; wp_reset_query(); endif; ?>
                    
                    
                </div>
              
            </div>
        </section>
        
        <?php
        


       
}  
protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_home_slider );
?>
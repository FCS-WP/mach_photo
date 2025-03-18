<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
namespace Elementor;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;
use Elementor\Core\Responsive\Responsive;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_vertial_nav extends Widget_Base {
     public function get_name() {
        return 'emerce_vertial_nav_box';
    }

    public function get_title() {
        return __( 'Emerce Vertical Navigation', 'emerce' );
    }
    public function get_categories() {
        return [ 'emerce-header-elements' ];
    }
    public function get_icon() {
        return 'emerceo-semi-solid cs-orange';
    }
    
    protected $emerce_menu_index = 1;

    protected function get_emerce_menu_index() {
        return $this->emerce_menu_index++;
    }

    private function get_available_menus() {
        $menus = wp_get_nav_menus();

        $options = [];

        foreach ( $menus as $menu ) {
            $options[ $menu->slug ] = $menu->name;
        }

        return $options;
    }
    
      protected function register_controls() {
          
          $this->start_controls_section(
            'emerce_vertial_nav_section_control',
            [
                'label' => __( 'Navigation', 'elementor' ),
            ]
        );
        
        $this->add_control(
			'main-information',
			[
				'label' => __( 'Please Select Vertical menu from Appearance> Menu. You can customize style from style tab', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'menu_box_title',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Bar Title', 'plugin-name' ),
				'default' =>'All Categories',
				'placeholder' => esc_html__( 'Enter your title', 'plugin-name' ),
			]
		);
		
			$this->add_control(
			'bar_icon',
			[
				'label' => __( 'Bar Icon', 'text-domain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'ri-bar-chart-horizontal-line',
					
				],
			]
		);
		
		$this->add_control(
			'bar_type',
			[
				'label' => esc_html__( 'Bar Mode', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'emccollapsed',
				'options' => [
					'emccollapsed'  => esc_html__( 'Collapsed', 'plugin-name' ),
					'drop-active' => esc_html__( 'Expanded', 'plugin-name' ),
					
				],
			]
		);

         $this->end_controls_section();
         
         $this->start_controls_section(
            'section_style_main-menu',
            [
                'label' => __( '<span class="emerce-badge-el">Emerce</span> Menu Bar Style', 'emerce' ),
                'tab' => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'bar_typography',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .etc-ver-cat-toggle',
            ]
        );
        
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'bar_background',
				'label' => esc_html__( 'Bar Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .etc-ver-cat-toggle',
			]
		);
        
        $this->add_control(
			'bar_text_color',
			[
				'label' => __( 'Bar Text Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .etc-ver-cat-toggle' => 'color: {{VALUE}}',
				],
			]
		);
		
        $this->add_control(
			'bar_padding',
			[
				'label' => __( 'Padding', 'plugin-domain' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .etc-ver-cat-toggle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'menu_box_background',
				'label' => esc_html__( 'Menu Box Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .emerce-vertical-nav-dropdown',
			]
		);
		
		$this->add_control(
			'menu_text_color',
			[
				'label' => __( 'Menu Text Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .emerce-vertical-nav-dropdown .nav-style-megamenu > li.nav-item .nav-link' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'menu_text_color_hvr',
			[
				'label' => __( 'Menu Text Color Hover', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .emerce-vertical-nav-dropdown .nav-style-megamenu > li.nav-item .nav-link:hover' => 'color: {{VALUE}}',
				],
			]
		);
		
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'menu_text_typography',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .emerce-vertical-nav-dropdown .nav-style-megamenu > li.nav-item .nav-link',
            ]
        );
        
        
        $this->add_control(
			'menu_bar_padding',
			[
				'label' => __( 'Padding', 'plugin-domain' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .emerce-vertical-nav-dropdown' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

         $this->end_controls_section();
         
            $this->start_controls_section(
            'section_style_mega-menu',
            [
                'label' => __( '<span class="emerce-badge-el">Emerce</span> Mega Menu Style', 'emerce' ),
                'tab' => Controls_Manager::TAB_STYLE,

            ]
        );
        
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'xpc-mega-bg',
				'label' => __( 'Mega Sub Menu Background', 'plugin-domain' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .emerce-vertical-nav-dropdown .emerce-m-menu .nav-style-megamenu > li.nav-item .dropdown-menu .submenu-box',
			]
		);
		$this->add_control(
			'xpc-mega-sub-menu-1',
			[
				'label' => __( 'Sub Menu Title Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_3,
				],
				'default' =>'#28170E',
				'selectors' => [
				   
					'{{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu .emerce-mg-col-title' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'xpc-mega-sub-menu-1-hvr',
			[
				'label' => __( 'Sub Menu Title Hover Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_3,
				],
				'default' =>'#28170E',
				'selectors' => [
				   
					'{{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu .emerce-mg-col-title:hover' => 'color: {{VALUE}}',
				],
			]
		);
		
		 $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'xpc-mega-sub-menu-typo1',
                'label' => __( 'Sub Menu Title Typography', 'plugin-domain' ),
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu .emerce-mg-col-title',
            ]
        );
		
		 
		
		$this->add_control(
			'xpc-mega-sub-menu-2',
			[
				'label' => __( 'Sub Menu Text Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_3,
				],
				'default' =>'#28170E',
				'selectors' => [
				   
					'{{WRAPPER}}.emerce-vertial-nav-main-bth ul li.emerce-mega-enbled .has-sub ul li a,
					{{WRAPPER}}.emerce-vertial-nav-main-bth ul li.emerce-mega-enbled ul li a,
					{{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu .xpc-nav-link' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'xpc-mega-sub-menu-2hvr',
			[
				'label' => __( 'Sub Menu Text Hover Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_3,
				],
				'default' =>'#28170E',
				'selectors' => [
				   
					'{{WRAPPER}}.emerce-vertial-nav-main-bth ul li.emerce-mega-enbled .has-sub ul li a:hover,
					{{WRAPPER}}.emerce-vertial-nav-main-bth ul li.emerce-mega-enbled ul li a:hover,
					{{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu .xpc-nav-link:hover' => 'color: {{VALUE}}',
				],
			]
		);
		
			$this->add_control(
			'xpc-mega-sub-menu-2hvr_bg',
			[
				'label' => __( 'Sub Menu Background Hover Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_3,
				],
				'default' =>'#ffffff',
				'selectors' => [
				   
					'{{WRAPPER}}.emerce-vertial-nav-main-bth ul li.emerce-mega-enbled .has-sub ul li a:hover,
					{{WRAPPER}}.emerce-vertial-nav-main-bth ul li.emerce-mega-enbled ul li a:hover,
					{{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu .xpc-nav-link' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'xpc-mega-sub-menu-typo2',
                'label' => __( 'Sub Menu Text Typography', 'plugin-domain' ),
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}}.emerce-vertial-nav-main-bth ul li.emerce-mega-enbled .has-sub ul li a,
					{{WRAPPER}}.emerce-vertial-nav-main-bth ul li.emerce-mega-enbled ul li a,
					{{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu .xpc-nav-link',
            ]
        );
        
        
	
		
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'xpc_box_shadow',
				'label' => __( 'Box Shadow', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu .submenu-box:after',
			]
		);
		
		
        
         $this->end_controls_section();
  

      }
      
      
       protected function render() { 
           
             $settings = $this->get_settings_for_display();
             $title = $settings['menu_box_title'];
             $bar_type = $settings['bar_type'];
       
       ?>
       
       <div class="emerce-vertical-nav ">
           
           <div class="position-relative emerce-vertical-nav-box" id="emrc_vertial_nav_box">
                <a href="#" class="etc-ver-cat-toggle"> <span><?php \Elementor\Icons_Manager::render_icon( $settings['bar_icon'], [ 'aria-hidden' => 'true' ] ); ?></span> <?php echo esc_html($title);?>  <i class="ri-arrow-down-s-line"></i></a>
                
            <nav class="emerce-elementor-nav emerce-vertical-nav-dropdown <?php echo esc_html($bar_type);?>">
             <?php get_template_part('template-parts/header/header-vertical-nav');?>
            </nav>

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
Plugin::instance()->widgets_manager->register_widget_type( new emerce_vertial_nav );
?>
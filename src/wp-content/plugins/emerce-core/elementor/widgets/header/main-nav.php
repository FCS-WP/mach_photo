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

class emerce_main_nav extends Widget_Base {
     public function get_name() {
        return 'emerce_main_nav_box';
    }

    public function get_title() {
        return __( 'Emerce Main Navigation', 'emerce' );
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
            'emerce_main_nav_section_control',
            [
                'label' => __( 'Navigation', 'elementor' ),
            ]
        );
        
        $this->add_control(
			'main-information',
			[
				'label' => __( 'Please Select Main menu from Appearance> Menu. You can customize style from style tab', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

         $this->end_controls_section();
         
         $this->start_controls_section(
            'section_style_main-menu',
            [
                'label' => __( '<span class="emerce-badge-el">Emerce</span> Menu Style', 'emerce' ),
                'tab' => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'menu_typography',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} #emercemenu a,
                {{WRAPPER}} .nav-style-megamenu>li.nav-item .nav-link',
            ]
        );
        
        $this->add_control(
			'menu_color',
			[
				'label' => __( 'Menu Text Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} #emercemenu > ul > li > a,
					{{WRAPPER}} .nav-style-megamenu>li.nav-item .nav-link' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'menu_color_hover',
			[
				'label' => __( 'Menu Text Hover Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} #emercemenu > ul > li > a:hover,
					{{WRAPPER}} .nav-style-megamenu>li.nav-item .nav-link:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_menu_typography',
                'label' => __( 'Sub Menu Typography', 'emerce' ),
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} #emercemenu a,
                {{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu .xpc-default-menu a',
            ]
        );
		
		$this->add_control(
			'sub_menu_color',
			[
				'label' => __( 'Sub Menu Text Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_3,
				],
				'selectors' => [
					'{{WRAPPER}} #emercemenu ul ul a,
					{{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu .xpc-default-menu a' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'sub_menu_bg_color',
			[
				'label' => __( 'Sub Menu Background Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_3,
				],
				'selectors' => [
				   
					'{{WRAPPER}} #emercemenu ul ul li,
					{{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu .xpc-default-menu a' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'sub_menu_hover_color',
			[
				'label' => __( 'Sub Menu Background Hover Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_3,
				],
				'selectors' => [
				   
					'{{WRAPPER}} #emercemenu ul ul li:hover > a,
					{{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu .xpc-default-menu a:hover' => 'background: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'sub_menu_hover_txt',
			[
				'label' => __( 'Sub Menu hover Text Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_3,
				],
				'selectors' => [
				   
					'{{WRAPPER}} #emercemenu ul ul li:hover > a,
					{{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu .xpc-default-menu a:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
            'align_items',
            [
                'label' => __( 'Align', 'emerce' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => __( 'Left', 'emerce' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'emerce' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'flex-end' => [
                        'title' => __( 'Right', 'emerce' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' =>'left',
                'selectors' => [
				   
					'{{WRAPPER}} #emercemenu,
					{{WRAPPER}} .emerce-m-menu' => 'justify-content: {{VALUE}}',
				
				],
            
            ]
        );
        
        $this->add_control(
			'padding-nav',
			[
				'label' => __( 'Padding', 'plugin-domain' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .emerce-m-menu .nav-style-megamenu>li.nav-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        	$this->add_control(
            'sub_menu_align_items',
            [
                'label' => __( 'Submenu Text Align', 'emerce' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'emerce' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'emerce' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'emerce' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' =>'left',
                'selectors' => [
				   
					'{{WRAPPER}} #emercemenu ul ul a' => 'text-align: {{VALUE}}',
				
				],
            
            ]
        );

         $this->end_controls_section();
         
        
         
         $this->start_controls_section(
            'section_style_mobile-menu',
            [
                'label' => __( '<span class="emerce-badge-el">Emerce</span> Mobile Menu Style', 'emerce' ),
                'tab' => Controls_Manager::TAB_STYLE,

            ]
        );
        
        $this->add_control(
            'align_mobile_items',
            [
                'label' => __( 'Align Mobile Burger', 'emerce' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'emerce' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'emerce' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'emerce' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' =>'right',
                'selectors' => [
				   
					'{{WRAPPER}} .mobile-nav' => 'text-align: {{VALUE}}',
				
				],
            
            ]
        );
        
        
        $this->add_control(
			'mobile_menu_burger_color',
			[
				'label' => __( 'Mobile Menu Burger Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_3,
				],
				'default' =>'#000000',
				'selectors' => [
				   
					'{{WRAPPER}} .burger span,{{WRAPPER}} .burger span::before,{{WRAPPER}} .burger span::after,{{WRAPPER}} .burger.clicked span:before,{{WRAPPER}} .burger.clicked span:after' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		 $this->add_control(
			'mobile_menu_burger_hvr_color',
			[
				'label' => __( 'Mobile Menu Burger Hover Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_3,
				],
				'default' =>'#FA6D2D',
				'selectors' => [
				   
					'{{WRAPPER}} .burger:hover span,{{WRAPPER}} .burger:hover span::before,{{WRAPPER}} .burger:hover span::after,{{WRAPPER}} .burger.clicked:hover span:before,{{WRAPPER}} .burger.clicked:hover span:after' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'mobile_menu_sidebar_color',
			[
				'label' => __( 'Mobile Floating Bar background', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_3,
				],
				'default' =>'#ffffff',
				'selectors' => [
				   
					'{{WRAPPER}} .mobile--nav-menu' => 'background: {{VALUE}}',
				],
			]
		);
		
		 $this->add_control(
			'mobile_menu_text_color',
			[
				'label' => __( 'Mobile Menu Text Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_3,
				],
				'default' =>'#222',
				'selectors' => [
				   
					'{{WRAPPER}} #mayosis-sidemenu>ul>li>a,{{WRAPPER}} #mayosis-sidemenu ul ul li a' => 'color: {{VALUE}}',
				],
			]
		);
		
		 $this->add_control(
			'mobile_menu_text_hvr_color',
			[
				'label' => __( 'Mobile Menu Text Hover Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_3,
				],
				'default' =>'#FA6D2D',
				'selectors' => [
				   
					'{{WRAPPER}} #mayosis-sidemenu>ul>li>a:hover,{{WRAPPER}} #mayosis-sidemenu ul ul li a:hover,
					{{WRAPPER}} #mayosis-sidemenu>ul>li.active>a' => 'color: {{VALUE}}',
				],
			]
		);
		
		 $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'mobile_menu_typography',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} #mayosis-sidemenu>ul>li>a,{{WRAPPER}} #mayosis-sidemenu ul ul li a',
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
				'selector' => '{{WRAPPER}} #emercemenu .emerce-mega-enbled ul.xpic-depth-0,
				{{WRAPPER}} .emerce-m-menu .nav-style-megamenu>li.nav-item .dropdown-menu .submenu-box',
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
				   
					'{{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu h5.emerce-mg-col-title' => 'color: {{VALUE}}',
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
				   
					'{{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu h5.emerce-mg-col-title:hover' => 'color: {{VALUE}}',
				],
			]
		);
		
		 $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'xpc-mega-sub-menu-typo1',
                'label' => __( 'Sub Menu Title Typography', 'plugin-domain' ),
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu h5.emerce-mg-col-title',
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
				   
					'{{WRAPPER}} #emercemenu ul li.emerce-mega-enbled .has-sub ul li a,
					{{WRAPPER}} #emercemenu ul li.emerce-mega-enbled ul li a,
					{{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu a' => 'color: {{VALUE}}',
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
				   
					'{{WRAPPER}} #emercemenu ul li.emerce-mega-enbled .has-sub ul li a:hover,
					{{WRAPPER}} #emercemenu ul li.emerce-mega-enbled ul li a:hover,
					{{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu a:hover' => 'color: {{VALUE}}',
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
				   
					'{{WRAPPER}} #emercemenu ul li.emerce-mega-enbled .has-sub ul li a:hover,
					{{WRAPPER}} #emercemenu ul li.emerce-mega-enbled ul li a:hover,
					{{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu a' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'xpc-mega-sub-menu-typo2',
                'label' => __( 'Sub Menu Text Typography', 'plugin-domain' ),
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} #emercemenu ul li.emerce-mega-enbled .has-sub ul li a,
					{{WRAPPER}} #emercemenu ul li.emerce-mega-enbled ul li a,
					{{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu a',
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
      
      
       protected function render() { ?>
           <nav class="emerce-elementor-nav">
             <?php get_template_part('template-parts/header/header-default-nav');?>
            </nav>
           <?php 
       }
       
       protected function content_template() {
        ?>

        <?php
    }

    public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_main_nav );
?>
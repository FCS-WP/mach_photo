<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_myaccount extends Widget_Base {
     public function get_name() {
        return 'emerce_myaccount_mini';
    }

    public function get_title() {
        return __( 'My Account Menu', 'emerce' );
    }
    public function get_categories() {
        return [ 'emerce-header-elements' ];
    }
    public function get_icon() {
        return 'emerceo-semi-solid cs-orange';
    }
    
 
    
      protected function register_controls() {
          
          $this->start_controls_section(
            'emerce_myaccount_section_control',
            [
                'label' => __( 'Emerce My Account', 'elementor' ),
            ]
        );
        
        
        
		
		$this->add_control(
			'acc_icon',
			[
				'label' => __( 'Icon', 'text-domain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'ri-user-line',
					
				],
			]
		);
		
		$this->add_control(
			'logout_text',
			[
				'label' => __( 'Logged Out Text', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Login / Register', 'plugin-domain' ),
				'placeholder' => __( 'Type your title here', 'plugin-domain' ),
			]
		);
		
		$this->add_control(
			'login_prv_text',
			[
				'label' => __( 'Text Before Display Name', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Hello! ', 'plugin-domain' ),
				'placeholder' => __( 'Type your title here', 'plugin-domain' ),
			]
		);


    $this->add_control(
			'show_un',
			[
				'label' => esc_html__( 'Show Username', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_responsive_control(
                'align_my_account_icon',
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
                                '{{WRAPPER}} .emerce-my-account-icon' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .emerce-login-popup-mini i,
					{{WRAPPER}} .emerce-account-dropdown-mini i' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .emerce-login-popup-mini' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		

        $this->end_controls_section();
        
        $this->start_controls_section(
			'my-account_style',
			[
				'label' => __( 'My Account Style', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
			'my_account_icon_color',
			[
				'label' => __( 'Icon Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .emerce-login-popup-mini i,
					{{WRAPPER}} .emerce-account-dropdown-mini i' => 'color: {{VALUE}}',
				],
			]
		);
		
		 $this->add_control(
			'my_account_icon_hvr_color',
			[
				'label' => __( 'Cart Icon Hover Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#e2e0f5',
				'selectors' => [
					'{{WRAPPER}} .emerce-login-popup-mini i:hover,
					{{WRAPPER}} .emerce-account-dropdown-mini i:hover' => 'color: {{VALUE}}',
				],
			]
		);
		
		
		 $this->add_control(
			'my-account_counter_txt_color',
			[
				'label' => __( 'Text Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .emerce-account-dropdown-mini,
					{{WRAPPER}} .emerce-login-popup-mini' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'my-account_dp_bg_color',
			[
				'label' => __( 'Dropdown Background Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .dropdown-menu.my-account-list' => 'background: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'my-account_dp_txt_color',
			[
				'label' => __( 'Dropdown Text Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .dropdown-menu.my-account-list,
					{{WRAPPER}} .dropdown-menu.my-account-list a,
					{{WRAPPER}} .dropdown-menu.my-account-list .user-display-name-acc' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typo',
				'label' => __( 'Menu Typography', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .emerce-account-dropdown-mini,
				{{WRAPPER}} .emerce-login-popup-mini',
			]
		);
		
		$this->add_control(
			'my-login_title_bg',
			[
				'label' => __( 'Login Title Background', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#fa6c2d',
				'selectors' => [
					'{{WRAPPER}} .xpc-login-pop-title' => 'background: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'my-login_title_color',
			[
				'label' => __( 'Login Title Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .xpc-login-pop-title' => 'color: {{VALUE}}',
				],
			]
		);
       
            $this->end_controls_section();
            
           

      }
      
      
          protected function render() {
           $settings = $this->get_settings_for_display();
              global $current_user;
              $show_un = $settings['show_un'];
              ?>
    
           <div class="emerce-my-account-icon">
            
         <?php if ( is_user_logged_in() ) { ?>
              
                
                <ul id="account-button" class="emerce-option-menu">
   
		<li class="dropdown cart_widget cart-style-one menu-item my-account-menu">
   <a class="emerce-account-dropdown-mini" href="#">
                 <?php \Elementor\Icons_Manager::render_icon( $settings['acc_icon'], [ 'aria-hidden' => 'true' ] ); ?>

<?php if ( 'yes' === $settings['show_un'] ) { ?>
                <?php echo $settings['login_prv_text'];?> <?php echo esc_html($current_user->display_name ); ?>
                <?php } ?>
               
                </a>
    
   
    <div class="dropdown-menu my-account-list">
        
         
     <div class="mayosis-account-user-information">
        <span><?php echo get_avatar(get_the_author_meta('email'), '40'); ?></span>
     
       <span class="user-display-name-acc"><?php echo esc_html($current_user->display_name ); ?></span>
</div>
        <?php get_template_part('inc/account-menu');?>
     
    <div class="mayosis-logout-information">
       <a href="<?php echo wp_logout_url(home_url('/'));?> " class="mayosis-logout-link"><i class="ri-logout-box-r-line"></i> <?php esc_html_e('Logout','emerce');?></a>
</div>
  </div>
</li>

</ul>
             
             <?php } else { ?>
               
                <a class="emerce-login-popup-mini" href="#emerce-login-popup" data-lity>
                  <?php \Elementor\Icons_Manager::render_icon( $settings['acc_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    <?php echo $settings['logout_text']; ?>
                
               
                </a>
                      
                                 
               <div class="emerce-login-popup lity-hide" id="emerce-login-popup">
                   <h3 class="xpc-login-pop-title"><i class="ri-login-box-line"></i> Login</h3>
                   <div class="xpc-login-content-p-conx">
                       <?php echo do_shortcode('[emerce_woo_login]');?>
                   </div>
                   
               </div>
                <?php } ?>
                    
               
           </div>
           
         
           <?php 
       }
       
       protected function content_template() {
        ?>

        <?php
    }

    public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_myaccount );
?>
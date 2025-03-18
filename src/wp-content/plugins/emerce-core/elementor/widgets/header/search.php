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

class emerce_search extends Widget_Base {
     public function get_name() {
        return 'emerce_main_search';
    }

    public function get_title() {
        return __( 'Search', 'emerce' );
    }
    public function get_categories() {
        return [ 'emerce-header-elements' ];
    }
    public function get_icon() {
        return 'emerceo-semi-solid cs-orange';
    }
    
 
    
      protected function register_controls() {
          
          $this->start_controls_section(
            'emerce_search_section_control',
            [
                'label' => __( 'Search', 'elementor' ),
            ]
        );
        
        $this->add_control(
			'search_type',
			[
				'label' => __( 'Search Type', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'normal',
				'options' => [
					'normal'  => __( 'Normal', 'plugin-domain' ),
					'popup' => __( 'Popup', 'plugin-domain' ),
					'off-canvas' => __( 'Off Canvas', 'plugin-domain' ),
				],
			]
		);
	
		
	$this->add_responsive_control(
                'popup_icon_align',
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
                                '{{WRAPPER}} .elementor-widget-container' => 'text-align: {{VALUE}} !important',
                            ],
                ]
            );
            
            $this->add_control(
			'poup_title',
			[
				'label' => __( 'Popup / Off Canvas Search Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'WHAT ARE YOU LOOKING FOR?', 'plugin-domain' ),
				'placeholder' => __( 'Type your title here', 'plugin-domain' ),
				'label_block' => true,
				'conditions' => [
            'terms' => [
                [
                    'name' => 'search_type',
                    'operator' => '!=',
                    'value' => 'normal'
                ]
            ]
        ]
			]
		);
            
            $this->end_controls_section();
            
            
            $this->start_controls_section(
			'search_style',
			[
				'label' => __( 'Style', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

       $this->add_control(
			'popup_icon_size',
			[
				'label' => __( 'Popup / Offcanvas Icon Size', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 30,
						'step' => 1,
					],
					
				],
				'default' => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .emerce-offcanvas-s-icon i, 
					{{WRAPPER}} .emerce-popup-s-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				
				'conditions' => [
            'terms' => [
                [
                    'name' => 'search_type',
                    'operator' => '!=',
                    'value' => 'normal'
                ]
            ]
        ]
			]
		);
		
		$this->add_control(
			'popup_icon_color',
			[
				'label' => __( 'Popup / Offcanvas Icon Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .emerce-offcanvas-s-icon i, 
					{{WRAPPER}} .emerce-popup-s-icon i' => 'color: {{VALUE}};',
				],
					'conditions' => [
            'terms' => [
                [
                    'name' => 'search_type',
                    'operator' => '!=',
                    'value' => 'normal'
                ]
            ]
        ]
				
			]
		);
		
			$this->add_control(
			'popup_icon_color_hvr',
			[
				'label' => __( 'Popup / Offcanvas Icon Hover Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .emerce-offcanvas-s-icon i:hover, 
					{{WRAPPER}} .emerce-popup-s-icon i:hover' => 'color: {{VALUE}};',
				],
				
					'conditions' => [
            'terms' => [
                [
                    'name' => 'search_type',
                    'operator' => '!=',
                    'value' => 'normal'
                ]
            ]
        ]
			]
		);

		$this->end_controls_section();

      }
      
      
          protected function render( $instance = [] ) {
           $settings = $this->get_settings();
           $search_type = $settings['search_type'];
           $poup_title = $settings['poup_title'];
              ?>
        
        <?php if ($search_type =="popup"){?>
            <a class="emerce-popup-s-icon" href="#emerce-search-box-popup" data-lity ><i class="ri-search-2-line"></i></a>
            <div id="emerce-search-box-popup" class="lity-hide">
                <h5 class="emerce-ajax-search-title"><?php echo esc_html($poup_title);?></h5>
                 <div  class="emerce-search-box" >
                     
            			 <?php emerce_live_search(); ?> 
				</div>
				</div>
        <?php } elseif ($search_type =="off-canvas") { ?>
        
      <button class="emerce-offcanvas-s-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#emercesearchoffcanvas" aria-controls="emercesearchoffcanvas">
  <i class="ri-search-2-line"></i>
</button>

<div class="emerce-ajax-s-offcanvas offcanvas offcanvas-top" tabindex="-1" id="emercesearchoffcanvas" data-bs-scroll="true">

  <div class="offcanvas-body">
      
      <div class="emerce-dfcanvas-body">
      <div class="emerce-title-s-box d-flex">
           <h5 class="emerce-ajax-search-title"><?php echo esc_html($poup_title);?></h5>
       <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"><i class="ri-close-line"></i></button>
          
      </div>
      
  <div  class="emerce-search-box" >
     
            			 <?php emerce_live_search(); ?> 
				</div>
				</div>
  </div>
</div>
        <?php } else { ?>
           <div class="emerce-search-box">
            			 <?php emerce_live_search(); ?> 
				</div>
				
				<?php } ?>
           <?php 
       }
       
       protected function content_template() {
        ?>

        <?php
    }

    public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_search );
?>
<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_offer_banner extends Widget_Base {

   public function get_name() {
      return 'emerce_offer_banner';
   }

   public function get_title() {
      return __( 'Offer Banner', 'emerce' );
   }
public function get_categories() {
		return [ 'emerce-ele-widgets-cat' ];
	}
   public function get_icon() { 
        return 'emerceo-semi-solid cs-orange';
   }

   protected function register_controls() {

    $this->start_controls_section(
        'offer_banner_content',
        [
            'label' => __( 'Content', 'emerce' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );
    $repeater = new \Elementor\Repeater();
    $repeater->add_control(
        'banner_sub_title',
        [
            'label' => __( 'Banner Sub Title', 'emerce' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'placeholder' => __( '30% OFF ON ALL JEWELRIES', 'emerce' ),
        ]
    );
    $repeater->add_control(
        'banner_title',
        [
            'label' => __( 'Banner Title', 'emerce' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'placeholder' => __( 'Get Special Price Only for This Week', 'emerce' ),
        ]
    );
    $repeater->add_control(
        'banner_btn_text',
        [
            'label' => __( 'Banner Button Text', 'emerce' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'placeholder' => __( 'Explore Now', 'emerce' ),
        ]
    );
    $repeater->add_control(
        'banner_btn_link',
        [
            'label' => __( 'Button Link', 'emerce' ),
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
        'banner_image',
        [
            'label' => __( 'Choose Image', 'emerce' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );
    $repeater->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'sp_banner_bg',
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}',
			]
		);
        
    $repeater->add_control(
			'image_align',
			[
				'label' => esc_html__( 'Image Alignment', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
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
			]
		);

    $this->add_control(
        'banner_list',
        [
            'label' => esc_html__( 'Banner List', 'emerce' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'list_title' => esc_html__( 'Title #1', 'emerce' ),
                ],
            ],
            'title_field' => '{{{ banner_sub_title }}}',
        ]
    );

    $this->end_controls_section();

    // Style Tab

    $this->start_controls_section(
        'sp_banner_style',
        [
            'label' => __( 'Content Style', 'emerce-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );
   $this->add_control(
			'sub_title_color',
			[
				'label' => esc_html__( 'Sub Title Color', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-special-content p' => 'color: {{VALUE}}',
				],
			]
		);
   $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'sub_title_typo',
                'label' => 'Sub Title Typography',
				'selector' => '{{WRAPPER}} .single-special-content p',
			]
		);
     $this->add_responsive_control(
			'sub_title_margin',
			[
				'label' => esc_html__( 'Sub Title Spacing', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .single-special-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'allowed_dimensions' => ['top', 'bottom'],
			]
		);
     $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-special-content h2' => 'color: {{VALUE}}',
				],
			]
		);
   $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typo',
                'label' => 'Title Typography',
				'selector' => '{{WRAPPER}} .single-special-content h2',
			]
		);
     $this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Title Spacing', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .single-special-content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'allowed_dimensions' => ['top', 'bottom'],
			]
		);
    $this->end_controls_section();
    
    $this->start_controls_section(
        'sp_btn_style',
        [
            'label' => __( 'Button Style', 'emerce-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );
    $this->start_controls_tabs(
        'btn_style_tabs'
    );

    $this->start_controls_tab(
        'btn_normal_tab',
        [
            'label' => esc_html__( 'Normal', 'emerce-core' ),
        ]
    );
    $this->add_control(
			'btn_tex_color',
			[
				'label' => esc_html__( 'Color', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .transparent-bg-btn a' => 'color: {{VALUE}}',
				],
			]
		);
    $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_tex_typo',
				'selector' => '{{WRAPPER}} .transparent-bg-btn a',
			]
		);
	$this->add_control(
			'btn_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .transparent-bg-btn a' => 'background: {{VALUE}}',
				],
			]
		);
     $this->add_control(
			'btn_padding',
			[
				'label' => esc_html__( 'Padding', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .transparent-bg-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
    $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'btn_border',
				'label' => esc_html__( 'Border', 'emerce-core' ),
				'selector' => '{{WRAPPER}} .transparent-bg-btn a',
			]
		);
    $this->add_responsive_control(
			'btn_margin',
			[
				'label' => esc_html__( 'Button Spacing', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .transparent-bg-btn a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'allowed_dimensions' => ['top', 'bottom'],
			]
		);

    $this->end_controls_tab();
    
    $this->start_controls_tab(
        'btn_hover_tab',
        [
            'label' => esc_html__( 'Hover', 'emerce-core' ),
        ]
    );
    $this->add_control(
			'btn_hover_tex_color',
			[
				'label' => esc_html__( 'Color', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .transparent-bg-btn a:hover' => 'color: {{VALUE}}',
				],
			]
		);
    $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_hover_tex_typo',
				'selector' => '{{WRAPPER}} .transparent-bg-btn a:hover',
			]
		);
	$this->add_control(
			'btn_hover_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .transparent-bg-btn a:hover' => 'background: {{VALUE}}',
				],
			]
		);
     $this->add_control(
			'btn_hover_padding',
			[
				'label' => esc_html__( 'Padding', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .transparent-bg-btn a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
    $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'btn_hover_border',
				'label' => esc_html__( 'Border', 'emerce-core' ),
				'selector' => '{{WRAPPER}} .transparent-bg-btn a:hover',
			]
		);

    $this->end_controls_tab();

    $this->end_controls_tabs();


    
    $this->end_controls_section();
    
    
   }
   
   protected function render( $instance = [] ) {

    $settings = $this->get_settings_for_display();
    $banner_lists = $settings['banner_list'];

    ?>

    <section class="sp-offer-section">
        <div class="container-fluid large-screen-wide">
            <div class="row">
            <?php foreach($banner_lists as $banner_list ){ 
            // echo "<pre>";
           // print_r($banner_list);
            ?>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="single-special elementor-repeater-item-<?php echo esc_attr( $banner_list['_id'] ); ?>">
                       
                           
                                    <div class="single-special-img" style="text-align: <?php echo esc_attr( $banner_list['image_align'] ); ?>;" >
                                        <img src="<?php echo wp_get_attachment_image_url($banner_list['banner_image']['id'], 'full'); ?>" alt="" >
                                    </div>
                                
                                
                                    <div class="single-special-content single-sp-align-right">
                                        <p><?php echo $banner_list['banner_sub_title']; ?></p>
                                        <h2><?php echo $banner_list['banner_title']; ?></h2>
                                        <div class="transparent-bg-btn">
                                            <a href="<?php echo $banner_list['banner_btn_link']['url']; ?>"><?php echo $banner_list['banner_btn_text']; ?> <i class="zil zi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                
                        
                       
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>


    <?php
       
}  
protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_offer_banner );
?>
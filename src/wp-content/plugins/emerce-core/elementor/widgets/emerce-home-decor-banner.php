<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_home_decor_banner extends Widget_Base {

   public function get_name() {
      return 'emerce_home_decor_banner';
   }

   public function get_title() {
      return __( 'Home Decor Banner', 'emerce' );
   }
public function get_categories() {
		return [ 'emerce-ele-widgets-cat' ];
	}
   public function get_icon() { 
        return 'emerceo-semi-solid cs-orange';
   }

   protected function register_controls() {

    $this->start_controls_section(
        'banner-content-one',
        [
            'label' => esc_html__( 'Banner Item One', 'emerce-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'banner_one_heading',
        [
            'label' => esc_html__( 'Title', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Woo Products', 'emerce-core' ),
        ]
    );
    $this->add_control(
        'banner_one_content',
        [
            'label' => esc_html__( 'Short Description', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Modern and colorful products', 'emerce-core' ),
            'label_block' => true,
        ]
    );
    $this->add_control(
        'banner_one_btn_txt',
        [
            'label' => esc_html__( 'Button Text', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Shop Now', 'emerce-core' ),
        ]
    );
    $this->add_control(
        'banner_one_btn_link',
        [
            'label' => esc_html__( 'Button URL', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => esc_html__( 'https://your-link.com', 'emerce-core' ),
            'default' => [
                'url' => '',
                'is_external' => true,
                'nofollow' => true,
                'custom_attributes' => '',
            ],
        ]
    );
    $this->add_control(
        'banner_one_image',
        [
            'label' => esc_html__( 'Banner Image', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'banner_one_bg',
            'label' => esc_html__( 'Background', 'emerce-core' ),
            'types' => [ 'classic', 'gradient', 'video' ],
            'selector' => '{{WRAPPER}} .cat-grid-horizontal.item-one',
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'banner-content-two',
        [
            'label' => esc_html__( 'Banner Item Two', 'emerce-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'banner_two_heading',
        [
            'label' => esc_html__( 'Title', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Minimal Wall Clock', 'emerce-core' ),
        ]
    );
    $this->add_control(
        'banner_two_content',
        [
            'label' => esc_html__( 'Short Description', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Hand made Wall Clock', 'emerce-core' ),
            'label_block' => true,
        ]
    );
    $this->add_control(
        'banner_two_btn_txt',
        [
            'label' => esc_html__( 'Button Text', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Shop Now', 'emerce-core' ),
        ]
    );
    $this->add_control(
        'banner_two_btn_link',
        [
            'label' => esc_html__( 'Button URL', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => esc_html__( 'https://your-link.com', 'emerce-core' ),
            'default' => [
                'url' => '',
                'is_external' => true,
                'nofollow' => true,
                'custom_attributes' => '',
            ],
        ]
    );
    $this->add_control(
        'banner_two_image',
        [
            'label' => esc_html__( 'Banner Image', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'banner_two_bg',
            'label' => esc_html__( 'Background', 'emerce-core' ),
            'types' => [ 'classic', 'gradient', 'video' ],
            'selector' => '{{WRAPPER}} .cat-grid-horizontal.item-two',
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'banner-content-three',
        [
            'label' => esc_html__( 'Banner Item Three', 'emerce-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'banner_three_heading',
        [
            'label' => esc_html__( 'Title', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Elodie Accent Chair', 'emerce-core' ),
        ]
    );
    $this->add_control(
        'banner_three_content',
        [
            'label' => esc_html__( 'Short Description', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Wood made handicrafts chair', 'emerce-core' ),
            'label_block' => true,
        ]
    );
    $this->add_control(
        'banner_three_btn_txt',
        [
            'label' => esc_html__( 'Button Text', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Shop Now', 'emerce-core' ),
        ]
    );
    $this->add_control(
        'banner_three_btn_link',
        [
            'label' => esc_html__( 'Button URL', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => esc_html__( 'https://your-link.com', 'emerce-core' ),
            'default' => [
                'url' => '',
                'is_external' => true,
                'nofollow' => true,
                'custom_attributes' => '',
            ],
        ]
    );
    $this->add_control(
        'banner_three_image',
        [
            'label' => esc_html__( 'Banner Image', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'banner_three_bg',
            'label' => esc_html__( 'Background', 'emerce-core' ),
            'types' => [ 'classic', 'gradient', 'video' ],
            'selector' => '{{WRAPPER}} .cat-grid-horizontal.vertical',
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'banner-content-four',
        [
            'label' => esc_html__( 'Banner Item Four', 'emerce-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'banner_four_before_heading',
        [
            'label' => esc_html__( 'Before Title', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'New Arrival', 'emerce-core' ),
        ]
    );
    $this->add_control(
        'banner_four_heading',
        [
            'label' => esc_html__( 'Title', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Interior Collection 50% Sale OFF', 'emerce-core' ),
            'label_block' => true,
        ]
    );
    $this->add_control(
        'banner_four_btn_txt',
        [
            'label' => esc_html__( 'Button Text', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'View Collection', 'emerce-core' ),
        ]
    );
    $this->add_control(
        'banner_four_btn_link',
        [
            'label' => esc_html__( 'Button URL', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => esc_html__( 'https://your-link.com', 'emerce-core' ),
            'default' => [
                'url' => '',
                'is_external' => true,
                'nofollow' => true,
                'custom_attributes' => '',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'banner_four_bg',
            'label' => esc_html__( 'Background', 'emerce-core' ),
            'types' => [ 'classic', 'gradient', 'video' ],
            'selector' => '{{WRAPPER}} .cat-grid-square',
        ]
    );

    $this->end_controls_section();

    // Style Tabs
    $this->start_controls_section(
        'banner_style',
        [
            'label' => esc_html__( 'Small Banner Style', 'emerce-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'title_color',
        [
            'label' => esc_html__( 'Title Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cat-grid-horizontal h3' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'title_typo',
            'selector' => '{{WRAPPER}} .cat-grid-horizontal h3',
        ]
    );
    $this->add_control(
        'title_border_color',
        [
            'label' => esc_html__( 'Title Border Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cat-grid-horizontal h3::after' => 'background: {{VALUE}}',
            ],
            'separator' => 'after',
        ]
    );
    $this->add_control(
        'short_desc_color',
        [
            'label' => esc_html__( 'Short Description Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cat-grid-horizontal p' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'short_desc_typo',
            'label' => 'Short Description Typography',
            'selector' => '{{WRAPPER}} .cat-grid-horizontal p',
            
        ]
    );
    $this->end_controls_section();

    
    $this->start_controls_section(
        'large_banner_style',
        [
            'label' => esc_html__( 'Large Banner Style', 'emerce-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'large_before_title_color',
        [
            'label' => esc_html__( 'Before Title Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cat-grid-square p' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'before_title_typo',
            'selector' => '{{WRAPPER}} .cat-grid-square p',
        ]
    );

    $this->add_control(
        'large_title_color',
        [
            'label' => esc_html__( 'Title Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cat-grid-square h2' => 'color: {{VALUE}}',
            ],
            'separator' => 'before',
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'large_title_typo',
            'selector' => '{{WRAPPER}} .cat-grid-square h2',
        ]
    );
    
    $this->end_controls_section();

    //Small Button
    $this->start_controls_section(
        'small_button_style',
        [
            'label' => esc_html__( 'Small Button Style', 'emerce-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->start_controls_tabs(
        'small_btn_style' );
    
    $this->start_controls_tab(
        'style_normal_tab',
        [
            'label' => esc_html__( 'Button Normal', 'emerce-core' ),
        ]
    );
    $this->add_control(
        'btn_normal_color',
        [
            'label' => esc_html__( 'Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .horizontal-cat-btn a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'btn_normal_typo',
            'selector' => '{{WRAPPER}} .horizontal-cat-btn a',
        ]
    );
    $this->add_control(
        'btn_normal_bg',
        [
            'label' => esc_html__( 'Background Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .horizontal-cat-btn a' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
            'name' => 'btn_normal_border',
            'label' => esc_html__( 'Border', 'emerce-core' ),
            'selector' => '{{WRAPPER}} .horizontal-cat-btn a',
        ]
    );    
    $this->end_controls_tab();

    $this->start_controls_tab(
        'style_hover_tab',
        [
            'label' => esc_html__( 'Button Hover', 'emerce-core' ),
        ]
    );
    $this->add_control(
        'btn_hover_color',
        [
            'label' => esc_html__( 'Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .horizontal-cat-btn a:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'btn_hover_typo',
            'selector' => '{{WRAPPER}} .horizontal-cat-btn a:hover',
        ]
    );
    $this->add_control(
        'btn_hover_bg',
        [
            'label' => esc_html__( 'Background Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .horizontal-cat-btn a:hover' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
            'name' => 'btn_hover_border',
            'label' => esc_html__( 'Border', 'emerce-core' ),
            'selector' => '{{WRAPPER}} .horizontal-cat-btn a:hover',
        ]
    );    
    $this->end_controls_tab();
    
    $this->end_controls_tabs();
    

    $this->end_controls_section();
		
	
    //Large Button
    $this->start_controls_section(
        'large_button_style',
        [
            'label' => esc_html__( 'Large Button Style', 'emerce-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->start_controls_tabs(
        'large_btn_style' );
    
    $this->start_controls_tab(
        'style_lg_normal_tab',
        [
            'label' => esc_html__( 'Button Normal', 'emerce-core' ),
        ]
    );
    $this->add_responsive_control(
        'btn_lg_normal_color',
        [
            'label' => esc_html__( 'Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cat-grid-square  .horizontal-cat-btn a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'btn_lg_normal_typo',
            'selector' => '{{WRAPPER}} .cat-grid-square  .horizontal-cat-btn a',
        ]
    );
    $this->add_responsive_control(
        'btn_lg_normal_bg',
        [
            'label' => esc_html__( 'Background Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cat-grid-square  .horizontal-cat-btn a' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
            'name' => 'btn_lg_normal_border',
            'label' => esc_html__( 'Border', 'emerce-core' ),
            'selector' => '{{WRAPPER}} .cat-grid-square  .horizontal-cat-btn a',
        ]
    );    
    $this->end_controls_tab();

    $this->start_controls_tab(
        'style_lg_hover_tab',
        [
            'label' => esc_html__( 'Button Hover', 'emerce-core' ),
        ]
    );
    $this->add_responsive_control(
        'btn_lg_hover_color',
        [
            'label' => esc_html__( 'Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cat-grid-square  .horizontal-cat-btn a:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'btn_lg_hover_typo',
            'selector' => '{{WRAPPER}} .cat-grid-square  .horizontal-cat-btn a:hover',
        ]
    );
    $this->add_responsive_control(
        'btn_lg_hover_bg',
        [
            'label' => esc_html__( 'Background Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cat-grid-square  .horizontal-cat-btn a:hover' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
            'name' => 'btn_lg_hover_border',
            'label' => esc_html__( 'Border', 'emerce-core' ),
            'selector' => '{{WRAPPER}} .cat-grid-square  .horizontal-cat-btn a:hover',
        ]
    );    
    $this->end_controls_tab();
    
    $this->end_controls_tabs();
    

    $this->end_controls_section();
		
		
		

    
   }
   

   

   protected function render( $instance = [] ) {
       $settings = $this->get_settings_for_display();
       
       
       ?>

<section class="custom-cat-grid1">
        <div class="row flex-column-reverse flex-lg-row gx-6">
            <div class="col-lg-6">
                <div class="row gx-6">
                    <div class="col-sm-12 col-md-6">
                        <div class="cat-grid-horizontal item-one">
                            <div class="cat-horizontal-img">
                                <img src="<?php echo esc_url( $settings['banner_one_image']['url']); ?>" alt="">
                            </div>
                            <h3><?php echo esc_html( $settings['banner_one_heading']); ?></h3>
                            <p><?php echo esc_html( $settings['banner_one_content']); ?></p>
                            <div class="horizontal-cat-btn">
                                <a href="<?php echo esc_url( $settings['banner_one_btn_link']['url']); ?>"><?php echo esc_html( $settings['banner_one_btn_txt']); ?> <i class="ri-arrow-right-line"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="cat-grid-horizontal item-two">
                            <div class="cat-horizontal-img">
                                <img src="<?php echo esc_url( $settings['banner_two_image']['url']); ?>" alt="">
                            </div>
                            <h3><?php echo esc_html( $settings['banner_two_heading']); ?></h3>
                            <p><?php echo esc_html( $settings['banner_two_content']); ?></p>
                            <div class="horizontal-cat-btn">
                                <a href="<?php echo esc_url( $settings['banner_two_btn_link']['url']); ?>"><?php echo esc_html( $settings['banner_two_btn_txt']); ?> <i class="ri-arrow-right-line"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="cat-grid-horizontal vertical">
                            <div class="vertical-content">
                            <h3><?php echo esc_html( $settings['banner_three_heading']); ?></h3>
                            <p><?php echo esc_html( $settings['banner_three_content']); ?></p>
                                <div class="horizontal-cat-btn">
                                    <a href="<?php echo esc_url( $settings['banner_three_btn_link']['url']); ?>"><?php echo esc_html( $settings['banner_three_btn_txt']); ?> <i class="ri-arrow-right-line"></i></a>
                                </div>
                            </div>
                            <div class="cat-vertical-img">
                                <img src="<?php echo wp_get_attachment_image_url($settings['banner_three_image']['id'], 'emerce-woo-product-semi-wide'); ?>" alt="">
                                
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="cat-grid-square" style="height: 100%; background-repeat: no-repeat; background-size: cover; background-position: center center;">

                    <p><?php echo esc_html( $settings['banner_four_before_heading']); ?></p>
                    <h2><?php echo esc_html( $settings['banner_four_heading']); ?></h2>
                    <div class="horizontal-cat-btn">
                        <a href="<?php echo esc_url( $settings['banner_four_btn_link']['url']); ?>"><?php echo esc_html( $settings['banner_four_btn_txt']); ?> <i class="ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </div>
        </div>
 
</section>
       
            
        
       
       <?php
       
}  
protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_home_decor_banner );
?>
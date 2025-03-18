<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_section_heading extends Widget_Base {

   public function get_name() {
      return 'emerce_section_heading';
   }

   public function get_title() {
      return __( 'Section Heading', 'emerce' );
   }
public function get_categories() {
		return [ 'emerce-ele-widgets-cat' ];
	}
   public function get_icon() { 
        return 'emerceo-semi-solid cs-orange';
   }

   protected function register_controls() {

    $this->start_controls_section(
        'emerce_heading_content_control',
        [
            'label' => __( 'Content', 'emerce' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_responsive_control(
        'emerce_section_heading',
        [
            'label' => __( 'Title', 'emerce' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'label_block' => true,
            'default' => __( 'Trending Products', 'emerce' ),
        ]
    );

    $this->add_responsive_control(
        'emerce_section_subheading',
        [
            'label' => __( 'Sub Title', 'emerce' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'label_block' => true,
            'default' => __( 'Here’s some of our most popular products people are in love with', 'emerce' ),
        ]
    );
     $this->add_responsive_control(
        'section_top_left_tp',
        [
            'label' => __( 'Top Left Text', 'emerce' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'label_block' => true,
            'default' => __( 'SALE UP TO', 'emerce' ),
        ]
    );
    $this->add_responsive_control(
        'section_top_right_tp',
        [
            'label' => __( 'Top Right Text', 'emerce' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'label_block' => true,
            'default' => __( '50% OFF', 'emerce' ),
        ]
    );
    $this->end_controls_section();
    
    // Style Tab

    $this->start_controls_section(
        'emerce_heading_alignment',
        [
            'label' => __( 'Alignment', 'emerce' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_responsive_control(
        'text_align',
        [
            'label' => __( 'Text Align', 'emerce' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => __( 'Left', 'emerce' ),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => __( 'Center', 'emerce' ),
                    'icon' => 'eicon-text-align-center',
                ],
                'right' => [
                    'title' => __( 'Right', 'emerce' ),
                    'icon' => 'eicon-text-align-right',
                ],
                'justify' => [
                    'title' => __( 'Justify', 'emerce' ),
                    'icon' => 'eicon-text-align-justify',
                ],
            ],
            'default' => 'center',
            'selectors' => [
                '{{WRAPPER}} .section-heading' => 'text-align: {{VALUE}} !important',
            ],
        ]
    );
    $this->end_controls_section();

    $this->start_controls_section(
        'emerce_heading_style',
        [
            'label' => __( 'Title', 'emerce' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'emerce_section_heading_color',
        [
            'label' => __( 'Title Color', 'emerce' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .section-heading h2' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'emerce_section_heading_typo',
            'label' => __( 'Typography', 'emerce' ),
            'selector' => '{{WRAPPER}} .section-heading h2',
        ]
    );
    $this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .section-heading h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
    $this->end_controls_section();

    $this->start_controls_section(
        'emerce_subheading_style',
        [
            'label' => __( 'Sub Title', 'emerce' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'emerce_section_subheading_color',
        [
            'label' => __( 'Sub Title Color', 'emerce' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .section-heading p' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'emerce_section_subheading_typo',
            'label' => __( 'Typography', 'emerce' ),
            'selector' => '{{WRAPPER}} .section-heading p',
        ]
    );
    $this->end_controls_section();
    
   }
   

   protected function render( $instance = [] ) {

    $settings = $this->get_settings_for_display();
    $emerce_section_heading = $settings['emerce_section_heading'];
    $emerce_section_subheading = $settings['emerce_section_subheading'];
    $emerce_top_lefttxt = $settings['section_top_left_tp'];
    $emerce_top_rghttxt = $settings['section_top_right_tp'];

    ?>
    <div class="section-heading text-center">
        <div class="section-heading-top-texts h-text-style-one">
            <?php if($emerce_top_lefttxt){?>
            <span class="section-left-txt-h"><?php echo esc_html($emerce_top_lefttxt);?></span>
            <?php } ?>
            <?php if($emerce_top_rghttxt){?>
            <span class="section-right-txt-h"><?php echo esc_html($emerce_top_rghttxt);?></span>
            <?php } ?>
        </div>
        <h2><?php echo esc_html( $emerce_section_heading ); ?></h2>
        <p><?php echo esc_html( $emerce_section_subheading ); ?></p>
    </div>
    <?php
       
}  
protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_section_heading );
?>
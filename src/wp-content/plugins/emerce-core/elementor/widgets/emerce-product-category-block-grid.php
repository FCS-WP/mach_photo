<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_product_category_block_grid extends Widget_Base {

   public function get_name() {
      return 'emerce_product_category_block_grid';
   }

   public function get_title() {
      return __( 'Category Block Grid', 'emerce-core' );
   }
public function get_categories() {
		return [ 'emerce-ele-widgets-cat' ];
	}
   public function get_icon() { 
        return 'emerceo-semi-solid cs-orange';
   }

   protected function register_controls() {
       
    $this->start_controls_section(
        'xopic_cat_grid',
        [
            'label' => __( 'Grid Settings', 'emerce-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

   $this->add_control(
        'show_items',
        [
            'label' => __( 'Show Items', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'step' => 1,
            'default' => 5,
        ]
    );
    $this->add_control(
        'category',
        array(
          'label'       => esc_html__( 'Select Category Manually', 'emerce-core' ),
          'type'        => Controls_Manager::SELECT2,
          'multiple'    => true,
          'options'     => array_flip(emerce_elements_items( 'categories', array(
            'sort_order'  => 'ASC',
            'taxonomy'    => 'product_cat',
            'hide_empty'  => false,
          ) )),
          'label_block' => true,
        )
      );
    $this->end_controls_section();
    
   
    
    


    // Style Tab
    
    $this->start_controls_section(
        'gird_cat_btn_style',
        [
            'label' => __( 'Button Style', 'emerce-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->start_controls_tabs(
        'style_tabs'
    );
    
    $this->start_controls_tab(
        'btn_normal_tab',
        [
            'label' => esc_html__( 'Normal Style', 'emerce-core' ),
        ]
    );
    $this->add_control(
        'btn_color',
        [
            'label' => esc_html__( 'Button Text Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .custom-cat-grid-st2-link a, 
                 {{WRAPPER}} .custom-cat-grid-st2-link a span' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'btn_typo',
            'selector' => '{{WRAPPER}} .custom-cat-grid-st2-link a, {{WRAPPER}} .custom-cat-grid-st2-link a span',
        ]
    );
    $this->add_control(
        'btn_bg_color',
        [
            'label' => esc_html__( 'Button Text Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .custom-cat-grid-st2-link a, {{WRAPPER}} .custom-cat-grid-st2-link a span' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'btn_padding',
        [
            'label' => esc_html__( 'Button Padding', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .custom-cat-grid-st2-link a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
            'name' => 'btn_border',
            'label' => esc_html__( 'Border', 'emerce-core' ),
            'selector' => '{{WRAPPER}} .custom-cat-grid-st2-link a',
        ]
    );
    
    $this->end_controls_tab();

    $this->start_controls_tab(
        'btn_hover_tab',
        [
            'label' => esc_html__( 'Hover Style', 'emerce-core' ),
        ]
    );
    $this->add_control(
        'btn_hov_color',
        [
            'label' => esc_html__( 'Button Text Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .custom-cat-grid-st2-link a:hover,
                 {{WRAPPER}} .custom-cat-grid-st2-link a:hover span' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'btn_hov_typo',
            'selector' => '{{WRAPPER}} .custom-cat-grid-st2-link a:hover, {{WRAPPER}} .custom-cat-grid-st2-link a:hover span',
        ]
    );
    $this->add_control(
        'btn_bg_hov_color',
        [
            'label' => esc_html__( 'Button Text Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .custom-cat-grid-st2-link a:hover, {{WRAPPER}} .custom-cat-grid-st2-link a:hover span' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'btn_hov_padding',
        [
            'label' => esc_html__( 'Button Padding', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .custom-cat-grid-st2-link a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
            'name' => 'btn_hov_border',
            'label' => esc_html__( 'Border', 'emerce-core' ),
            'selector' => '{{WRAPPER}} .custom-cat-grid-st2-link a:hover',
        ]
    );
    
    $this->end_controls_tab();
    
    $this->end_controls_tabs();
    
    

    $this->end_controls_section();
    
    
   }
   

   protected function render( $instance = [] ) {

    $settings = $this->get_settings_for_display();
    $show_items = $settings['show_items'];
    $category = $settings['category'];


    $terms = get_terms( array(
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
        'number' => $show_items,
        'include' => $category,
    ) );
    
    ?>

        <section class="custom-cat-grid-st2">
            <div class="emerce-cat-block-grid">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                    <?php 
                        $terms_left = array_slice($terms,0,2);
                        foreach( $terms_left as $term ){
                            $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                            $image = wp_get_attachment_url($thumbnail_id);
                            
                        ?>
                            <div class="custom-cat-grid-st2-single">
                                <img src="<?php echo $image; ?>" alt="<?php echo esc_html( $term->name )?>">
                                <div class="custom-cat-grid-st2-link">
                                    <a href="<?php echo get_term_link($term->slug, 'product_cat'); ?>"><?php echo esc_html( $term->name )?> <span>(<?php echo esc_html( $term->count )?>)</span></a>
                                </div>
                            </div>
                        <?php }   ?>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <?php 
                        $terms_middle = array_slice($terms,2,1);
                        foreach( $terms_middle as $term ){
                            $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                            $image = wp_get_attachment_url($thumbnail_id);
                            
                        ?>
                        <div class="custom-cat-grid-st2-single">
                        <img src="<?php echo $image; ?>" alt="<?php echo esc_html( $term->name )?>">
                            <div class="custom-cat-grid-st2-link">
                            <a href="<?php echo get_term_link($term->slug, 'product_cat'); ?>"><?php echo esc_html( $term->name )?> <span>(<?php echo esc_html( $term->count )?>)</span></a>
                            </div>
                        </div>
                        <?php }   ?>
                    </div>

                    <div class="col-sm-12 col-md-3">
                        <?php 
                            $terms_right = array_slice($terms,3,2);
                            foreach( $terms_right as $term ){
                                $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                                $image = wp_get_attachment_url($thumbnail_id);
                                
                            ?>
                                <div class="custom-cat-grid-st2-single">
                                    <img src="<?php echo $image; ?>" alt="<?php echo esc_html( $term->name )?>">
                                    <div class="custom-cat-grid-st2-link">
                                        <a href="<?php echo get_term_link($term->slug, 'product_cat'); ?>"><?php echo esc_html( $term->name )?> <span>(<?php echo esc_html( $term->count )?>)</span></a>
                                    </div>
                                </div>
                            <?php }   ?>
                    </div>

                </div>
            </div>
        </section>

    <?php

}  
protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_product_category_block_grid );
?>
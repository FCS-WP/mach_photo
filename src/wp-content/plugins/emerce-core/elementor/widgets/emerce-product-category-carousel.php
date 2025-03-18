<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_product_category_carousel extends Widget_Base {

   public function get_name() {
      return 'emerce_product_category_carousel';
   }

   public function get_title() {
      return __( 'Product Category Carousel', 'emerce' );
   }
public function get_categories() {
		return [ 'emerce-ele-widgets-cat' ];
	}
   public function get_icon() { 
        return 'emerceo-semi-solid cs-orange';
   }

   protected function register_controls() {

    $this->start_controls_section(
        'xopic_cat_section',
        [
            'label' => __( 'Content', 'emerce' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'item_per_page',
        [
            'label' => __( 'Number of Category to Show', 'emerce' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 4,
        ]
    );
  

    $this->add_control(
        'order',
        [
            'label' => __( 'Order', 'emerce' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'DESC',
            'options' => [
                'DESC'  => __( 'Descending', 'emerce' ),
                'ASC' => __( 'Ascending', 'emerce' ),
            ],
        ]
    );
    $this->add_control(
        'category',
        array(
          'label'       => esc_html__( 'Select Categories', 'pivoo' ),
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
      $this->add_control(
			'widget_title',
			[
				'label' => __( 'Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Default title', 'plugin-domain' ),
				'placeholder' => __( 'Type your title here', 'plugin-domain' ),
			]
		);
		
		 $this->add_control(
			'widget_sub_title',
			[
				'label' => __( 'Sub Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Default title', 'plugin-domain' ),
				'placeholder' => __( 'Type your title here', 'plugin-domain' ),
			]
		);
    $this->end_controls_section();

      // Style Tab
    $this->start_controls_section(
        'xopic_cat_bg_style',
        [
            'label' => __( 'Category Background', 'emerce' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'cat_bg_color',
        [
            'label' => __( 'Background Color', 'emerce' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .category-list' => 'background: {{VALUE}}',
            ],
        ]
    );
    
    $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .section-heading h2',
			]
		);
		
		$this->add_control(
			'section-margin',
			[
				'label' => esc_html__( 'Title Margin', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .section-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
    $this->end_controls_section();

    $this->start_controls_section(
        'xopic_cat_name_style',
        [
            'label' => __( 'Category Name', 'emerce' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'cat_name_color',
        [
            'label' => __( 'Color', 'emerce' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .category-list p' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'cat_name_typo',
            'label' => __( 'Typography', 'emerce' ),
            'selector' => '{{WRAPPER}} .category-list p',
        ]
    );

    $this->end_controls_section();
    
     $this->start_controls_section(
        'xopic_cat_carousel_style',
        [
            'label' => __( 'Carousel Style', 'emerce' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'sec_title_color',
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
				'name' => 'sec_title_typo',
				'label' => __( 'Title Typography', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .section-heading h2',
			]
		);
		 $this->add_control(
        'sec_subtitle_color',
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
				'name' => 'sec_sub_title_typo',
				'label' => __( 'Sub Title Typography', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .section-heading p',
			]
		);
		
		$this->add_control(
        'arrow_color',
        [
            'label' => __( 'Arrow Color', 'emerce' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} #emerce-cat-carousel-box .emerce-swiper-button-prev,{{WRAPPER}}
                #emerce-cat-carousel-box .emerce-swiper-button-next' => 'color: {{VALUE}}',
                
            ],
        ]
    );
    
    	$this->add_control(
        'arrow__border_color',
        [
            'label' => __( 'Arrow Border Color', 'emerce' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} #emerce-cat-carousel-box .emerce-swiper-button-prev,{{WRAPPER}}
                #emerce-cat-carousel-box .emerce-swiper-button-next' => 'border-color: {{VALUE}}',
                
            ],
        ]
    );
    
    	$this->add_control(
        'arrow__hvr_color',
        [
            'label' => __( 'Arrow Hover Color', 'emerce' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} #emerce-cat-carousel-box .emerce-swiper-button-prev:hover,{{WRAPPER}}
                #emerce-cat-carousel-box .emerce-swiper-button-next:hover' => 'color: {{VALUE}}',
                
            ],
        ]
    );
    
    	$this->add_control(
        'arrow__hvr_bg_color',
        [
            'label' => __( 'Arrow Hover Background Color', 'emerce' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} #emerce-cat-carousel-box .emerce-swiper-button-prev:hover,{{WRAPPER}}
                #emerce-cat-carousel-box .emerce-swiper-button-next:hover' => 'background: {{VALUE}}',
                
            ],
        ]
    );
    	$this->add_control(
        'arrow__hvr_border_color',
        [
            'label' => __( 'Arrow Hover Border Color', 'emerce' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                 '{{WRAPPER}} #emerce-cat-carousel-box .emerce-swiper-button-prev:hover,{{WRAPPER}}
                #emerce-cat-carousel-box .emerce-swiper-button-next:hover' => 'border-color: {{VALUE}}'
                
            ],
        ]
    );
    $this->end_controls_section();
   }
   

   protected function render( $instance = [] ) {

    $settings = $this->get_settings_for_display();
    $item_per_page = $settings['item_per_page'];
    $order = $settings['order'];
    $category = $settings['category'];

    $terms = get_terms( array(
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
        'number' => $item_per_page,
        'include' => $category,
        'order' => $order,
    ) );



    ?>
    <div class="emerce-cat-carousel-main">
         
        <div id="emerce-cat-carousel-box" class="emerce-cat-carousel-box swiper swiper-container">
            <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                         <div class="section-heading">
                            <?php if($settings['widget_title']){?>
                            <h2><?php echo $settings['widget_title'];?></h2>
                            <?php } ?>
                            <?php if($settings['widget_sub_title']){?>
                            <p><?php echo $settings['widget_sub_title'];?></p>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-6 text-md-end mb-3 mb-md-0">
                             <div class="emerce-swiper-button-prev"><i class="zil zi-chevron-left"></i></div><span class="emerce-swiper-arrow-space"></span>
  <div class="emerce-swiper-button-next"><i class="zil zi-chevron-right"></i></div>
                    </div>
                </div>
           
            <div class="swiper-wrapper">
        <?php foreach( $terms as $term ){
            $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
            $image = wp_get_attachment_url($thumbnail_id);
            ?>
            
            <div class="emerce-cat-carousel-item swiper-slide">
                <a href="<?php echo get_term_link($term->slug, 'product_cat'); ?>">
                    <div class="category-list">
                    <?php if($image){ echo "<img src='{$image}' alt='' width='160' height='160' />"; } ?>
                        <p class="category-name"><?php echo esc_html( $term->name )?></p>
                    </div>
                </a>
            </div>
        <?php } ?>
        </div>
        
   
        </div>
    </div>
    <?php

}  
protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_product_category_carousel );
?>
<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_product_carousel extends Widget_Base {

   public function get_name() {
      return 'emerce_product_carousel';
   }

   public function get_title() {
      return __( 'Product Carousel', 'emerce' );
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
        'item_per_row',
        [
            'label' => __( 'Items Per Row', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 2,
            'max' => 6,
            'step' => 1,
            'default' => 4,
        ]
    );
  
  $this->add_control(
			'product_section_style',
			[
				'label' => __( 'Select Section Style', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'one',
				'options' => [
					'one'  => __( 'Style One', 'emerce-core' ),
					'two' => __( 'Style Two', 'emerce-core' ),
					'three' => __( 'Style Three', 'emerce-core' ),
					'four' => __( 'Style Four', 'emerce-core' ),
					'five' => __( 'Style Five', 'emerce-core' ),
					'six' => __( 'Style Six', 'emerce-core' ),
					'seven' => __( 'Style Seven', 'emerce-core' ),
                    'eight' => __( 'Style Eight', 'emerce-core' ),
				],
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
			'product_type',
			[
				'label' => __( 'Select Product Type', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'regular',
				'options' => [
					'regular'  => __( 'Regular', 'emerce-core' ),
					'featured' => __( 'Featured', 'emerce-core' ),
					'onsale' => __( 'On Sale', 'emerce-core' ),
					'bestseller' => __( 'Best Seller', 'emerce-core' ),
				],
			]
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
    $item_per_row = $settings['item_per_row'];
    $product_type = $settings['product_type'];
    $product_section_style = $settings['product_section_style'];

   if ($product_type=='onsale'){
        $product_args =  array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => $item_per_page,
            'meta_query'        => WC()->query->get_meta_query(),
        'post__in'          => array_merge( array( 0 ), wc_get_product_ids_on_sale() )
        );
        
    } else {
        $product_args =  array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => $item_per_page,
        );
    }
    if(!empty($category[0])) {
      $product_args['tax_query'] = array(
        array(
          'taxonomy' => 'product_cat',
          'field'    => 'ids',
          'terms'    => $category
        )
      );
    }
    if ($product_type=='featured'){
       $product_args['tax_query'] = array(
        array(
        'taxonomy' => 'product_visibility',
        'field'    => 'name',
        'terms'    => 'featured',
        'operator' => 'IN',
        )
      ); 
    }
    if ($product_type=='bestseller'){
    $product_args['meta_query'] = array(

        array( 
        'key'           => 'total_sales',
        'value'         => 0,
        'compare'       => '>',
        'type'          => 'numeric'
        )
    );          
    }

 $the_query = new \WP_Query($product_args);


    ?>
    <div class="emerce-product-carousel-main">
         
        <div id="emerce-product-carousel-box" class="carousol-col-4 emerce-product-carousel-box swiper swiper-container">
            <div class="container">
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
            </div>
         
           
            <div class="swiper-wrapper  msv_centered_carousel">
        <?php 
        if( $the_query -> have_posts()){
            while( $the_query -> have_posts()){
                $the_query -> the_post();
                global $product;
            ?>
            
            <div class="emerce-product-carousel-item swiper-slide">
                 <?php 
                
                switch ($product_section_style) {
                    case "one": 
                            get_template_part( 'inc/vendor/woocommerce/product-style/content-style-one' ); 
                        break;
                    case "two":
                            get_template_part( 'inc/vendor/woocommerce/product-style/content-style-two' );
                        break;
                    case "three": 
                            get_template_part( 'inc/vendor/woocommerce/product-style/content-style-three' );
                        break;
                    case "four": 
                            get_template_part( 'inc/vendor/woocommerce/product-style/content-style-four' );
                        break;
                    case "five": 
                            get_template_part( 'inc/vendor/woocommerce/product-style/content-style-five' );
                        break;
                    case "six": 
                            get_template_part( 'inc/vendor/woocommerce/product-style/content-style-six' );
                        break;
                    case "seven": 
                            get_template_part( 'inc/vendor/woocommerce/product-style/content-style-seven' );
                        break;
                    case "eight": 
                            get_template_part( 'inc/vendor/woocommerce/product-style/content-style-eight' );
                        break;
                    }
                ?>
            
            </div>
        <?php } }  ?>
        </div>
        
   
        </div>
    </div>
    <?php

}  
protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_product_carousel );
?>
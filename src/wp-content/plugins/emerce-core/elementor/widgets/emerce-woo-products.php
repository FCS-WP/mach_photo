<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_woo_products extends Widget_Base {

   public function get_name() {
      return 'emerce_woo_products';
   }

   public function get_title() {
      return __( 'Woocommerce Products', 'emerce-core' );
   }
public function get_categories() {
		return [ 'emerce-ele-widgets-cat' ];
	}
   public function get_icon() { 
        return 'emerceo-semi-solid cs-orange';
   }

   protected function register_controls() {

    $this->start_controls_section(
        'trending_woo_products_section',
        [
            'label' => __( 'Content', 'emerce-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
                    'nine' => __( 'Style Nine', 'emerce-core' ),
                    'ten' => __( 'Style Ten', 'emerce-core' ),
				],
			]
		);

   $this->add_control(
			'product_filter_ebl',
			[
				'label' => __( 'Product Filter Enable/Disable', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'off',
				'options' => [
					'on'  => __( 'Enable', 'emerce-core' ),
					'off' => __( 'Disable', 'emerce-core' ),
				
				],
			]
		);
		
	
    $this->add_control(
        'item_per_page',
        [
            'label' => __( 'Number of Products to Show', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 2,
            'max' => 1000,
            'step' => 1,
            'default' => 8,
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
        'item_per_row_mob',
        [
            'label' => __( 'Items Per Row Mobile', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 1,
            'max' => 3,
            'step' => 1,
            'default' => 1,
        ]
    );
    	$this->add_control(
			'mob_custom_row_gap',
			[
				'label' => __( 'Mobile Smaller Column Gap', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'off',
				'options' => [
					'on'  => __( 'Enable', 'emerce-core' ),
					'off' => __( 'Disable', 'emerce-core' ),
				
				],
			]
		);
    $this->add_control(
        'category',
        array(
          'label'       => esc_html__( 'Select Category', 'emerce-core' ),
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
    $this->end_controls_section();
    
    $this->start_controls_section(
			'title_style',
			[
				'label' => __( 'Title & Price Style', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Product Title Color', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .product-content h4,
					{{WRAPPER}} .product-content h4 a,
					{{WRAPPER}} .sell-pro-content h4 a,
					{{WRAPPER}} .sell-pro-content h4' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Product Title Typography', 'emerce-core' ),
				'selector' => '{{WRAPPER}} .product-content h4,
					{{WRAPPER}} .product-content h4 a,
					{{WRAPPER}} .sell-pro-content h4 a,
					{{WRAPPER}} .sell-pro-content h4',
			]
		);
		
		$this->add_control(
			'price_color',
			[
				'label' => __( 'Product Price Color', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sell-pro-price .amount,
					{{WRAPPER}} span.price' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'label' => __( 'Product Title Typography', 'emerce-core' ),
				'selector' => '{{WRAPPER}} .sell-pro-price .amount,
				{{WRAPPER}} span.price',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'button_style',
			[
				'label' => __( 'Button Style', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->start_controls_tabs(
        'cart_button'
    );

    $this->start_controls_tab(
        'style_cartN_tab',
        [
            'label' => __( 'Normal', 'emerce-core' ),
        ]
    );
    $this->add_control(
        'banner_btn_color',
        [
            'label' => __( 'Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .trending-pro-cart-btn a,
                {{WRAPPER}} .trending-cart-st1-btn a,
                {{WRAPPER}} .green-bg-btn a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'banner_btn_bg',
        [
            'label' => __( 'Background Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .trending-pro-cart-btn a,
                {{WRAPPER}} .trending-cart-st1-btn a,
                {{WRAPPER}} .green-bg-btn a' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'banner_btn_typo',
            'label' => __( 'Typography', 'emerce-core' ),
            'selector' => '{{WRAPPER}} .trending-pro-cart-btn a,
            {{WRAPPER}} .trending-cart-st1-btn a,
            {{WRAPPER}} .green-bg-btn a',
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
            'name' => 'btn_border',
            'label' => __( 'Border', 'emerce-core' ),
            'selector' => '{{WRAPPER}} .trending-pro-cart-btn a,
            {{WRAPPER}} .trending-cart-st1-btn a,
            {{WRAPPER}} .green-bg-btn a',
        ]
    );
    $this->end_controls_tab();


    $this->start_controls_tab(
        'style_hover_tab',
        [
            'label' => __( 'Hover', 'emerce-core' ),
        ]
    );
    $this->add_control(
        'banner_btn_hover_color',
        [
            'label' => __( 'Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .trending-pro-cart-btn a:hover,
                {{WRAPPER}} .trending-cart-st1-btn a:hover,
                {{WRAPPER}} .green-bg-btn a:hovern
                {{WRAPPER}} .trending-products-st2:hover .trending-pro-cart-btn a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'banner_btn_hover_bg',
        [
            'label' => __( 'Background Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .trending-pro-cart-btn a:hover,
                {{WRAPPER}} .trending-cart-st1-btn a:hover,
                {{WRAPPER}} .green-bg-btn a:hover,
                {{WRAPPER}} .trending-products-st2:hover .trending-pro-cart-btn a' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
            'name' => 'btn_border_hover',
            'label' => __( 'Border', 'emerce-core' ),
            'selector' => '{{WRAPPER}} .trending-pro-cart-btn a:hover,
            {{WRAPPER}} .trending-cart-st1-btn a:hover,
            {{WRAPPER}} .green-bg-btn a:hover,
            {{WRAPPER}} .trending-products-st2:hover .trending-pro-cart-btn a',
        ]
    );
    $this->end_controls_tab();
    $this->end_controls_tabs();
    
		$this->end_controls_section();
		
			$this->start_controls_section(
			'other_style',
			[
				'label' => __( 'Other Style', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		
		$this->add_control(
        'all_link_color',
        [
            'label' => __( 'Link Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .add-to-cart-green-btn a' => 'color: {{VALUE}};border-color: {{VALUE}}',
            ],
        ]
    );
    	$this->add_control(
        'all_link__hvrcolor',
        [
            'label' => __( 'Link Hover Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .add-to-cart-green-btn a:hover' => 'color: {{VALUE}};border-color: {{VALUE}}',
            ],
        ]
    );
    
    
		 $this->add_control(
        'sale_percent_label',
        [
            'label' => __( 'Sale Label Background', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .onesale span' => 'background: {{VALUE}}',
            ],
        ]
    );
    
     $this->add_control(
        'sale_percent_label_txt',
        [
            'label' => __( 'Sale Label Text', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .onesale span' => 'color: {{VALUE}}',
            ],
        ]
    );
    
    
    $this->add_control(
			'side_btn_group',
			[
				'label' => __( 'Side Button Group Style', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
    	$this->start_controls_tabs(
        'side_button_group'
    );

    $this->start_controls_tab(
        'style_side_btns',
        [
            'label' => __( 'Normal', 'emerce-core' ),
        ]
    );
    $this->add_control(
        'sbanner_btn_color',
        [
            'label' => __( 'Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .producticons a,
                {{WRAPPER}} .producticons-st3 a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'sbanner_btn_bg',
        [
            'label' => __( 'Background Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .producticons a,
                {{WRAPPER}} .producticons-st3 a' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->end_controls_tab();


    $this->start_controls_tab(
        'style_sbhover_tab',
        [
            'label' => __( 'Hover', 'emerce-core' ),
        ]
    );
    $this->add_control(
        'sbanner_btn_hover_color',
        [
            'label' => __( 'Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .producticons a:hover,
                {{WRAPPER}} .producticons-st3 a:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'sbanner_btn_hover_bg',
        [
            'label' => __( 'Background Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .producticons a:hover,
                {{WRAPPER}} .producticons-st3 a:hover' => 'background: {{VALUE}}',
            ],
        ]
    );
  
    $this->end_controls_tab();
    $this->end_controls_tabs();
    
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'filter_typo',
            'label' => __( 'Filter Typography', 'emerce-core' ),
            'selector' => '{{WRAPPER}} ul.isotop-product-filter li',
        ]
    );
    
     $this->add_control(
        'filter_color',
        [
            'label' => __( 'Filter Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} ul.isotop-product-filter li' => 'color: {{VALUE}}',
            ],
        ]
    );
    
    $this->add_control(
        'filter_color_hvr',
        [
            'label' => __( 'Filter Hover Color', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} ul.isotop-product-filter li:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    
    $this->add_control(
			'gap_filter_product',
			[
				'label' => __( 'Filter & Product Gap', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} ul.isotop-product-filter' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
$this->end_controls_section();



		
			$this->start_controls_section(
			'content_style',
			[
				'label' => __( 'Box Style', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
    $this->add_control(
			'box_style',
			[
				'label' => __( 'Box Style', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
    	$this->start_controls_tabs(
        'box_stl_main'
    );

    $this->start_controls_tab(
        'box_normal_state',
        [
            'label' => __( 'Normal', 'emerce-core' ),
        ]
    );
    
    $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_main_bg',
				'label' => __( 'Background', 'plugin-domain' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .best-selling-products,
				{{WRAPPER}} .trending-products-st2',
			]
		);
    $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_main_border',
				'label' => __( 'Border', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .best-selling-products,
				{{WRAPPER}} .trending-products-st2',
			]
		);
    
    $this->end_controls_tab();


    $this->start_controls_tab(
        'box_main_hover',
        [
            'label' => __( 'Hover', 'emerce-core' ),
        ]
    );
     $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_main_bg_hvr',
				'label' => __( 'Background', 'plugin-domain' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .best-selling-products:hover,
				{{WRAPPER}} .trending-products-st2:hover',
			]
		);
    $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_main_border_hvr',
				'label' => __( 'Border', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .best-selling-products:hover,
				{{WRAPPER}} .trending-products-st2:hover',
			]
		);
  
    $this->end_controls_tab();
    $this->end_controls_tabs();
    
    $this->end_controls_section();

    
   }   

   protected function render( $instance = [] ) {

    $settings = $this->get_settings_for_display();
    $item_per_page = $settings['item_per_page'];
    $category = $settings['category'];
    $item_per_row = $settings['item_per_row'];
    $item_per_row_mob = $settings['item_per_row_mob'];
    $product_section_style = $settings['product_section_style'];
    $product_type = $settings['product_type'];
    $product_filter_ebl = $settings['product_filter_ebl'];
    $mob_custom_row_gap = $settings['mob_custom_row_gap'];

    if (get_query_var('paged')) {
        $paged = get_query_var('paged');
    } elseif (get_query_var('page')) {
        $paged = get_query_var('page');
    } else {
        $paged = 1;
    }
  
    if ($product_type=='onsale'){
        $product_args =  array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'paged'               => $paged,
            'posts_per_page' => $item_per_page,
            'meta_query'        => WC()->query->get_meta_query(),
        'post__in'          => array_merge( array( 0 ), wc_get_product_ids_on_sale() )
        );
        
    } else {
        $product_args =  array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'paged'               => $paged,
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
    $max_num_pages = $the_query->max_num_pages; 
    $items_per_row = $item_per_row;
    $item_per_row_mob = $item_per_row_mob;
    $show_items = "";
    $show_items_mobile = "";
    $col_grid = "";
    $customrow_space = "";
    
    switch ($items_per_row) {
      case 2:
        $show_items = "col-md-6";
        break;
      case 3:
        $show_items = "col-md-4";
        break;
      case 4:
        $show_items = "col-md-3";
        break;
        case 5:
            $col_grid = "row-cols-5";
            $show_items = "col";
        break;
        case 6:
            $show_items = "col-md-2";
        break;
    }
    
    switch ($item_per_row_mob) {
         case 2:
        $show_items_mobile = "col-6";
        break;
        
         case 3:
        $show_items_mobile = "col-4";
        break;
    }
    
    if ($mob_custom_row_gap== true){
         $customrow_space = "row-mob-smaller";
    }

    ?>
    <?php if($product_filter_ebl == 'on' ){
    
        $terms = get_terms( array(
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
            'include' => $category,
        ) );
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="product-cat-filter">
                <ul class="isotop-product-filter text-center">
                    <li data-filter="*">All</li>
                    <?php foreach($terms as $term ){ ?>
                        <li data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php if($product_filter_ebl=="on"){?>
     <div class="iso-pro-filter">
         <?php } else { ?>
         
         <div class="iso-pro-no-filter">
             <?php } ?>
    <div class="row <?php echo esc_attr($customrow_space); ?> <?php if( $items_per_row == 5){ echo esc_attr( $col_grid ); }?>">
        <?php if( $the_query -> have_posts()){
            while( $the_query -> have_posts()){
                $the_query -> the_post();
                global $product;
                
            $isotop_filter_class = get_the_terms( get_the_id(), 'product_cat' );

             
             
                
            ?>
        <div class="<?php echo esc_attr($show_items_mobile);?> <?php echo esc_attr( $show_items );?> my-3 <?php if($product_filter_ebl == 'on'){echo "iso-pro-item"; } foreach($isotop_filter_class as $pro){ echo ' ' . $pro->slug;} ?>">
            
           
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
                    case "nine": 
                            get_template_part( 'inc/vendor/woocommerce/product-style/content-style-nine' );
                        break;
                    case "ten": 
                            get_template_part( 'inc/vendor/woocommerce/product-style/content-style-ten' );
                        break;
                    }
                ?>
            
            
        </div>
        <?php }
         wp_reset_postdata();
         
          
        } 
        
       
        ?>
    </div>
</div>

    <?php


       
}  
protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_woo_products ); ?>
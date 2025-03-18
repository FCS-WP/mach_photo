<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_unevent_product_grid extends Widget_Base {

   public function get_name() {
      return 'emerce_unevent_product_grid';
   }

   public function get_title() {
      return __( 'Un-Even Product Grid', 'emerce-core' );
   }
public function get_categories() {
		return [ 'emerce-ele-widgets-cat' ];
	}
   public function get_icon() { 
        return 'emerceo-semi-solid cs-orange';
   }

   protected function register_controls() {
       
       $this->start_controls_section(
			'text_switcher_settings',
			[
				'label' => __( 'Text Block Settings', 'emerce-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
       $this->add_control(
			'text_switcher',
			[
				'label' => __( 'Text Block Show or Hide', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'emerce-core' ),
				'label_off' => __( 'Hide', 'emerce-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'unevent_text_title',
			[
				'label' => __( 'Title', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'condition' => ['text_switcher' => 'yes'],
			]
		);
		$this->add_control(
			'unevent_text_description',
			[
				'label' => __( 'Desctription', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'condition' => ['text_switcher' => 'yes'],
			]
		);
		$this->add_control(
			'unevent_link_text',
			[
				'label' => __( 'Link Text', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'condition' => ['text_switcher' => 'yes'],
			]
		);
		$this->add_control(
			'unevent_link_url',
			[
				'label' => __( 'Link', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'emerce-core' ),
				'show_external' => true,
				'condition' => ['text_switcher' => 'yes'],
			]
		);
	
	    $this->end_controls_section();
       
       $this->start_controls_section(
			'unevent_product',
			[
				'label' => __( 'Select Product', 'emerce-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
        'item_per_page',
        [
            'label' => __( 'Number of Products to Show', 'emerce-core' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 1,
            'max' => 100,
            'step' => 1,
            'default' => 2,
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
          'description' => 'Display Featured products from selected categories',
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
			'side_text_style',
			[
				'label' => __( 'Description Style', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'desc_title_color',
			[
				'label' => __( 'Description Title Color', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .winter-spring-content h2' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_title_typography',
				'label' => __( 'Description Title Typography', 'emerce-core' ),
				'selector' => '{{WRAPPER}} .winter-spring-content h2',
			]
		);
		
		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Description Color', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .winter-spring-content p' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Description Typography', 'emerce-core' ),
				'selector' => '{{WRAPPER}} .winter-spring-content p',
			]
		);
		
		$this->start_controls_tabs(
			'style_link'
		);
		$this->start_controls_tab(
			'style_link_tab',
			[
				'label' => __( 'Normal', 'emerce-core' ),
			]
		);

      $this->add_control(
			'link_color',
			[
				'label' => __( 'Color', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .red-text-btn a' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'link_broder_color',
			[
				'label' => __( 'Border Color', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .red-text-btn a' => 'border-color: {{VALUE}}',
				],
			]
		);

      $this->end_controls_tab();
      $this->start_controls_tab(
			'style_link_hvr_tab',
			[
				'label' => __( 'Hover', 'emerce-core' ),
			]
		);
      $this->add_control(
			'link_color_hover',
			[
				'label' => __( 'Hover Color', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .red-text-btn a:hover' => 'color: {{VALUE}}',
				],
			]
		);
			$this->add_control(
			'link_broder_color_hvr',
			[
				'label' => __( 'Border Color', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .red-text-btn a:hover' => 'border-color: {{VALUE}}',
				],
			]
		);
      $this->end_controls_tab();
      $this->end_controls_tabs();
		
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
					'{{WRAPPER}} .product-content h4 a' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Product Title Typography', 'emerce-core' ),
				'selector' => '{{WRAPPER}} .product-content h4 a',
			]
		);
		
		$this->add_control(
			'price_color',
			[
				'label' => __( 'Product Price Color', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .amount,
					{{WRAPPER}} span.price' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'label' => __( 'Product Title Typography', 'emerce-core' ),
				'selector' => '{{WRAPPER}} .amount,
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
    
		$this->end_controls_section();
   }
   

   

   protected function render( $instance = [] ) {
        $settings = $this->get_settings_for_display();
        $item_per_page = $settings['item_per_page'];
        $category = $settings['category'];
        $product_type = $settings['product_type'];
       
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
    
    $product_query = new \WP_Query($product_args);
   
       
       
       ?>
       
       <div class="row">
           <?php if($settings['text_switcher'] == 'yes'){ ?>
            <div class="col-sm-12 col-md-4">
                <div class="winter-spring-content-area">
                    <div class="winter-spring-content">
                        <h2><?php echo esc_html($settings['unevent_text_title']); ?></h2>
                        <p><?php echo esc_html($settings['unevent_text_description']); ?></p>
                        <div class="red-text-btn">
                            <a href="<?php echo esc_url($settings['unevent_link_url']['url']); ?>"><?php echo esc_html($settings['unevent_link_text']); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php if( $product_query -> have_posts()){ ?>
            <?php for ($i = 0; $i < 1; $i ++): $product_query -> the_post(); 
             global $product;
             $product_id = get_the_ID();
            ?>
       
            <div class="col-sm-12 col-md-4">
                <div class="spring-winter-big-product">
                    <div class="trending-products-st1">
                        <div class="trending-product-st1-img">
                            <a href="<?php the_permalink();?>"> <?php if ( has_post_thumbnail() ) {
                                    the_post_thumbnail('emerce-unevent-product1');
                            } ?></a>
                        </div>
                        <div class="producticons-st3">
                            <?php emerce_add_quick_view_card();?>
                                <?php emerce_wishlist_icon_in_product_grid(); ?>
                                 <?php emerce_compare_icon_in_product_card();?>
                        </div>
                        <div class="product-content">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <div class="sell-pro-price">
                                 <?php echo maybe_unserialize($product->get_price_html()); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <?php endfor; ?>
            
            <?php
              $small_grid_count = $product_query -> post_count - 1;
              if ($product_query -> have_posts() && $small_grid_count > 0):
                $product_per_column = $item_per_page - 1;
            ?>
            
            
              <?php for ($i = 0; $i < $product_per_column; $i++): $product_query -> the_post();
                global $product;
                $product_id = get_the_ID();
              ?>
              
                <div class="col-sm-12 col-md-4">
                    <div class="spring-winter-small-product">
                        <div class="trending-products-st1">
                            <div class="trending-product-st1-img">
                                <a href="<?php the_permalink();?>"> <?php if ( has_post_thumbnail() ) {
                                    the_post_thumbnail('emerce-unevent-product2');
                            } ?></a>
                            </div>
                            <div class="producticons-st3">
                               <?php emerce_add_quick_view_card();?>
                                <?php emerce_wishlist_icon_in_product_grid(); ?>
                                 <?php emerce_compare_icon_in_product_card();?>
                            </div>
                            <div class="product-content">
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <div class="sell-pro-price">
                                     <?php echo maybe_unserialize($product->get_price_html()); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
              <?php endfor; ?> 
              
              <?php endif; ?>
              
              <?php } ?>
          
            
        </div>
                
       <?php
       
}  
protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_unevent_product_grid );
?>
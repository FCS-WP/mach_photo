<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_timing_counter_product extends Widget_Base {

   public function get_name() {
      return 'emerce_timing_counter_product';
   }

   public function get_title() {
      return __( 'Product with Counter', 'emerce' );
   }
public function get_categories() {
		return [ 'emerce-ele-widgets-cat' ];
	}
   public function get_icon() { 
        return 'emerceo-semi-solid cs-orange';
   }

   protected function register_controls() {
       
       $this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
        'item_per_page',
        [
            'label' => __( 'Number of Products to Show', 'emerce' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 1,
            'max' => 100,
            'step' => 1,
            'default' => 2,
        ]
    );

$this->add_control(
        'sel_product',
        array(
          'label'       => esc_html__( 'Select Single Product', 'pivoo' ),
          'type'        => Controls_Manager::SELECT2,
          'multiple'    => false,
          'options'     => array_flip(emerce_elements_items( 'post', array(
            'post_type' => 'product',
            'sort_order'  => 'ASC',
          ) )),
          'label_block' => true,
          'description' => 'Display Featured products from selected categories',
        )
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

		$this->end_controls_section();
		
		 $this->start_controls_section(
			'content_style',
			[
				'label' => __( 'Style', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Product Title Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xpc-counter-product-woo h4 a' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Product Title Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .xpc-counter-product-woo h4 a,
				{{WRAPPER}} .xpc-counter-product-woo h4',
			]
		);
		
			$this->add_control(
			'price_color',
			[
				'label' => __( 'Product Price Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xpc-counter-product-woo .sell-pro-price span' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'label' => __( 'Price Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .xpc-counter-product-woo .sell-pro-price span',
			]
		);
		
			$this->add_control(
			'timer_bg',
			[
				'label' => __( 'Counter Background', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #emercetimeralt .emerce-count-value' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'timer_txt',
			[
				'label' => __( 'Counter Text Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #emercetimeralt .emerce-count-value' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'timer_typography',
				'label' => __( 'Counter Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} #emercetimeralt .emerce-count-value',
			]
		);
		$this->add_control(
			'label_color',
			[
				'label' => __( 'Counter Label Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  #emercetimeralt .emerce-count-value .label' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'separator_color',
			[
				'label' => __( 'Separator Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  #emercetimeralt .countdown .separator' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'align_content',
			[
				'label' => __( 'Alignment', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'start' => [
						'title' => __( 'Left', 'plugin-domain' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'plugin-domain' ),
						'icon' => 'eicon-h-align-center',
					],
					'end' => [
						'title' => __( 'Right', 'plugin-domain' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
			]
		);
		$this->add_control(
			'gap_timer',
			[
				'label' => __( 'Timer Top Gap', 'plugin-domain' ),
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
					'{{WRAPPER}} #emercetimeralt' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
    
   }
   

   

   protected function render( $instance = [] ) {
       
       $settings = $this->get_settings_for_display();
      $item_per_page = $settings['item_per_page'];
        $category = $settings['category'];
        $align_content = $settings['align_content'];
        $sel_product = $settings['sel_product'];
        
         if(!empty($sel_product[0])) {
        $product_args =  array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => $item_per_page,
          'post__in'=> array($sel_product)
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
        
         $the_query = new \WP_Query($product_args);
		?>
		 <?php if( $the_query -> have_posts()){
            while( $the_query -> have_posts()){
                $the_query -> the_post();
                global $post,$product;
                
                $date_format ="Y-m-d";
                $sales_price_to = get_post_meta($post->ID, '_sale_price_dates_to', true);
                if($sales_price_to){
$sale_from_date = date_i18n( $date_format, $product->get_date_on_sale_from()->getTimestamp() );
$sale_to_date = date_i18n( $date_format, $product->get_date_on_sale_to()->getTimestamp() );
}
                ?>
                <div class="xpc-counter-product-woo text-<?php echo esc_html($align_content);?>">
                    <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                     <div class="sell-pro-price">
                                    <?php echo maybe_unserialize($product->get_price_html()); ?>
                                </div>
                                <?php if($sales_price_to){?>
                   	<div id="emercetimeralt"><?php echo $sale_to_date; ?></div>
                   	<?php } ?>
                </div>
                
                <?php }
        }  ?>
		
		<?php
       
}  
protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_timing_counter_product );
?>
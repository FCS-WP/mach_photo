<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_sale_flash_product_grid extends Widget_Base {

   public function get_name() {
      return 'emerce_sale_flash_product_grid';
   }

   public function get_title() {
      return __( 'Sale Flash Product Grid', 'emerce-core' );
   }
public function get_categories() {
		return [ 'emerce-ele-widgets-cat' ];
	}
   public function get_icon() { 
        return 'emerceo-semi-solid cs-orange';
   }

   protected function register_controls() {

    $this->start_controls_section(
        'flash_sale_products_section',
        [
            'label' => __( 'Content', 'emerce-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
		$this->add_control(
			'offer_title',
			[
				'label' => esc_html__( 'Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Offer title', 'plugin-name' ),
				'placeholder' => esc_html__( 'Type your title here', 'plugin-name' ),
			]
		);

    $this->add_control(
			'offer_date',
			[
				'label' => esc_html__( 'Offer Date', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DATE_TIME,
				'picker_options' => array(
				    'enableTime' => false,
				    
				    ),
			]
		);
    
    $this->end_controls_section();

    
   }   

   protected function render( $instance = [] ) {

    $settings = $this->get_settings_for_display();
    $item_per_page = $settings['item_per_page'];
    $category = $settings['category'];
    $item_per_row = $settings['item_per_row'];
    $product_type = $settings['product_type'];
    $offer_date = $settings['offer_date'];
    $offer_title = $settings['offer_title'];

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
        $show_items = "";
        $col_grid = "";
        
        switch ($items_per_row) {
          case 2:
            $show_items = "col-lg-6";
            break;
          case 3:
            $show_items = "col-lg-4";
            break;
          case 4:
            $show_items = "col-lg-3";
            break;
            case 5:
                $col_grid = "row-cols-5";
                $show_items = "col";
            break;
            case 6:
                $show_items = "col-lg-2";
            break;
        }

    ?>

        <section class="weekly-deal-v6">
            <div class="container">
                <div class="weekly-deal-products-v6">
                       <div class="offer-count-down-timeline">
                            <div class="count-down-v6">
                                <span class="offer-time-v6">
                                    <p><?php echo esc_html($offer_title);?></p>
                                </span>
                                <span class="offer-time-v6" id="emrc-flash-offer-count">
                                   <?php echo esc_html($offer_date);?>
                                </span>
                            </div>
                        </div>
                    
                    <div class="row  <?php if( $items_per_row == 5){ echo esc_attr( $col_grid ); }?>">

                    <?php if( $the_query -> have_posts()){
                        while( $the_query -> have_posts()){
                            $the_query -> the_post();
                            global $product;                    
                        ?>
                        <div class="<?php echo esc_attr( $show_items )?>">
                           <?php get_template_part( 'inc/vendor/woocommerce/product-style/content-style-eleven' ); ?>
                        </div>
                    
                    <?php } } ?>
                        
                    </div>
                </div>
            </div>
        </section>

    <?php
    


       
}  
protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_sale_flash_product_grid ); ?>
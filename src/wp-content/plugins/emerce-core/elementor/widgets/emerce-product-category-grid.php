<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_product_category_grid extends Widget_Base {

   public function get_name() {
      return 'emerce_product_category_grid';
   }

   public function get_title() {
      return __( 'Product Category Grid', 'emerce' );
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
            'label' => __( 'Grid Settings', 'emerce' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

   $this->add_control(
        'item_per_block',
        [
            'label' => __( 'Items To Show', 'emerce' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'step' => 1,
            'default' => 8,
        ]
    );
    $this->add_control(
        'item_per_row',
        [
            'label' => __( 'Items Per Row', 'emerce' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 2,
            'max' => 6,
            'step' => 1,
            'default' => 4,
        ]
    );
    $this->end_controls_section();
    
   
    
    


    // Style Tab
    
    $this->start_controls_section(
        'gird_cat_name_style',
        [
            'label' => __( 'Titel Style', 'emerce' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'gird_cat_name_color',
        [
            'label' => __( 'Title Color', 'emerce' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .shop-category h5' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'gird_cat_name_typo',
            'label' => __( 'Title Typography', 'emerce' ),
            'selector' => '{{WRAPPER}} .shop-category h5',
        ]
    );
    $this->end_controls_section();
    
    $this->start_controls_section(
        'gird_cat_text_style',
        [
            'label' => __( 'Text Style', 'emerce' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'gird_cat_item_color',
        [
            'label' => __( 'Text Color', 'emerce' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .shop-category p' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'gird_cat_item_typo',
            'label' => __( 'Text Typography', 'emerce' ),
            'selector' => '{{WRAPPER}} .shop-category p',
        ]
    );

    $this->end_controls_section();
    
    
   }
   

   protected function render( $instance = [] ) {

    $settings = $this->get_settings_for_display();
    $item_per_row = $settings['item_per_row'];
    $item_per_block = $settings['item_per_block'];


    $items_per_row = $item_per_row;
    $terms = get_terms( array(
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
        'number' => $item_per_block,
    ) );
    $show_items = "";
    $col_grid = "";
    
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


    ?>
    
    	<div class="g-0">
			<div class="row <?php if( $items_per_row == 5){ echo esc_attr( $col_grid ); }?>">			
				
				
				<?php foreach( $terms as $term ){
            $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
            $image = wp_get_attachment_url($thumbnail_id);
            $xtmeta = get_term_meta( $term->term_id, 'emerce_woo_cat_options', true );
            $bgcolor = $xtmeta['xpc-woo-cat-bg'];
            ?>
            	<div class="<?php echo $show_items;?>">
					<a href="<?php echo get_term_link($term->slug, 'product_cat'); ?>">
						<div class="shop-category mb-4" style="background:<?php echo $bgcolor;?> ">
							<div class="cat-grid-img">
							    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_html( $term->name )?>">
							</div>
							<h5><?php echo esc_html( $term->name )?></h5>
							<p> <?php  echo esc_html($term->count) . " Items"; ?></p>
						</div>
					</a>
				</div>
           
        <?php } ?>

			</div>
    	</div>

    <?php

}  
protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_product_category_grid );
?>
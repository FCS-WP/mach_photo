<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_hotspot_product extends Widget_Base {

   public function get_name() {
      return 'emerce_hotspot_product';
   }

   public function get_title() {
      return __( 'Hotspot Product', 'emerce-core' );
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
            'label' => esc_html__( 'Content', 'plugin-name' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'product',
        [
            'label' => esc_html__( 'Select Product', 'karte-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options'     => array_flip(emerce_elements_items( 'product', array(  
                'post_type' => 'product',
                'post_status' => 'publish',
                'posts_per_page' => -1, 
                'orderby' => 'title',
                'order' => 'ASC',
            ) )),
                'label_block' => true,
                'separator' => 'after',
        ]
    );

    $this->add_control(
        'hotspot_icon',
        [
            'label' => esc_html__( 'Select Icon', 'karte-core' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-plus',
                'library' => 'solid',
            ],
        ]
    );

    $this->end_controls_section();
       
       
    
   }
   

   protected function render( $instance = [] ) {
       
    $settings = $this->get_settings_for_display();
    $selected_product = wc_get_product( $settings['product'] );
    $product_display_position = $settings['product_display_position'];



    ?>

    <div class="product-hotspot__single">
        <div class="product-hotspot__single-inner">
            <div class="icon">
                <?php \Elementor\Icons_Manager::render_icon( $settings['hotspot_icon'], [ 'aria-hidden' => 'true' ] ); ?>
            </div>
            <?php if($selected_product){?>
            <div class="content">
                <div class="inner">
                    <div class="img-box">
                    <?php echo $selected_product->get_image('thumbnail'); ?>
                    </div>

                    <div class="text">
                        <h3><a href="<?php echo get_permalink( $selected_product->get_id() ); ?>"><?php echo $selected_product->get_name(); ?></a></h3>
                        <span><?php echo $selected_product->get_price_html(); ?></span>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php
    

    }  
protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_hotspot_product );
?>
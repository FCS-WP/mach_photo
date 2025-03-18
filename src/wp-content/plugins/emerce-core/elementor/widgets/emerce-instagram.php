<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_instagram extends Widget_Base {

   public function get_name() {
      return 'emerce_instagram_grid';
   }

   public function get_title() {
      return __( 'Instagram Feed', 'emerce' );
   }
public function get_categories() {
		return [ 'emerce-ele-widgets-cat' ];
	}
   public function get_icon() { 
        return 'emerceo-semi-solid cs-orange';
   }

   protected function register_controls() {

      $this->add_control(
         'insagram_grid',
         [
            'label' => __( 'Emerce Insatgram Feed', 'emerce' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
      
      $this->add_control(
			'user_id',
			[
				'label' => __( 'User Name', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '', 'emerce' ),
				'placeholder' => __( 'Type your insatgram name here to show that on header', 'emerce' ),
				 'section' => 'insagram_grid',
			]
		);
		
		$this->add_control(
			'grid-style',
			[
				'label' => __( 'Feed Style', 'emerce' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				 'section' => 'insagram_grid',
				'default' => 'normal',
				'options' => [
					'normal'  => __( 'Normal', 'emerce' ),
					'carousel' => __( 'carousel', 'emerce' ),
				],
			]
		);
		
		$this->add_control(
			'limit',
			[
				'label' => __( 'Post Limit', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '8', 'emerce' ),
				 'section' => 'insagram_grid',
			]
		);
		
		$this->add_control(
			'columns',
			[
				'label' => __( 'Post Columns', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '8', 'emerce' ),
				 'section' => 'insagram_grid',
				 'condition' => [
					'grid-style' => 'normal',
				],
			]
		);
		
			$this->add_control(
			'mobile_post_col',
			[
				'label' => __( 'Mobile Post Column', 'emerce' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				 'section' => 'insagram_grid',
				'default' => '1',
				'options' => [
					'1'  => __( 'One', 'emerce' ),
					'2' => __( 'Two', 'emerce' ),
					'3' => __( 'Three', 'emerce' ),
				],
			]
		);
		
			$this->add_control(
			'header-disable',
			[
				'label' => __( 'Enable/Disable Header', 'emerce' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				 'section' => 'insagram_grid',
				'default' => 'enable',
				'options' => [
					'enable'  => __( 'Enable', 'emerce' ),
					'disable' => __( 'Disable', 'emerce' ),
				],
			]
		);
		
			$this->add_control(
			'overlay-block-disable',
			[
				'label' => __( 'Enable/Disable Overlay Block', 'emerce' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				 'section' => 'insagram_grid',
				'default' => 'disable',
				'options' => [
					'enable'  => __( 'Enable', 'emerce' ),
					'disable' => __( 'Disable', 'emerce' ),
				],
			]
		);
      
      
      
   $this->add_control(
			'gap',
			[
				'label' => __( 'Image Gap', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'section' => 'insagram_grid',
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
				
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				
			]
		);
		
		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'plugin-domain' ),
				'type' => Controls_Manager::DIMENSIONS,
				'section' => 'insagram_grid',
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .sbi_photo_wrap img,{{WRAPPER}} .sbi_photo_wrap,{{WRAPPER}} #sb_instagram .sbi_photo' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


   }
   
   

   protected function render( $instance = [] ) {

      // get our input from the widget settings.

       $settings = $this->get_settings();
       $usernamemain = $settings['user_id'];
        $limit = $settings['limit'];
        $columns = $settings['columns'];
        $gridstyle = $settings['grid-style'];
        $headerdisable = $settings ['header-disable'];
        $gap = $settings['gap']['size'];
        $overlayblock = $settings ['overlay-block-disable'];
        $mob_col = $settings ['mobile_post_col'];
       
      ?>
      <div class="emerce-instagram w-full">
          <?php if($headerdisable=="enable"){?>
     <div class="emerce-instagram-header flex flex-wrap justify-between row">
         <div class="emerce-instagram-title col-12 col-md-6">
             <span><?php esc_html_e('Checkout My','emerce');?></span>
             <p><?php esc_html_e('Instagram Feed','emerce');?></p>
         </div>
         <div class="emerce-instagram-profile col-12 col-md-6">
             <span><?php esc_html_e('View More at','emerce');?></span>
             <p><a href="https://www.instagram.com/<?php echo esc_html($usernamemain);?>" target="_blank">@<?php echo esc_html($usernamemain);?></a></p>
         </div>
     </div>
     <?php }?>
     <div class="emerce-instagrid relative pivinsta-<?php echo esc_html($gridstyle);?> piv-instamob-col-<?php echo esc_html($mob_col); ?>">
      <?php echo do_shortcode('[instagram-feed num='.$limit.' cols='.$columns.' sortby=random class=emerceinstathumbs imageres=full showheader=false showbutton=false showcaption=false showfollow=false imagepadding='.$gap.']');?>
      <?php if($overlayblock=="enable"){?>
      <div class="piv-overlay-insta-box">
          <h5><?php esc_html_e('Follow us on Instagram','emerce');?></h5>
          <p class="piv-insta-username"><a href="https://www.instagram.com/<?php echo esc_html($usernamemain);?>" target="_blank">@<?php echo esc_html($usernamemain);?></a></p>
      </div>
      <?php } ?>
    </div>
</div>

      <?php

   }

   protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_instagram );
?>
<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_client_review extends Widget_Base {

   public function get_name() {
      return 'emerce_client_review';
   }

   public function get_title() {
      return __( 'Client Testimonial', 'emerce' );
   }
public function get_categories() {
		return [ 'emerce-ele-widgets-cat' ];
	}
   public function get_icon() { 
        return 'emerceo-semi-solid cs-orange';
   }

   protected function register_controls() {
       
       $this->start_controls_section(
			'customer_review_content',
			[
				'label' => __( 'Review Settings', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'review_style',
			[
				'label' => __( 'Review Style', 'emerce' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'one',
				'options' => [
					'one'  => __( 'Style One', 'emerce' ),
					'two' => __( 'Style Two', 'emerce' ),
					'three' => __( 'Style Three', 'emerce' ),
				],
			]
		);
        $this->add_control(
			'image_position',
			[
				'label' => esc_html__( 'Client Image Position', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'bottom',
				'options' => [
					'before_comment'  => esc_html__( 'Before Comment', 'emerce-core' ),
					'after_comment' => esc_html__( 'After Comment', 'emerce-core' ),
					'bottom' => esc_html__( 'Bottom', 'emerce-core' ),
				],
                'condition' => ['review_style' => 'one'],
			]
		);
        $this->add_control(
			'quote_icon_enable',
			[
				'label' => esc_html__( 'Quote Icon Enable/Disable', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'emerce-core' ),
				'label_off' => esc_html__( 'Disable', 'emerce-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();
		
		 $this->start_controls_section(
			'customer_reviews',
			[
				'label' => __( 'Customer Reviews', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'reviewer_name',
			[
				'label' => __( 'Name', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Sofia Lenora', 'emerce' ),
			]
		);
		$repeater->add_control(
			'reviewer_deg',
			[
				'label' => __( 'Designation', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'CEO & Founder', 'emerce' ),
			]
		);
		$repeater->add_control(
			'reviewer_country',
			[
				'label' => __( 'Country', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'United State', 'emerce' ),
			]
		);
		$repeater->add_control(
			'review_description',
			[
				'label' => __( 'Review Description', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your comment here', 'emerce' ),
			]
		);
		$repeater->add_control(
			'reviewer_image',
			[
				'label' => __( 'Reviewer Photo', 'emerce' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_control(
			'quote_icon',
			[
				'label' => __( 'Quote Icon', 'emerce' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);
		
		$this->add_control(
			'review_list',
			[
				'label' => __( 'Review List', 'emerce' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'reviewer_name' => __( 'Sofia Lenora', 'emerce' ),
					],
				],
				'title_field' => '{{{ reviewer_name }}}',
			]
		);

		$this->end_controls_section();
		
		// Style tab
		$this->start_controls_section(
			'review_desc_style',
			[
				'label' => __( 'Review Description', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'review_desc_color',
			[
				'label' => __( 'Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .client-single-quote .quote-text, {{WRAPPER}} .client-single-quote-st3 .quote-text' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'review_desc_typo',
				'label' => __( 'Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .client-single-quote .quote-text, {{WRAPPER}} .client-single-quote-st3 .quote-text',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'review_name_style',
			[
				'label' => __( 'Reviewer Name', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'review_name_color',
			[
				'label' => __( 'Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .client-single-quote .client-name, {{WRAPPER}} .client-single-quote-st3 .client-name' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'review_name_typo',
				'label' => __( 'Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .client-single-quote .client-name, {{WRAPPER}} .client-single-quote-st3 .client-name',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'review_desig_style',
			[
				'label' => __( 'Reviewer Designation', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'review_desig_color',
			[
				'label' => __( 'Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .client-single-quote .client-deg, {{WRAPPER}} .client-single-quote-st3 .client-deg' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'review_desig_typo',
				'label' => __( 'Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .client-single-quote .client-deg, {{WRAPPER}} .client-single-quote-st3 .client-deg',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'review_country_style',
			[
				'label' => __( 'Reviewer Country', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'review_country_color',
			[
				'label' => __( 'Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .client-single-quote .client-country, {{WRAPPER}} .client-single-quote-st3 .client-country' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'review_country_typo',
				'label' => __( 'Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .client-single-quote .client-country, {{WRAPPER}} .client-single-quote-st3 .client-country',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'review_icon_style',
			[
				'label' => __( 'Quote Icon', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'review_icon_color',
			[
				'label' => __( 'Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .client-single-quote-st3 i, {{WRAPPER}} .client-single-quote i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
		
			$this->start_controls_section(
			'carousel_settings',
			[
				'label' => __( 'Carousel Settings', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'show_navigation',
			[
				'label' => __( 'Show Navigation Button', 'emerce' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'emerce' ),
				'label_off' => __( 'No', 'emerce' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control(
			'show_pagination',
			[
				'label' => __( 'Show Pagination Dots', 'emerce' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'emerce' ),
				'label_off' => __( 'No', 'emerce' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
			$this->end_controls_section();
    
   }
   

   protected function render( $instance = [] ) {
       $settings = $this->get_settings_for_display();
       $reviewlist = $settings['review_list'];
       $reviewstyle= $settings['review_style'];
       $arrow = $settings['show_navigation'];
      $pagination = $settings['show_pagination'];
       if($reviewstyle=="one"){
           $revstyleclass="rev-carousel-one";
     } elseif($reviewstyle=="three"){
            $revstyleclass="rev-carousel-three";
       } else {
           $revstyleclass="rev-carousel-two"; 
       }
       if ($arrow==true){
          $arrow ="true";
      } else {
           $arrow ="false";
      }
  
  
      if ($pagination==true){
          $pagination ="true";
      } else {
           $pagination ="false";
      }

    
    ?>
      

        <div class="emerceClientTestimonial <?php echo esc_html($revstyleclass);?>">
        <?php  if($reviewstyle=="one"){ ?>
        <div class="emerce-swiper-button-prev-review"><i class="zil zi-chevron-left"></i></div>
        <div class="emerce-swiper-button-next-review"><i class="zil zi-chevron-right"></i></div>
        <div id="emerce-review-slider-swipe" class="emerce-review-slider emerce-review-slider-swipe swiper swiper-container">
            <div class="swiper-wrapper">
                <?php foreach ($reviewlist as $review){?>
                <div class="client-single-quote swiper-slide">
                    <?php if($settings['quote_icon_enable'] == 'yes'){ ?>
                    <i class="<?php echo esc_attr($review['quote_icon']['value'] ); ?>"></i>
                    <?php } ?>
                    <?php if($settings['image_position'] == 'before_comment' ){ echo show_reviewer_image($reviewlist); }?>
                    <p class="quote-text"><?php echo esc_html($review['review_description']); ?></p>
                    <?php if($settings['image_position'] == 'after_comment' ){ echo show_reviewer_image($reviewlist); }?>
                    <p class="client-name"><?php echo esc_html($review['reviewer_name']); ?></p>
                    <p class="client-country"><?php echo esc_html($review['reviewer_country']); ?></p>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php if($settings['image_position'] == 'bottom' ){ echo show_reviewer_image($reviewlist); }?>
        
        <?php  } elseif($reviewstyle=="three"){ ?>
        
         <div class="emerce-swiper-button-prev-review"><i class="zil zi-chevron-left"></i></div>
        <div class="emerce-swiper-button-next-review"><i class="zil zi-chevron-right"></i></div>
        <div id="emerce-review-slider-swipe-three" class="emerce-review-slider emerce-review-slider-swipe swiper swiper-container">
            <div class="swiper-wrapper">
                <?php foreach ($reviewlist as $review){?>
                <div class="client-single-quote swiper-slide">
                    <?php if($settings['quote_icon_enable'] == 'yes'){ ?>
                    <i class="<?php echo esc_attr($review['quote_icon']['value'] ); ?>"></i>
                    <?php } ?>
                    <?php if($review['reviewer_image']){?>
                   <img src="<?php echo esc_url($review['reviewer_image']['url']); ?>" alt="">
                   <?php } ?>
                    <p class="quote-text"><?php echo esc_html($review['review_description']); ?></p>
                    <p class="client-name"><?php echo esc_html($review['reviewer_name']); ?></p>
                    <p class="client-deg"><?php echo esc_html($review['reviewer_deg']); ?></p>
                    <p class="client-country"><?php echo esc_html($review['reviewer_country']); ?></p>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } else { ?>
        <div class="emerce-review-slider" data-flickity='{"cellAlign": "center",
            "wrapAround": true,
            "autoPlay": false,
            "prevNextButtons":<?php echo esc_html($arrow);?>,
            "adaptiveHeight": true,
            "imagesLoaded": true,
            "lazyLoad": 1,
            "dragThreshold" : 15,
            "pageDots": <?php echo esc_html($pagination);?> }'>
            <?php foreach ($reviewlist as $review){?>
            <div class="client-quotes single-r-slide">
                <div class="client-single-quote-st3 active">
                    <i class="<?php echo esc_attr($review['quote_icon']['value'] ); ?>"></i>
                    <p class="quote-text"><?php echo esc_html($review['review_description']); ?></p>
                    <p class="client-name"><?php echo esc_html($review['reviewer_name']); ?></p>
                    <p class="client-deg"><?php echo esc_html($review['reviewer_deg']); ?></p>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
        </div>


<?php }  
protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_client_review );
?>
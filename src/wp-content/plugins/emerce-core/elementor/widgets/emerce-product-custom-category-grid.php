<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class custom_category_grid extends Widget_Base {

   public function get_name() {
      return 'custom_category_grid';
   }

   public function get_title() {
      return __( 'Custom Category Grid', 'emerce' );
   }
public function get_categories() {
		return [ 'emerce-ele-widgets-cat' ];
	}
   public function get_icon() { 
        return 'emerceo-semi-solid cs-orange';
   }

   protected function register_controls() {
       
       $this->start_controls_section(
			'custom_category_section',
			[
				'label' => __( 'Custom Category', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'cagegory_style',
			[
				'label' => __( 'Select Position', 'emerce' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  => __( 'Left', 'emerce' ),
					'middle' => __( 'Middle', 'emerce' ),
					'right' => __( 'Right', 'emerce' ),
				],
			]
		);
    
		$repeater->add_control(
			'cat_list_sub_title', [
				'label' => __( 'Sub-Title', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'cat_list_title', [
				'label' => __( 'Title', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'cat_list_link_text', [
				'label' => __( 'Link Title', 'emerce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'condition' => ['cagegory_style' => 'middle'],
			]
		);
		$repeater->add_control(
			'cat_list_link',
			[
				'label' => __( 'Link / URL', 'emerce' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'emerce' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		
		$repeater->add_control(
			'cat_list_image',
			[
				'label' => __( 'Choose Image', 'emerce' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_control(
			'elips_icon',
			[
				'label' => __( 'Background Image', 'emerce' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
				    'cagegory_style' => ['left', 'right']
				    ]
			]
		);
		$repeater->add_control(
			'background_color',
			[
				'label' => __( 'Bacground Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'custom_banner_list',
			[
				'label' => __( 'Custom Banner List', 'emerce' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'cat_list_title' => __( 'New Arrivals', 'emerce' ),
						'cst_list_sub_title' => __( 'Up to 20% Off', 'emerce' ),
					],
				],
				'title_field' => '{{{ cat_list_title }}}',
			]
		);

		$this->end_controls_section();
		
		// Style Tab
		
		$this->start_controls_section(
			'large_section_style',
			[
				'label' => __( 'Large Section Style', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'lsub_title_color',
			[
				'label' => __( 'Sub Title Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .offer-st3-big .offer-st3-content span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'lsub_title_typo',
				'label' => __( 'Sub Title Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .offer-st3-big .offer-st3-content span',
			]
		);
		$this->add_control(
			'ltitle_color',
			[
				'label' => __( 'Title Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .offer-st3-big .offer-st3-content h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'ltitle_typo',
				'label' => __( 'Title Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .offer-st3-big .offer-st3-content h4',
			]
		);
		$this->end_controls_section();
		
	//	========
		
		$this->start_controls_section(
			'small_section_style',
			[
				'label' => __( 'Small Section Style', 'emerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'ssub_title_color',
			[
				'label' => __( 'Sub Title Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .offer-st3-small-content span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'ssub_title_typo',
				'label' => __( 'Sub Title Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .offer-st3-small-content span',
			]
		);
		$this->add_control(
			'stitle_color',
			[
				'label' => __( 'Title Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .offer-st3-small-content h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'stitle_typo',
				'label' => __( 'Title Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .offer-st3-small-content h4',
			]
		);
		
		// ==========
		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'link_style_normal',
			[
				'label' => __( 'Normal', 'emerce' ),
			]
		);
		$this->add_control(
			'link_color',
			[
				'label' => __( 'Link Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .offer-st3-small-content a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'link_typo',
				'label' => __( 'Link Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .offer-st3-small-content a',
			]
		);
		
		
		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => __( 'Hover', 'plugin-name' ),
			]
		);
		$this->add_control(
			'link_hover_color',
			[
				'label' => __( 'Link Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .offer-st3-small:hover .offer-st3-small-content a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'link_hover_typo',
				'label' => __( 'Link Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .offer-st3-small:hover .offer-st3-small-content a',
			]
		);
		
		
		$this->end_controls_tab();

		$this->end_controls_tabs();
		
		$this->end_controls_section();
    
   }
   

   

   protected function render( $instance = [] ) {
       $settings = $this->get_settings_for_display();
       $custom_banner_list = $settings['custom_banner_list'];
       
       
       ?>
                <div class="row">
                <?php foreach($custom_banner_list as $cb_list){ ?>
                <?php if('left' == $cb_list['cagegory_style'] ){ ?>
                    <div class="col-sm-12 col-md-4">
                        <div class="offer-st3-big" style="background: <?php echo esc_attr($cb_list['background_color']); ?>">
                            <a href="<?php echo esc_url($cb_list['cat_list_link']['url']); ?>"></a>
                            <div class="offer-st3-content">
                                <span class="offer-st3-text"><?php echo esc_html($cb_list['cat_list_sub_title']); ?></span>
                                <h4><?php echo esc_html($cb_list['cat_list_title']); ?></h4>
                                <img src="<?php echo wp_get_attachment_image_url($cb_list['cat_list_image']['id'], 'emerce-unevent-product1'); ?>" alt="<?php echo esc_html(get_the_title( $cb_list['cat_list_image']['id'] )); ?>" class="xpc-offer-topimg">
                                <?php if($cb_list['elips_icon']['url']) { ?>
                                <div id="offer-xpc-left-parallax" class="offer-elips-image-xpc" data-hover-only="true">
                                     <img src="<?php echo esc_url($cb_list['elips_icon']['url']); ?>" alt="<?php echo get_the_title( $cb_list['elips_icon']['id'] ); ?>" data-depth="0.8">
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        
                    </div>
                <?php } } ?>
                <div class="col-sm-12 col-md-4">
                <?php foreach($custom_banner_list as $cb_list){ ?>
                <?php if('middle' == $cb_list['cagegory_style']){ ?>
                        
                        <div class="offer-st3-small" style="background: <?php echo esc_attr($cb_list['background_color']); ?>">
                            <a href="<?php echo esc_url($cb_list['cat_list_link']['url']); ?>"></a>
                            <div class="offer-st3-small-content">
                                <span class="offer-st3-text"><?php echo esc_html($cb_list['cat_list_sub_title']); ?></span>
                                <h4><?php echo esc_html($cb_list['cat_list_title']); ?></h4>
                                <a href="<?php echo esc_url($cb_list['cat_list_link']['url']); ?>"><?php echo esc_html($cb_list['cat_list_link_text']); ?></a>
                            </div>
                            <div class="offer-st3-small-img">
                                 <img src="<?php echo wp_get_attachment_image_url($cb_list['cat_list_image']['id'], 'emerce-unevent-product1'); ?>" alt="<?php echo esc_html(get_the_title( $cb_list['cat_list_image']['id'] )); ?>">
                            </div>
                        </div>
                        
                <?php } } ?>
                </div>
                <?php foreach($custom_banner_list as $cb_list){ ?>
                <?php if('right' == $cb_list['cagegory_style'] ){ ?>
                    <div class="col-sm-12 col-md-4">
                        <div class="offer-st3-big" style="background: <?php echo esc_attr($cb_list['background_color']); ?>">
                            <a href="<?php echo esc_url($cb_list['cat_list_link']['url']); ?>"></a>
                            <div class="offer-st3-content">
                                <span class="offer-st3-text"><?php echo esc_html($cb_list['cat_list_sub_title']); ?></span>
                                <h4><?php echo esc_html($cb_list['cat_list_title']); ?></h4>
                                <img src="<?php echo wp_get_attachment_image_url($cb_list['cat_list_image']['id'], 'emerce-unevent-product1'); ?>" alt="<?php echo esc_html(get_the_title( $cb_list['cat_list_image']['id'] )); ?>"  class="xpc-offer-topimg">
                                <?php if($cb_list['elips_icon']['url']) { ?>
                                <div id="offer-xpc-right-parallax" class="offer-elips-image-xpc" data-hover-only="true">
                                     <img src="<?php echo esc_url($cb_list['elips_icon']['url']); ?>" alt="<?php echo get_the_title( $cb_list['elips_icon']['id'] ); ?>" data-depth="0.8">
                                </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                    
                <?php } } ?>
                </div>
       <?php
       
}  
protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new custom_category_grid );
?>
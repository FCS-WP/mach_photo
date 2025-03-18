<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_default_post extends Widget_Base {

   public function get_name() {
      return 'emerce_default_post';
   }

   public function get_title() {
      return __( 'Blog Post', 'emerce' );
   }
public function get_categories() {
		return [ 'emerce-ele-widgets-cat' ];
	}
   public function get_icon() { 
        return 'emerceo-semi-solid cs-orange';
   }

   protected function register_controls() {

      $this->start_controls_section(
         'emerce_default_post_widget',
         [
             'label' => __( 'Post Settings', 'emerce' ),
             'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
         ]
     );
     
     $this->add_control(
			'post_style',
			[
				'label' => __( 'Select Style', 'emerce' ),
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
         'item_per_page',
         [
             'label' => __( 'Number of Post to Show', 'emerce' ),
             'type' => \Elementor\Controls_Manager::NUMBER,
             'step' => 1,
             'default' => 3,
         ]
     );
     $this->add_control(
         'item_per_row',
         [
             'label' => __( 'Post Per Row', 'emerce' ),
             'type' => \Elementor\Controls_Manager::NUMBER,
             'min' => 2,
             'max' => 6,
             'step' => 1,
             'default' => 3,
         ]
     );
     $this->add_control(
         'category',
         array(
           'label'       => esc_html__( 'Select Category', 'emerce' ),
           'type'        => Controls_Manager::SELECT2,
           'multiple'    => true,
           'options'     => array_flip(emerce_elements_items( 'category', array(
             'sort_order'  => 'ASC',
             'taxonomy'    => 'category',
             'hide_empty'  => false,
           ) )),
           'label_block' => true,
         )
       );
     $this->end_controls_section();
       
     // Style Tab
     $this->start_controls_section(
            'emerce_post_title_color',
            [
               'label' => __( 'Title Style', 'emerce' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
      );

      $this->start_controls_tabs(
			'style_tabs'
		);
		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => __( 'Normal', 'emerce' ),
			]
		);

      $this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h2.emerce-blog-title a,
					{{WRAPPER}} .blog-st2 .blog-body h2 a' => 'color: {{VALUE}}',
				],
			]
		);

      $this->end_controls_tab();
      $this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => __( 'Hover', 'emerce' ),
			]
		);
      $this->add_control(
			'title_color_hover',
			[
				'label' => __( 'Hover Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h2.emerce-blog-title a:hover,
					{{WRAPPER}} .blog-st2 .blog-body h2 a:hover' => 'color: {{VALUE}}',
				],
			]
		);
      $this->end_controls_tab();
      $this->end_controls_tabs();
      
      $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} h2.emerce-blog-title a,{{WRAPPER}} .blog3-body h2,{{WRAPPER}} .blog3-body h2 a',
			]
		);
      $this->end_controls_section();


      $this->start_controls_section(
            'emerce_post_meta_style',
            [
               'label' => __( 'Meta Style', 'emerce' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
      );
      
      $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'label' => __( 'Typography', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .emerce-blog-meta span,{{WRAPPER}} .emerce-blog-meta a',
			]
		);
      
        $this->start_controls_tabs(
			'style_meta'
		);
		$this->start_controls_tab(
			'style_meta_tab',
			[
				'label' => __( 'Normal', 'emerce' ),
			]
		);

      $this->add_control(
			'meta_color',
			[
				'label' => __( 'Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .emerce-blog-meta span,{{WRAPPER}} .emerce-blog-meta a' => 'color: {{VALUE}}',
				],
			]
		);

      $this->end_controls_tab();
      $this->start_controls_tab(
			'style_meta_hvr_tab',
			[
				'label' => __( 'Hover', 'emerce' ),
			]
		);
      $this->add_control(
			'meta_color_hover',
			[
				'label' => __( 'Hover Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .emerce-blog-meta span:hover,{{WRAPPER}} .emerce-blog-meta a:hover' => 'color: {{VALUE}}',
				],
			]
		);
      $this->end_controls_tab();
      $this->end_controls_tabs();
		
      $this->end_controls_section();
      
      
        $this->start_controls_section(
            'emerce_post_link_style',
            [
               'label' => __( 'Link/Button Style', 'emerce' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
      );
      
        $this->start_controls_tabs(
			'style_link'
		);
		$this->start_controls_tab(
			'style_link_tab',
			[
				'label' => __( 'Normal', 'emerce' ),
			]
		);

      $this->add_control(
			'link_color',
			[
				'label' => __( 'Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .readmore-btn,
					{{WRAPPER}} .green-bg-btn a' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'link_broder_color',
			[
				'label' => __( 'Border Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .readmore-btn,
					{{WRAPPER}} .green-bg-btn a' => 'border-color: {{VALUE}}',
				],
			]
		);
		
			$this->add_control(
			'link_bg_color',
			[
				'label' => __( 'Background Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .green-bg-btn a' => 'background-color: {{VALUE}}',
				],
			]
		);

      $this->end_controls_tab();
      $this->start_controls_tab(
			'style_link_hvr_tab',
			[
				'label' => __( 'Hover', 'emerce' ),
			]
		);
      $this->add_control(
			'link_color_hover',
			[
				'label' => __( 'Hover Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .readmore-btn:hover,
					{{WRAPPER}} .green-bg-btn a:hover' => 'color: {{VALUE}}',
				],
			]
		);
			$this->add_control(
			'link_broder_color_hvr',
			[
				'label' => __( 'Border Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .readmore-btn:hover,
					{{WRAPPER}} .green-bg-btn a:hover' => 'border-color: {{VALUE}}',
				],
			]
		);
		
			$this->add_control(
			'link_bg_hvr_color',
			[
				'label' => __( 'Background  Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .green-bg-btn a:hover' => 'background-color: {{VALUE}}',
				],
			]
		);
      $this->end_controls_tab();
      $this->end_controls_tabs();
      
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
				'selector' => '{{WRAPPER}} .blog-body',
			]
		);
    	$this->add_control(
			'box_main_brder_color',
			[
				'label' => __( 'Box Border', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-body,
					{{WRAPPER}} .blog-st2-btn' => 'border-color: {{VALUE}}',
				],
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
				'selector' => '{{WRAPPER}} .blog-body:hover',
			]
		);
   	$this->add_control(
			'box_hvr_brder_color',
			[
				'label' => __( 'Box Border', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-body:hover,
					{{WRAPPER}} .blog-st2-btn:hover,
					{{WRAPPER}} .blog-body:hover .blog-st2-btn,
					{{WRAPPER}} .blog-st2:hover .blog-body,
					{{WRAPPER}} .blog-st2:hover .blog-st2-btn' => 'border-color: {{VALUE}}',
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
    $item_per_row = $settings['item_per_row'];


$post_args =  array(
                    'post_type'      => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => $item_per_page,
                    );
                    
                    
                    
                    
                     if(!empty($category[0])) {
                        $post_args['tax_query'] = array(
                          array(
                            'taxonomy' => 'category',
                           'terms'    => $category,
                          )
                        );
                      }
  

    $the_query = new \WP_Query($post_args);

    $items_per_row = $item_per_row;
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

   //  echo "<pre>";
   //  var_dump($category); 
    ?>
      <div class="row <?php if( $items_per_row == 5){ echo esc_attr( $col_grid ); }?>">
         <?php if($the_query->have_posts()){
            while($the_query->have_posts()){
               $the_query->the_post();
               ?>
        <?php 
        switch ($settings['post_style']) {
            case 'one': ?>
                <div class="<?php echo esc_attr( $show_items )?>">
                    <div class="emerce-single-blog">
                       <?php if(has_post_thumbnail()){?>
                          <a href="<?php the_permalink(); ?>" class="emerce-post-thumbnail">
                             <?php the_post_thumbnail('emerce-default-post-st-one'); ?>
                          </a>
                          <?php } ?>
                          <div class="emerce-blog-meta">
                            <span class="meta-name"> <i class="zil zi-tag"></i>
                             <?php echo emerce_post_cat(); ?></span>
                            <span class="meta-date"> <i class="zil zi-clock"></i>
                             <?php emerce_posted_on(); ?></span>
                          </div>
                          
                             <h2 class="emerce-blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                          
                          <a href="<?php the_permalink(); ?>" class="readmore-btn"><?php echo esc_html( 'Read More', 'emerce' )?></a>
                    </div>
                </div>
                <?php
                break;
            case 'two': ?>
                
                <div class="<?php echo esc_attr( $show_items )?>">
                    <div class="blog-st2">
                        <?php if(has_post_thumbnail()){?>
                          <a href="<?php the_permalink(); ?>">
                             <?php the_post_thumbnail('emerce-default-post-st-two'); ?>
                          </a>
                        <?php } ?>
                        <div class="blog-body">
                            <div class="emerce-blog-meta">
                               
                                   
                                    <span class="meta-name"> <i class="zil zi-user"></i> <?php the_author(); ?></span>
                                
                                  <span class="meta-date">  <i class="zil zi-clock"></i>
                                    <?php emerce_posted_on(); ?></span>
                            </div>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <?php echo emerce_get_excerpt_alt(165); ?>
                            <div class="blog-st2-btn">
                                <div class="green-bg-btn">
                                    <a href="<?php the_permalink(); ?>"><?php echo esc_html( 'Read More', 'emerce' )?> <i class="zil zi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <?php
                break;
                case 'three': ?>
                <div class="<?php echo esc_attr( $show_items )?>">
                    <div class="blog-st3">
                        <!--<a href="">-->
                            <div class="blog3-img">
                                <?php if(has_post_thumbnail()){?>
                                  <a href="<?php the_permalink(); ?>">
                                     <?php the_post_thumbnail('emerce-default-post-st-three'); ?>
                                  </a>
                                <?php } ?>
                            </div>
                            <div class="blog3-body">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <div class="emerce-blog-meta">
                                    <!--<a href=""><span class="meta-name">Nove 20, 2021</span></a>-->
                                    <?php emerce_posted_on(); ?>
                                </div>
                            </div>
                        <!--</a>-->
                    </div>
                </div>
                
                <?php
                break;
                }
        ?>
               
         
         
         
         <?php } } ?>
      </div>
    <?php
       
}  
protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_default_post );
?>
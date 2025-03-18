<?php

/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class emerce_product_featured_grid extends Widget_Base
{

    public function get_name()
    {
        return 'emerce_product_featured_grid';
    }

    public function get_title()
    {
        return __('Product Featured Grid', 'emerce-core');
    }
    public function get_categories()
    {
        return ['emerce-ele-widgets-cat'];
    }
    public function get_icon()
    {
        return 'emerceo-semi-solid cs-orange';
    }

    protected function register_controls()
    {



        $this->start_controls_section(
            'filtering_product_settings',
            [
                'label' => __('Product Settings', 'emerce-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'product_style',
            [
                'label' => __('Select Style', 'emerce-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'one',
                'options' => [
                    'one'  => __('Style One', 'emerce-core'),
                    'two' => __('Style Two', 'emerce-core'),
                ],
            ]
        );


        $this->add_control(
            'category',
            array(
                'label'       => esc_html__('Select Category', 'emerce-core'),
                'type'        => Controls_Manager::SELECT2,
                'multiple'    => true,
                'options'     => array_flip(emerce_elements_items('categories', array(
                    'sort_order'  => 'ASC',
                    'taxonomy'    => 'product_cat',
                    'hide_empty'  => false,
                ))),
                'label_block' => true,
            )
        );

        $this->add_control(
            'product_type',
            [
                'label' => __('Select Product Type', 'emerce-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'regular',
                'options' => [
                    'regular'  => __('Regular', 'emerce-core'),
                    'featured' => __('Featured', 'emerce-core'),
                    'onsale' => __('On Sale', 'emerce-core'),
                    'bestseller' => __('Best Seller', 'emerce-core'),
                ],
            ]
        );

        $this->add_control(
			'extra_text_one',
			[
				'label' => esc_html__( 'Extra Text 1', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Special Offer', 'emerce-core' ),
			]
		);
        $this->add_control(
			'extra_text_two',
			[
				'label' => esc_html__( 'Extra Text 2', 'emerce-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Hurry Up! Offer End Soon:', 'emerce-core' ),
                'condition' => [
                    'product_style' => 'two',
                ],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'title_style',
            [
                'label' => __('Title & Price Style', 'emerce-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Product Title Color', 'emerce-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-content h4,
					{{WRAPPER}} .product-content h4 a,
					{{WRAPPER}} .sell-pro-content h4 a,
					{{WRAPPER}} .sell-pro-content h4' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->end_controls_section();
    }

    protected function render($instance = [])
    {
        $settings = $this->get_settings_for_display();
        $item_per_page = 7;
        $category = $settings['category'];
        $product_type = $settings['product_type'];
        $product_style = $settings['product_style'];

        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        if ($product_type == 'onsale') {
            $product_args =  array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'paged'       => $paged,
                'posts_per_page' => $item_per_page,
                'meta_query'  => WC()->query->get_meta_query(),
                'post__in'    => array_merge(array(0), wc_get_product_ids_on_sale())
            );
        } else {
            $product_args =  array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'paged'               => $paged,
                'posts_per_page' => $item_per_page,
            );
        }
        if (!empty($category[0])) {
            $product_args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'ids',
                    'terms'    => $category
                )
            );
        }
        if ($product_type == 'featured') {
            $product_args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                    'operator' => 'IN',
                )
            );
        }
        if ($product_type == 'bestseller') {
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

        // Function file location: emerce-core -> elementor -> inc -> emerce-elementor-functions.php

        switch ($product_style) {
            case 'one':
                emerce_product_featured_grid_one($the_query, $settings);
              break;
            case 'two':
                emerce_product_featured_grid_two($the_query, $settings);
              break;
          }
        




    }
    protected function content_template()
    {
    }

    public function render_plain_content($instance = [])
    {
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new emerce_product_featured_grid); ?>
<?php

/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class emerce_products_with_category_list extends Widget_Base
{

    public function get_name()
    {
        return 'emerce_products_with_category_list';
    }

    public function get_title()
    {
        return __('Product with Category Lists', 'emerce-core');
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
            'product_category_settings',
            [
                'label' => __('Product Categorys', 'emerce-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'product_category_list',
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

        $this->end_controls_section();

        $this->start_controls_section(
            'filtering_product_settings',
            [
                'label' => __('Product Settings', 'emerce-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'item_per_page',
            [
                'label' => __('Number of Products to Show', 'emerce-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 2,
                'max' => 500,
                'step' => 1,
                'default' => 6,
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
        $this->end_controls_section();

        $this->start_controls_section(
            'title_style',
            [
                'label' => __('Title & Price Style', 'plugin-name'),
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
        $item_per_page = $settings['item_per_page'];
        $category = $settings['category'];
        $product_type = $settings['product_type'];

        $product_category_list = $settings['product_category_list'];
        $terms = get_terms(array(
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
            'include' => $product_category_list,
        ));

        // echo "<pre>";
        // print_r($product_category_list);

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

?>


        <section class="trending-products-v6" style="margin-bottom: 100px;">

            <div class="trending-products-v6-container">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="trending-cat-filter-v6">

                            <?php
                            if ($terms) {
                                foreach ($terms as $term) {

                                    $children = get_terms($term->taxonomy, array(
                                        'parent'    => $term->term_id,
                                        'hide_empty' => false
                                    ));

                            ?>

                                    <h3><?php echo $term->name; ?> </h3>
                                    <ul>
                                        <?php

                                        if ($children) {
                                            foreach ($children as $subcat) {

                                                // var_dump($subcat);

                                                echo '<li><a href="' . esc_url(get_term_link($subcat, $subcat->taxonomy)) . '"><span>' . $subcat->name . '</span> <span>(' . $subcat->count . ')</span></a> </li>';
                                            }
                                        }

                                        ?>
                                    </ul>

                            <?php
                                }
                            }
                            ?>

                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="trending-cat-products-v6 row">

                            <?php if ($the_query->have_posts()) {
                                while ($the_query->have_posts()) {
                                    $the_query->the_post();
                                    global $product;
                            ?>
                            <div class="col-12 col-md-4">

                                     <?php get_template_part( 'inc/vendor/woocommerce/product-style/content-style-ten' ); ?>
                                    
                                    </div>

                            <?php }
                                wp_reset_postdata();
                            } ?>


                        </div>
                    </div>
                </div>
            </div>


        </section>

<?php




    }
    protected function content_template()
    {
    }

    public function render_plain_content($instance = [])
    {
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new emerce_products_with_category_list); ?>
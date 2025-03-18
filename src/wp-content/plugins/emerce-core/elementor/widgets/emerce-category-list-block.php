<?php

/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class emerce_category_list_block extends Widget_Base
{

    public function get_name()
    {
        return 'emerce_category_list_block';
    }

    public function get_title()
    {
        return __('Category Lists Block', 'emerce-core');
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
            'selected_product_category',
            array(
                'label'       => esc_html__('Select Category', 'emerce-core'),
                'type'        => Controls_Manager::SELECT,
                'default' => 'uncategorized',
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

        $selected_product_category = $settings['selected_product_category'];

        $terms = get_terms(array(
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
            'include' => $selected_product_category,
        ));

        if ($terms) {
            foreach ($terms as $term) {


                $children = get_terms($term->taxonomy, array(
                    'parent'    => $term->term_id,
                    'hide_empty' => false
                ));

                $cat_thumb_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                $cat_image = wp_get_attachment_image_url($cat_thumb_id, 'category-list-block');
                // $cat_image = wp_get_attachment_url($cat_thumb_id, 'emerce-grid-post');
?>

                <div class="single-cat-grid-v6">
                    <div class="cat-grid-v6-img">
                        <?php if ($cat_image) {
                            echo "<img src='{$cat_image}' alt='' />";
                        } ?>
                    </div>
                    <h3><a href=""><?php echo $term->name; ?></a></h3>
                    <div class="cat-grid-v6-sub-cat">

                        <?php

                        if ($children) {
                            foreach ($children as $subcat) {

                                echo '<p><a href="' . esc_url(get_term_link($subcat, $subcat->taxonomy)) . '"><span>' . $subcat->name . '</span> <span>(' . $subcat->count . ')</span></a></p>';
                            }
                        }

                        ?>

                    </div>
                </div>
<?php
            }
        }
    }
    protected function content_template()
    {
    }

    public function render_plain_content($instance = [])
    {
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new emerce_category_list_block); ?>
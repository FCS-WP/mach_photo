<?php

class Emerce_Accordion_Walker extends Walker
{

    var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');

    public static function fallback($args)
    {
        if (current_user_can('edit_theme_options')) {
            /* Get Arguments. */
            $container = $args['container'];
            $container_id = $args['container_id'];
            $container_class = $args['container_class'];
            $menu_class = $args['menu_class'];
            $menu_id = $args['menu_id'];
            if ($container) {
                echo '<' . esc_attr($container);
                if ($container_id) {
                    echo ' id="' . esc_attr($container_id) . '"';
                }
                if ($container_class) {
                    echo ' class="' . esc_attr($container_class) . '"';
                }
                echo '>';
            }
            echo '<ul';
            if ($menu_id) {
                echo ' id="' . esc_attr($menu_id) . '"';
            }
            if ($menu_class) {
                echo ' class="' . esc_attr($menu_class) . '"';
            }
            echo '>';
            echo '<li><a href="' . esc_url(admin_url('nav-menus.php')) . '" >' . esc_attr('Add a menu', 'emerce') . '</a></li>';
            echo '</ul>';
            if ($container) {
                echo '</' . esc_attr($container) . '>';
            }
        }
    }

    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul>\n";
    }

    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {

        global $wp_query;
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $class_names = $value = '';
        $classes = empty($item->classes) ? array() : (array)$item->classes;

        /* Add active class */
        if (in_array('current-menu-item', $classes)) {
            $classes[] = 'active';
            unset($classes['current-menu-item']);
        }

        /* Check for children */
        $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
        if (!empty($children)) {
            $classes[] = 'has-sub';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $navmeta = get_post_meta($item->ID, '_pivoo_nav_options', true);
        if (!empty($navmeta['nav-icon'])) {
            $item->title = '<i class="' . $navmeta['nav-icon'] . '"></i> ' . $item->title;
        }

        if (!empty($navmeta['nav-tags'])) {
            $item->title = $item->title . '<span class="menu-float-label label-' . $navmeta['nav_tag_color'] . '">' . $navmeta['nav-tags'] . '</span>';
        }
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '><span>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</span></a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    function end_el(&$output, $item, $depth = 0, $args = array())
    {
        $output .= "</li>\n";
    }
}
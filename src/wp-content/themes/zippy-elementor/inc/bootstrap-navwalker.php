<?php
/**
 * WP Bootstrap Navwalker
 *
 * @package WP-Bootstrap-Navwalker
 */

/*
 * Class Name: WP_Bootstrap_Navwalker
 * Plugin Name: WP Bootstrap Navwalker
 * Plugin URI:  https://github.com/wp-bootstrap/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 4 navigation style in a custom theme using the WordPress built in menu manager.
 * Author: Edward McIntyre - @twittem, WP Bootstrap, William Patton - @pattonwebz
 * Version: 4.1.0
 * Author URI: https://github.com/wp-bootstrap
 * GitHub Plugin URI: https://github.com/wp-bootstrap/wp-bootstrap-navwalker
 * GitHub Branch: master
 * License: GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
*/

/* Check if Class Exists. */
if (!class_exists('WP_Bootstrap_Navwalker')) {
    /**
     * WP_Bootstrap_Navwalker class.
     *
     * @extends Walker_Nav_Menu
     */
    class WP_Bootstrap_Navwalker extends Walker_Nav_Menu
    {

        public $megaMenuID;
        public $megaMenuColID;
        public $count;
        public $animation;

        public function __construct()
        {
            $this->megaMenuID = 0;
            $this->megaMenuColID = 0;
            $this->count = 0;
            $this->is_megaitem = false;
            $this->force_normal = false;
            $this->animation = 'fade-in';


            if (!empty($disable_mega) && $disable_mega == 'disable') {
                $this->force_normal = true;
            }
            if (!empty($animation) && $animation == 'disabled') {
                $this->animation = false;
            } elseif (!empty($animation)) {
                $this->animation = $animation;
            }


            $this->headerTextClasses = '';
            $this->dropTextClasses = '';

        }

        /**
         * Starts the list before the elements are added.
         *
         * @param string $output Used to append additional content (passed by reference).
         * @param int $depth Depth of menu item. Used for padding.
         * @param stdClass $args An object of wp_nav_menu() arguments.
         * @see Walker_Nav_Menu::start_lvl()
         *
         * @since WP 3.0.0
         *
         */
        public function start_lvl(&$output, $depth = 0, $args = array())
        {
            if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = str_repeat($t, $depth);
            // Default class to add to the file.


            $droppos = get_post_meta($this->megaMenuID, 'menu-item-dropdown-position', true);
            $customxpcmegw = get_post_meta($this->megaMenuID, 'menu-item-xpc_custom_width', true);
            $customxpcwdt = get_post_meta($this->megaMenuID, 'menu_item-xpc-sub-width', true);
            $customxpcpulllft = get_post_meta($this->megaMenuID, 'menu_item-xpc-sub-pull-left', true);

            $classes = array('dropdown-menu', $droppos);

            if ($customxpcmegw == true) {
                $xpcsextrastyle = 'style="width:' . $customxpcwdt . 'px;max-width:none; left:' . $customxpcpulllft . '%;"';
            } else {
                $xpcsextrastyle = "";
            }


            /**
             * Filters the CSS class(es) applied to a menu list element.
             *
             * @param array $classes The CSS classes that are applied to the menu `<ul>` element.
             * @param stdClass $args An object of `wp_nav_menu()` arguments.
             * @param int $depth Depth of menu item. Used for padding.
             * @since WP 4.8.0
             *
             */
            $class_names = join(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"  ' . $xpcsextrastyle . '' : '';
            /**
             * The `.dropdown-menu` container needs to have a labelledby
             * attribute which points to it's trigger link.
             *
             * Form a string for the labelledby attribute from the the latest
             * link with an id that was added to the $output.
             */
            $labelledby = '';
            // find all links with an id in the output.
            preg_match_all('/(<a.*?id=\"|\')(.*?)\"|\'.*?>/im', $output, $matches);
            // with pointer at end of array check if we got an ID match.
            if (end($matches[2])) {
                // build a string to use as aria-labelledby.
                $labelledby = 'aria-labelledby="' . end($matches[2]) . '"';
            }

            if ($depth == 0 && !$this->force_normal) $this->is_megaitem = false;

            if ($this->megaMenuColID != 0 && !$this->force_normal) {
                $cols = get_post_meta($this->megaMenuColID, 'menu-item-xpc_columns_number', true);
                $cols_line = get_post_meta($this->megaMenuColID, 'menu-item-xpc_columns_line', true);
                $cols_padding = get_post_meta($this->megaMenuColID, 'menu-item-xpc_is_column_padding', true);
                $add_classes = '';
                $add_classes_val = get_post_meta($this->megaMenuColID, '_menu_item_classes', true);
                if (!empty($add_classes_val) && !empty($add_classes_val[0])) $add_classes = $add_classes_val[0];

                $padding_class = '';
                if (!empty($cols_padding)) {
                    $padding_class = 'xpc-dropdown-padding';
                    if ($cols_padding == 2) {
                        $padding_class .= ' xpc-dropdown-padding-sm';
                    }
                }
                $output .= '<div class="col-lg-' . $cols . ' ' . $cols_line . ' xpc-p-box ' . $padding_class . '">';
                $hide_label = get_post_meta($this->megaMenuColID, 'menu-item-xpc_hide_column_label', true);
                $col_link = get_post_meta($this->megaMenuColID, '_menu_item_url', true);
                $col_link_target = get_post_meta($this->megaMenuColID, '_menu_item_target', true);
                $item_type = get_post_meta($this->megaMenuColID, '_menu_item_type', true);

                if (!$hide_label) {
                    $title = get_post($this->megaMenuColID)->post_title;
                    if (empty($title)) {
                        if (!empty(get_post_meta($this->megaMenuColID)['_menu_item_object_id'][0])) {
                            $title = get_post(get_post_meta($this->megaMenuColID)['_menu_item_object_id'][0])->post_title;
                        }
                    }
                    if ($title && $title != '') {
                        if ($item_type == 'post_type') {
                            $col_link = get_permalink(get_post_meta($this->megaMenuColID, '_menu_item_object_id', true));
                        }
                        if (!$col_link || $col_link == '#' || $col_link == '') {
                            $output .= '<h5 class="emerce-mg-col-title text-sm ' . $add_classes . ' text-heading-default ' . $this->dropTextClasses . '" >' . $title . '</h5>';
                        } else {
                            $output .= '<a href="' . $col_link . '" target="' . $col_link_target . '" class="emerce-mg-col-title d-block text-sm ' . $add_classes . ' text-heading-default ' . $this->dropTextClasses . '" >' . $title . '</a>';
                        }

                    }

                }


            } else {
                $output .= "{$n}{$indent}<div$class_names  $labelledby role=\"navigation\">{$n}";
                if ($this->megaMenuID != 0 && !$this->force_normal) {
                    $this->is_megaitem = true;
                    $output .= '<div class="submenu-box  overflow-hidden2"><div class="container overflow-hidden"><div class="row w-100">';
                } else {
                    $output .= '<div class="submenu-box xpc-default-menu "><div class="container">';
                }
            }

            // $output .= '<div class="container"><div class="row"><div class="col-md-12">';


        }

        /**
         * Ends the list of after the elements are added.
         *
         * @param string $output Used to append additional content (passed by reference).
         * @param int $depth Depth of menu item. Used for padding.
         * @param stdClass $args An object of wp_nav_menu() arguments.
         * @see Walker::end_lvl()
         *
         * @since 3.0.0
         *
         */
        public function end_lvl(&$output, $depth = 0, $args = array())
        {

            if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = str_repeat($t, $depth);

            if ($this->megaMenuColID != 0 && !$this->force_normal) {
                $output .= "$indent</div>{$n}";
            } else {
                $output .= "$indent</div>{$n}";

                if ($this->is_megaitem != 0 && !$this->force_normal) {
                    if ($depth > 1) {
                        $output .= "$indent</div>{$n}";
                        $output .= "$indent</div>{$n}";
                        $output .= "$indent</div>{$n}";
                    }
                    if ($depth == 0) {
                        $output .= "$indent</div>{$n}";
                        $output .= "$indent</div>{$n}";
                        $output .= "$indent</div>{$n}";
                    }

                } else {
                    if (!$this->is_megaitem || $this->force_normal) {
                        $output .= "$indent</div>{$n}";
                        $output .= "$indent</div>{$n}";
                    }

                }
            }


        }

        /**
         * Starts the element output.
         *
         * @param string $output Used to append additional content (passed by reference).
         * @param WP_Post $item Menu item data object.
         * @param int $depth Depth of menu item. Used for padding.
         * @param stdClass $args An object of wp_nav_menu() arguments.
         * @param int $id Current item ID.
         * @see Walker_Nav_Menu::start_el()
         *
         * @since WP 3.0.0
         * @since WP 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
         *
         */
        public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
        {
            if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = ($depth) ? str_repeat($t, $depth) : '';

            $classes = empty($item->classes) ? array() : (array)$item->classes;
            $add_classes = '';
            if (!empty($classes[0])) $add_classes = $classes[0];
            $is_megamenu = false;
            if (!$this->force_normal) {
                if ($depth === 0) {
                    $is_megamenu = get_post_meta($item->ID, 'menu-item-xpc_is_megamenu', true);
                }
            }
            $is_column = false;
            if ($depth == 1 && !$this->force_normal && $this->is_megaitem) $is_column = get_post_meta($item->ID, 'menu-item-xpc_is_column_item', true);
            $is_img = get_post_meta($item->ID, 'menu-item-xpc_is_image_item', true);
            // Initialize some holder variables to store specially handled item
            // wrappers and icons.
            $linkmod_classes = array();
            $icon_classes = array();

            $xpc_menu_advanced_opts = get_post_meta($item->ID, 'menu-item-xpc_menu_opts', true);
            $adv_menu_opts = array();
            if (!empty($xpc_menu_advanced_opts)) {
                $xpc_menu_advanced_data = json_decode(wp_specialchars_decode($xpc_menu_advanced_opts));
                if ($xpc_menu_advanced_data) {
                    foreach ($xpc_menu_advanced_data as $i => $v) {
                        $adv_menu_opts[$v->name] = $v->val;
                    }
                }
            }
            extract(shortcode_atts(array(
                'menu_item_icon' => true,
                'mega_style' => '',
                'menu_item_style' => '',
            ), $adv_menu_opts));


            /**
             * Get an updated $classes array without linkmod or icon classes.
             *
             * NOTE: linkmod and icon class arrays are passed by reference and
             * are maybe modified before being used later in this function.
             */
            $classes = self::separate_linkmods_and_icons_from_classes($classes, $linkmod_classes, $icon_classes, $depth);

            // Join any icon classes plucked from $classes into a string.
            $icon_class_string = join(' ', $icon_classes);

            /**
             * Filters the arguments for a single nav menu item.
             *
             *  WP 4.4.0
             *
             * @param stdClass $args An object of wp_nav_menu() arguments.
             * @param WP_Post $item Menu item data object.
             * @param int $depth Depth of menu item. Used for padding.
             */
            $args = apply_filters('nav_menu_item_args', $args, $item, $depth);

            // Add .dropdown or .active classes where they are needed.
            if (isset($args->has_children) && $args->has_children) {
                $classes[] = 'dropdown';
            }
            if (in_array('current-menu-item', $classes, true) || in_array('current-menu-parent', $classes, true)) {
                $classes[] = 'active';
            }

            // Add some additional default classes to the item.
            $classes[] = 'menu-item-' . $item->ID;
            $classes[] = 'nav-item dropdown d-lg-flex nav-item-display align-self-stretch overflow-visible align-items-center';
            if ($is_megamenu) {
                $classes[] = 'mega-item';
                if (!empty($mega_style)) {
                    $classes[] = $mega_style;
                } else {
                    $classes[] = 'xpc-mega-style-default';
                }
            }
            if ($depth > 0) {
                $classes[] = 'w-100';
            }

            // Allow filtering the classes.
            $classes = apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth);

            // Form a string of classes in format: class="class_names".
            $raw_class_names = join(' ', $classes);
            $class_names = $raw_class_names ? ' class="' . esc_attr($raw_class_names) . '"' : '';

            /**
             * Filters the ID applied to a menu item's list item element.
             *
             * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
             * @param WP_Post $item The current menu item.
             * @param stdClass $args An object of wp_nav_menu() arguments.
             * @param int $depth Depth of menu item. Used for padding.
             * @since WP 3.0.1
             * @since WP 4.1.0 The `$depth` parameter was added.
             *
             */
            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
            $id = $id ? ' id="' . esc_attr($id) . '"' : '';


            if ($is_megamenu && !$this->force_normal) {
                $this->megaMenuID = $item->ID;
            } else {
                $this->megaMenuID = 0;
            }


            if ($is_column && !$this->force_normal) {
                $this->megaMenuColID = $item->ID;
            } else {
                $this->megaMenuColID = 0;
            }

            if ($depth > 0) {
                if ($is_column && !$this->force_normal) {
                    $output .= $indent . '';
                } elseif ($is_img) {
                    $box_title = get_post_meta($item->ID, 'menu-item-xpc_box_title', true);
                    $box_text = get_post_meta($item->ID, 'menu-item-xpc_box_text', true);
                    $box_btn_text = !empty($item->title) ? do_shortcode($item->title) : '';
                    $box_btn_link = !empty($item->url) ? $item->url : false;
                    $box_img_obj = get_post_meta($item->ID, 'menu-item-xpc_bg_image', true);
                    $box_alt_shortcode = get_post_meta($item->ID, 'menu_item_box_shortcode', true);
                    $box_img = false;

                    $box_style = get_post_meta($item->ID, 'menu-item-xpc_box_style', true);
                    $box_is_dark = get_post_meta($item->ID, 'menu-item-xpc_is_box_dark', true);
                    $box_is_full_height = get_post_meta($item->ID, 'menu-item-xpc_is_full_height', true);
                    $box_menu_link_hide = get_post_meta($item->ID, 'menu-item-xpc_is_hide_menu_link', true);

                    $style_classes = '';
                    $style_classes_inner = '';
                    $item_inner_classes = '';
                    if (!$this->is_megaitem) {
                        $item_inner_classes = 'rounded-0';
                    }
                    if ($box_style == "padding") {
                        $style_classes = 'overflow-hidden xpc-p-20 rounded-lg';
                        $style_classes_inner = 'overflow-hidden rounded-lg';
                        $item_inner_classes = 'rounded-lg';
                    } elseif ($box_style == "padding-no-top") {
                        $style_classes = 'overflow-hidden xpc-px-20 xpc-pb-20 rounded-lg';
                        $style_classes_inner = 'overflow-hidden rounded-lg';
                        $item_inner_classes = 'rounded-lg';
                    } elseif ($box_style == "no-padding") {
                        $style_classes = 'overflow-hidden xpc-px-0 rounded-lg';
                        $style_classes_inner = 'overflow-hidden rounded-lg';
                        $item_inner_classes = 'rounded-lg';
                    }

                    if (!empty($box_img_obj)) {

                        if (is_string($box_img_obj) && substr($box_img_obj, 0, 4) === "http") {
                            if (strpos($box_img_obj, '.mp4') !== false) {
                                $box_img = '<div class="' . $item_inner_classes . ' overflow-hidden"><video class="xpc-bg-image xpc-video-elem xpc-img-scale bg-video w-100 ' . $item_inner_classes . '" preload="none" loop muted playsinline style="pointer-events: none;">
								<source src="' . esc_url($box_img_obj) . '" class="' . $item_inner_classes . '" data-src="' . esc_url($box_img_obj) . '" type="video/mp4">
								</video></div>';
                            } else {
                                $box_img = '<img src="' . esc_url($box_img_obj) . '" class="xpc-bg-image d-inline-block w-100 xpc-img-scale xpc-opacity-10" alt="' . esc_attr('Menu Banner', 'emerce') . '" />';
                            }
                        } else {
                            $box_media_meta = wp_get_attachment_metadata($box_img_obj);
                            if (!empty($box_media_meta['fileformat']) && $box_media_meta['fileformat'] == 'mp4') {
                                $box_img_url = wp_get_attachment_url($box_img_obj);
                                $box_img = '<div class="' . $item_inner_classes . ' overflow-hidden"><video class="xpc-bg-image xpc-video-elem xpc-img-scale bg-video w-100 ' . $item_inner_classes . '" preload="none" loop muted playsinline style="pointer-events: none;">
								<source src="' . get_template_directory_uri() . '/inc/assets/loading-square.mp4" class="' . $item_inner_classes . '" data-src="' . esc_url($box_img_url) . '" type="video/mp4">
								</video></div>';
                            } else {
                                $box_img = wp_get_attachment_image($box_img_obj, 'full', false, array(
                                    'class' => 'xpc-bg-image d-inline-block w-100 xpc-img-scale xpc-opacity-10'
                                ));
                            }
                        }

                    }


                    if (!empty($box_is_dark)) {
                        $style_classes .= ' xpc-box-dark';
                    } else {
                        $style_classes .= ' xpc-box-light';
                    }
                    if (!empty($box_is_full_height)) {
                        $style_classes .= ' xpc-menu-full-height';
                    }
                    $output .= '<div class="d-block position-relative w-100 xpc-menu-box ' . $raw_class_names . ' ' . $style_classes . '">';
                    $output .= '<div class="item-inner xpc-menu-box-inner d-flex align-items-end w-100 h-100 xpc-hover-item ' . $item_inner_classes . ' position-relative overflow-hidden" style="-webkit-transform: translateZ(0);transform: translateZ(0);">';
                    if (!empty($box_img)) {
                        $output .= $box_img;
                    }
                    $box_target = !empty($item->target) ? $item->target : '_self';

                    if ($box_btn_link) {
                        $output .= '<a target="' . $box_target . '" href="' . $box_btn_link . '" class="xpc-img-overlay xpc-box-container d-md-flex align-items-center w-100 justify-content-center2 xpc-p-20" >';
                    } else {
                        $output .= '<span class="menu-item-no-link xpc-img-overlay xpc-box-container d-md-flex align-items-center w-100 justify-content-center2 xpc-p-20" >';
                    }
                    if (!empty($box_title)) $output .= '<span class="text-heading-default font-weight-bold xpc-box-title">' . do_shortcode($box_title) . '</span>';
                    if (!empty($box_alt_shortcode)) $output .= '<div class="xpc-nav-block-shortcode">' . do_shortcode($box_alt_shortcode) . '</div>';

                    if (!empty($box_text)) $output .= '<span class="xpc-box-text text-body-default text-sm">' . $box_text . '</span>';
                    if ($box_menu_link_hide) {
                        if (!empty($box_btn_text) && $box_btn_text != '') $output .= '<span class="xpc-box-link text-heading-default btn btn-sm p-0 font-weight-bold xpc-py-5 text-sm2 xpc-hover-item d-flex align-items-center align-self-stretch text-left">' . $box_btn_text . ' <i class="ml-2 xpcicon-angle-right d-flex align-self-center font-weight-bold xpc-hover-right" style="line-height:16px;"></i></span>';
                    }
                    if ($box_btn_link) {
                        $output .= '</a>';
                    } else {
                        $output .= '</span>';
                    }

                    $output .= '</div>';
                    $output .= '</div>';

                } else {
                    // span fix
                    $output .= $indent . '<div itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"' . $id . $class_names . '>';
                }
            } else {
                $output .= $indent . '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"' . $id . $class_names . '>';
            }


            // initialize array for holding the $atts for the link item.
            $atts = array();

            // Set title from item to the $atts array - if title is empty then
            // default to item title.
            if (empty($item->attr_title)) {
                $atts['title'] = !empty($item->title) ? strip_shortcodes(strip_tags($item->title)) : '';
            } else {
                $atts['title'] = strip_shortcodes($item->attr_title);
            }

            $atts['class'] = $this->headerTextClasses;
            $atts['class'] .= ' xpc-nav-link ';


            $atts['target'] = !empty($item->target) ? $item->target : '_self';
            $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
            // If item has_children add atts to <a>.
            $animate = '';
            if ($this->animation) {
                $animate = 'animate-in';
            }
            if (isset($args->has_children) && $args->has_children && 0 === $depth && $args->depth > 1) {
                $atts['href'] = !empty($item->url) ? $item->url : '#';
                $atts['data-toggle'] = 'dropdown';
                $atts['aria-haspopup'] = 'true';
                $atts['aria-expanded'] = 'false';
                $atts['class'] .= ' dropdown-toggle nav-link ' . $animate;

                $atts['id'] = 'menu-item-dropdown-' . $item->ID;
            } else {
                $atts['href'] = !empty($item->url) ? $item->url : '#';
                // Items in dropdowns use .dropdown-item instead of .nav-link.
                if ($depth > 0) {
                    $atts['class'] .= ' dropdown-item';
                } else {
                    $atts['class'] .= ' nav-link ' . $animate;
                }
                if (isset($args->has_children) && $args->has_children) {
                    $atts['data-toggle'] = 'dropdown';
                    // $atts['href']          = '#';
                    $atts['aria-expanded'] = 'false';
                    $atts['aria-haspopup'] = 'true';
                    $atts['class'] .= ' dropdown-toggle';

                    $atts['id'] = 'menu-item-dropdown-' . $item->ID;
                }
            }
            $atts['data-anim-type'] = $this->animation;

            // update atts of this item based on any custom linkmod classes.
            $atts = self::update_atts_for_linkmod_type($atts, $linkmod_classes);
            // Allow filtering of the $atts array before using it.
            $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);


            // Build a string of html containing all the atts for the item.
            $attributes = '';
            foreach ($atts as $attr => $value) {
                if (!empty($value)) {
                    $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            /**
             * Set a typeflag to easily test if this is a linkmod or not.
             */
            $linkmod_type = self::get_linkmod_type($linkmod_classes);

            /**
             * START appending the internal item contents to the output.
             */
            $item_output = isset($args->before) ? $args->before : '';
            /**
             * This is the start of the internal nav item. Depending on what
             * kind of linkmod we have we may need different wrapper elements.
             */
            if ('' !== $linkmod_type) {
                // is linkmod, output the required element opener.
                $item_output .= self::linkmod_element_open($linkmod_type, $attributes);
            } else {
                // With no link mod type set this must be a standard <a> tag.
                $item_output .= '<a' . $attributes . '>';

            }

            /**
             * Initiate empty icon var, then if we have a string containing any
             * icon classes form the icon markup with an <i> element. This is
             * output inside of the item before the $title (the link text).
             */
            $icon_html = '';
            if (!empty($icon_class_string)) {
                // append an <i> with the icon classes to what is output before links.
                $icon_html = '<i class="' . esc_attr($icon_class_string) . '" aria-hidden="true"></i> ';
            }

            /** This filter is documented in wp-includes/post-template.php */
            $title = apply_filters('the_title', $item->title, $item->ID);

            /**
             * Filters a menu item's title.
             *
             * @param string $title The menu item's title.
             * @param WP_Post $item The current menu item.
             * @param stdClass $args An object of wp_nav_menu() arguments.
             * @param int $depth Depth of menu item. Used for padding.
             * @since WP 4.4.0
             *
             */
            $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);
            // <i class="xpcicon-diamond text-16 mr-1"></i>
            $menu_item_icon_out = '';
            $menu_item_icon = get_post_meta($item->ID, 'menu_item_icon', true);
            $menu_label_enable = get_post_meta($item->ID, 'menu-item-enable_label', true);
            $menu_item_label = get_post_meta($item->ID, 'menu-item-label-type', true);
            $menu_item_label_text = get_post_meta($item->ID, 'menu-label_xpc_text', true);
            if (!empty($menu_item_icon)) {
                if ($depth == 0) {
                    $menu_item_icon_out = '<i class="' . $menu_item_icon . ' me-2 xpc-menu-item-icon"></i>';
                } else {
                    $menu_item_icon_out = '<i class="' . $menu_item_icon . ' me-2 xpc-menu-item-icon"></i>';
                }
            }
            if ($menu_label_enable == true) {
                $menu_item_label_box = '<span class="xpc-menu-label xpc-label-' . $menu_item_label . '">' . $menu_item_label_text . '</span>';

            } else {
                $menu_item_label_box = '';
            }

            if ($depth == 0) {
                $title = '<span class="xpc-dropdown-title text-sm ' . $add_classes . ' xpc-header-text">' . $menu_item_icon_out . do_shortcode($title) . $menu_item_label_box . ' </span>';
            } else {
                if ($menu_item_style != 'xpc-item-heading') {
                    $title = '<span class="xpc-dropdown-title ' . $add_classes . ' text-body-default ' . $this->dropTextClasses . '">' . $menu_item_icon_out . do_shortcode($title) . $menu_item_label_box . '</span>';
                }

            }


            if ($menu_item_style == 'xpc-item-heading') {
                $menuItem = '';
                if (!$atts['href'] || $atts['href'] == '#' || $atts['href'] == '') {
                    $menuItem .= '<h5 class="emerce-mg-col-title text-sm ' . $add_classes . ' text-heading-default ' . $this->dropTextClasses . '" >' . $menu_item_icon_out . $title . '</h5>';
                } else {
                    $menuItem .= '<a href="' . $atts['href'] . '" target="' . $atts['target'] . '" class="emerce-mg-col-title w-100 text-sm ' . $add_classes . ' text-heading-default ' . $this->dropTextClasses . '" >' . $menu_item_icon_out . do_shortcode($title) . '</a>';
                }
                $item_output = $menuItem;
            } else {
                /**
                 * If the .sr-only class was set apply to the nav items text only.
                 */
                if (in_array('sr-only', $linkmod_classes, true)) {
                    $title = self::wrap_for_screen_reader($title);
                    $keys_to_unset = array_keys($linkmod_classes, 'sr-only');
                    foreach ($keys_to_unset as $k) {
                        unset($linkmod_classes[$k]);
                    }
                }

                // Put the item contents into $output.
                $item_output .= isset($args->link_before) ? $args->link_before . $icon_html . $title . $args->link_after : '';
                /**
                 * This is the end of the internal nav item. We need to close the
                 * correct element depending on the type of link or link mod.
                 */
                if ('' !== $linkmod_type) {
                    // is linkmod, output the required element opener.
                    $item_output .= self::linkmod_element_close($linkmod_type, $attributes);
                } else {
                    // With no link mod type set this must be a standard <a> tag.

                    $item_output .= '</a>';
                }

                $item_output .= isset($args->after) ? $args->after : '';
            }

            $is_column = false;
            if ($depth == 1 && $this->is_megaitem) $is_column = get_post_meta($item->ID, 'menu-item-xpc_is_column_item', true);
            if ($is_column && !$this->force_normal) {
                $item_output = '';
            }


            /**
             * END appending the internal item contents to the output.
             */
            if (!$is_img) {
                $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
            }


        }


        /**
         * Ends the element output, if needed.
         *
         * @param string $output Used to append additional content (passed by reference).
         * @param WP_Post $item Page data object. Not used.
         * @param int $depth Depth of page. Not Used.
         * @param stdClass $args An object of wp_nav_menu() arguments.
         * @since 3.0.0
         *
         * @see Walker::end_el()
         *
         */
        public function end_el(&$output, $item, $depth = 0, $args = array())
        {
            if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            if ($depth > 0) {
                $is_column = false;
                if ($depth == 1 && $this->is_megaitem && !$this->force_normal) $is_column = get_post_meta($item->ID, 'menu-item-xpc_is_column_item', true);
                if ($is_column && $this->is_megaitem && !$this->force_normal) {
                    $output .= "";
                } else {
                    $is_img = get_post_meta($item->ID, 'menu-item-xpc_is_image_item', true);
                    if (!$is_img) {
                        $output .= "</div>{$n}";
                    }
                }
            } else {
                $output .= "</li>{$n}";
            }

        }

        /**
         * Traverse elements to create list from elements.
         *
         * Display one element if the element doesn't have any children otherwise,
         * display the element and its children. Will only traverse up to the max
         * depth and no ignore elements under that depth. It is possible to set the
         * max depth to include all depths, see walk() method.
         *
         * This method should not be called directly, use the walk() method instead.
         *
         * @param object $element Data object.
         * @param array $children_elements List of elements to continue traversing (passed by reference).
         * @param int $max_depth Max depth to traverse.
         * @param int $depth Depth of current element.
         * @param array $args An array of arguments.
         * @param string $output Used to append additional content (passed by reference).
         * @since WP 2.5.0
         *
         * @see Walker::start_lvl()
         *
         */
        public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output)
        {
            if (!$element) {
                return;
            }
            $id_field = $this->db_fields['id'];
            // Display this element.
            if (is_object($args[0])) {
                $args[0]->has_children = !empty($children_elements[$element->$id_field]);
            }
            parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
        }

        /**
         * Menu Fallback
         * =============
         * If this function is assigned to the wp_nav_menu's fallback_cb variable
         * and a menu has not been assigned to the theme location in the WordPress
         * menu manager the function with display nothing to a non-logged in user,
         * and will add a link to the WordPress menu manager if logged in as an admin.
         *
         * @param array $args passed from the wp_nav_menu function.
         */
        public static function fallback($args)
        {
            if (current_user_can('edit_theme_options')) {

                /* Get Arguments. */
                $container = $args['container'];
                $container_id = $args['container_id'];
                $container_class = $args['container_class'];
                $menu_class = $args['menu_class'];
                $menu_id = $args['menu_id'];

                // initialize var to store fallback html.
                $fallback_output = '';

                if ($container) {
                    $fallback_output .= '<' . esc_attr($container);
                    if ($container_id) {
                        $fallback_output .= ' id="' . esc_attr($container_id) . '"';
                    }
                    if ($container_class) {
                        $fallback_output .= ' class="' . esc_attr($container_class) . '"';
                    }
                    $fallback_output .= '>';
                }
                $fallback_output .= '<ul';
                if ($menu_id) {
                    $fallback_output .= ' id="' . esc_attr($menu_id) . '"';
                }
                if ($menu_class) {
                    $fallback_output .= ' class="' . esc_attr($menu_class) . '"';
                }
                $fallback_output .= '>';
                $fallback_output .= '<li><a href="' . esc_url(admin_url('nav-menus.php')) . '" title="' . esc_attr__('Add a menu', 'emerce') . '">' . esc_attr__('Add a menu', 'emerce') . '</a></li>';
                $fallback_output .= '</ul>';
                if ($container) {
                    $fallback_output .= '</' . esc_attr($container) . '>';
                }

                // if $args has 'echo' key and it's true echo, otherwise return.
                if (array_key_exists('echo', $args) && $args['echo']) {
                    echo esc_html($fallback_output); // WPCS: XSS OK.
                } else {
                    return $fallback_output;
                }
            }
        }

        /**
         * Find any custom linkmod or icon classes and store in their holder
         * arrays then remove them from the main classes array.
         *
         * Supported linkmods: .disabled, .dropdown-header, .dropdown-divider, .sr-only
         * Supported iconsets: Font Awesome 4/5, Glypicons
         *
         * NOTE: This accepts the linkmod and icon arrays by reference.
         *
         * @param array $classes an array of classes currently assigned to the item.
         * @param array $linkmod_classes an array to hold linkmod classes.
         * @param array $icon_classes an array to hold icon classes.
         * @param integer $depth an integer holding current depth level.
         *
         * @return array  $classes         a maybe modified array of classnames.
         * @since 4.0.0
         *
         */
        private function separate_linkmods_and_icons_from_classes($classes, &$linkmod_classes, &$icon_classes, $depth)
        {
            // Loop through $classes array to find linkmod or icon classes.
            foreach ($classes as $key => $class) {
                // If any special classes are found, store the class in it's
                // holder array and and unset the item from $classes.
                if (preg_match('/^disabled|^sr-only/i', $class)) {
                    // Test for .disabled or .sr-only classes.
                    $linkmod_classes[] = $class;
                    unset($classes[$key]);
                } elseif (preg_match('/^dropdown-header|^dropdown-divider|^dropdown-item-text/i', $class) && $depth > 0) {
                    // Test for .dropdown-header or .dropdown-divider and a
                    // depth greater than 0 - IE inside a dropdown.
                    $linkmod_classes[] = $class;
                    unset($classes[$key]);
                } elseif (preg_match('/^fa-(\S*)?|^fa(s|r|l|b)?(\s?)?$/i', $class)) {
                    // Font Awesome.
                    $icon_classes[] = $class;
                    unset($classes[$key]);
                } elseif (preg_match('/^glyphicon-(\S*)?|^glyphicon(\s?)$/i', $class)) {
                    // Glyphicons.
                    $icon_classes[] = $class;
                    unset($classes[$key]);
                }
            }

            return $classes;
        }

        /**
         * Return a string containing a linkmod type and update $atts array
         * accordingly depending on the decided.
         *
         * @param array $linkmod_classes array of any link modifier classes.
         *
         * @return string                empty for default, a linkmod type string otherwise.
         * @since 4.0.0
         *
         */
        private function get_linkmod_type($linkmod_classes = array())
        {
            $linkmod_type = '';
            // Loop through array of linkmod classes to handle their $atts.
            if (!empty($linkmod_classes)) {
                foreach ($linkmod_classes as $link_class) {
                    if (!empty($link_class)) {

                        // check for special class types and set a flag for them.
                        if ('dropdown-header' === $link_class) {
                            $linkmod_type = 'dropdown-header';
                        } elseif ('dropdown-divider' === $link_class) {
                            $linkmod_type = 'dropdown-divider';
                        } elseif ('dropdown-item-text' === $link_class) {
                            $linkmod_type = 'dropdown-item-text';
                        }
                    }
                }
            }
            return $linkmod_type;
        }

        /**
         * Update the attributes of a nav item depending on the limkmod classes.
         *
         * @param array $atts array of atts for the current link in nav item.
         * @param array $linkmod_classes an array of classes that modify link or nav item behaviors or displays.
         *
         * @return array                 maybe updated array of attributes for item.
         * @since 4.0.0
         *
         */
        private function update_atts_for_linkmod_type($atts = array(), $linkmod_classes = array())
        {
            if (!empty($linkmod_classes)) {
                foreach ($linkmod_classes as $link_class) {
                    if (!empty($link_class)) {
                        // update $atts with a space and the extra classname...
                        // so long as it's not a sr-only class.
                        if ('sr-only' !== $link_class) {
                            $atts['class'] .= ' ' . esc_attr($link_class);
                        }
                        // check for special class types we need additional handling for.
                        if ('disabled' === $link_class) {
                            // Convert link to '#' and unset open targets.
                            $atts['href'] = '#';
                            unset($atts['target']);
                        } elseif ('dropdown-header' === $link_class || 'dropdown-divider' === $link_class || 'dropdown-item-text' === $link_class) {
                            // Store a type flag and unset href and target.
                            unset($atts['href']);
                            unset($atts['target']);
                        }
                    }
                }
            }
            return $atts;
        }

        /**
         * Wraps the passed text in a screen reader only class.
         *
         * @param string $text the string of text to be wrapped in a screen reader class.
         * @return string      the string wrapped in a span with the class.
         * @since 4.0.0
         *
         */
        private function wrap_for_screen_reader($text = '')
        {
            if ($text) {
                $text = '<span class="sr-only">' . $text . '</span>';
            }
            return $text;
        }

        /**
         * Returns the correct opening element and attributes for a linkmod.
         *
         * @param string $linkmod_type a sting containing a linkmod type flag.
         * @param string $attributes a string of attributes to add to the element.
         *
         * @return string              a string with the openign tag for the element with attribibutes added.
         * @since 4.0.0
         *
         */
        private function linkmod_element_open($linkmod_type, $attributes = '')
        {
            $output = '';
            if ('dropdown-item-text' === $linkmod_type) {
                $output .= '<span class="dropdown-item-text"' . $attributes . '>';
            } elseif ('dropdown-header' === $linkmod_type) {
                // For a header use a span with the .h5 class instead of a real
                // header tag so that it doesn't confuse screen readers.
                $output .= '<span class="dropdown-header h5"' . $attributes . '>';
            } elseif ('dropdown-divider' === $linkmod_type) {
                // this is a divider.
                $output .= '<div class="dropdown-divider"' . $attributes . '>';
            }
            return $output;
        }

        /**
         * Return the correct closing tag for the linkmod element.
         *
         * @param string $linkmod_type a string containing a special linkmod type.
         *
         * @return string              a string with the closing tag for this linkmod type.
         * @since 4.0.0
         *
         */
        private function linkmod_element_close($linkmod_type)
        {
            $output = '';
            if ('dropdown-header' === $linkmod_type || 'dropdown-item-text' === $linkmod_type) {
                // For a header use a span with the .h5 class instead of a real
                // header tag so that it doesn't confuse screen readers.
                $output .= '</span>';
            } elseif ('dropdown-divider' === $linkmod_type) {
                // this is a divider.
                $output .= '</div>';
            }
            return $output;
        }
    }
}

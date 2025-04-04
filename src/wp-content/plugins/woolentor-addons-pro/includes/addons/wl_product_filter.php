<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Woolentor_Wl_Product_Filter_Widget extends Widget_Base {

    public function get_name() {
        return 'wl-product-filter';
    }

    public function get_title() {
        return __( 'WL: Product Filter', 'woolentor' );
    }

    public function get_icon() {
        return 'eicon-filter';
    }

    public function get_categories() {
        return ['woolentor-addons'];
    }

    public function get_help_url() {
        return 'https://woolentor.com/documentation/';
    }

    public function get_style_depends(){
        return ['elementor-icons-shared-0-css','elementor-icons-fa-brands','elementor-icons-fa-regular','elementor-icons-fa-solid','woolentor-widgets'];
    }

    public function get_script_depends() {
        return ['jquery-ui-slider'];
    }

    public function get_keywords(){
        return ['woolentor','shop','filter','product filter'];
    }

    protected function register_controls() {

        $filter_by = [
            'search_form'  => esc_html__( 'Search Form', 'woolentor' ),
            'price_by'     => esc_html__( 'Price', 'woolentor' ),
            'sort_by'      => esc_html__( 'Sort By', 'woolentor' ),
            'order_by'     => esc_html__( 'Order By', 'woolentor' ),
            'product_status' => esc_html__( 'Product Availability', 'woolentor' ),
            'reset_button'   => esc_html__( 'Reset Button', 'woolentor' )
        ];

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Filter', 'woolentor' ),
            ]
        );
            
            $this->add_control(
                'wl_filter_type',
                [
                    'label'     => esc_html__( 'Filter Type', 'woolentor' ),
                    'type'      => Controls_Manager::SELECT2,
                    'options'   => $filter_by + woolentor_get_taxonomies(),
                    'separator'   => 'before',
                    'label_block' => true,
                    'default'=>'search_form',
                ]
            );

            $this->add_control(
                'redirect_form_url',
                [
                    'label'     => esc_html__( 'Redirect Custom URL', 'woolentor' ),
                    'type'      => Controls_Manager::TEXT,
                    'placeholder' => get_home_url( null, 'custom-search-page' ),
                    'label_block'=>true,
                    'condition' => [
                        'wl_filter_type' => 'search_form'
                    ],
                ]
            );

        $this->end_controls_section();

        // Additional Option
        $this->start_controls_section(
            'section_additional_option',
            [
                'label' => esc_html__( 'Additional Options', 'woolentor' ),
            ]
        );
            
            $this->add_control(
                'wl_filter_area_title',
                [
                    'label' => esc_html__( 'Title', 'woolentor' ),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'wl_filter_stock_all', 
                [
                    'label' => esc_html__( 'All Product Label', 'woolentor' ),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => esc_html__('All Products','woolentor'),
                    'condition'=>[
                        'wl_filter_type' => 'product_status'
                    ]
                ]
            );
            $this->add_control(
                'wl_filter_stock_in', 
                [
                    'label' => esc_html__( 'In Stock Product Label', 'woolentor' ),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => esc_html__('Only in stock','woolentor'),
                    'condition'=>[
                        'wl_filter_type' => 'product_status'
                    ]
                ]
            );
            $this->add_control(
                'wl_filter_stock_outof', 
                [
                    'label' => esc_html__( 'Out Of Stock Product Label', 'woolentor' ),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => esc_html__('Only out of stock','woolentor'),
                    'condition'=>[
                        'wl_filter_type' => 'product_status'
                    ]
                ]
            );

            $this->add_control(
                'wl_filter_reset_button_label', 
                [
                    'label' => esc_html__( 'Reset Button Label', 'woolentor' ),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => esc_html__('Reset','woolentor'),
                    'condition'=>[
                        'wl_filter_type' => 'reset_button'
                    ]
                ]
            );

            $this->add_responsive_control(
                'area_height',
                [
                    'label' => esc_html__( 'Height', 'woolentor' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'condition'=>[
                        'wl_filter_type!'=>['search_form','price_by','sort_by','order_by','product_status','reset_button']
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .woolentor-filter-wrap' => 'height: {{SIZE}}{{UNIT}}; overflow-y:auto',
                    ],
                ]
            );

            $this->add_control(
                'show_hierarchical',
                [
                    'label' => esc_html__( 'Hierarchical', 'woolentor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'condition'=>[
                        'wl_filter_type!'=>['search_form','price_by','sort_by','order_by','product_status','reset_button']
                    ]
                ]
            );

            $this->add_control(
                'list_icon',
                [
                    'label' => esc_html__( 'Icon', 'woolentor' ),
                    'type' => Controls_Manager::ICONS,
                    'condition'=>[
                        'wl_filter_type!'=>['search_form','price_by','sort_by','order_by','product_status','reset_button']
                    ]
                ]
            );

            $this->add_responsive_control(
                'list_icon_space',
                [
                    'label' => esc_html__( 'Icon Spacing', 'woolentor' ),
                    'type' => Controls_Manager::SLIDER,
                    'selectors' => [
                        '{{WRAPPER}} .woolentor-filter-wrap ul li i' => 'margin-right: {{SIZE}}{{UNIT}};',
                    ],
                    'condition'=>[
                        'list_icon[value]!'=>'',
                        'wl_filter_type!'=>['search_form','price_by','sort_by','order_by','product_status','reset_button'],
                    ]
                ]
            );

        $this->end_controls_section();

        // Title Style Section
        $this->start_controls_section(
            'wlproduct_filter_title_style',
            [
                'label' => esc_html__( 'Title', 'woolentor' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'wl_filter_area_title!'=>''
                ]
            ]
        );
            
            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Color', 'woolentor' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} h2.wl_filter_title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => esc_html__( 'Typography', 'woolentor' ),
                    'selector' => '{{WRAPPER}} h2.wl_filter_title',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'title_border',
                    'label' => esc_html__( 'Border', 'woolentor' ),
                    'selector' => '{{WRAPPER}} h2.wl_filter_title',
                ]
            );

            $this->add_responsive_control(
                'title_padding',
                [
                    'label' => esc_html__( 'Padding', 'woolentor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} h2.wl_filter_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'title_margin',
                [
                    'label' => esc_html__( 'Margin', 'woolentor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} h2.wl_filter_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // Filter Reset Button Section
        $this->start_controls_section(
            'wlproduct_filter_reset_button_style',
            [
                'label' => esc_html__( 'Button', 'woolentor' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'wl_filter_type' => 'reset_button'
                ]
            ]
        );

            $this->add_responsive_control(
                'wlproduct_filter_reset_align',
                [
                    'label' => __( 'Alignment', 'woolentor' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'woolentor' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'woolentor' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'woolentor' ),
                            'icon' => 'eicon-text-align-right',
                        ]
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .wl_filter_reset_button' => 'text-align: {{VALUE}};',
                    ],
                    'default' => 'right',
                    'separator' =>'after',
                ]
            );

            $this->start_controls_tabs('reset_button_style_tabs');

                // Button Normal Style
                $this->start_controls_tab(
                    'reset_button_style_normal_tab',
                    [
                        'label' => esc_html__( 'Normal', 'woolentor' ),
                    ]
                );
                    
                    $this->add_control(
                        'reset_button_color',
                        [
                            'label' => esc_html__( 'Color', 'woolentor' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .woolentor-filter-wrap button.woolentor-filter-reset-button' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Background::get_type(),
                        [
                            'name' => 'reset_button_background',
                            'label' => esc_html__( 'Background', 'woolentor' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .woolentor-filter-wrap button.woolentor-filter-reset-button',
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Typography::get_type(),
                        [
                            'name' => 'reset_typography',
                            'label' => esc_html__( 'Typography', 'woolentor' ),
                            'selector' => '{{WRAPPER}} .woolentor-filter-wrap button.woolentor-filter-reset-button',
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'reset_button_border',
                            'label' => esc_html__( 'Border', 'woolentor' ),
                            'selector' => '{{WRAPPER}} .woolentor-filter-wrap button.woolentor-filter-reset-button',
                        ]
                    );

                $this->end_controls_tab();

                // Button Hover Style
                $this->start_controls_tab(
                    'reset_button_style_hover_tab',
                    [
                        'label' => esc_html__( 'Hover', 'woolentor' ),
                    ]
                );
                    $this->add_control(
                        'reset_button_hover_color',
                        [
                            'label' => esc_html__( 'Color', 'woolentor' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .woolentor-filter-wrap button.woolentor-filter-reset-button:hover' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Background::get_type(),
                        [
                            'name' => 'reset_button_hover_background',
                            'label' => esc_html__( 'Background', 'woolentor' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .woolentor-filter-wrap button.woolentor-filter-reset-button:hover',
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'reset_button_hover_border',
                            'label' => esc_html__( 'Border', 'woolentor' ),
                            'selector' => '{{WRAPPER}} .woolentor-filter-wrap button.woolentor-filter-reset-button:hover',
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();

        // Shorting Select box Section
        $this->start_controls_section(
            'wlproduct_filter_select_box_style',
            [
                'label' => esc_html__( 'Select Box', 'woolentor' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'wl_filter_type'=>['sort_by','order_by','product_status']
                ]
            ]
        );
            
            $this->add_control(
                'select_box_color',
                [
                    'label' => esc_html__( 'Color', 'woolentor' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .woolentor-filter-wrap select' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .woolentor-filter-wrap select option' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'select_box_border',
                    'label' => esc_html__( 'Border', 'woolentor' ),
                    'selector' => '{{WRAPPER}} .woolentor-filter-wrap select',
                ]
            );

        $this->end_controls_section();

        // Search Form Style Section
        $this->start_controls_section(
            'wlproduct_filter_search_form_style',
            [
                'label' => esc_html__( 'Form Style', 'woolentor' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'wl_filter_type'=>['search_form']
                ]
            ]
        );

            $this->add_control(
                'form_inputbox',
                [
                    'label' => esc_html__( 'Input Box', 'woolentor' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );

            $this->add_control(
                'inputbox_color',
                [
                    'label' => esc_html__( 'Color', 'woolentor' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .woolentor-filter-wrap form.wl_product_search_form input[type="search"]' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'inputbox_background',
                    'label' => esc_html__( 'Background', 'woolentor' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .woolentor-filter-wrap form.wl_product_search_form,{{WRAPPER}} .woolentor-filter-wrap input[type="search"]',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'inputbox_typography',
                    'label' => esc_html__( 'Typography', 'woolentor' ),
                    'selector' => '{{WRAPPER}} .woolentor-filter-wrap form.wl_product_search_form input[type="search"]',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'inputbox_border',
                    'label' => esc_html__( 'Border', 'woolentor' ),
                    'selector' => '{{WRAPPER}} .woolentor-filter-wrap form.wl_product_search_form',
                ]
            );

            $this->add_responsive_control(
                'inputbox_padding',
                [
                    'label' => esc_html__( 'Padding', 'woolentor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .woolentor-filter-wrap form.wl_product_search_form input[type="search"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'form_submit_button',
                [
                    'label' => esc_html__( 'Submit Button', 'woolentor' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->start_controls_tabs('submit_button_style_tabs');

                // Button Normal Style
                $this->start_controls_tab(
                    'submit_button_style_normal_tab',
                    [
                        'label' => esc_html__( 'Normal', 'woolentor' ),
                    ]
                );
                    
                    $this->add_control(
                        'submit_button_color',
                        [
                            'label' => esc_html__( 'Color', 'woolentor' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .woolentor-filter-wrap form.wl_product_search_form button' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Background::get_type(),
                        [
                            'name' => 'submit_button_background',
                            'label' => esc_html__( 'Background', 'woolentor' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .woolentor-filter-wrap form.wl_product_search_form button',
                        ]
                    );

                    $this->add_responsive_control(
                        'submit_button_icon_size',
                        [
                            'label' => esc_html__( 'Icon Size', 'woolentor' ),
                            'type' => Controls_Manager::SLIDER,
                            'selectors' => [
                                '{{WRAPPER}} .woolentor-filter-wrap form.wl_product_search_form button i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'submit_button_border',
                            'label' => esc_html__( 'Border', 'woolentor' ),
                            'selector' => '{{WRAPPER}} .woolentor-filter-wrap form.wl_product_search_form button',
                        ]
                    );

                $this->end_controls_tab();

                // Button Hover Style
                $this->start_controls_tab(
                    'submit_button_style_hover_tab',
                    [
                        'label' => esc_html__( 'Hover', 'woolentor' ),
                    ]
                );
                    $this->add_control(
                        'submit_button_hover_color',
                        [
                            'label' => esc_html__( 'Color', 'woolentor' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .woolentor-filter-wrap form.wl_product_search_form button:hover' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Background::get_type(),
                        [
                            'name' => 'submit_button_hover_background',
                            'label' => esc_html__( 'Background', 'woolentor' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .woolentor-filter-wrap form.wl_product_search_form button:hover',
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'submit_button_hover_border',
                            'label' => esc_html__( 'Border', 'woolentor' ),
                            'selector' => '{{WRAPPER}} .woolentor-filter-wrap form.wl_product_search_form button:hover',
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();

        // List Item Style Section
        $this->start_controls_section(
            'wlproduct_filter_list_style',
            [
                'label' => esc_html__( 'List Item', 'woolentor' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'wl_filter_type!'=>['search_form','price_by','sort_by','order_by','product_status','reset_button']
                ]
            ]
        );
            
            $this->start_controls_tabs('list_item_style_tabs');

                $this->start_controls_tab(
                    'list_item_style_normal_tab',
                    [
                        'label' => esc_html__( 'Normal', 'woolentor' ),
                    ]
                );
                    $this->add_control(
                        'list_item_color',
                        [
                            'label' => esc_html__( 'Color', 'woolentor' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .woolentor-filter-wrap ul li' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .woolentor-filter-wrap ul li a' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Typography::get_type(),
                        [
                            'name' => 'list_item_typography',
                            'label' => esc_html__( 'Typography', 'woolentor' ),
                            'selector' => '{{WRAPPER}} .woolentor-filter-wrap ul li,{{WRAPPER}} .woolentor-filter-wrap ul li a',
                        ]
                    );

                    $this->add_responsive_control(
                        'list_icon_size',
                        [
                            'label' => esc_html__( 'Icon Size', 'woolentor' ),
                            'type' => Controls_Manager::SLIDER,
                            'selectors' => [
                                '{{WRAPPER}} .woolentor-filter-wrap ul li i' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .woolentor-filter-wrap ul li svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition'=>[
                                'list_icon[value]!'=>'',
                            ]
                        ]
                    );

                    $this->add_responsive_control(
                        'list_item_padding',
                        [
                            'label' => esc_html__( 'Padding', 'woolentor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .woolentor-filter-wrap ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'list_item_border',
                            'label' => esc_html__( 'Border', 'woolentor' ),
                            'selector' => '{{WRAPPER}} .woolentor-filter-wrap ul li',
                        ]
                    );

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'list_item_style_hover_tab',
                    [
                        'label' => esc_html__( 'Hover', 'woolentor' ),
                    ]
                );
                    
                    $this->add_control(
                        'list_item_hover_color',
                        [
                            'label' => esc_html__( 'Color', 'woolentor' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .woolentor-filter-wrap ul > li:hover > i' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .woolentor-filter-wrap ul li a:hover' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();

        // List Item Cross Icon Style Section
        $this->start_controls_section(
            'wlproduct_filter_list_item_cross_style',
            [
                'label' => esc_html__( 'Cross Icon', 'woolentor' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'wl_filter_type!'=>['search_form','price_by','sort_by','order_by','product_status','reset_button']
                ]
            ]
        );
            
            $this->add_control(
                'choosen_icon_color',
                [
                    'label' => esc_html__( 'Color', 'woolentor' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .woolentor-filter-wrap ul li.wlchosen > a::before' => 'background-color: {{VALUE}}',
                        '{{WRAPPER}} .woolentor-filter-wrap ul li.wlchosen > a::after' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

        $this->end_controls_section();

        // Price Filter Style Section
        $this->start_controls_section(
            'wlproduct_filter_price_filter_style',
            [
                'label' => esc_html__( 'Range Slider', 'woolentor' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'wl_filter_type'=>['price_by']
                ]
            ]
        );
            
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'slider_background',
                    'label' => esc_html__( 'Background', 'woolentor' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .woolentor_slider_range.ui-slider',
                    'exclude'=>['image'],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'slider_active_background',
                    'label' => esc_html__( 'Background', 'woolentor' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .woolentor_slider_range .ui-slider-range.ui-widget-header.ui-corner-all',
                    'fields_options' => [
                        'background' => [
                            'label' => esc_html__( 'Active Slider Background', 'woolentor' ),
                        ]
                    ],
                    'exclude'=>['image'],
                ]
            );

            $this->add_control(
                'slider_height',
                [
                    'label' => esc_html__( 'Height', 'woolentor' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .woolentor_slider_range.ui-slider' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'slider_handler_options',
                [
                    'label' => esc_html__( 'Slider Handler', 'woolentor' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'slider_handler_size',
                [
                    'label' => esc_html__( 'Size', 'woolentor' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .woolentor_slider_range .ui-slider-handle.ui-state-default.ui-corner-all' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'slider_handler_background',
                    'label' => esc_html__( 'Background', 'woolentor' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .woolentor_slider_range .ui-slider-handle.ui-state-default.ui-corner-all',
                    'exclude'=>['image'],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'slider_handler_button_border',
                    'label' => esc_html__( 'Border', 'woolentor' ),
                    'selector' => '{{WRAPPER}} .woolentor_slider_range .ui-slider-handle.ui-state-default.ui-corner-all',
                ]
            );

            $this->add_responsive_control(
                'slider_handler_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'woolentor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .woolentor_slider_range .ui-slider-handle.ui-state-default.ui-corner-all' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'slider_lavel_options',
                [
                    'label' => esc_html__( 'Price Label', 'woolentor' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'price_lavel_color',
                [
                    'label' => esc_html__( 'Label Color', 'woolentor' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .woolentor_price_label' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'price_color',
                [
                    'label' => esc_html__( 'Price Color', 'woolentor' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .woolentor_price_label span' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'slider_price_button_options',
                [
                    'label' => esc_html__( 'Button', 'woolentor' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->start_controls_tabs('slider_button_style_tabs');

                // Button Normal Style
                $this->start_controls_tab(
                    'slider_button_style_normal_tab',
                    [
                        'label' => esc_html__( 'Normal', 'woolentor' ),
                    ]
                );
                    
                    $this->add_control(
                        'slider_button_color',
                        [
                            'label' => esc_html__( 'Color', 'woolentor' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .woolentor-filter-wrap .wl_price_filter form button' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Background::get_type(),
                        [
                            'name' => 'slider_button_background',
                            'label' => esc_html__( 'Background', 'woolentor' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .woolentor-filter-wrap .wl_price_filter form button',
                            'exclude'=>['image'],
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'slider_button_border',
                            'label' => esc_html__( 'Border', 'woolentor' ),
                            'selector' => '{{WRAPPER}} .woolentor-filter-wrap .wl_price_filter form button',
                        ]
                    );

                    $this->add_responsive_control(
                        'slider_button_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'woolentor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .woolentor-filter-wrap .wl_price_filter form button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'slider_button_padding',
                        [
                            'label' => esc_html__( 'Padding', 'woolentor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .woolentor-filter-wrap .wl_price_filter form button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                        ]
                    );

                $this->end_controls_tab();

                // Button Hover Style
                $this->start_controls_tab(
                    'slider_button_style_hover_tab',
                    [
                        'label' => esc_html__( 'Hover', 'woolentor' ),
                    ]
                );
                    $this->add_control(
                        'slider_button_hover_color',
                        [
                            'label' => esc_html__( 'Color', 'woolentor' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .woolentor-filter-wrap .wl_price_filter form button:hover' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Background::get_type(),
                        [
                            'name' => 'slider_button_hover_background',
                            'label' => esc_html__( 'Background', 'woolentor' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .woolentor-filter-wrap .wl_price_filter form button:hover',
                            'exclude'=>['image'],
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'slider_button_hover_border',
                            'label' => esc_html__( 'Border', 'woolentor' ),
                            'selector' => '{{WRAPPER}} .woolentor-filter-wrap .wl_price_filter form button:hover',
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();

    }


    protected function render( $instance = [] ) {
        $settings  = $this->get_settings_for_display();
        $id              = $this->get_id();
        $currency_symbol = get_woocommerce_currency_symbol();

        $filter_type = $settings['wl_filter_type'];

        $list_icon = !empty( $settings['list_icon']['value'] ) ? woolentor_render_icon( $settings, 'list_icon' ) : '';

        
        global $wp;
        if ( '' == get_option('permalink_structure' ) ) {
            $current_url = remove_query_arg(array('page', 'paged'), add_query_arg($wp->query_string, '', home_url($wp->request)));
        } else {
            $current_url = preg_replace('%\/page/[0-9]+%', '', home_url(trailingslashit($wp->request)));
        }

        ?>
            <div class="woolentor-filter-wrap" style="<?php if( 'price_by' === $filter_type ){ echo 'overflow: visible;'; } ?>">

                <?php

                if( !empty( $filter_type ) ):

                    echo !empty( $settings['wl_filter_area_title'] ) ? '<h2 class="wl_filter_title">'.$settings['wl_filter_area_title'].'</h2>' : '';

                    if( 'search_form' === $filter_type ):

                        if ( isset( $_GET['q'] ) || isset( $_GET['s'] ) ) {
                            $s = !empty( $_GET['s'] ) ? $_GET['s'] : '';
                            $q = !empty( $_GET['q'] ) ? $_GET['q'] : '';
                            $search_value = !empty( $q ) ? $q : $s;
                        }else{
                            $search_value = '';
                        }

                        if( !empty( $settings['redirect_form_url'] ) ){
                            $form_action = $settings['redirect_form_url'];
                        }else{
                            $form_action = $current_url;
                        }

                    ?>
                        <form class="wl_product_search_form" role="search" method="get" action="<?php echo esc_url( $form_action ); ?>">
                            <input type="search" placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'woolentor' ); ?>" value="<?php echo esc_attr( $search_value ); ?>" name="q" title="<?php echo esc_attr_x( 'Search for:', 'label', 'woolentor' ); ?>" />
                            <button type="submit" aria-label="<?php echo esc_attr__('Search','woolentor');?>"><i class="fa fa-search"></i></button>
                        </form>

                    <?php elseif( 'price_by' === $filter_type ):

                        $woocommerce_currency_pos = get_option( 'woocommerce_currency_pos' );
                        $currency_pos_left = false;
                        $currency_pos_space = false;
                        if( $woocommerce_currency_pos == 'left' || $woocommerce_currency_pos == 'left_space' ){
                            $currency_pos_left = true;
                        }
                        if( strstr( $woocommerce_currency_pos, 'space' ) ){
                            $currency_pos_space = true;
                        }

                        if( $currency_pos_space == true && $currency_pos_left == true){
                            // left space
                            $final_currency_symbol = $currency_symbol.' ';
                        }else if( $currency_pos_space == true && $currency_pos_left == false ){
                            // right space
                            $final_currency_symbol = ' '.$currency_symbol;
                        }else{
                            $final_currency_symbol = $currency_symbol;
                        }


                        $step = 1;
                        // Find min and max price in current result set.
                        $prices    = function_exists('woolentor_minmax_price_limit') ? woolentor_minmax_price_limit() : array('min' => 10,'max' => 20);

                        $min_price = $prices['min'];
                        $max_price = $prices['max'];

                        // Check to see if we should add taxes to the prices if store are excl tax but display incl.
                        $tax_display_mode = get_option( 'woocommerce_tax_display_shop' );

                        if ( wc_tax_enabled() && ! wc_prices_include_tax() && 'incl' === $tax_display_mode ) {
                            $tax_class = apply_filters( 'woolentor_price_filter_tax_class', '' ); // Uses standard tax class.
                            $tax_rates = \WC_Tax::get_rates( $tax_class );

                            if ( $tax_rates ) {
                                $min_price += \WC_Tax::get_tax_total( \WC_Tax::calc_exclusive_tax( $min_price, $tax_rates ) );
                                $max_price += \WC_Tax::get_tax_total( \WC_Tax::calc_exclusive_tax( $max_price, $tax_rates ) );
                            }
                        }

                        if ( $min_price === $max_price ){
                            $max_price = 100;
                        }

                        $min_price = apply_filters( 'woolentor_price_filter_min_amount', floor( $min_price / $step ) * $step );
                        $max_price = apply_filters( 'woolentor_price_filter_max_amount', ceil( $max_price / $step ) * $step );

                        $current_min_price = isset( $_GET['min_price'] ) ? floor( floatval( wp_unslash( $_GET['min_price'] ) ) / $step ) * $step : $min_price; // WPCS: input var ok, CSRF ok.
                        $current_max_price = isset( $_GET['max_price'] ) ? ceil( floatval( wp_unslash( $_GET['max_price'] ) ) / $step ) * $step : $max_price; // WPCS: input var ok, CSRF ok.

                    ?>

                    <div class="wl_price_filter">
                        <form method="get" action="<?php echo esc_url( $current_url ); ?>">
                            <div class="woolentor_slider_range" style="display: none;"></div>
                            <?php 
                                if( ! isset( $_GET['wlfilter'] ) ){
                                    echo '<input type="hidden" name="wlfilter" value="1">';
                                }
                            ?>
                            <input type="text" id="min_price-<?php echo $id; ?>" name="min_price" value="<?php echo esc_attr( $current_min_price ); ?>" data-min="<?php echo esc_attr( $min_price ); ?>" placeholder="<?php echo esc_attr__( 'Min price', 'woolentor' ); ?>" />
                            <input type="text" id="max_price-<?php echo $id; ?>" name="max_price" value="<?php echo esc_attr( $current_max_price ); ?>" data-max="<?php echo esc_attr( $max_price ); ?>" placeholder="<?php echo esc_attr__( 'Max price', 'woolentor' ); ?>" />
                            <div class="wl_button_price">
                                <button type="submit" aria-label="<?php echo esc_attr__('Filter','woolentor');?>"><?php echo esc_html__( 'Filter', 'woolentor' ); ?></button>
                                <div class="woolentor_price_label" style="display: none;">
                                    <?php echo esc_html__( 'Price:', 'woolentor' ); ?>
                                    <span id="from-<?php echo $id; ?>"></span> &mdash; <span id="to-<?php echo $id; ?>"></span>
                                </div>
                            </div>
                            <?php echo wc_query_string_form_fields( null, array( 'min_price', 'max_price', 'paged' ), '', true ); ?>
                        </form>
                    </div>
                    <script type="text/javascript">
                        ;jQuery(document).ready(function($) {
                            'use strict';

                            var id = '<?php echo $id; ?>';

                            $( 'input#min_price-'+id+', input#max_price-'+id ).hide();
                            $( '.woolentor_slider_range, .woolentor_price_label' ).show();

                            var min_price = parseInt( '<?php echo $min_price; ?>' ),
                                max_price = parseInt( '<?php echo $max_price; ?>' ),
                                current_min_price = parseInt( '<?php echo $current_min_price; ?>' ),
                                current_max_price = parseInt( '<?php echo $current_max_price; ?>' ),
                                currency_pos_left = '<?php echo $currency_pos_left; ?>',
                                currency_symbol = '<?php echo $final_currency_symbol; ?>';

                            $( ".woolentor_slider_range" ).slider({
                                range: true,
                                min: min_price,
                                max: max_price,
                                values: [ current_min_price, current_max_price ],
                                slide: function( event, ui ) {
                                    $( 'input#min_price-'+id ).val( ui.values[0] );
                                    $( 'input#max_price-'+id ).val( ui.values[1] );
                                    ( currency_pos_left ) ? $( ".woolentor_price_label span#from-"+id ).html( currency_symbol + ui.values[0] ) : $( ".woolentor_price_label span#from-"+id ).html(  ui.values[0] + currency_symbol );
                                    ( currency_pos_left ) ? $( ".woolentor_price_label span#to-"+id ).html( currency_symbol + ui.values[1] ) : $( ".woolentor_price_label span#to-"+id ).html( ui.values[1] + currency_symbol );
                                },

                            });

                            $( "#min_price-"+id ).val(  $( ".woolentor_slider_range" ).slider( "values", 0 ) );
                            $( "#max_price-"+id ).val(  $( ".woolentor_slider_range" ).slider( "values", 1 ) );

                            if( currency_pos_left ){
                                $( ".woolentor_price_label span#from-"+id ).html(  currency_symbol + $( ".woolentor_slider_range" ).slider( "values", 0 ) );
                                $( ".woolentor_price_label span#to-"+id ).html(  currency_symbol + $( ".woolentor_slider_range" ).slider( "values", 1 ) );
                            }else{
                                $( ".woolentor_price_label span#from-"+id ).html( $( ".woolentor_slider_range" ).slider( "values", 0 ) + currency_symbol );
                                $( ".woolentor_price_label span#to-"+id ).html( $( ".woolentor_slider_range" ).slider( "values", 1 ) + currency_symbol );
                            }

                        });
                    </script>

                    <?php elseif( 'sort_by' === $filter_type ): 
                        $wlsort = ( isset( $_GET['wlsort'] ) && !empty( $_GET['wlsort'] ) ) ? $_GET['wlsort'] : '';
                    ?>
                        <div class="wl_sort_by_filter">
                            <select data-filter-key="wlsort" name="wl_sort">
                                <option value="<?php echo esc_attr('none');?>"><?php echo esc_html__( 'None', 'woolentor' ); ?></option>
                                <option value="<?php echo esc_attr('ASC');?>" <?php selected( 'ASC', $wlsort, true ); ?> ><?php echo esc_html__( 'ASC', 'woolentor' ); ?></option>
                                <option value="<?php echo esc_attr('DESC');?>" <?php selected( 'DESC', $wlsort, true ); ?> ><?php echo esc_html__( 'DESC', 'woolentor' ); ?></option>
                            </select>
                        </div>

                    <?php elseif( 'reset_button' === $filter_type ):
                        $button_label = !empty( $settings['wl_filter_reset_button_label'] ) ? $settings['wl_filter_reset_button_label'] : 'Reset';
                    ?>
                    <div class="wl_filter_reset_button">
                        <button class="woolentor-filter-reset-button" aria-label="<?php echo esc_attr( $button_label );?>"><?php echo esc_html__( $button_label,'woolentor'); ?></button>
                    </div>

                    <?php elseif( 'product_status' === $filter_type ):
                        $wlstock = ( isset( $_GET['wlstock'] ) && !empty( $_GET['wlstock'] ) ) ? $_GET['wlstock'] : '';
                        $stock_all_label = $settings['wl_filter_stock_all'];
                        $stock_in_label = $settings['wl_filter_stock_in'];
                        $stock_out_label = $settings['wl_filter_stock_outof'];
                    ?>
                    <div class="wl_sort_by_stock">
                        <select data-filter-key="wlstock" name="wlstock">
                            <?php if( !empty( $stock_all_label ) ){ ?>
                            <option value="<?php echo esc_attr('none');?>" <?php selected( 'none', $wlstock, true ); ?> ><?php echo esc_html__( $stock_all_label, 'woolentor' ); ?></option>
                            <?php } if( !empty( $stock_in_label ) ){ ?>
                            <option value="<?php echo esc_attr('instock');?>" <?php selected( 'instock', $wlstock, true ); ?> ><?php echo esc_html__( $stock_in_label, 'woolentor' ); ?></option>
                            <?php } if( !empty( $stock_out_label ) ){ ?>
                            <option value="<?php echo esc_attr('outofstock');?>" <?php selected( 'outofstock', $wlstock, true ); ?> ><?php echo esc_html__( $stock_out_label, 'woolentor' ); ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <?php elseif( 'order_by' === $filter_type ):
                        $wlorder_by = ( isset( $_GET['wlorder_by'] ) && !empty( $_GET['wlorder_by'] ) ) ? $_GET['wlorder_by'] : '';
                    ?>
                        <div class="wl_order_by_filter">
                            <select data-filter-key="wlorder_by" name="wl_order_by_sort">
                                <?php
                                    foreach ( woolentor_order_by_opts() as $key => $opt_data ) {
                                        echo '<option value="'.esc_attr( $key ).'" '.selected( $key, $wlorder_by, false ).'>'.esc_html__( $opt_data, 'woolentor' ).'</option>';
                                    }
                                ?>
                            </select>
                        </div>

                    <?php else:

                        $filter_name = $filter_type;
                        $str = substr( $filter_name, 0, 3 );
                        if( 'pa_' === $str ){
                            $filter_name = 'filter_' . wc_attribute_taxonomy_slug( $filter_type );
                        }
                        if( $filter_name === 'product_cat' || $filter_name === 'product_tag' ){
                            $filter_name = 'woolentor_'.$filter_name;
                        }

                        $selected_taxonomies = ( isset( $_GET[$filter_name] ) && !empty( $_GET[$filter_name] ) ) ? explode( ',', $_GET[$filter_name] ) : array();

                        if( 'yes' === $settings['show_hierarchical'] ){
                            $terms = get_terms( $filter_type, [ 'parent' => 0, 'child_of' => 0 ] );

                            if ( !empty( $terms ) && !is_wp_error( $terms )){
                                echo '<ul class="woolentor-filter-vertical-'.$id.'" data-filter-key="'.esc_attr( $filter_name ).'">';
                                    foreach ( $terms as $term ){
                                        $link = $this->generate_term_link( $filter_type, $term, $current_url );

                                        $active_class = 'wlinactive';
                                        if( in_array( $term->slug, $selected_taxonomies ) ){
                                            $active_class = 'wlchosen';
                                        }

                                        echo '<li class="'.$link['class'].'">';
                                            echo sprintf('%1$s<a href="%2$s" data-value="%5$s">%3$s <span>(%4$s)</span></a>', $list_icon, $link['link'], $term->name, $term->count, $term->slug );

                                            $loterms = get_terms( $filter_type, [ 'parent' => $term->term_id ] );
                                            if( !empty( $loterms ) && !is_wp_error( $loterms ) ){
                                                echo '<ul class="wlchildren woolentor-filter-vertical-'.$id.'" data-filter-key="'.esc_attr( $filter_name ).'">';
                                                    foreach( $loterms as $key => $loterm ){
                                                        $cactive_class = 'wlinactive';
                                                        if( in_array( $loterm->slug, $selected_taxonomies ) ){
                                                            $cactive_class = 'wlchosen';
                                                        }
                                                        echo sprintf('<li class="%4$s">%1$s<a href="#" data-value="%5$s">%2$s <span>(%3$s)</span></a></li>', $list_icon, $loterm->name, $loterm->count, $cactive_class, $loterm->slug );
                                                    }
                                                echo '</ul>';
                                            }
                                        echo '</li>';
                                    }
                                echo '</ul>';
                            }
                            
                        }else{
                            $terms = get_terms( $filter_type );
                            if ( !empty( $terms ) && !is_wp_error( $terms ) ){
                                echo '<ul class="woolentor-filter-vertical-'.$id.'" data-filter-key="'.esc_attr( $filter_name ).'">';
                                    foreach ( $terms as $term ){
                                        $link = $this->generate_term_link( $filter_type, $term, $current_url );

                                        $active_class = 'wlinactive';
                                        if( in_array( $term->slug, $selected_taxonomies ) ){
                                            $active_class = 'wlchosen';
                                        }
                                        echo sprintf('<li class="%5$s">%4$s<a href="%1$s" data-value="%6$s">%2$s <span>(%3$s)</span></a></li>', $link['link'], $term->name, $term->count, $list_icon, $active_class, $term->slug );

                                    }
                                echo '</ul>';
                            }
                        }

                    ?>
                    <?php endif;?>

                <?php else: echo '<p>'.esc_html__( 'Please Select Filter Type', 'woolentor' ).'</p>'; ?>
                    
                <?php endif; ?>

                <?php if( 'sort_by' === $filter_type || 'order_by' === $filter_type || 'product_status' === $filter_type ):?>
                    <script type="text/javascript">
                        ;jQuery(document).ready(function($) {
                            'use strict';

                            $('.wl_order_by_filter select,.wl_sort_by_filter select,.wl_sort_by_stock select').on('change', function () {

                                var url = new URL( window.location ),
                                clear_time_out,
                                key = $(this).data('filter-key'),
                                selected_values = $(this).val();

                                if ( typeof( key ) != "undefined" ){

                                    if( !url.searchParams.get('wlfilter') ){
                                        url.searchParams.set( 'wlfilter', '1' );
                                    }

                                    if ( selected_values.length === 0 || selected_values === 'none') {
                                        url.searchParams.delete( key );
                                    } else {
                                        url.searchParams.set( key, selected_values );
                                    }

                                    var url_history = decodeURIComponent(url.href);
                                    window.history.pushState( {}, '', url_history );

                                    clearTimeout( clear_time_out );
                                    clear_time_out = setTimeout( function () {
                                        window.location.replace( url_history );
                                    }, 500 );

                                }

                                return false;

                            });

                        });
                    </script>
                <?php else: ?>
                    <script type="text/javascript">
                        ;jQuery(document).ready(function($) {
                            'use strict';

                            var id = '<?php echo $id; ?>';

                            // Filter Reset Button
                            $('.woolentor-filter-reset-button').on('click', function(e){
                                e.preventDefault()
                                var pre_url = window.location.href;
                                var onlyUrl = window.location.href.replace( window.location.search,'' ),
                                    clear_time_out;
                                window.history.pushState( {}, '', onlyUrl );

                                if( onlyUrl != pre_url ){
                                    clearTimeout( clear_time_out );
                                    clear_time_out = setTimeout( function () {
                                        window.location.replace( onlyUrl );
                                    }, 500 );
                                }

                            })

                            // Texnomony Filter
                            $('.woolentor-filter-vertical-'+id+' li a').on('click', function (e) {

                                e.preventDefault();

                                var url = new URL( window.location ),
                                    clear_time_out,
                                    key = $(this).closest('ul').data('filter-key'),
                                    selected_values = $(this).data('value');
                                
                                if ( typeof( key ) != "undefined" ){

                                    // Remove Search params
                                    if( url.searchParams.get('q') ){
                                        url.searchParams.delete( 'q' );
                                    }else if( url.searchParams.get('s') ){
                                        url.searchParams.delete( 's' );
                                    }

                                    if( !url.searchParams.get('wlfilter') ){
                                        url.searchParams.set( 'wlfilter', '1' );
                                    }

                                    if( url.searchParams.get( key ) ){
                                        var selected_array = url.searchParams.get( key ).split(',');
                                        if( selected_array.indexOf( selected_values ) == -1 ){
                                            selected_values = url.searchParams.get( key ) + ',' + selected_values;
                                        }else{
                                            const remove_index = selected_array.indexOf( selected_values );
                                            if ( remove_index > -1 ) {
                                                selected_array.splice( remove_index, 1 );
                                            }
                                            selected_values = selected_array.toString();
                                        }
                                    }

                                    if ( selected_values.length === 0 ) {
                                        url.searchParams.delete( key );
                                    } else {
                                        url.searchParams.set( key, selected_values );
                                    }

                                    var url_history = decodeURIComponent(url.href);
                                    window.history.pushState( {}, '', url_history );

                                    clearTimeout( clear_time_out );
                                    clear_time_out = setTimeout( function () {
                                        window.location.replace( url_history );
                                    }, 500 );

                                }

                                return false;

                            });

                        });
                    </script>
                <?php endif; ?>

            </div>
        <?php
    }

    protected function generate_term_link( $filter_type, $term, $current_url ) {

        $filter_name = $filter_type;
        $str = substr( $filter_type, 0, 3 );
        if( 'pa_' === $str ){
            $filter_name = 'filter_' . wc_attribute_taxonomy_slug( $filter_type );
        }

        if( $filter_name === 'product_cat' || $filter_name === 'product_tag' ){
            $filter_name = 'woolentor_'.$filter_name;
        }

        $current_filter = isset( $_GET[ $filter_name ] ) ? explode( ',', wc_clean( wp_unslash( $_GET[ $filter_name ] ) ) ) : array();
        $option_is_set  = in_array( $term->slug, $current_filter, true );

        // Generate choosen Class
        if( in_array( $term->slug, $current_filter ) ){
            $active_class = 'wlchosen';
        }else{
            $active_class = '';
        }

        // Term Link
        $current_filter = array_map( 'sanitize_title', $current_filter );
        if ( ! in_array( $term->slug, $current_filter, true ) ) {
            $current_filter[] = $term->slug;
        }
        $link = remove_query_arg( $filter_name, $current_url );

        foreach ( $current_filter as $key => $value ) {
            if ( $option_is_set && $value === $term->slug ) {
                unset( $current_filter[ $key ] );
            }
        }

        if ( ! empty( $current_filter ) ) {
            asort( $current_filter );
            $link = add_query_arg( 'wlfilter', '1', $link );
            $link = add_query_arg( $filter_name, implode( ',', $current_filter ), $link );
            $link = str_replace( '%2C', ',', $link );
        }
        return [
            'link'  => $link,
            'class' => $active_class,
        ];

    }


}
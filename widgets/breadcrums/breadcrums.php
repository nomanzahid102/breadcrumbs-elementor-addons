<?php

use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor BreadCrumbs Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_BreadCrumbs_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve list widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     */
    public function get_name()
    {
        return 'Breadcrums';
    }

    /**
     * Get widget title.
     *
     * Retrieve list widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     */
    public function get_title()
    {
        return esc_html__('Breadcrums', 'breadcrumbs-elementor-addons');
    }

    /**
     * Get widget icon.
     *
     * Retrieve list widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     */
    public function get_icon()
    {
        return 'eicon-chevron-double-right';
    }

    /**
     * Get custom help URL.
     *
     * Retrieve a URL where the user can get more information about the widget.
     *
     * @return string Widget help URL.
     * @since 1.0.0
     * @access public
     */
    public function get_custom_help_url()
    {
        return 'https://developers.elementor.com/docs/widgets/';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the list widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     */
    public function get_categories()
    {
        return ['general'];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the list widget belongs to.
     *
     * @return array Widget keywords.
     * @since 1.0.0
     * @access public
     */
    public function get_keywords()
    {
        return ['breadcrums', 'bread', 'bre'];
    }


    /**
     * Register list widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Breadcrumbs', 'breadcrumbs-elementor-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

            ]
        );
        $this->add_responsive_control(
            'content_align',
            [
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label' => esc_html__('Alignment', 'breadcrumbs-elementor-addons'),

                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'breadcrumbs-elementor-addons'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'breadcrumbs-elementor-addons'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'breadcrumbs-elementor-addons'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} #crumbs' => 'text-align:{{VALUE}};',
                ]

            ]
        );

        $this->add_control(
            'separator',
            [
                'label' => esc_html__( 'Custom Separator ', 'breadcrumbs-elementor-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'your-plugin' ),
                'label_off' => esc_html__( 'No', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->add_control(
            'separator-text',
            [
                'label' => esc_html__('Separator Text', 'breadcrumbs-elementor-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'separator' => 'yes',
                ],

                'default' => esc_html__('//', 'breadcrumbs-elementor-addons'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'breadcrumbs_style',
            [
                'label' => esc_html__('BreadCrumbs', 'breadcrumbs-elementor-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('breadcrumbs-tabs-sections');

        $this->start_controls_tab(
            'breadcrumbs_colors_normal',
            [
                'label' => esc_html__('Normal', 'breadcrumbs-elementor-addons'),
            ]
        );

        $this->add_control(
            'breadcrumbs_title_color',
            [
                'label' => esc_html__('Color', 'breadcrumbs-elementor-addons'),
                'type' => Controls_Manager::COLOR,
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
                ],
                'selectors' => [
                    '{{WRAPPER}} #crumbs a, {{WRAPPER}} #crumbs span, {{WRAPPER}} #crumbs span.current' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Typography', 'breadcrumbs-elementor-addons'),
                'name' => 'typography',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} #crumbs a , {{WRAPPER}} #crumbs span',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Stroke::get_type(),
            [
                'label' => esc_html__('Stroke', 'breadcrumbs-elementor-addons'),
                'name' => 'text_stroke',
                'selector' => '{{WRAPPER}} #crumbs',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'label' => esc_html__('Shadow', 'breadcrumbs-elementor-addons'),
                'name' => 'text_shadow',
                'selector' => '{{WRAPPER}} #crumbs',
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'breadcrumbs_colors_hover',
            [
                'label' => esc_html__('Hover', 'breadcrumbs-elementor-addons'),
            ]
        );

        $this->add_control(
            'breadcrumbs_title_color_hover',
            [
                'label' => esc_html__('Color', 'breadcrumbs-elementor-addons'),
                'type' => Controls_Manager::COLOR,
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
                ],
                'selectors' => [
                    '{{WRAPPER}} #crumbs a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Typography', 'breadcrumbs-elementor-addons'),
                'name' => 'hover_typography',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} #crumbs a:hover',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Stroke::get_type(),
            [
                'label' => esc_html__('Stroke', 'breadcrumbs-elementor-addons'),
                'name' => 'text_stroke_hover',
                'selector' => '{{WRAPPER}} #crumbs:hover',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'label' => esc_html__('Shadow', 'breadcrumbs-elementor-addons'),
                'name' => 'text_shadow_hover',
                'selector' => '{{WRAPPER}} #crumbs:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();


        $this->start_controls_section(
            'section_breadcrumbs_style',
            [
                'label' => esc_html__('Separator ', 'breadcrumbs-elementor-addons'),

                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'separator_icon_color',
            [
                'label' => esc_html__('Separator Color', 'breadcrumbs-elementor-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}}  #crumbs .delimiter' => 'color: {{VALUE}};',
                ],
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
                ],
            ]
        );

        $this->add_control(
            'weight',
            [
                'label' => esc_html__( 'Separator Size', 'breadcrumbs-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 18,
                ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #crumbs .delimiter' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'Separator_text_style',
            [
                'label' => esc_html__('Text', 'breadcrumbs-elementor-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'separator_text_color',
            [
                'label' => esc_html__('Icon Color', 'breadcrumbs-elementor-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-list-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementor-icon-list-icon svg' => 'fill: {{VALUE}};',
                ],
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Typography', 'breadcrumbs-elementor-addons'),
                'name' => 'separate_text_typography',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} #crumbs a:hover',
            ]
        );

        $this->add_responsive_control(
            'space_between_separator_text',
            [
                'label' => esc_html__('Space Between', 'breadcrumbs-elementor-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #crumbs span.delimiter' => 'margin: 0px calc({{SIZE}}{{UNIT}}/2)',


                ],
            ]
        );
        $this->end_controls_section();
    }

    /**
     * Render list widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        require_once(plugin_dir_path(__FILE__) . 'function.php');

        if(!empty($settings['separator'])){
            breadcrums($settings['separator-text']);
        }
        else{
            breadcrums();
        }

    }

}
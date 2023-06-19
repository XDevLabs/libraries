<?php

class Xdevlabs_Pricing extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'xdevlabs_pricing';
    }

    public function get_title()
    {
        return 'Xdevlabs Pricing';
    }

    public function get_icon()
    {
        return 'eicon-price-table';
    }

    public function get_categories()
    {
        return ['xdevlabs-category'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_setting',
            [
                'label' => __('Setting', 'xdevlabs'),
            ]
        );

        $this->add_control(
            'show_renewal_option',
            [
                'label' => esc_html__('Show renewal option', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xdevlabs'),
                'label_off' => esc_html__('Hide', 'xdevlabs'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'renewal_option_1',
            [
                'label' => esc_html__('Renewal Option 1', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Monthly', 'xdevlabs'),
                'placeholder' => esc_html__('Renewal Option 1', 'xdevlabs'),
                'condition' => ['show_renewal_option' => 'yes'],
            ]
        );

        $this->add_control(
            'renewal_option_2',
            [
                'label' => esc_html__('Renewal Option 2', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Annually', 'xdevlabs'),
                'placeholder' => esc_html__('Renewal Option 2', 'xdevlabs'),
                'condition' => ['show_renewal_option' => 'yes'],
            ]
        );

        $this->add_control(
            'save',
            [
                'label' => esc_html__('Save (%)', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 30,
                'condition' => ['show_renewal_option' => 'yes'],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_package_1',
            [
                'label' => __('Package 1', 'xdevlabs'),
            ]
        );

        $this->add_control(
            'active_package_1',
            [
                'label' => esc_html__('Active', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'xdevlabs'),
                'label_off' => esc_html__('No', 'xdevlabs'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'special_package_1',
            [
                'label' => esc_html__('Special Package', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'xdevlabs'),
                'label_off' => esc_html__('No', 'xdevlabs'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => ['active_package_1' => 'yes'],
            ]
        );

        $this->add_control(
            'package_1_heading',
            [
                'label' => esc_html__('Heading', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Package 1', 'xdevlabs'),
                'placeholder' => esc_html__('Package name', 'xdevlabs'),
                'condition' => ['active_package_1' => 'yes'],
            ]
        );

        $this->add_control(
            'package_1_heading_color',
            [
                'label' => esc_html__('Heading Color', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'gradient-1',
                'options' => [
                    'gradient-1' => esc_html__('Gradient 01', 'xdevlabs'),
                    'gradient-2' => esc_html__('Gradient 02', 'xdevlabs'),
                    'gradient-3'  => esc_html__('Gradient 03', 'xdevlabs'),
                    'gradient-4' => esc_html__('Gradient 04', 'xdevlabs'),
                    'gradient-5' => esc_html__('Gradient 05', 'xdevlabs'),
                    'custom' => esc_html__('Custom', 'xdevlabs'),
                ],
                'condition' => ['active_package_1' => 'yes'],
            ]
        );

        $this->add_control(
            'package_1_heading_color_custom',
            [
                'label' => esc_html__('Heading Custom Color', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-section .pricing-section__item--1 .pricing-section__item--top h2' => 'color: {{VALUE}}',
                ],
                'condition' => ['active_package_1' => 'yes', 'package_1_heading_color' => 'custom'],
            ]
        );

        $this->add_control(
            'package_1_description',
            [
                'label' => esc_html__('Description', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Description', 'xdevlabs'),
                'placeholder' => esc_html__('Description', 'xdevlabs'),
                'condition' => ['active_package_1' => 'yes'],
            ]
        );

        $this->add_control(
            'package_1_comming_soon',
            [
                'label' => esc_html__('Comming soon', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'xdevlabs'),
                'label_off' => esc_html__('No', 'xdevlabs'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => ['active_package_1' => 'yes'],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'package_1_comming_soon_text',
            [
                'label' => esc_html__('Comming Soon Text', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Comming soon', 'xdevlabs'),
                'placeholder' => esc_html__('Comming soon text', 'xdevlabs'),
                'condition' => ['active_package_1' => 'yes', 'package_1_comming_soon' => 'yes'],
            ]
        );

        $this->add_control(
            'package_1_monthly_price',
            [
                'label' => esc_html__('Monthly price', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 9999,
                'step' => 1,
                'default' => 200,
                'condition' => ['active_package_1' => 'yes', 'package_1_comming_soon' => ''],
            ]
        );

        $this->add_control(
            'package_1_annually_price',
            [
                'label' => esc_html__('Annually price', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 9999,
                'step' => 1,
                'default' => 200,
                'condition' => ['active_package_1' => 'yes', 'package_1_comming_soon' => ''],
            ]
        );

        $this->add_control(
            'package_1_annually_price_sale',
            [
                'label' => esc_html__('Annually price sale', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 9999,
                'step' => 1,
                'default' => 200,
                'condition' => ['active_package_1' => 'yes', 'package_1_comming_soon' => ''],
            ]
        );

        $this->add_control(
            'package_1_button_text',
            [
                'label' => esc_html__('Text', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Click here', 'xdevlabs'),
                'placeholder' => esc_html__('Text', 'xdevlabs'),
                'separator' => 'before',
                'condition' => ['active_package_1' => 'yes'],
            ]
        );

        $this->add_control(
            'package_1_button_link',
            [
                'label' => esc_html__('Link', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'xdevlabs'),
                'default' => [
                    'url' => '#',
                ],
                'condition' => ['active_package_1' => 'yes'],
            ]
        );

        $repeater_1 = new \Elementor\Repeater();

        $repeater_1->add_control(
            'package_1_title',
            [
                'label' => esc_html__('Title', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Title', 'xdevlabs'),
                'placeholder' => esc_html__('Title', 'xdevlabs'),
            ]
        );

        $repeater_1->add_control(
            'package_1_list',
            [
                'label' => esc_html__('Feature List (one feature per line)', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Feature List', 'xdevlabs'),
                'placeholder' => esc_html__('Feature List', 'xdevlabs'),
            ]
        );

        $this->add_control(
            'package_1_group',
            [
                'label' => __('Features', 'beond'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater_1->get_controls(),
                'title_field' => __('Features', 'beond'),
                'condition' => ['active_package_1' => 'yes'],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_package_2',
            [
                'label' => __('Package 2', 'xdevlabs'),
            ]
        );

        $this->add_control(
            'active_package_2',
            [
                'label' => esc_html__('Active', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'xdevlabs'),
                'label_off' => esc_html__('No', 'xdevlabs'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'special_package_2',
            [
                'label' => esc_html__('Special Package', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'xdevlabs'),
                'label_off' => esc_html__('No', 'xdevlabs'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => ['active_package_2' => 'yes'],
            ]
        );

        $this->add_control(
            'package_2_heading',
            [
                'label' => esc_html__('Heading', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Package 2', 'xdevlabs'),
                'placeholder' => esc_html__('Package name', 'xdevlabs'),
                'condition' => ['active_package_2' => 'yes'],
            ]
        );

        $this->add_control(
            'package_2_heading_color',
            [
                'label' => esc_html__('Heading Color', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'gradient-1',
                'options' => [
                    'gradient-1' => esc_html__('Gradient 01', 'xdevlabs'),
                    'gradient-2' => esc_html__('Gradient 02', 'xdevlabs'),
                    'gradient-3'  => esc_html__('Gradient 03', 'xdevlabs'),
                    'gradient-4' => esc_html__('Gradient 04', 'xdevlabs'),
                    'gradient-5' => esc_html__('Gradient 05', 'xdevlabs'),
                    'custom' => esc_html__('Custom', 'xdevlabs'),
                ],
                'condition' => ['active_package_2' => 'yes'],
            ]
        );

        $this->add_control(
            'package_2_heading_color_custom',
            [
                'label' => esc_html__('Heading Custom Color', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-section .pricing-section__item--2 .pricing-section__item--top h2' => 'color: {{VALUE}}',
                ],
                'condition' => ['active_package_2' => 'yes', 'package_2_heading_color' => 'custom'],
            ]
        );

        $this->add_control(
            'package_2_description',
            [
                'label' => esc_html__('Description', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Description', 'xdevlabs'),
                'placeholder' => esc_html__('Description', 'xdevlabs'),
                'condition' => ['active_package_2' => 'yes'],
            ]
        );

        $this->add_control(
            'package_2_comming_soon',
            [
                'label' => esc_html__('Comming soon', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'xdevlabs'),
                'label_off' => esc_html__('No', 'xdevlabs'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => ['active_package_2' => 'yes'],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'package_2_comming_soon_text',
            [
                'label' => esc_html__('Comming Soon Text', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Comming soon', 'xdevlabs'),
                'placeholder' => esc_html__('Comming soon text', 'xdevlabs'),
                'condition' => ['active_package_2' => 'yes', 'package_2_comming_soon' => 'yes'],
            ]
        );

        $this->add_control(
            'package_2_monthly_price',
            [
                'label' => esc_html__('Monthly price', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 9999,
                'step' => 1,
                'default' => 200,
                'condition' => ['active_package_2' => 'yes', 'package_2_comming_soon' => ''],
            ]
        );

        $this->add_control(
            'package_2_annually_price',
            [
                'label' => esc_html__('Annually price', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 9999,
                'step' => 1,
                'default' => 200,
                'condition' => ['active_package_2' => 'yes', 'package_2_comming_soon' => ''],
            ]
        );

        $this->add_control(
            'package_2_annually_price_sale',
            [
                'label' => esc_html__('Annually price sale', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 9999,
                'step' => 1,
                'default' => 200,
                'condition' => ['active_package_2' => 'yes', 'package_2_comming_soon' => ''],
            ]
        );

        $this->add_control(
            'package_2_button_text',
            [
                'label' => esc_html__('Text', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Click here', 'xdevlabs'),
                'placeholder' => esc_html__('Text', 'xdevlabs'),
                'separator' => 'before',
                'condition' => ['active_package_2' => 'yes'],
            ]
        );

        $this->add_control(
            'package_2_button_link',
            [
                'label' => esc_html__('Link', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'xdevlabs'),
                'default' => [
                    'url' => '#',
                ],
                'condition' => ['active_package_2' => 'yes'],
            ]
        );

        $repeater_2 = new \Elementor\Repeater();

        $repeater_2->add_control(
            'package_2_title',
            [
                'label' => esc_html__('Title', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Title', 'xdevlabs'),
                'placeholder' => esc_html__('Title', 'xdevlabs'),
            ]
        );

        $repeater_2->add_control(
            'package_2_list',
            [
                'label' => esc_html__('Feature List (one feature per line)', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Feature List', 'xdevlabs'),
                'placeholder' => esc_html__('Feature List', 'xdevlabs'),
            ]
        );

        $this->add_control(
            'package_2_group',
            [
                'label' => __('Features', 'beond'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater_2->get_controls(),
                'title_field' => __('Features', 'beond'),
                'condition' => ['active_package_2' => 'yes'],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_package_3',
            [
                'label' => __('Package 3', 'xdevlabs'),
            ]
        );

        $this->add_control(
            'active_package_3',
            [
                'label' => esc_html__('Active', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'xdevlabs'),
                'label_off' => esc_html__('No', 'xdevlabs'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'special_package_3',
            [
                'label' => esc_html__('Special Package', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'xdevlabs'),
                'label_off' => esc_html__('No', 'xdevlabs'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => ['active_package_3' => 'yes'],
            ]
        );

        $this->add_control(
            'package_3_heading',
            [
                'label' => esc_html__('Heading', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Package 3', 'xdevlabs'),
                'placeholder' => esc_html__('Package name', 'xdevlabs'),
                'condition' => ['active_package_3' => 'yes'],
            ]
        );

        $this->add_control(
            'package_3_heading_color',
            [
                'label' => esc_html__('Heading Color', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'gradient-1',
                'options' => [
                    'gradient-1' => esc_html__('Gradient 01', 'xdevlabs'),
                    'gradient-2' => esc_html__('Gradient 02', 'xdevlabs'),
                    'gradient-3'  => esc_html__('Gradient 03', 'xdevlabs'),
                    'gradient-4' => esc_html__('Gradient 04', 'xdevlabs'),
                    'gradient-5' => esc_html__('Gradient 05', 'xdevlabs'),
                    'custom' => esc_html__('Custom', 'xdevlabs'),
                ],
                'condition' => ['active_package_3' => 'yes'],
            ]
        );

        $this->add_control(
            'package_3_heading_color_custom',
            [
                'label' => esc_html__('Heading Custom Color', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-section .pricing-section__item--3 .pricing-section__item--top h2' => 'color: {{VALUE}}',
                ],
                'condition' => ['active_package_3' => 'yes', 'package_3_heading_color' => 'custom'],
            ]
        );

        $this->add_control(
            'package_3_description',
            [
                'label' => esc_html__('Description', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Description', 'xdevlabs'),
                'placeholder' => esc_html__('Description', 'xdevlabs'),
                'condition' => ['active_package_3' => 'yes'],
            ]
        );

        $this->add_control(
            'package_3_comming_soon',
            [
                'label' => esc_html__('Comming soon', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'xdevlabs'),
                'label_off' => esc_html__('No', 'xdevlabs'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => ['active_package_3' => 'yes'],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'package_3_comming_soon_text',
            [
                'label' => esc_html__('Comming Soon Text', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Comming soon', 'xdevlabs'),
                'placeholder' => esc_html__('Comming soon text', 'xdevlabs'),
                'condition' => ['active_package_3' => 'yes', 'package_3_comming_soon' => 'yes'],
            ]
        );

        $this->add_control(
            'package_3_monthly_price',
            [
                'label' => esc_html__('Monthly price', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 9999,
                'step' => 1,
                'default' => 200,
                'condition' => ['active_package_3' => 'yes', 'package_3_comming_soon' => ''],
            ]
        );

        $this->add_control(
            'package_3_annually_price',
            [
                'label' => esc_html__('Annually price', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 9999,
                'step' => 1,
                'default' => 200,
                'condition' => ['active_package_3' => 'yes', 'package_3_comming_soon' => ''],
            ]
        );

        $this->add_control(
            'package_3_annually_price_sale',
            [
                'label' => esc_html__('Annually price sale', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 9999,
                'step' => 1,
                'default' => 200,
                'condition' => ['active_package_3' => 'yes', 'package_3_comming_soon' => ''],
            ]
        );

        $this->add_control(
            'package_3_button_text',
            [
                'label' => esc_html__('Text', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Click here', 'xdevlabs'),
                'placeholder' => esc_html__('Text', 'xdevlabs'),
                'separator' => 'before',
                'condition' => ['active_package_3' => 'yes'],
            ]
        );

        $this->add_control(
            'package_3_button_link',
            [
                'label' => esc_html__('Link', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'xdevlabs'),
                'default' => [
                    'url' => '#',
                ],
                'condition' => ['active_package_3' => 'yes'],
            ]
        );

        $repeater_3 = new \Elementor\Repeater();

        $repeater_3->add_control(
            'package_3_title',
            [
                'label' => esc_html__('Title', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Title', 'xdevlabs'),
                'placeholder' => esc_html__('Title', 'xdevlabs'),
            ]
        );

        $repeater_3->add_control(
            'package_3_list',
            [
                'label' => esc_html__('Feature List (one feature per line)', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Feature List', 'xdevlabs'),
                'placeholder' => esc_html__('Feature List', 'xdevlabs'),
            ]
        );

        $this->add_control(
            'package_3_group',
            [
                'label' => __('Features', 'beond'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater_3->get_controls(),
                'title_field' => __('Features', 'beond'),
                'condition' => ['active_package_3' => 'yes'],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_package_4',
            [
                'label' => __('Package 4', 'xdevlabs'),
            ]
        );

        $this->add_control(
            'active_package_4',
            [
                'label' => esc_html__('Active', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'xdevlabs'),
                'label_off' => esc_html__('No', 'xdevlabs'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'special_package_4',
            [
                'label' => esc_html__('Special Package', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'xdevlabs'),
                'label_off' => esc_html__('No', 'xdevlabs'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => ['active_package_4' => 'yes'],
            ]
        );

        $this->add_control(
            'package_4_heading',
            [
                'label' => esc_html__('Heading', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Package 4', 'xdevlabs'),
                'placeholder' => esc_html__('Package name', 'xdevlabs'),
                'condition' => ['active_package_4' => 'yes'],
            ]
        );

        $this->add_control(
            'package_4_heading_color',
            [
                'label' => esc_html__('Heading Color', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'gradient-1',
                'options' => [
                    'gradient-1' => esc_html__('Gradient 01', 'xdevlabs'),
                    'gradient-2' => esc_html__('Gradient 02', 'xdevlabs'),
                    'gradient-3'  => esc_html__('Gradient 03', 'xdevlabs'),
                    'gradient-4' => esc_html__('Gradient 04', 'xdevlabs'),
                    'gradient-5' => esc_html__('Gradient 05', 'xdevlabs'),
                    'custom' => esc_html__('Custom', 'xdevlabs'),
                ],
                'condition' => ['active_package_4' => 'yes'],
            ]
        );

        $this->add_control(
            'package_4_heading_color_custom',
            [
                'label' => esc_html__('Heading Custom Color', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-section .pricing-section__item--4 .pricing-section__item--top h2' => 'color: {{VALUE}}',
                ],
                'condition' => ['active_package_4' => 'yes', 'package_4_heading_color' => 'custom'],
            ]
        );

        $this->add_control(
            'package_4_description',
            [
                'label' => esc_html__('Description', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Description', 'xdevlabs'),
                'placeholder' => esc_html__('Description', 'xdevlabs'),
                'condition' => ['active_package_4' => 'yes'],
            ]
        );

        $this->add_control(
            'package_4_comming_soon',
            [
                'label' => esc_html__('Comming soon', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'xdevlabs'),
                'label_off' => esc_html__('No', 'xdevlabs'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => ['active_package_4' => 'yes'],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'package_4_comming_soon_text',
            [
                'label' => esc_html__('Comming Soon Text', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Comming soon', 'xdevlabs'),
                'placeholder' => esc_html__('Comming soon text', 'xdevlabs'),
                'condition' => ['active_package_4' => 'yes', 'package_4_comming_soon' => 'yes'],
            ]
        );

        $this->add_control(
            'package_4_monthly_price',
            [
                'label' => esc_html__('Monthly price', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 9999,
                'step' => 1,
                'default' => 200,
                'condition' => ['active_package_4' => 'yes', 'package_4_comming_soon' => ''],
            ]
        );

        $this->add_control(
            'package_4_annually_price',
            [
                'label' => esc_html__('Annually price', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 9999,
                'step' => 1,
                'default' => 200,
                'condition' => ['active_package_4' => 'yes', 'package_4_comming_soon' => ''],
            ]
        );

        $this->add_control(
            'package_4_annually_price_sale',
            [
                'label' => esc_html__('Annually price sale', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 9999,
                'step' => 1,
                'default' => 200,
                'condition' => ['active_package_4' => 'yes', 'package_4_comming_soon' => ''],
            ]
        );

        $this->add_control(
            'package_4_button_text',
            [
                'label' => esc_html__('Text', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Click here', 'xdevlabs'),
                'placeholder' => esc_html__('Text', 'xdevlabs'),
                'separator' => 'before',
                'condition' => ['active_package_4' => 'yes'],
            ]
        );

        $this->add_control(
            'package_4_button_link',
            [
                'label' => esc_html__('Link', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'xdevlabs'),
                'default' => [
                    'url' => '#',
                ],
                'condition' => ['active_package_4' => 'yes'],
            ]
        );

        $repeater_4 = new \Elementor\Repeater();

        $repeater_4->add_control(
            'package_4_title',
            [
                'label' => esc_html__('Title', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Title', 'xdevlabs'),
                'placeholder' => esc_html__('Title', 'xdevlabs'),
            ]
        );

        $repeater_4->add_control(
            'package_4_list',
            [
                'label' => esc_html__('Feature List (one feature per line)', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Feature List', 'xdevlabs'),
                'placeholder' => esc_html__('Feature List', 'xdevlabs'),
            ]
        );

        $this->add_control(
            'package_4_group',
            [
                'label' => __('Features', 'beond'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater_4->get_controls(),
                'title_field' => __('Features', 'beond'),
                'condition' => ['active_package_4' => 'yes'],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>
        <section class="pricing-section">
            <?php if (isset($settings['show_renewal_option']) && $settings['show_renewal_option'] == 'yes') { ?>
                <div class="pricing-section__heading">
                    <?php echo isset($settings['renewal_option_1']) && $settings['renewal_option_1'] ? '<p class="pricing-section__option-1">' . $settings['renewal_option_1'] . '</p>' : ''; ?>
                    <div class="switch-wrap">
                        <label class="switch-wrap__inner">
                            <input type="checkbox" class="pricing-section-option">
                            <span class="switch-wrap__slider"></span>
                        </label>
                    </div>
                    <?php echo isset($settings['renewal_option_2']) && $settings['renewal_option_2'] ? '<p class="pricing-section__option-2">' . $settings['renewal_option_2'] . '</p>' : '';
                    if (isset($settings['save']) && $settings['save']) { ?>
                        <div class="pricing-section__save">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.1749 20.6535V6.68988M9.54994 5.85219C9.72281 5.89098 9.90498 5.84344 10.0294 5.71898C10.1539 5.59452 10.2014 5.41229 10.1627 5.23948C10.0075 4.6057 9.43596 2.48346 8.84909 1.89659C8.11793 1.16543 6.92793 1.16239 6.20039 1.88993C5.4729 2.61742 5.47584 3.80742 6.20705 4.53863C6.80352 5.1351 8.91618 5.69705 9.54994 5.85219ZM11.3245 5.23943C11.2857 5.4123 11.3333 5.59447 11.4577 5.71893C11.5822 5.84339 11.7644 5.89086 11.9372 5.85214C12.571 5.69699 14.6932 5.12545 15.2801 4.53858C16.0113 3.80742 16.0143 2.61742 15.2868 1.88988C14.5593 1.16239 13.3693 1.16533 12.6381 1.89654C12.0416 2.49301 11.4797 4.60567 11.3245 5.23943ZM2.09857 11.5772H19.9022C20.2878 11.5772 20.6004 11.2646 20.6004 10.879V7.38806C20.6004 7.00247 20.2878 6.68988 19.9022 6.68988H2.09857C1.71298 6.68988 1.40039 7.00247 1.40039 7.38806V10.879C1.40039 11.2646 1.71298 11.5772 2.09857 11.5772ZM18.8549 11.5772V19.9553C18.8549 20.3409 18.5423 20.6535 18.1568 20.6535H3.84403C3.45843 20.6535 3.14584 20.3409 3.14584 19.9553V11.5772H18.8549Z" stroke="#FF4747" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <?php esc_html_e('Save ', 'xdevlabs');
                            echo $settings['save'];
                            esc_html_e('%', 'xdevlabs'); ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <div class="pricing-section__list">
                <?php
                for ($i = 1; $i < 5; $i++) {
                    if (isset($settings['active_package_' . $i]) && $settings['active_package_' . $i] == 'yes') { ?>
                        <div class="pricing-section__item wow fadeInUp pricing-section__item--<?php echo $i; ?> <?php echo isset($settings['special_package_' . $i]) && $settings['special_package_' . $i] == 'yes' ? 'pricing-section__item--special' : ''; ?>">
                            <div class="pricing-section__item--top">
                                <h2 class="<?php echo $settings['package_' . $i . '_heading_color']; ?>"><?php echo $settings['package_' . $i . '_heading']; ?></h2>
                                <?php if (isset($settings['package_' . $i . '_comming_soon']) && $settings['package_' . $i . '_comming_soon'] == '') { ?>
                                    <div class="pricing-section__item--pricing monthly">
                                        <?php if (isset($settings['package_' . $i . '_monthly_price']) && $settings['package_' . $i . '_monthly_price'] > 0) {
                                            echo '<strong>$' . $settings['package_' . $i . '_monthly_price'] . '</strong>';
                                            esc_html_e( '/month', 'xdevlabs' );
                                        } else {
                                            echo '<strong>' . esc_html__( 'Free', 'xdevlabs' ) . '</strong>';
                                        } ?>
                                    </div>
                                    <div class="pricing-section__item--pricing annually">
                                        <?php if (isset($settings['package_' . $i . '_annually_price']) && $settings['package_' . $i . '_annually_price'] > 0) {
                                            echo '<strong>$' . $settings['package_' . $i . '_annually_price_sale'] . '</strong>';
                                            echo '<del>$' . $settings['package_' . $i . '_annually_price'] . '</del>';
                                            esc_html_e( '/year', 'xdevlabs' );
                                        } else {
                                            echo '<strong>' . esc_html__( 'Free', 'xdevlabs' ) . '</strong>';
                                        } ?>
                                    </div>
                                <?php }
                                echo isset($settings['package_' . $i . '_description']) && $settings['package_' . $i . '_description'] ? '<p class="pricing-section__item--decs">' . $settings['package_' . $i . '_description'] . '</p>' : '';
                                echo isset($settings['package_' . $i . '_comming_soon_text']) && $settings['package_' . $i . '_comming_soon_text'] ? '<p class="pricing-section__item--cs">' . $settings['package_' . $i . '_comming_soon_text'] . '</p>' : ''; ?>
                            </div>
                            <?php if (isset($settings['package_' . $i . '_group']) && $settings['package_' . $i . '_group']) { ?>
                                <div class="pricing-section__item--body">
                                    <?php foreach ($settings['package_' . $i . '_group'] as $key => $package) { ?>
                                        <?php echo '<h3 class="pricing-section__item--body-title">' . $package['package_' . $i . '_title'] . '</h3>';
                                        $paragraphs = explode("\n", $package['package_' . $i . '_list']);
                                        for ($j = 0; $j < count($paragraphs); $j++) {
                                            $paragraphs[$j] = '<li>' . $paragraphs[$j] . '</li>';
                                        }
                                        $content = implode('', $paragraphs);
                                        echo '<ul>';
                                        echo $content;
                                        echo '</ul>';
                                        if ($key < 1) { ?>
                                            <a href="#" class="pricing-section__toggle-content"><?php esc_html_e('Show all features', 'xdevlabs'); ?>
                                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.19922 1.4001L4.99922 4.6001L1.79922 1.4001" stroke="#4185EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                            <div class="pricing-section__item--content-mobile">
                                            <?php } ?>
                                        <?php } ?>
                                        <a href="#" class="pricing-section__toggle-content"><?php esc_html_e('Hide features', 'xdevlabs'); ?>
                                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.80078 4.5999L5.00078 1.3999L8.20078 4.5999" stroke="#4185EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                            </div>
                                </div>
                            <?php } ?>
                            <?php if (isset($settings['package_' . $i . '_button_text']) && $settings['package_' . $i . '_button_text']) { ?>
                                <div class="pricing-section__item--bottom">
                                    <a href="<?php echo $settings['package_' . $i . '_button_link']['url'] ? $settings['package_' . $i . '_button_link']['url'] : ''; ?>" class="elementor-xdevlabs-button elementor-xdevlabs-button--outline elementor-xdevlabs-button--md>" role="button" <?php echo $settings['package_' . $i . '_button_link']["is_external"] == 'on' ? 'target="_blank"' : ''; ?> <?php echo $settings['package_' . $i . '_button_link']["nofollow"] == 'on' ? 'rel="nofollow"' : ''; ?>>
                                        <span class="elementor-xdevlabs-button__inner">
                                            <?php echo isset($settings['package_' . $i . '_button_text']) && $settings['package_' . $i . '_button_text'] ? '<span class="elementor-xdevlabs-button__text">' . $settings['package_' . $i . '_button_text'] . '</span>' : ''; ?>
                                        </span>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                <?php }
                } ?>
            </div>
        </section>
<?php
    }

    protected function content_template()
    {
    }
}

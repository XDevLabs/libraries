<?php

class Xdevlabs_Button extends \Elementor\Widget_Base
{
    /**
     * Get button sizes.
     *
     * Retrieve an array of button sizes for the button widget.
     *
     * @since 3.4.0
     * @access public
     * @static
     *
     * @return array An array containing button sizes.
     */
    public static function get_button_sizes()
    {
        return [
            'xs' => esc_html__('Extra Small', 'xdevlabs'),
            'sm' => esc_html__('Small', 'xdevlabs'),
            'md' => esc_html__('Medium', 'xdevlabs'),
            'lg' => esc_html__('Large', 'xdevlabs'),
        ];
    }

    public function get_name()
    {
        return 'xdevlabs_button';
    }

    public function get_title()
    {
        return 'Xdevlabs Button';
    }

    public function get_icon()
    {
        return 'eicon-dual-button';
    }

    public function get_categories()
    {
        return ['xdevlabs-category'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_title',
            [
                'label' => __('Content', 'beond'),
            ]
        );

        $this->add_control(
            'button_type',
            [
                'label' => esc_html__('Type', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'primary',
                'options' => [
                    'primary' => esc_html__('Primary button', 'xdevlabs'),
                    'white' => esc_html__('White button', 'xdevlabs'),
                    'outline' => esc_html__('Outline button', 'xdevlabs'),
                    'ghost' => esc_html__('Ghost button', 'xdevlabs'),
                ],
                'prefix_class' => 'elementor-xdevlabs-button-',
            ]
        );

        $this->add_control(
            'color',
            [
                'label' => esc_html__('Color', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-xdevlabs-button--ghost' => 'color: {{VALUE}}',
                ],
                'condition' => ['button_type' => 'ghost'],
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => esc_html__('Text', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => esc_html__('Click here', 'xdevlabs'),
                'placeholder' => esc_html__('Text', 'xdevlabs'),
            ]
        );

        $this->add_control(
            'link',
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
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__('Alignment', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left'    => [
                        'title' => esc_html__('Left', 'xdevlabs'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'xdevlabs'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'xdevlabs'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'xdevlabs'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'prefix_class' => 'elementor%s-align-',
                'default' => 'left',
            ]
        );

        $this->add_control(
            'min_width',
            [
                'label' => esc_html__('Min Witdh', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-xdevlabs-button' => 'min-width: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'size',
            [
                'label' => esc_html__('Size', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'md',
                'options' => self::get_button_sizes(),
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'selected_icon',
            [
                'label' => esc_html__('Icon', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
                'skin' => 'inline',
                'label_block' => false,
                'icon_exclude_inline_options' => [],
            ]
        );

        $this->add_control(
            'icon_align',
            [
                'label' => esc_html__('Icon Position', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left' => esc_html__('Before', 'xdevlabs'),
                    'right' => esc_html__('After', 'xdevlabs'),
                ],
            ]
        );

        $this->add_control(
            'icon_indent',
            [
                'label' => esc_html__('Icon Spacing', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-xdevlabs-button .elementor-xdevlabs-button__icon--right' => 'margin-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .elementor-xdevlabs-button .elementor-xdevlabs-button__icon--left' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'text_padding',
            [
                'label' => esc_html__('Padding', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .elementor-xdevlabs-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>
        <a href="<?php echo $settings['link']['url'] ? $settings['link']['url'] : ''; ?>" class="elementor-xdevlabs-button elementor-xdevlabs-button--<?php echo $settings['button_type']; ?> elementor-xdevlabs-button--<?php echo $settings['size']; ?>" role="button" <?php echo $settings['link']["is_external"] == 'on' ? 'target="_blank"' : ''; ?> <?php echo $settings['link']["nofollow"] == 'on' ? 'rel="nofollow"' : ''; ?>>
            <span class="elementor-xdevlabs-button__inner">
                <?php if (isset($settings['selected_icon']['value']) && $settings['selected_icon']['value']) {
                    if ($settings['selected_icon']['library'] === 'svg') { ?>
                        <img src="<?php echo $settings['selected_icon']['value']['url']; ?>" alt="">
                    <?php } else { ?>
                        <span class="elementor-xdevlabs-button__icon elementor-xdevlabs-button__icon--<?php echo $settings['icon_align']; ?>">
                            <i class="<?php echo $settings['selected_icon']['value']; ?>" aria-hidden="true"></i>
                        </span>
                <?php }
                } ?>
                <?php echo isset($settings['text']) && $settings['text'] ? '<span class="elementor-xdevlabs-button__text">' . $settings['text'] . '</span>' : ''; ?>
            </span>
        </a>
<?php
    }

    protected function content_template()
    {
    }
}

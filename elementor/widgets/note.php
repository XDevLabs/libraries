<?php

class Xdevlabs_Note extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'xdevlabs_note';
    }

    public function get_title()
    {
        return 'Xdevlabs Note';
    }

    public function get_icon()
    {
        return 'eicon-notes';
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
			'color',
			[
				'label' => esc_html__( 'Border Style', 'xdevlabs' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'blue',
				'options' => [
					'blue' => esc_html__( 'Blue', 'xdevlabs' ),
					'orange' => esc_html__( 'Orange', 'xdevlabs' ),
					'red'  => esc_html__( 'Red', 'xdevlabs' ),
                    'custom'  => esc_html__( 'Custom', 'xdevlabs' ),
				],
			]
		);

        $this->add_control(
			'custom_color',
			[
				'label' => esc_html__( 'Custom Color', 'xdevlabs' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .note-section' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .note-section .note-section__icon' => 'border-color: {{VALUE}}; color: {{VALUE}}',
				],
                'condition' => ['color' => 'custom'],
			]
		);

        $this->add_control(
			'custom_background_color',
			[
				'label' => esc_html__( 'Custom Color', 'xdevlabs' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .note-section' => 'background: {{VALUE}}',
				],
                'condition' => ['color' => 'custom'],
			]
		);

        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-info',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'circle',
                        'info',
                        'square-full',
                    ],
                ],
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => esc_html__('Content', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Content', 'xdevlabs'),
                'placeholder' => esc_html__('Content', 'xdevlabs'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>
        <section class="note-section note-section--<?php echo $settings['color']; ?>">
            <?php if (isset($settings['icon']) && $settings['icon']) { ?>
                <div class="note-section__icon">
                    <?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?>
                </div>
            <?php } ?>
            <?php echo isset($settings['content']) && $settings['content'] ? '<div class="note-section__content">' . $settings['content'] . '</div>' : ''; ?>
        </section>
<?php
    }

    protected function content_template()
    {
    }
}

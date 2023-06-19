<?php

class Xdevlabs_Code extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'xdevlabs_code';
    }

    public function get_title()
    {
        return 'Xdevlabs Code';
    }

    public function get_icon()
    {
        return 'eicon-editor-code';
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
			'code',
			[
				'label' => esc_html__( 'Code', 'xdevlabs' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Content', 'xdevlabs' ),
				'placeholder' => esc_html__( 'Content', 'xdevlabs' ),
			]
		);

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>
        <section class="code-section">
            <?php echo isset($settings['code']) && $settings['code'] ? '<code>'. $settings['code'] .'</code>' : ''; ?>
        </section>
<?php
    }

    protected function content_template()
    {
    }
}

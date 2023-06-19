<?php

class Xdevlabs_Timeline extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'xdevlabs_timeline';
    }

    public function get_title()
    {
        return 'Xdevlabs Timeline';
    }

    public function get_icon()
    {
        return 'eicon-time-line';
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'color',
            [
                'label' => esc_html__('Color', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .timeline-section__item--body' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} {{CURRENT_ITEM}} .timeline-section__item--footer::before' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} {{CURRENT_ITEM}} .timeline-section__item--line span' => 'background: {{VALUE}}',
                    '{{WRAPPER}} {{CURRENT_ITEM}} .timeline-section__item--icon figure' => 'background: {{VALUE}}',
                ],
            ]
        );

        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'beond'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'label',
            [
                'label' => esc_html__('Label', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Label', 'xdevlabs'),
                'placeholder' => esc_html__('Label', 'xdevlabs'),
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'beond'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'content',
            [
                'label' => esc_html__('Content', 'beond'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('Content', 'beond'),
                'placeholder' => esc_html__('Content', 'beond'),
            ]
        );

        $this->add_control(
            'timeline',
            [
                'label' => __('Timeline', 'beond'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => __('Timeline', 'beond'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>
        <section class="timeline-section">
            <?php
            if (isset($settings['timeline'])) {
                foreach ($settings['timeline'] as $timeline) { ?>
                    <div class="timeline-section__item elementor-repeater-item-<?php echo $timeline['_id']; ?> wow fadeInUp">
                        <div class="timeline-section__item--body">
                            <?php if (isset($timeline['image']['url']) && $timeline['image']['url']) { ?>
                                <figure>
                                    <img src="<?php echo $timeline['image']['url']; ?>" alt="">
                                </figure>
                            <?php }
                            echo isset($timeline['content']) && $timeline['content'] ? '<div class="timeline-section__item--content">' . $timeline['content'] . '</div>' : ''; ?>
                        </div>
                        <div class="timeline-section__item--footer">
                            <div class="timeline-section__item--icon">
                                <div class="timeline-section__item--line"><span></span></div>
                                <?php if (isset($timeline['icon']['url']) && $timeline['icon']['url']) { ?>
                                    <figure>
                                        <img src="<?php echo $timeline['icon']['url']; ?>" alt="">
                                    </figure>
                                <?php } ?>
                            </div>
                            <?php echo isset($timeline['label']) && $timeline['label'] ? '<h3>' . $timeline['label'] . '</h3>' : ''; ?>
                        </div>
                    </div>
            <?php }
            } ?>
        </section>
<?php
    }

    protected function content_template()
    {
    }
}

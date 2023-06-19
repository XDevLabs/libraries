<?php

class Xdevlabs_Slider_Images extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'xdevlabs_slider_images';
    }

    public function get_title()
    {
        return 'Xdevlabs Slider Images';
    }

    public function get_icon()
    {
        return 'eicon-slider-push';
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'xdevlabs'),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'slider',
            [
                'label' => __('Slider', 'beond'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => __('Slider', 'beond'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>
        <section class="slider-image swiper">
            <div class="swiper-wrapper">
                <?php if (isset($settings['slider'])) {
                    foreach ($settings['slider'] as $key => $item) { ?>
                        <div class="swiper-slide slider-image__item <?php echo $key == 0 ? 'active' : ''; ?>">
                            <?php if (isset($item['image']['url'])) { ?>
                                <figure>
                                    <?php if (isset($item['link']['url']) && $item['link']['url']) { ?>
                                        <a href="<?php echo $item['link']['url']; ?>" role="button" <?php echo $item['link']["is_external"] == 'on' ? 'target="_blank"' : ''; ?> <?php echo $item['link']["nofollow"] == 'on' ? 'rel="nofollow"' : ''; ?>>
                                        <?php } ?>
                                        <img src="<?php echo $item['image']['url']; ?>" alt="">
                                        <?php echo isset($item['link']['url']) && $item['link']['url'] ? '</a>' : ''; ?>
                                </figure>
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

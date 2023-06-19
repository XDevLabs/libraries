<?php

class Xdevlabs_Post_Slider extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'xdevlabs_post_slider';
    }

    public function get_title()
    {
        return 'Xdevlabs Post Slider';
    }

    public function get_icon()
    {
        return 'eicon-post-slider';
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
                'label' => __('Content', 'xdevlabs'),
            ]
        );

        $this->add_control(
            'post_type',
            [
                'label' => esc_html__('Post type', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'post',
                'options' => [
                    'post' => esc_html__('Post', 'xdevlabs'),
                    'products' => esc_html__('Product', 'xdevlabs'),
                ],
            ]
        );

        $this->add_control(
            'limit',
            [
                'label' => __('Limit', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 100,
                'step' => 1,
                'default' => 3,
            ]
        );

        $this->add_control(
            'show_excerpt',
            [
                'label' => esc_html__('Show Excerpt', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xdevlabs'),
                'label_off' => esc_html__('Hide', 'xdevlabs'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'show_cats',
            [
                'label' => esc_html__('Show Categories', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xdevlabs'),
                'label_off' => esc_html__('Hide', 'xdevlabs'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'show_read_more',
            [
                'label' => esc_html__('Show Read More', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xdevlabs'),
                'label_off' => esc_html__('Hide', 'xdevlabs'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__('Style', 'xdevlabs'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'row',
                'options' => [
                    'row' => esc_html__('Row', 'xdevlabs'),
                    'grid' => esc_html__('Grid', 'xdevlabs'),
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $limit = $settings['limit'] ? $settings['limit'] : 3;
        $post_type = $settings['post_type'] ? $settings['post_type'] : 3;
        $total_posts = wp_count_posts('post', 'all')->publish;
        $show_excerpt = $settings['show_excerpt'] ? $settings['show_excerpt'] : 'no';
        $show_cats = $settings['show_cats'] ? $settings['show_cats'] : 'no';
        $show_read_more = $settings['show_read_more'] ? $settings['show_read_more'] : 'no';
        $style = $settings['style'] ? $settings['style'] : 'row'; ?>

        <section class="post-slider post-slider--<?php echo $style; ?>" data-page="1" data-limit="<?php echo $limit; ?>" data-total="<?php echo $total_posts; ?>" data-type="<?php echo $post_type; ?>" data-excerpt="<?php echo $show_excerpt; ?>" data-cats="<?php echo $show_cats; ?>" data-readmore="<?php echo $show_read_more; ?>">
            <?php
            $args = array(
                'post_status' => 'publish',
                'posts_per_page' => $limit,
            );

            $args['post_type'] = $post_type;

            $loop_post = new \WP_Query($args); ?>

            <?php if ($loop_post->have_posts()) {
                while ($loop_post->have_posts()) : $loop_post->the_post();
                    get_template_part('template-parts/content', 'list', array('show_excerpt' => $show_excerpt, 'show_cats' => $show_cats, 'show_read_more' => $show_read_more));
                endwhile;
                wp_reset_query();
            } ?>
        </section>
<?php
    }

    protected function content_template()
    {
    }
}

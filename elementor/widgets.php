<?php
require_once(__DIR__ . '/widgets/ajax.php');

function register_new_widgets($widgets_manager)
{
    require_once(__DIR__ . '/widgets/button.php');
    require_once(__DIR__ . '/widgets/slider-images.php');
    require_once(__DIR__ . '/widgets/post-list.php');
    require_once(__DIR__ . '/widgets/post-slider.php');
    require_once(__DIR__ . '/widgets/pricing.php');
    require_once(__DIR__ . '/widgets/code.php');
    require_once(__DIR__ . '/widgets/note.php');
    require_once(__DIR__ . '/widgets/timeline.php');

    $widgets_manager->register(new \Xdevlabs_Button());
    $widgets_manager->register(new \Xdevlabs_Slider_Images());
    $widgets_manager->register(new \Xdevlabs_Post_List());
    $widgets_manager->register(new \Xdevlabs_Post_Slider());
    $widgets_manager->register(new \Xdevlabs_Pricing());
    $widgets_manager->register(new \Xdevlabs_Code());
    $widgets_manager->register(new \Xdevlabs_Note());
    $widgets_manager->register(new \Xdevlabs_Timeline());
}
add_action('elementor/widgets/register', 'register_new_widgets');

function add_elementor_widget_categories($elements_manager)
{
    $elements_manager->add_category(
        'xdevlabs-category',
        [
            'title' => esc_html__('Xdevlabs', 'xdevlabs'),
            'icon' => 'fa fa-plug',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'add_elementor_widget_categories');

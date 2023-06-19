<?php
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

function load_more_posts()
{
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $limit = isset($_POST['limit']) ? $_POST['limit'] : 3;
    $post_type = isset($_POST['post_type']) ? $_POST['post_type'] : 'post';
    $show_excerpt = isset($_POST['show_excerpt']) ? $_POST['show_excerpt'] : 'no';
    $show_cats = isset($_POST['show_cats']) ? $_POST['show_cats'] : 'no';
    $show_read_more = isset($_POST['show_read_more']) ? $_POST['show_read_more'] : 'no';

    $args = array(
        'post_status' => 'publish',
        'posts_per_page' => $limit,
        'paged' => $page
    );

    $args['post_type'] = $post_type;

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/content', 'list', array('show_excerpt' => $show_excerpt, 'show_cats' => $show_cats, 'show_read_more' => $show_read_more));
        }
        wp_reset_query();
    }

    wp_die();
}

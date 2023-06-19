<?php
wp_enqueue_script('ajax-script', get_template_directory_uri() . '/assets/js/ajax.js', array('jquery'), _S_VERSION, true);
wp_localize_script('ajax-script', 'ajax_settings', array('ajax_url' => admin_url('admin-ajax.php')), 'before');

/**
 * Elementor 
 */
require get_template_directory() . '/elementor/widgets.php';
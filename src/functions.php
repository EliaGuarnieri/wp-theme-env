<?php
add_action('wp_enqueue_scripts', 'wordpress_theme_enqueue_styles');

function wordpress_theme_enqueue_styles() {
  wp_enqueue_style(
    'wordpress-theme-style',
    get_parent_theme_file_uri('assets/css/style.min.css'),
    array(),
    wp_get_theme()->get('Version'),
    'all'
  );
}

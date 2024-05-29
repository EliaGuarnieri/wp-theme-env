<?php

add_action('wp_enqueue_scripts', 'wordpress_theme_enqueue_styles');
function wordpress_theme_enqueue_styles() {
  if (defined('IS_VITE_DEVELOPMENT') && IS_VITE_DEVELOPMENT === true) {

    add_action('wp_head', 'load_vite_head_module');
    function load_vite_head_module() {
      echo '<script type="module" src="http://localhost:5173/@vite/client"></script>';
      echo '<script type="module" src="http://localhost:5173/src/assets/js/main.js"></script>';
    }
  } else {
    $manifest = json_decode(file_get_contents(get_parent_theme_file_path('assets/manifest.json')), true);

    if (is_array($manifest)) {
      $manifest_key = array_keys($manifest);

      if (isset($manifest_key[0])) {
        foreach (@$manifest[$manifest_key[0]]['css'] as $css_file) {
          wp_enqueue_style(
            'wordpress-theme-style',
            get_parent_theme_file_uri('assets/' . $css_file),
            array(),
            wp_get_theme()->get('Version'),
            'all'
          );
        }

        $js_files = @$manifest[$manifest_key[0]]['file'];
        if (!empty($js_files)) {
          wp_enqueue_script(
            'wordpress-theme-script',
            get_parent_theme_file_uri('assets/' . $js_files),
            array(),
            wp_get_theme()->get('Version'),
            true
          );
        }
      }
    }
  }
}

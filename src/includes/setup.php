<?php
if (!file_exists($composer = THEME_PATH . '/vendor/autoload.php')) {
  wp_die(__('Error locating autoloader. Please run <code>\'composer install\'</code>.', 'theme'));
}

require $composer;

add_action('init', 'theme', 1);
if (!function_exists('theme')) {
  function theme(): Root\Classes\App {
    return Root\Classes\App::get();
  }
}

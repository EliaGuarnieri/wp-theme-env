<?php

namespace Root\Classes\Core;

class Config {
  private array $config = [];

  public function __construct() {
    $this->config = [
      'env' => [
        'type' => wp_get_environment_type(),
        'mode' => false === strpos(THEME_PATH, ABSPATH . 'wp-content/plugins') ? 'theme' : 'plugin',
      ],
      'hmr' => [
        'uri' => THEME_HMR_HOST,
        'client' => THEME_HMR_URI . '/@vite/client',
        'sources' => THEME_HMR_URI,
        'active' => wp_get_environment_type() === 'development' && !is_wp_error(wp_remote_get('http://host.docker.internal:5173')),
      ],
      'manifest' => [
        'path' => THEME_PATH . '/assets/manifest.json'
      ],
    ];
  }

  public function get(string $key): mixed {
    $value = $this->config;

    foreach (explode('.', $key) as $key) {
      if (isset($value[$key])) {
        $value = $value[$key];
      } else {
        return null;
      }
    }

    return $value;
  }
}

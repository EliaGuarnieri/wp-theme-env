<?php

namespace Root\Classes\Assets;

use Root\Classes\Assets\Resolver;

class Assets {
  use Resolver;
  /**
   * @action wp_enqueue_scripts
   */
  public function front(): void {
    $this->load();
    wp_enqueue_style('theme', $this->resolve('css'), [], wp_get_theme()->get('Version'));
    wp_enqueue_script('theme', $this->resolve('js'), [], wp_get_theme()->get('Version'), true);
  }
}

<?php

namespace Root\Classes\Integrations;

use Root\Classes\Integrations\Vite;

class Integrations {
  /**
   * @action init
   */
  public function init(): void {
    if (wp_get_environment_type() === 'development' && !theme()->config()->get('hmr.active')) {
      wp_die('HMR is not active. Please run <code>\'pnpm dev\'</code> to start the development server.', 'theme');
    }
    if (theme()->config()->get('hmr.active')) {
      \Root\Classes\App::init(new Vite());
    }
  }
}

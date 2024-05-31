<?php

namespace Root\Classes\Integrations;

class Vite {
  /**
   * @action wp_head 1
   */
  public function client(): void {
    echo '<script type="module" src="' . theme()->config()->get('hmr.client') . '"></script>';
  }

  /**
   * @filter theme/assets/resolver/url 1 2
   */
  public function url(string $url, string $path): string {
    return theme()->config()->get('hmr.sources') . "/{$path}";
  }
}

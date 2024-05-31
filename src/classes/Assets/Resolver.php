<?php

namespace Root\Classes\Assets;

trait Resolver {
  private array $manifest = [];

  /**
   * @action wp_enqueue_scripts
   */
  public function load(): void {
    $path = theme()->config()->get('manifest.path');
    if (empty($path) || !file_exists($path)) {
      wp_die(__("Run <code>pnpm build</code> in project root to generate the manifest file.", 'theme'), 500);
    }

    $this->manifest = json_decode(file_get_contents($path), true);
  }

  /**
   * @filter script_loader_tag
   */
  public function module(string $tag, string $handle, string $url): string {
    if ((false !== strpos($url, THEME_HMR_HOST)) || (false !== strpos($url, THEME_ASSETS_URI))) {
      $tag = str_replace('<script ', '<script type="module" ', $tag);
    }

    return $tag;
  }

  public function resolve(string $path): string {
    $url = '';
    $manifest_key = array_keys($this->manifest)[0];
    $src = $this->manifest[$manifest_key]['src'];

    if ('css' === $path && !empty($this->manifest[$manifest_key][$path])) {
      foreach ($this->manifest[$manifest_key][$path] as $css_file) {
        $url = THEME_ASSETS_URI . "/{$css_file}";
      }
    }

    if ('js' === $path && !empty($this->manifest[$manifest_key]['file'])) {
      $url = THEME_ASSETS_URI . "/{$this->manifest[$manifest_key]['file']}";
    }

    return apply_filters('theme/assets/resolver/url', $url, $src);
  }
}

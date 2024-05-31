<?php

namespace Root\Classes;

use Root\Classes\Assets\Assets;
use Root\Classes\Core\Config;
use Root\Classes\Integrations\Integrations;

class App {
  private Assets $assets;
  private Config $config;
  private Integrations $integrations;
  private static ?App $instance = null;

  private function __construct() {
    $this->assets = self::init(new Assets());
    $this->config = self::init(new Config());
    $this->integrations = self::init(new Integrations());
  }

  public function assets(): Assets {
    return $this->assets;
  }

  public function config(): Config {
    return $this->config;
  }

  public function integrations(): Integrations {
    return $this->integrations;
  }

  public static function get(): App {
    if (empty(self::$instance)) {
      self::$instance = new App();
    }

    return self::$instance;
  }

  public static function init(object $module): object {
    return Core\Hooks::init($module);
  }
}

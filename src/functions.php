<?php
define('THEME_ROOT', str_replace(ABSPATH, '/', dirname(__FILE__)));
define('THEME_PATH', dirname(__FILE__));
define('THEME_URI', home_url(THEME_ROOT));
define('THEME_HMR_HOST', 'http://localhost:5173');
define('THEME_HMR_URI', THEME_HMR_HOST);
define('THEME_ASSETS_PATH', THEME_PATH . '/assets');
define('THEME_ASSETS_URI', THEME_URI . '/assets');

require_once(THEME_PATH . '/includes/setup.php');

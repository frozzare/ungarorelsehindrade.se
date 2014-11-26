<?php

/**
 * Map environments.
 */

$hostname = strtolower(gethostname());

switch ($hostname) {
  case 'prod':
    define('WP_ENV', 'production');
    break;
  case 'stage':
    define('WP_ENV', 'stage');
    break;
  default:
    define('WP_ENV', 'development');
    break;
}

/**
 * Load right environment.
 */

$env_config = dirname(__FILE__) . '/environments/' . WP_ENV . '.php';

if (file_exists($env_config)) {
  require_once $env_config;
}
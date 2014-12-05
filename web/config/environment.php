<?php

/**
 * Load right environment.
 */

if ($_SERVER["HTTP_HOST"] === 'ungarorelsehindrade.se') {
  $env_config = dirname(__FILE__) . '/environments/' . 'production.php';
} else if ($_SERVER["HTTP_HOST"] === 'dev.ungarorelsehindrade.se') {
  $env_config = dirname(__FILE__) . '/environments/' . 'staging.php';
} else{
  $env_config = dirname(__FILE__) . '/environments/' . 'development.php';
}

if (file_exists($env_config)) {
  require_once $env_config;
}

<?php

/**
 * Plugin Name: Unga Rörelsehindrade
 * Description: Useful stuff for ungarorelsehindrade.se
 * Author: Johnie Hjelm
 * Version: 1.0.0
 * Author URI: http://johnie.se/
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * All plugins in the right order to load.
 * ".php" isn't required to add.
 *
 * "timber" will load "timber/timber.php"
 * "timber.php" will load "timber/timber.php"
 * "path/to/plugin.php" will load "path/to/plugin.php"
 */

$plugins   = array(
	'ungarh'
);

$base_path = dirname( __FILE__ );

foreach ( $plugins as $plugin ) {
	if ( strpos( $plugin, '/' ) === false ) {
		$plugin .= '/' . $plugin;
	}

	if ( substr( strrchr( $plugin, '.' ), 1 ) !== 'php' ) {
		$plugin .= '.php';
	}

	require_once $base_path . '/' . $plugin;
}

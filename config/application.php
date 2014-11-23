<?php

$root_dir = dirname( dirname( __FILE__ ) ) . '/web';

/**
 * Load right environment if we don't is in the unit test environment
 */

if ( ! defined( 'UNIT_TEST_ENVIRONMENT' ) ) {
	require_once 'environment.php';
}

/**
 * Custom Content Directory
 */

define( 'CONTENT_DIR', '/' );
define( 'WP_CONTENT_DIR', $root_dir . CONTENT_DIR );
define( 'WP_CONTENT_URL', WP_HOME . CONTENT_DIR );

/**
 * Database settings
 */

if ( ! defined( 'UNIT_TEST_ENVIRONMENT' ) ) {
	define( 'DB_CHARSET', 'utf8' );
	define( 'DB_COLLATE', '' );
	$table_prefix = 'wp_';
}

/**
 * WordPress Localized Language
 * Default: English
 *
 * A corresponding MO file for the chosen language must be installed to app/languages
 */

define( 'WPLANG', '' );

/**
 * Custom Settings
 */

define( 'AUTOMATIC_UPDATER_DISABLED', true );
define( 'DISALLOW_FILE_EDIT', true );
define( 'FS_METHOD', 'direct' );

// WordPress unit test suite has this definiton in the bootstrap.
// This will prevent php notice about that.
if ( ! defined( 'UNIT_TEST_ENVIRONMENT' ) ) {
	define( 'DISABLE_WP_CRON', true );
}

/**
 * Plugins directory settings.
 */

$plugins_path = 'vendor/plugins';
define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . $plugins_path );
define( 'WP_PLUGIN_URL', WP_HOME . '/' . $plugins_path );
define( 'PLUGINDIR', WP_CONTENT_DIR . $plugins_path );

/**
 * MU-Plugins directory settings.
 */

$muplugins_path = 'lib';
define( 'WPMU_PLUGIN_DIR', WP_CONTENT_DIR . $muplugins_path );
define( 'WPMU_PLUGIN_URL', WP_HOME . '/' . $muplugins_path );

/**
 * Bootstrap WordPress
 */

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', $root_dir . '/wp/' );
}
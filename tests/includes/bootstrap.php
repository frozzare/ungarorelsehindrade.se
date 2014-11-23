<?php

/**
 * ungarh test bootstrap file.
 *
 * Don't edit this file if you should load plugins and so, use loader.php instead.
 *
 * @version 1.0.0
 */

// Define the wp tests phpunit includes directory.
define( 'WP_TESTS_PHPUNIT_INCLUDES_DIR', dirname( dirname( __FILE__ ) ) . '/wp/tests/phpunit/includes' );

// Globalize some variables. See https://github.com/sebastianbergmann/phpunit/issues/325
global $wpdb, $current_site, $current_blog, $wp_rewrite, $shortcode_tags, $wp, $phpmailer;

// Load WordPress tests configuration.
$config_file_path = dirname( dirname( __FILE__ ) ) . '/wp/wp-tests-config.php';
require_once( $config_file_path );

// Add tests table prefix definition if not defined.
if ( ! defined( 'WP_TESTS_TABLE_PREFIX' ) ) {
	define( 'WP_TESTS_TABLE_PREFIX', $table_prefix );
}

// Disable know bugs if not disabled.
if ( ! defined( 'WP_TESTS_FORCE_KNOWN_BUGS' ) ) {
	define( 'WP_TESTS_FORCE_KNOWN_BUGS', false );
}

// Disable wp cron if not disabled.
if ( ! defined( 'DISABLE_WP_CRON' ) ) {
	define( 'DISABLE_WP_CRON', true );
}

// Define memory limit.
define( 'WP_MEMORY_LIMIT', - 1 );
define( 'WP_MAX_MEMORY_LIMIT', - 1 );

// Setup server array properties and php self
$_SERVER['SERVER_PROTOCOL'] = 'HTTP/1.1';
$_SERVER['HTTP_HOST']       = WP_TESTS_DOMAIN;
$PHP_SELF                   = $GLOBALS['PHP_SELF'] = $_SERVER['PHP_SELF'] = '/index.php';

// Check if we are running as multisites or not.
$multisite = boolval( getenv( 'WP_MULTISITE' ) == '1' || ( defined( 'WP_TESTS_MULTISITE' ) && WP_TESTS_MULTISITE ) );

// Override the PHPMailer
require_once( WP_TESTS_PHPUNIT_INCLUDES_DIR . '/mock-mailer.php' );
$phpmailer = new MockPHPMailer();

// Run WordPress installation
system( WP_PHP_BINARY . ' ' . escapeshellarg( WP_TESTS_PHPUNIT_INCLUDES_DIR . '/install.php' ) . ' ' . escapeshellarg( $config_file_path ) . ' ' . $multisite );

// Setup Multisites if activated.
if ( $multisite ) {
	echo "Running as multisite..." . PHP_EOL;
	define( 'MULTISITE', true );
	define( 'SUBDOMAIN_INSTALL', false );
	$GLOBALS['base'] = '/';
} else {
	echo "Running as single site... To run multisite, use -c tests/phpunit/multisite.xml" . PHP_EOL;
}
unset( $multisite );

require_once( WP_TESTS_PHPUNIT_INCLUDES_DIR . '/functions.php' );

// Load ungarh custom loader that needs to run before we are loading WordPress.
if ( file_exists( dirname( __FILE__ ) . '/loader.php' ) ) {
	require_once( dirname( __FILE__ ) . '/loader.php' );
}

// Load WordPress
require_once( ABSPATH . '/wp-settings.php' );

// Delete any default posts & related data
_delete_all_posts();

require( WP_TESTS_PHPUNIT_INCLUDES_DIR . '/testcase.php' );
require( WP_TESTS_PHPUNIT_INCLUDES_DIR . '/testcase-xmlrpc.php' );
require( WP_TESTS_PHPUNIT_INCLUDES_DIR . '/testcase-ajax.php' );
require( WP_TESTS_PHPUNIT_INCLUDES_DIR . '/exceptions.php' );
require( WP_TESTS_PHPUNIT_INCLUDES_DIR . '/utils.php' );
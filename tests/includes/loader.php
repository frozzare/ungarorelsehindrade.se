<?php

/**
 * Load plugins or other stuff thats needed before WordPress is loaded.
 *
 * @version 1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load plugin manually as must use plugins before WordPress is loaded.
 *
 * @since 1.0.0
 */

function _ungarh_manually_load_plugin() {
	// require_once ...
}

tests_add_filter( 'muplugins_loaded', '_ungarh_manually_load_plugin' );
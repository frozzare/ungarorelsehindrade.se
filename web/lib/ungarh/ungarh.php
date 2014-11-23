<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load files in directory.
 *
 * @param string $root
 * @param array $exlude
 * @since 1.0.0
 */

function ungarh_load_files( $root, $exlude = array() ) {
	$dir   = @opendir( $root );
	$files = array();

	while ( ( $file = readdir( $dir ) ) !== false ) {
		if ( substr( $file, 0, 1 ) == '.' ) {
			continue;
		}

		if ( is_file( dirname( __FILE__ ) . '/' . $file ) && ! in_array( $file, $exlude ) ) {
			$files[] = $file;
		}
	}

	foreach ( $files as $file ) {
		require_once $file;
	}
}

// Load all directories in this directory.
ungarh_load_files( dirname( __FILE__ ), array( 'ungarh.php' ) );
<?php

/**
 * ungarh helpers functions.
 * All functions is available globally.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Is the current page the given $post_type?
 *
 * @param int $id Default is `get_the_id` value.
 * @param string $post_type
 * @since 1.0.0
 *
 * @return bool True if post_type match false otherwise.
 */

function urh_is_post_stype( $id = 0, $post_type ) {
	if ( ! is_numeric( $id ) ) {
		$post_type = $id;
		$id        = get_the_id();
	}

	return $post_type === get_post_type( $id );
}

/**
 * Check if request method is the same as the given method.
 *
 * @param string $method
 * @since 1.0.0
 *
 * @return bool True if method match false otherwise.
 */

function urh_is_method( $method ) {
	return $_SERVER ['REQUEST_METHOD'] == strtoupper( $method );
}

/**
 * Remove trailing dobule quote.
 * PHP's $_POST object adds this automatic.
 *
 * @param string $str The string to check.
 * @since 1.0.0
 *
 * @return string
 */

function urh_remove_trailing_quotes( $str ) {
	return str_replace( "\'", "'", str_replace( '\"', '"', $str ) );
}

/**
 * Get current url.
 *
 * @param bool $parse Parse the url with `parse_url` and return object.
 * @since 1.0.0
 *
 * @return string|object
 */

function urh_current_url( $parse = false ) {
	$url = home_url();
	$url = rtrim( $url, '/' );

	$url = $url . $_SERVER['REQUEST_URI'];

	if ( $parse ) {
		$parsed = parse_url( $url );

		if ( $parsed === false ) {
			$parsed = array();
		}

		return (object) $parsed;
	}

	return $url;
}

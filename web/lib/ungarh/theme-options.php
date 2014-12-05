<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Save theme options on post.
if ( urh_is_method( 'post' ) ) {
	_urh_save_theme_options();
}

/**
 * Get theme options prefix.
 *
 * @return string
 */

function _urh_get_theme_options_prefix() {
	return 'urh_theme_option_';
}

/**
 * Add theme options menu.
 */

function _urh_options_appearance_menu() {
  add_theme_page( __( 'Inställningar', 'urh' ), __( 'Inställningar', 'urh' ), 'manage_options', 'urh-theme-options', '_urh_render_theme_options' );
}

add_action( 'admin_menu', '_urh_options_appearance_menu' );

/**
 * Render the theme options view.
 */

function _urh_render_theme_options() {
	include_once dirname( __FILE__ ) . '/views/theme-options.php';
}

/**
 * Save theme options data.
 */

function _urh_save_theme_options() {
	$pattern = '/^' . str_replace( '_', '\_', _urh_get_theme_options_prefix() ) . '.*/';
	$data    = array();
	$keys    = preg_grep( $pattern, array_keys( $_POST ) );

	foreach ( $keys as $key ) {
		if ( ! isset( $_POST[ $key ] ) ) {
			continue;
		}

		// Fix for input fields that should be true or false.
		if ( $_POST[ $key ] === 'on' ) {
			$data[ $key ] = true;
		} else {
			$data[ $key ] = urh_remove_trailing_quotes( $_POST[ $key ] );
		}
	}

	foreach ( $data as $key => $value ) {
		add_option( $key, $value );
	}
}

/**
 * Get theme option value.
 *
 * @param string $key
 * @param mixed $default
 *
 * @return mixed
 */

function urh_get_theme_option( $key, $default ) {
	$prefix = _urh_get_theme_options_prefix();
	return get_option( $prefix . $key, $default );
}

/**
 * Update theme option.
 *
 * @param string $key
 * @param mixed $value
 */

function urh_update_theme_option( $key, $value ) {
	$prefix = _urh_get_theme_options_prefix();
	update_option( $prefix . $key, $vallue );
}

<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Change login error message.
 *
 * @param $content
 * @since 1.0.0
 *
 * @return string
 */

function ungarh_change_login_errors( $content ) {
	// Fixes so you can't guess the username.
	return "<strong><?php _e('ERROR', 'ungarh'); ?></strong><?php _e('You have entered incorrect login details', 'ungarh'); ?>";
}

add_filter( 'login_errors', 'ungarh_change_login_errors' );

/**
 * Shortcut function for WordPress site title.
 */

function ungarh_title() {
	bloginfo( 'name' ) ?> | <?php is_home() ? bloginfo( 'description' ) : wp_title( '|', true, 'right' );
}

/**
 * Change the upload path.
 *
 * @since 1.0.0
 *
 * @return string
 */

function ungarh_upload_path() {
	return WP_CONTENT_DIR . 'assets/uploads';
}

add_filter( 'option_upload_path', 'ungarh_upload_path' );

/**
 * Change the upload url path.
 *
 * @since 1.0.0
 *
 * @return string
 */

function ungarh_upload_url_path() {
	return WP_CONTENT_URL . 'assets/uploads';
}

add_filter( 'option_upload_url_path', 'ungarh_upload_url_path' );
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Change theme root.
 *
 * @since 1.0.0
 *
 * @return string
 */

function ungarh_change_theme_root() {
	return apply_filters( 'ungarh_change_theme_root', ABSPATH . '..' );
}

add_filter( 'theme_root', 'ungarh_change_theme_root' );

/**
 * Change theme root uri.
 *
 * @since 1.0.0
 *
 * @return string
 */

function ungarh_change_theme_uri() {
	return apply_filters( 'ungarh_change_theme_uri', home_url() );
}

add_filter( 'theme_root_uri', 'ungarh_change_theme_uri' );

/**
 * Change theme to the app directory theme.
 *
 * @since 1.0.0
 *
 * @return string
 */

function ungarh_change_theme() {
	return apply_filters( 'ungarh_change_theme', 'controllers' );
}

add_filter( 'template', 'ungarh_change_theme' );
add_filter( 'option_template', 'ungarh_change_theme' );
add_filter( 'option_stylesheet', 'ungarh_change_theme' );
add_filter( 'stylesheet', 'ungarh_change_theme' );

/**
 * Hide themes menu for all users.
 *
 * @since 1.0.0
 */

function ungarh_hide_themes_menu() {
	remove_submenu_page( 'themes.php', 'themes.php' );
	remove_submenu_page( 'themes.php', 'theme-editor.php' );
	remove_submenu_page( 'themes.php', 'theme_options' );
}

add_action( 'admin_menu', 'ungarh_hide_themes_menu' );
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Clean up wp_head()
 *
 * @since 1.0.0
 *
 */

function ungarh_cleanup() {
	remove_action( 'wp_head', 'feed_linetta_extra', 3 );
	remove_action( 'wp_head', 'feed_linetta', 2 );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
	remove_action( 'wp_head', 'wp_generator' );
}

add_action( 'init', 'ungarh_cleanup' );

/**
 * Clean search url.
 *
 * @param array $query_vars
 * @since 1.0.0
 *
 * @link http://wordpress.org/support/topic/blank-search-sends-you-to-the-homepage#post-1772565
 * @link http://core.trac.wordpress.org/ticket/11330
 *
 * @return array
 */

function ungarh_clean_search_url( $query_vars ) {
	if ( isset( $_GET['s'] ) && empty( $_GET['s'] ) && ! is_admin() ) {
		$query_vars['s'] = ' ';
	}

	return $query_vars;
}

add_action( 'request', 'ungarh_clean_search_url' );

/**
 * Remove WordPress rss version.
 *
 * @since 1.0.0
 *
 * @return string
 */

function ungarh_remove_wp_version() {
	return '';
}

add_filter( 'the_generator', 'ungarh_remove_wp_version' );

/**
 * Remove unnecessary dashboard widgets.
 * Uncomment "remove_meta_box ..." line to show the widget again.
 *
 * @since 1.0.0
 *
 * @link http://www.deluxeblogtips.com/2011/01/remove-dashboard-widgets-in-wordpress.html
 */

function ungarh_remove_dashboard_widgets() {
	// Right now widget.
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );

	// Recent comments widget.
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );

	// Incoming links widget.
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );

	// Plugins widget.
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );

	// Primary widget.
	remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );

	// Secondary wiget.
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );

	// Quick press widget.
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'normal' );

	// Recent drafts widget.
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'normal' );

	// Activity widget.
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
}

add_action( 'admin_init', 'ungarh_remove_dashboard_widgets' );
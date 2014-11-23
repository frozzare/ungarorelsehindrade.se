<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add a location to Timber that contains twig files.
Timber::$locations = array( WP_CONTENT_DIR . 'views/' );
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$context         = Timber::get_context();
$post            = new TimberPost();
$context['post'] = $post;

Timber::render( array(
	'page-' . $post->post_name . '.twig',
	'page.twig'
), $context );
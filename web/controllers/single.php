<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$context         = Timber::get_context();
$post            = Timber::query_post();
$context['post'] = $post;
$context['wp_title'] .= ' - ' . $post->title();
$context['comment_form'] = TimberHelper::get_comment_form();

Timber::render( array(
	'single-' . $post->ID . '.twig',
	'single-' . $post->post_type . '.twig',
	'single.twig'
), $context );
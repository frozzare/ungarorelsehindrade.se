<?php
/*
Template Name: Startsida
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

$context         = Timber::get_context();
$post            = new TimberPost();
$context['post'] = $post;

Timber::render( array(
  'front-page-' . $post->post_name . '.twig',
  'front-page.twig'
), $context );

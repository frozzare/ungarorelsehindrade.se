<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$context        = Timber::get_context();
$context['foo'] = 'Bar!';

Timber::render( 'index.twig', $context );
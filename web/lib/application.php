<?php


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Set timezone.
 */

date_default_timezone_set( 'Europe/Stockholm' );

/**
 * Set up the content width value based on the theme's design.
 */

if ( ! isset( $content_width ) ) {
  $content_width = 1200;
}

/**
 * Register menus
 */
add_action( 'after_setup_theme', 'register_my_menus' );
function register_my_menus() {
  register_nav_menus( array(
    'primary' => 'Primary Menu',
    'footer_menu' => 'Footer Menu',
    'for_ungdom' => 'För Ungdom',
    'for_politiker' => 'För Politiker',
    'for_journalister' => 'För Journalister'
  ));
}

/**
 * Setup the site.
 */
function site_setup() {
    // Setup language.
    $domain = 'ungarh';
    $path   = get_template_directory() . '/languages/' . $domain . '-' . get_locale() . '.mo';
    load_textdomain( $domain, $path );

    // Add support for post thumbnails.
    add_theme_support( 'post-thumbnails' );

    // Add post formats.
    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio' ) );

    // Don't use the default gallery style.
    add_filter( 'use_default_gallery_style', '__return_false' );

}

add_action( 'after_theme_setup', 'site_setup' );

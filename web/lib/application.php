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
	$content_width = 1024;
}

/**
* New StarterSite
*/
class StarterSite extends TimberSite
{

  function __construct() {
    // Add support for post thumbnails.
    add_theme_support( 'post-thumbnails' );

    // Add post formats.
    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio' ) );

    // Add support for menus
    add_theme_support( 'menus' );

    // Timber context filter
    add_filter( 'timber_context', array($this, 'add_to_context') );

    // Get Twig filter
    add_filter('get_twig', array($this, 'add_to_twig'));

    // Init post types and taxonomies
    add_action('init', array($this, 'register_post_types'));
    add_action('init', array($this, 'register_taxonomies'));

    // Init
    parent::__construct();
  }

  function register_post_types() {
    //this is where you can register custom post types
  }

  function register_taxonomies(){
    //this is where you can register custom taxonomies
  }

  function add_to_context($context){
    $context['johnie'] = 'Johnie Hjelm';
    $context['cred'] = 'Designed & Developed by';
    $context['menu'] = new TimberMenu();
    $context['site'] = $this;
    return $context;
  }

  function add_to_twig($twig){
    /* this is where you can add your own fuctions to twig */
    $twig->addExtension(new Twig_Extension_StringLoader());
    $twig->addFilter('myfoo', new Twig_Filter_Function('myfoo'));
    return $twig;
  }
}

/**
 * Setup the site.
 */
function site_setup() {
	// Setup language.
	$domain = 'ungarh';
	$path   = get_template_directory() . '/languages/' . $domain . '-' . get_locale() . '.mo';
	load_textdomain( $domain, $path );

	// Don't use the default gallery style.
	add_filter( 'use_default_gallery_style', '__return_false' );

  new StarterSite();
}

add_action( 'after_theme_setup', 'site_setup' );

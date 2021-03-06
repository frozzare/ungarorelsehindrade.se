<?php
/**
 * Enable theme features
 */
add_theme_support('soil-clean-up');         // Enable clean up from Soil
add_theme_support('soil-relative-urls');    // Enable relative URLs from Soil
add_theme_support('soil-nice-search');      // Enable /?s= to /search/ redirect from Soil
add_theme_support('bootstrap-gallery');     // Enable Bootstrap's thumbnails component on [gallery]
add_theme_support('jquery-cdn');            // Enable to load jQuery from the Google CDN

/**
 * Configuration values
 */
define('GOOGLE_ANALYTICS_ID', ''); // UA-XXXXX-Y (Note: Universal Analytics only, not Classic Analytics)

if (!defined('WP_ENV')) {
  define('WP_ENV', 'production');  // scripts.php checks for values 'production' or 'development'
}

/**
 * Add body class if sidebar is active
 */
function ungarh_sidebar_body_class($classes) {
  if (ungarh_display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }
  return $classes;
}
add_filter('body_class', 'ungarh_sidebar_body_class');

/**
 * Define which pages shouldn't have the sidebar
 *
 * See lib/sidebar.php for more details
 */
function ungarh_display_sidebar() {
  static $display;

  if (!isset($display)) {
    $sidebar_config = new ungarh_Sidebar(
      /**
       * Conditional tag checks (http://codex.wordpress.org/Conditional_Tags)
       * Any of these conditional tags that return true won't show the sidebar
       *
       * To use a function that accepts arguments, use the following format:
       *
       * array('function_name', array('arg1', 'arg2'))
       *
       * The second element must be an array even if there's only 1 argument.
       */
      array(
        'is_404',
        'is_front_page'
      ),
      /**
       * Page template checks (via is_page_template())
       * Any of these page templates that return true won't show the sidebar
       */
      array(
        'template-custom.php'
      )
    );
    $display = apply_filters('ungarh/display_sidebar', $sidebar_config->display);
  }

  return $display;
}

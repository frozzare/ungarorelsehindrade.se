<?php
/**
 * ungarh includes
 *
 * The $ungarh_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/ungarh/ungarh/pull/1042
 */
$ungarh_includes = array(
  'lib/utils.php',           // Utility functions
  'lib/init.php',            // Initial theme setup and constants
  'lib/wrapper.php',         // Theme wrapper class
  'lib/sidebar.php',         // Sidebar class
  'lib/config.php',          // Configuration
  'lib/titles.php',          // Page titles
  'lib/nav.php',             // Custom nav modifications
  'lib/gallery.php',         // Custom [gallery] modifications
  // 'lib/scripts.php',      // Scripts and stylesheets
  'lib/extras.php',          // Custom functions
  'lib/posttypes.php',       // Custom post types
);

foreach ($ungarh_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'ungarh'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

/**
 * Papi
 */
if (function_exists('register_page_types_directory')) {
  register_page_types_directory( dirname(__FILE__) . '/page-templates');
}

function site_change_papi_options( $options ) {
  return array_merge($options, [
    'post_type_start_sida_show_standard_page' => false
  ]);
}

add_filter('papi_options', 'site_change_papi_options');

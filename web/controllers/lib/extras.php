<?php
/**
 * Clean up the_excerpt()
 */
function ungarh_excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Fortsätt läsa ›', 'ungarh') . '</a>';
}
add_filter('excerpt_more', 'ungarh_excerpt_more');

/**
 * Manage output of wp_title()
 */
function ungarh_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'ungarh_wp_title', 10);

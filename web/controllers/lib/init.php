<?php
/**
 * ungarh initial setup and constants
 */

/**
 * Register sidebars
 */
function ungarh_widgets_init() {
  register_sidebar(array(
    'name'          => __('Snabblänkar', 'ungarh'),
    'id'            => 'banner-snabblankar',
    'before_widget' => '<div class="widget %1$s %2$s grid__item one-third"><div class="pier__card">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<h3 class="pier__card-title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Primary', 'ungarh'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer', 'ungarh'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));
}
add_action('widgets_init', 'ungarh_widgets_init');

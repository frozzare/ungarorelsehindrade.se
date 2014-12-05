<?php

/**
 * Startsida
 */
function start_sida() {

    $labels = array(
        'name'                => _x( 'Startsidan', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Startsida', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Startsidan', 'text_domain' ),
        'all_items'           => __( 'Startsidan', 'text_domain' ),
        'view_item'           => __( 'Visa Startsidan', 'text_domain' ),
        'add_new_item'        => __( 'Skapa Startsidan', 'text_domain' ),
        'add_new'             => __( 'Skapa', 'text_domain' ),
        'edit_item'           => __( 'Redigera Startsidan', 'text_domain' ),
        'update_item'         => __( 'Uppdatera Startsidan', 'text_domain' ),
        'not_found'           => __( 'Skapa en Startsida', 'text_domain' ),
        'not_found_in_trash'  => __( 'Fanns ingen startsida i papperskorgen', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'start_sida', 'text_domain' ),
        'description'         => __( 'Startsida', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 16,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'start_sida', $args );

}


/**
 * För Ungdom
 */
function for_ungdom() {
  register_post_type( 'ungdom',
  // CPT Options
    array(
      'labels' => array(
        'name' => __( 'För Ungdom' ),
        'all_items' => __( 'Sidor: För Ungdom' ),
        'singular_name' => __( 'Ungdom' )
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => '')
    )
  );
}

/**
 * För Politiker
 */
function for_politiker() {
  register_post_type( 'politiker',
  // CPT Options
    array(
      'labels' => array(
        'name' => __( 'För Politiker' ),
        'all_items' => __( 'Sidor: För Politiker' ),
        'singular_name' => __( 'Politiker' )
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => '')
    )
  );
}

/**
 * För Journalister
 */
function for_journalister() {
  register_post_type( 'journalister',
  // CPT Options
    array(
      'labels' => array(
        'name' => __( 'För Journalister' ),
        'all_items' => __( 'Sidor: För Journalister' ),
        'singular_name' => __( 'Journalister' )
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => '')
    )
  );
}


/**
 * Init all post types
 */
$post_types   = array(
  // 'for_ungdom',
  // 'for_politiker',
  // 'for_journalister'
);

if ( !empty($post_types) ) {
  foreach ( $post_types as $cpt ) {
    add_action( 'init', $cpt );
  }
}

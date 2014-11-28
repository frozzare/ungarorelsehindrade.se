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
// Hook into the 'init' action
add_action( 'init', 'start_sida', 0 );

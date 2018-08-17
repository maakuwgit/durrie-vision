<?php
/**
 * Register the custom post type
 */
if ( ! function_exists('register_doctor_custom_post_type') ) {

  // Register Custom Post Type
  function register_doctor_custom_post_type() {

    $labels = array(
      'name'                => 'Doctor',
      'singular_name'       => 'Doctor',
      'menu_name'           => 'Doctor',
      'parent_item_colon'   => 'Parent Doctor',
      'all_items'           => 'All Doctors',
      'view_item'           => 'View Doctor',
      'add_new_item'        => 'Add New Doctor',
      'add_new'             => 'New Doctor',
      'edit_item'           => 'Edit Doctor',
      'update_item'         => 'Update Doctor',
      'search_items'        => 'Search Doctor',
      'not_found'           => 'No doctor found',
      'not_found_in_trash'  => 'No doctor found in Trash',
    );
    $args = array(
      'label'               => 'doctor',
      'description'         => 'Doctor description',
      'labels'              => $labels,
      'supports'            => array( 'title', 'page-attributes' ),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => false,
      'show_in_admin_bar'   => true,
      'menu_position'       => 20,
      'menu_icon'           => 'dashicons-groups',
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => true,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
    );
    register_post_type( 'doctor', $args );

  }

  // Hook into the 'init' action
  add_action( 'init', 'register_doctor_custom_post_type', 0 );

}

/**
 * Custom taxonomies
 */
if ( ! function_exists('register_doctor_taxonomies') ) {

  function register_doctor_taxonomies() {

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
      'name'                => _x( 'Position', 'taxonomy general name' ),
      'singular_name'       => _x( 'Position', 'taxonomy singular name' ),
      'search_items'        => __( 'Search Positions' ),
      'all_items'           => __( 'All Positions' ),
      'parent_item'         => __( 'Parent Position' ),
      'parent_item_colon'   => __( 'Parent Position:' ),
      'edit_item'           => __( 'Edit Position' ),
      'update_item'         => __( 'Update Position' ),
      'add_new_item'        => __( 'Add New Position' ),
      'new_item_name'       => __( 'New Position Name' ),
      'menu_name'           => __( 'Positions' )
    );

    $args = array(
      'hierarchical'        => true,
      'labels'              => $labels,
      'show_ui'             => true,
      'show_admin_column'   => true,
      'query_var'           => true,
      'rewrite'             => array( 'slug' => 'position' )
    );

    register_taxonomy( 'position', array( 'doctor' ), $args ); // Must include custom post type name

    // Add new taxonomy, NOT hierarchical (like tags)
    $labels = array(
      'name'                         => _x( 'Expertise', 'taxonomy general name' ),
      'singular_name'                => _x( 'Expertise', 'taxonomy singular name' ),
      'search_items'                 => __( 'Search Expertise' ),
      'popular_items'                => __( 'Popular Expertise' ),
      'all_items'                    => __( 'All Expertise' ),
      'parent_item'                  => null,
      'parent_item_colon'            => null,
      'edit_item'                    => __( 'Edit Expertise' ),
      'update_item'                  => __( 'Update Expertise' ),
      'add_new_item'                 => __( 'Add New Expertise' ),
      'new_item_name'                => __( 'New Expertise Name' ),
      'separate_items_with_commas'   => __( 'Separate Expertise with commas' ),
      'add_or_remove_items'          => __( 'Add or remove Expertise' ),
      'choose_from_most_used'        => __( 'Choose from the most used Expertise' ),
      'not_found'                    => __( 'No Expertise found.' ),
      'menu_name'                    => __( 'Expertises' )
    );

    $args = array(
      'hierarchical'            => false,
      'labels'                  => $labels,
      'show_ui'                 => true,
      'show_admin_column'       => true,
      'update_count_callback'   => '_update_post_term_count',
      'query_var'               => true,
      'rewrite'                 => array( 'slug' => 'expertise' )
    );

    register_taxonomy( 'expertise', 'doctor', $args ); // Must include custom post type name

  }

  add_action( 'init', 'register_doctor_taxonomies', 0 );

}

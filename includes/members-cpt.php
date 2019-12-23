<?php

/*
MENU PAGE
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

/**
 *
 * Adding Custom Members Area post type
 *
 */
 

 /**
   * Register a Members Area post type, with REST API support
   *
   * Based on example at: http://codex.wordpress.org/Function_Reference/register_post_type
   */
function Members_Area_cpt() {

  	$labels = array(
  		'name'               => _x( 'Members Area', 'post type general name', 'cyberize-framework' ),
  		'singular_name'      => _x( 'Members Area', 'post type singular name', 'cyberize-framework' ),
  		'menu_name'          => _x( 'Members Area', 'admin menu', 'cyberize-framework' ),
  		'name_admin_bar'     => _x( 'Members Area', 'add new on admin bar', 'cyberize-framework' ),
  		'add_new'            => _x( 'Add New', 'Members Area', 'cyberize-framework' ),
  		'add_new_item'       => __( 'Add New Members Area', 'cyberize-framework' ),
  		'new_item'           => __( 'New Members Area', 'cyberize-framework' ),
  		'edit_item'          => __( 'Edit Members Area', 'cyberize-framework' ),
  		'view_item'          => __( 'View Members Area', 'cyberize-framework' ),
  		'all_items'          => __( 'All Members Area', 'cyberize-framework' ),
  		'search_items'       => __( 'Search Members Area', 'cyberize-framework' ),
  		'parent_item_colon'  => __( 'Parent Members Area:', 'cyberize-framework' ),
  		'not_found'          => __( 'No Members Area found.', 'cyberize-framework' ),
  		'not_found_in_trash' => __( 'No Members Area found in Trash.', 'cyberize-framework' )
  	);
  
  	$args = array(
  		'labels'             => $labels,
  		'description'        => __( '', 'cyberize-framework' ),
  		'public'             => true,
  		'publicly_queryable' => true,
  		'show_ui'            => true,
  		'show_in_menu'       => true,
  		'query_var'          => true,
  		'rewrite'            => array( 'slug' => 'members-area', 'with_front' => true ),
  		'capability_type'    => 'post',
      'taxonomies'          => array( 'courses', 'lmag' ),
  		'has_archive'        => true,
  		'hierarchical'       => true,
  		'menu_position'      => null,
      'menu_icon'           => 'dashicons-buddicons-buddypress-logo',
  		'show_in_rest'       => true,
  		'rest_base'          => 'members-area',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
  		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  	);
  
  	register_post_type( 'members-area', $args );
}

add_action( 'init', 'Members_Area_cpt' );



// create two taxonomies, Product Types and writers for the post type "book"
function create_Properties_taxonomies() {
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Courses', 'taxonomy general name', 'cyberize-framework' ),
    'singular_name'     => _x( 'Course', 'taxonomy singular name', 'cyberize-framework' ),
    'search_items'      => __( 'Search Courses', 'cyberize-framework' ),
    'all_items'         => __( 'All Courses', 'cyberize-framework' ),
    'parent_item'       => __( 'Parent Course', 'cyberize-framework' ),
    'parent_item_colon' => __( 'Parent Course:', 'cyberize-framework' ),
    'edit_item'         => __( 'Edit Course', 'cyberize-framework' ),
    'update_item'       => __( 'Update Course', 'cyberize-framework' ),
    'add_new_item'      => __( 'Add New Course', 'cyberize-framework' ),
    'new_item_name'     => __( 'New Course Name', 'cyberize-framework' ),
    'menu_name'         => __( 'Courses', 'cyberize-framework' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_in_rest'      => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'courses' ),
  );

  register_taxonomy( 'courses', array( 'members-area' ), $args );


    // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Lead Magnet', 'taxonomy general name', 'cyberize-framework' ),
    'singular_name'     => _x( 'Lead Magnet', 'taxonomy singular name', 'cyberize-framework' ),
    'search_items'      => __( 'Search Lead Magnet', 'cyberize-framework' ),
    'all_items'         => __( 'All Lead Magnets', 'cyberize-framework' ),
    'parent_item'       => __( 'Parent Lead Magnet', 'cyberize-framework' ),
    'parent_item_colon' => __( 'Parent Lead Magnet:', 'cyberize-framework' ),
    'edit_item'         => __( 'Edit Lead Magnet', 'cyberize-framework' ),
    'update_item'       => __( 'Update Lead Magnet', 'cyberize-framework' ),
    'add_new_item'      => __( 'Add New Lead Magnet', 'cyberize-framework' ),
    'new_item_name'     => __( 'New Lead Magnet Name', 'cyberize-framework' ),
    'menu_name'         => __( 'Lead Magnet', 'cyberize-framework' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_in_rest'      => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'lmag' ),
  );

  register_taxonomy( 'lmag', array( 'members-area' ), $args );
 
}

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_Properties_taxonomies', 0 );

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
 * Adding Custom Property post type
 *
 */
 

 /**
   * Register a Property post type, with REST API support
   *
   * Based on example at: http://codex.wordpress.org/Function_Reference/register_post_type
   */
function Properties_cpt() {

  	$labels = array(
  		'name'               => _x( 'Properties', 'post type general name', 'cyberize-framework' ),
  		'singular_name'      => _x( 'Property', 'post type singular name', 'cyberize-framework' ),
  		'menu_name'          => _x( 'Properties', 'admin menu', 'cyberize-framework' ),
  		'name_admin_bar'     => _x( 'Property', 'add new on admin bar', 'cyberize-framework' ),
  		'add_new'            => _x( 'Add New', 'Property', 'cyberize-framework' ),
  		'add_new_item'       => __( 'Add New Property', 'cyberize-framework' ),
  		'new_item'           => __( 'New Property', 'cyberize-framework' ),
  		'edit_item'          => __( 'Edit Property', 'cyberize-framework' ),
  		'view_item'          => __( 'View Property', 'cyberize-framework' ),
  		'all_items'          => __( 'All Properties', 'cyberize-framework' ),
  		'search_items'       => __( 'Search Properties', 'cyberize-framework' ),
  		'parent_item_colon'  => __( 'Parent Properties:', 'cyberize-framework' ),
  		'not_found'          => __( 'No Property found.', 'cyberize-framework' ),
  		'not_found_in_trash' => __( 'No Property found in Trash.', 'cyberize-framework' )
  	);
  
  	$args = array(
  		'labels'             => $labels,
  		'description'        => __( '', 'cyberize-framework' ),
  		'public'             => true,
  		'publicly_queryable' => true,
  		'show_ui'            => true,
  		'show_in_menu'       => true,
  		'query_var'          => true,
  		'rewrite'            => array( 'slug' => 'properties', 'with_front' => true ),
  		'capability_type'    => 'post',
      'taxonomies'          => array( 'property-type', 'listing-status' ),
  		'has_archive'        => true,
  		'hierarchical'       => true,
  		'menu_position'      => null,
      'menu_icon'           => 'dashicons-store',
  		'show_in_rest'       => true,
  		'rest_base'          => 'properties',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
  		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  	);
  
  	register_post_type( 'properties', $args );
}

add_action( 'init', 'Properties_cpt' );



// create two taxonomies, Product Types and writers for the post type "book"
function create_Properties_taxonomies() {
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Property Types', 'taxonomy general name', 'cyberize-framework' ),
    'singular_name'     => _x( 'Property Type', 'taxonomy singular name', 'cyberize-framework' ),
    'search_items'      => __( 'Search Property Types', 'cyberize-framework' ),
    'all_items'         => __( 'All Property Types', 'cyberize-framework' ),
    'parent_item'       => __( 'Parent Property Type', 'cyberize-framework' ),
    'parent_item_colon' => __( 'Parent Property Type:', 'cyberize-framework' ),
    'edit_item'         => __( 'Edit Property Type', 'cyberize-framework' ),
    'update_item'       => __( 'Update Property Type', 'cyberize-framework' ),
    'add_new_item'      => __( 'Add New Property Type', 'cyberize-framework' ),
    'new_item_name'     => __( 'New Property Type Name', 'cyberize-framework' ),
    'menu_name'         => __( 'Property Types', 'cyberize-framework' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_in_rest'      => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'property-type' ),
  );

  register_taxonomy( 'property-type', array( 'properties' ), $args );


    // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Listing Status', 'taxonomy general name', 'cyberize-framework' ),
    'singular_name'     => _x( 'Listing Status', 'taxonomy singular name', 'cyberize-framework' ),
    'search_items'      => __( 'Search Listing Status', 'cyberize-framework' ),
    'all_items'         => __( 'All Listing Status', 'cyberize-framework' ),
    'parent_item'       => __( 'Parent Listing Status', 'cyberize-framework' ),
    'parent_item_colon' => __( 'Parent Listing Status:', 'cyberize-framework' ),
    'edit_item'         => __( 'Edit Listing Status', 'cyberize-framework' ),
    'update_item'       => __( 'Update Listing Status', 'cyberize-framework' ),
    'add_new_item'      => __( 'Add New Listing Status', 'cyberize-framework' ),
    'new_item_name'     => __( 'New Listing Status Name', 'cyberize-framework' ),
    'menu_name'         => __( 'Listing Status', 'cyberize-framework' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_in_rest'      => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'listing-status' ),
  );

  register_taxonomy( 'listing-status', array( 'properties' ), $args );
 
}

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_Properties_taxonomies', 0 );

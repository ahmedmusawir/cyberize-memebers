<?php
/*
Plugin Name: CG Members Area
Plugin URI: https://cyberizegroup.com/
Description: Displays Property Category List, Google Map etc. via Shortcodes
Version: 1.0
Author: Cyberize Group
Author URI: https://cyberizegroup.com/
License: GPLv2 or later
Text Domain: cyberizeframework
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

define( 'CG_MEMBERS_URL', plugin_dir_url( __FILE__ ) );

// Enqueue Plugin CSS
include( plugin_dir_path( __FILE__ ) . 'includes/property-shortcodes-styles.php');

// Enqueue Plugin JavaScript
// include( plugin_dir_path( __FILE__ ) . 'includes/property-shortcodes-scripts.php');

// Create Properties Custom Post Type with Taxonomies (property-type & listing-status)
include( plugin_dir_path( __FILE__ ) . 'includes/members-cpt.php');

// Create Single Property ACF Fields
include( plugin_dir_path( __FILE__ ) . 'includes/property-acf.php');

// Create Plugin Admin Menus and Setting Pages
include( plugin_dir_path( __FILE__ ) . 'includes/menu-page.php');

// Create Google Map with Property List Shortcode
include( plugin_dir_path( __FILE__ ) . 'includes/members-area-list.php');

// Create Google Map with Property Google Map List
// include( plugin_dir_path( __FILE__ ) . 'includes/property-gmap-list.php');

// Create Google Map with Property Categories
// include( plugin_dir_path( __FILE__ ) . 'includes/property-gmap-category.php');
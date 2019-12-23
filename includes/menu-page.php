<?php
/*
MENU PAGE
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

function wpplugin_settings_pages() {

  add_submenu_page(
    'edit.php?post_type=members-area',
    __( 'Members Area Shortcodes', 'wpplugin' ),
    __( 'Shortcodes', 'wpplugin' ),
    'manage_options',
    'members-area-shortcode',
    'wpplugin_settings_subpage_markup'
  );
}
add_action( 'admin_menu', 'wpplugin_settings_pages' );


function wpplugin_settings_page_markup() {
  // Double check user capabilities
  if ( !current_user_can('manage_options') ) {
      return;
  }
  ?>
  <div class="wrap">
    <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>
    <p><?php esc_html_e( 'Some content.', 'wpplugin' ); ?></p>
  </div>
  <?php
}

function wpplugin_settings_subpage_markup()
{
  // Double check user capabilities
  if ( !current_user_can('manage_options') ) {
      return;
  }
  ?>
  <div class="wrap">
    <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>
    <!-- <p><?php // esc_html_e( 'Some content.', 'wpplugin' ); ?></p> -->
    <h2>To List Course Types</h2>

    <h4>Default:</h4>
    <code>
    [cg-member-area-taxonomy-list]
    </code>
    <p>
      This will display a list of Course types by default
    </p>

    <h4>Options:</h4>
    <code>
    [cg-member-area-taxonomy-list taxonomy_name="courses"]
    </code>
    <p>
      This will display the same as the default (Course types). 
    </p>

    <hr>
    <br>

    <h2>To List Lead Magnet Types</h2>

    <code>
    [cg-member-area-taxonomy-list taxonomy_name="lmag"]
    </code>
    <p>
      This will display a list of Lead Magnet types.
    </p>

    <hr>    

  </div>
  <?php
}

// Add a link to your settings page in your plugin
function wpplugin_add_settings_link( $links ) {
    $settings_link = '<a href="edit.php?post_type=properties&page=property-shortcode">' . __( 'Settings', 'wpplugin' ) . '</a>';
    array_push( $links, $settings_link );
    return $links;
}
$filter_name = "plugin_action_links_" . plugin_basename( __FILE__ );
add_filter( $filter_name, 'wpplugin_add_settings_link' );


// function wpplugin_default_sub_pages() {

//   // Can add page as a submenu using the following:
//   // add_dashboard_page()
//   // add_posts_page()
//   // add_media_page()
//   // add_pages_page()
//   // add_comments_page()
//   // add_theme_page()
//   // add_plugins_page()
//   // add_users_page()
//   // add_management_page()
//   // add_options_page()

//   add_dashboard_page(
//     __( 'Cool Default Sub Page', 'wpplugin' ),
//     __( 'Custom Sub Page', 'wpplugin' ),
//     'manage_options',
//     'wpplugin-subpage',
//     'wpplugin_settings_page_markup'
//   );

// }
// add_action( 'admin_menu', 'wpplugin_default_sub_pages' );

?>

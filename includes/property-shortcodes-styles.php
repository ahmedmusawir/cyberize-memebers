<?php

// Conditionally load CSS on plugin settings pages only
// function wpplugin_admin_styles( $hook ) {

//   wp_register_style(
//     'wpplugin-admin',
//     CGPLUGIN_URL . 'admin/css/wpplugin-admin-style.css',
//     [],
//     time()
//   );

//   if( 'toplevel_page_wpplugin' == $hook ) {
//     wp_enqueue_style( 'wpplugin-admin' );
//   }

// }
// add_action( 'admin_enqueue_scripts', 'wpplugin_admin_styles' );


// Load CSS on the frontend
function cgplugin_frontend_styles() {

  wp_register_style(
    'cgplugin-frontend',
    CG_MEMBERS_URL . 'frontend/css/cgplugin-frontend-style.css',
    [],
    time()
  );

  // if( is_single() ) {
      wp_enqueue_style( 'cgplugin-frontend' );
  // }

}
add_action( 'wp_enqueue_scripts', 'cgplugin_frontend_styles', 100 );

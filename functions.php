<?php 
require_once get_template_directory() . '/inc/theme.php';
require_once get_template_directory() . '/inc/includes.php';
require_once get_template_directory() . '/inc/helpers.php';

//controllers
foreach(glob(get_template_directory().'/inc/controllers/*.php', GLOB_BRACE) as $controller) {
    require_once $controller;
}

//routes
require_once get_template_directory() . '/inc/routes.php';

new Routes();

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Register custom post type for the home section with updated slug
function register_home_custom_post_type() {
    $args = array(
        'labels'             => array(
            'name'               => __( 'Home', 'interopx' ),
            'singular_name'      => __( 'Home Item', 'interopx' ),
        ),
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'home' ), // Updated slug
        // Add other arguments as needed
    );
    register_post_type( 'home-item', $args );
}
add_action( 'init', 'register_home_custom_post_type' );

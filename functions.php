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

// Add Custom Teaser field to the Post Content Type
// Step 1: Register Meta Box
function custom_meta_box() {
    add_meta_box(
        'custom_meta_box_id',          // Meta box ID
        'Teaser',                      // Title
        'display_teaser_field',        // Callback function to display field
        'post',                        // Post type
        'normal',                    // Context (above the editor)
        'default'                         // Priority (higher priority)
    );
}
add_action('add_meta_boxes', 'custom_meta_box');

// Step 2: Display Teaser Field
function display_teaser_field($post) {
    // Retrieve the current value of the teaser field
    $teaser_value = get_post_meta($post->ID, '_teaser_key', true);
    ?>
    <label for="teaser">Teaser:</label><br>
    <textarea id="teaser" name="teaser" rows="4" cols="50" required><?php echo esc_textarea($teaser_value); ?></textarea><br>
    <p class="description">Maximum length: 200 characters</p>
    <?php
}

// Step 3: Save Teaser Field
function save_teaser_field($post_id) {
    if (isset($_POST['teaser'])) {
        $teaser = sanitize_textarea_field($_POST['teaser']);
        // Limit to 200 characters
        $teaser = substr($teaser, 0, 200);
        update_post_meta($post_id, '_teaser_key', $teaser);
    }
}
add_action('save_post', 'save_teaser_field');
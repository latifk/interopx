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

function add_google_tags() {
    ?>
    <!-- Google tag (gtag.js) for Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-617Q2RCK7C"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-617Q2RCK7C');
    </script>

    <!-- Google tag (gtag.js) for Ads -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16652710848"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'AW-16652710848');
    </script>
    <?php
}
add_action('wp_head', 'add_google_tags');

function add_recaptcha_script() {
    wp_enqueue_script('recaptcha', 'https://www.google.com/recaptcha/api.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'add_recaptcha_script');

function add_swiper_script() {
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'add_swiper_script');

//function check_referrer_and_current_url() {
//    // Ensure HTTP_REFERER is set
//    if ( isset($_SERVER['HTTP_REFERER']) ) {
//        $referrer_url = esc_url_raw($_SERVER['HTTP_REFERER']);
//
//        // Parse the referrer URL to extract components
//        $parsed_referrer = parse_url($referrer_url);
//        $referrer_path = isset($parsed_referrer['path']) ? $parsed_referrer['path'] : '';
//
//        // Check if referrer path contains '/contact'
//        if ( strpos($referrer_path, '/contact') !== false ) {
//            // Get the current URL's query parameters
//            $current_url = esc_url_raw($_SERVER['REQUEST_URI']);
//            $parsed_current = parse_url($current_url);
//            $query_params = array();
//
//            // Parse the query string into an array
//            parse_str(isset($parsed_current['query']) ? $parsed_current['query'] : '', $query_params);
//
//            // Check for the presence of 'last-name' and 'company' query parameters
//            $last_name = isset($query_params['Email']) ? sanitize_text_field($query_params['Email']) : '';
//            $company = isset($query_params['Company']) ? sanitize_text_field($query_params['Company']) : '';
//
//            // If both parameters are present, perform your desired action
//            if ($last_name && $company) {
//                // For example, redirect to another page
//                wp_redirect(home_url('/thankyou'));
//                exit; // Ensure no further code is executed after redirect
//            }
//        }
//    }
//}
//add_action('template_redirect', 'check_referrer_and_current_url');
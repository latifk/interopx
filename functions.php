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
    <p class="description">Maximum length: 300 characters</p>
    <?php
}

// Step 3: Save Teaser Field
function save_teaser_field($post_id) {
    if (isset($_POST['teaser'])) {
        $teaser = sanitize_textarea_field($_POST['teaser']);
        // Limit to 200 characters
        $teaser = substr($teaser, 0, 300);
        update_post_meta($post_id, '_teaser_key', $teaser);
    }
}
add_action('save_post', 'save_teaser_field');

function add_google_tags() {
    // Analytics script
    wp_enqueue_script('google-analytics', 'https://www.googletagmanager.com/gtag/js?id=G-617Q2RCK7C', array(), null, true);
    // Ads script
    wp_enqueue_script('google-ads', 'https://www.googletagmanager.com/gtag/js?id=AW-16652710848', array(), null, true);
    // Custom script
    wp_enqueue_script('google-tags', get_template_directory_uri() . '/assets/js/google-tags.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'add_google_tags');

function add_recaptcha_script() {
    wp_enqueue_script('recaptcha', 'https://www.google.com/recaptcha/api.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'add_recaptcha_script');

function add_swiper_script() {
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'add_swiper_script');

function enqueue_form_scripts() {
    wp_enqueue_script('form-scripts', get_template_directory_uri() . '/assets/js/form-scripts.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_form_scripts');

function enqueue_referrer_tracker_scripts() {
//    // Check if we are on a specific page
//    if (is_page('ix-databridge')) { // Replace 'your-page-slug' with your actual page slug
        wp_enqueue_script('referrer-tracker', get_template_directory_uri() . '/assets/js/referrer-tracker.js', array(), null, true);
//    }
}
add_action('wp_enqueue_scripts', 'enqueue_referrer_tracker_scripts');

// Use Transient way
function set_transient_on_first_visit() {
    // Check if we are on the ix-databridge page
    if (is_page('ix-databridge')) {
        // Check if the transient is already set
        if (!get_transient('referrerURL')) {
            // Set the transient value for the user's session
            $value = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'Direct Visit'; // Set your desired value
            $expiration = 12 * 7200; // Set expiration time, 2 hours
            set_transient('referrerURL', $value, $expiration);
        }
    }
}
add_action('wp', 'set_transient_on_first_visit');

/*
Add Google Consent Mode
Description: Adds Google Consent Mode to the site.
*/
function add_google_consent_mode_script() {
    ?>
    <!-- Google Consent Mode -->
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("consent", "default", {
            ad_storage: "denied",
            ad_user_data: "denied",
            ad_personalization: "denied",
            analytics_storage: "denied",
            functionality_storage: "denied",
            personalization_storage: "denied",
            security_storage: "granted",
            wait_for_update: 2000,
        });
        gtag("set", "ads_data_redaction", true);
        gtag("set", "url_passthrough", true);
    </script>
    <!-- End Consent Mode -->
    <?php
}
//add_action('wp_head', 'add_google_consent_mode_script', -2); // 2 makes sure it's the second action in wp_head

function add_gtm_to_header() {
    ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MHCTSGHT');</script>
    <!-- End Google Tag Manager -->
    <?php
}

add_action('wp_head', 'add_gtm_to_header', -1); // 2 makes sure it's the second action in wp_head

// Add GTM noscript to the body section
function add_gtm_noscript() {
    ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MHCTSGHT"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php
}
add_action('wp_body_open', 'add_gtm_noscript', 1);

function check_watch_vidoe_cookie() {
    $restricted_page_slug = 'overview-ix-databridge'; // page's slug

    $allowed_referrer_slug = 'ix-databridge-video-register'; // referrer slag

    // Check if we are on the restricted page by slug
    if (is_page($restricted_page_slug)) {
        // Check if the cookie 'userStatus' is set and if its value is '1'
        // Get the home URL for comparison
        $reg_url = '/ix-databridge-video-register';
        if (!isset($_COOKIE['wordpress_watchVideo']) || $_COOKIE['wordpress_watchVideo'] !== 'yes') {
            // Redirect to another page or show an error message
            // Redirect to the page with the slug 'my-page'
            wp_redirect($reg_url);
            exit; // Make sure to stop further execution
        }
    }
}
add_action('template_redirect', 'check_watch_vidoe_cookie');

//function check_watch_video_cookie_and_redirect() {
//    $page_slug = 'ix-databridge-video-register'; // page's slug
//
//    $allowed_referrer_slug = 'ix-databridge-video-register'; // referrer slag
//
//    // Check if we are on the restricted page by slug
//    if (is_page($page_slug)) {
//        // Check if the cookie 'userStatus' is set and if its value is '1'
//        $video_url = '/overview-ix-databridge';
//        if (isset($_COOKIE['watchVideo']) && $_COOKIE['watchVideo'] === '1') {
//            // Log the redirect condition
//            error_log('Cookie is set, redirecting to /overview-ix-databridge');
//            // Redirect to the page with the slug 'my-page'
//            wp_redirect($video_url);
//            exit; // Make sure to stop further execution
//        } else {
//            // Log if the condition is not met
//            error_log('Cookie not set or incorrect value');
//        }
//    }
//}
//add_action('template_redirect', 'check_watch_video_cookie_and_redirect');

// Define the custom PHP shortcode for watch video button
function custom_php_logic_video_shortcode($atts) {
    // Initialize the variable that will hold the HTML content
    $video_button_code = '';
    // Check if the 'watchVideo' cookie exists
//    echo isset($_COOKIE['watchVideo']);
//    if (isset($_COOKIE['watchVideo'])) {
//        $watchVideo = $_COOKIE['watchVideo'];
//        echo "The value of watchVideo is: " . $watchVideo;
//    } else {
//        echo "The 'watchVideo' cookie is not set.";
//    }

    if (isset($_COOKIE['wordpress_watchVideo']) && $_COOKIE['wordpress_watchVideo'] == 'yes') {
        // HTML for the button and video popup when the cookie is set
        $video_button_code = '
            <div class="videopopup video-popup-content">
                <p class="box-button">
                    <button id="show-video-btn" class="cta-button btn popupvideo-btn">Watch a short Video</button>
                </p>
            </div>

            <div id="hero-video" class="hero-video video-popup-container">
                <span id="close-btn">&times;</span>
                <video id="video" controls class="home-hero-video">
                    <source src="/wp-content/uploads/2024/02/iX-DataBridge_V1.mp4" type="video/mp4">
                </video>
            </div>';
    } else {
        // HTML for the button when the cookie is not set (redirect to registration page)
        $video_button_code = '
            <div class="videopopup video-popup-content">
                <p class="box-button">
                    <button id="show-video-btn" class="cta-button btn popupvideo-btn" onclick="window.location.href=\'' . esc_url( home_url( '/ix-databridge-video-register' ) ) . '\';">
                        Watch a short Video
                    </button>
                </p>
            </div>';
    }

    // Return the HTML code for the button and video popup
    return $video_button_code;
}

// Register the custom shortcode
add_shortcode('custom_php_logic_video', 'custom_php_logic_video_shortcode');

// Define the custom PHP shortcode for watch video button
function custom_php_logic_whitepaper1_shortcode($atts) {
    if (isset($_COOKIE['wordpress_watchVideo']) && $_COOKIE['wordpress_watchVideo'] == 'yes') {
        // HTML for the button when the cookie is not set (redirect to registration page)
        $wp_button_code = '
            <div class="videopopup video-popup-content">
                <p class="box-button">
                    <button id="show-whitepaper-btn2" class="cta-button btn popupvideo-btn" onclick="window.location.href=\'' . esc_url( home_url( '/complete-data-white-paper' ) ) . '\';">
                    <!--<button id="show-whitepaper-btn1" class="btn popupvideo-btn" onclick="window.open(\'' . esc_url( home_url( '/complete-data-white-paper' ) ) . '\', \'_blank\');">-->
                        View The White Paper
                    </button>
                </p>
            </div>';
    } else {
        // HTML for the button and video popup when the cookie is set
        $wp_button_code = '
            <div class="videopopup video-popup-content">
                <p class="box-button">
                    <button id="show-whitepaper-btn2" class="cta-button btn popupvideo-btn" onclick="window.location.href=\'' . esc_url( home_url( '/register-to-access-white-papers/?wid=complete-data-white-paper' ) ) . '\';">
                        View The White Paper
                    </button>
                </p>
            </div>';
    }

    // Return the HTML code for the button and video popup
    return $wp_button_code;
}

// Register the custom shortcode
add_shortcode('custom_php_logic_whitepaper_1', 'custom_php_logic_whitepaper1_shortcode');

// Define the custom PHP shortcode for view whitepaper button
function custom_php_logic_whitepaper2_shortcode($atts) {
    if (isset($_COOKIE['wordpress_watchVideo']) && $_COOKIE['wordpress_watchVideo'] == 'yes') {
        // HTML for the button when the cookie is not set (redirect to registration page)
        $wp_button_code = '
            <div class="videopopup video-popup-content">
                <p class="box-button">
                    <button id="show-whitepaper-btn2" class="cta-button btn popupvideo-btn" onclick="window.location.href=\'' . esc_url( home_url( '/cms-0057f-white-paper' ) ) . '\';">
                    <!--<button id="show-whitepaper-btn2" class="btn popupvideo-btn" onclick="window.open(\'' . esc_url( home_url( '/cms-0057f-white-paper' ) ) . '\', \'_blank\');">-->
                        View The White Paper
                    </button>
                </p>
            </div>';
    } else {
        // HTML for the button and video popup when the cookie is set
        $wp_button_code = '
            <div class="videopopup video-popup-content">
                <p class="box-button">
                    <button id="show-whitepaper-btn2" class="cta-button btn popupvideo-btn" onclick="window.location.href=\'' . esc_url( home_url( '/register-to-access-white-papers/?wid=cms-0057f-white-paper' ) ) . '\';">
                        View The White Paper
                    </button>
                </p>
            </div>';
    }

    // Return the HTML code for the button and video popup
    return $wp_button_code;
}

// Register the custom shortcode
add_shortcode('custom_php_logic_whitepaper_2', 'custom_php_logic_whitepaper2_shortcode');

// Define the custom PHP shortcode for go to ix databridge page
function custom_php_logic_btn_ixdatabridge_shortcode($atts) {
        // HTML for the button and video popup when the cookie is set
        $wp_button_code = '
            <div class="videopopup video-popup-content">
                <p class="box-button">
                    <button id="ix-databridge-btn" class="cta-button btn popupvideo-btn" onclick="window.location.href=\'' . esc_url( home_url( '/ix-databridge' ) ) . '\';">
                        Go Back
                    </button>
                </p>
            </div>';

    // Return the HTML code for the button and video popup
    return $wp_button_code;
}

// Register the custom shortcode
add_shortcode('custom_php_logic_btn_ixdatabridge', 'custom_php_logic_btn_ixdatabridge_shortcode');


function add_video_redirect_script() {
    // Check if we're on a page where the video exists (optional)
//   if (is_single() || is_page()) {
   ?>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var video = document.getElementById("video-13440-1");
            if (video) {
                video.addEventListener("ended", function() {
                    // Redirect to a new URL after the video finishes
                    window.location.href = "/ix-databridge";
                });
            }
        });
    </script>
    <?php
//}
}
add_action('wp_footer', 'add_video_redirect_script');
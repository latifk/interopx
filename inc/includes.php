<?php 

function scripts() {
    $files = glob(get_template_directory().'/assets/js/*.js');
    foreach($files as $file) {
        wp_enqueue_script(basename($file), get_template_directory_uri().'/assets/js/'. basename($file), array('jquery'),'1.1', true);
    }
}

function stylesheets() {
    $files = glob(get_template_directory().'/assets/css/*.css');
    foreach($files as $file) {
        wp_enqueue_style(basename($file), get_template_directory_uri().'/assets/css/' . basename($file));
    }
}

add_action( 'wp_enqueue_scripts', 'scripts' );  
add_action( 'wp_enqueue_scripts', 'stylesheets' );  


?>
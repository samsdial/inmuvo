<?php
//Your Code Here

add_action( 'wp_enqueue_scripts', 'pfch_theme_enqueue_styles' );
function pfch_theme_enqueue_styles() {
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array()
    );
}

?>
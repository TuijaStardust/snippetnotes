<?php

function themeskeleton_files() {
    wp_enqueue_style('themeskeleton_main_styles', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'themeskeleton_files');
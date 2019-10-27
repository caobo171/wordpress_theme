<?php

//adding the CSS and JS files
function cao_setup(){
    wp_enqueue_style( 'google-fonts', "//fonts.googleapis.com/css?family=Roboto&display=swap");
    wp_enqueue_style( 'style', get_stylesheet_uri(), NULL , microtime(), 'all' );
    wp_enqueue_script( "main", get_theme_file_uri().'/js/main.js', NULL , microtime(), true );
}

add_action( 'wp_enqueue_scripts', 'cao_setup' );

function cao_init(){
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'html5' , array(
        'comment-list','comment-form', 'search-form'
    ));
}

add_action( 'after_setup_theme', 'cao_init' );

// gt_custom_post_type
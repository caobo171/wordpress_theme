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

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart');
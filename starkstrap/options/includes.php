<?php

// Including theme styles
function starkstrap_styles_includes()  
{  
    // Register styles for a theme:  
    wp_register_style( 'minimalist', get_template_directory_uri() . '/css/minimalist.css', array(), '5.4.3', 'all' );  
    wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '2.3.1', 'all' );  
    wp_register_style( 'bootstrap-responsive', get_template_directory_uri() . '/css/bootstrap-responsive.min.css', array(), '2.3.1', 'all' );  
    wp_register_style( 'main-style', get_bloginfo('stylesheet_url'), array(), '1', 'all' );      

    // Enqueue styles:  
    wp_enqueue_style( 'minimalist' ); 
    wp_enqueue_style( 'bootstrap' ); 
    wp_enqueue_style( 'bootstrap-responsive' ); 
    wp_enqueue_style( 'main-style' );  
}  
add_action( 'wp_enqueue_scripts', 'starkstrap_styles_includes' ); 

// Including scripts
function starkstrap_scripts_includes()  
{  
    // Register scripts for a theme:  
    wp_register_script( 'jquery-min', get_template_directory_uri() . '/js/jquery-1.10.0.min.js', array(), '1.10.0');  
    wp_register_script( 'main-js', get_template_directory_uri() . '/js/main.js', array('jquery-min'), '1.0');  
    wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery-min'), '2.3.1');
    wp_register_script( 'flowplayer', get_template_directory_uri() . '/js/flowplayer.min.js', array('jquery-min'), '5.4.3');  

    // Enqueue scripts:  
    wp_enqueue_script( 'jquery-min' );  
    wp_enqueue_script( 'main-js' );  
    wp_enqueue_script( 'bootstrap' );  
    wp_enqueue_script( 'flowplayer' );  
}  
add_action( 'wp_enqueue_scripts', 'starkstrap_scripts_includes' ); 


// Including WordPress’s comment-reply.js 
function theme_queue_js(){
if (is_single() && comments_open() && get_option('thread_comments') )
  wp_enqueue_script( 'comment-reply' );
}
add_action('wp_head', 'theme_queue_js');


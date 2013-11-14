<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

automatic_feed_links();

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}

if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu( 'hm', 'Header Menu' );
	register_nav_menu( 'fm', 'Footer Menu' );
}

?>
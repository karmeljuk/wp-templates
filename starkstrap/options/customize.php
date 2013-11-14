<?php

// Enable theme features
function starkstrap_customize_register( $wp_customize ) {
$colors = array();
$colors[] = array(
	'slug'=>'content_text_color', 
	'default' => '#333',
	'label' => __('Content Text Color', 'starkstrap')
);
$colors[] = array(
	'slug'=>'buttons_bg_color', 
	'default' => '#E4B404',
	'label' => __('Buttons Background Color', 'starkstrap')
);
$colors[] = array(
	'slug'=>'buttons_text_color', 
	'default' => '#FFF',
	'label' => __('Buttons Text Color', 'starkstrap')
);
foreach( $colors as $color ) {
	// Setting
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			'type' => 'option', 
			'capability' => 
			'edit_theme_options'
		)
	);
	// Controls
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'], 
			array('label' => $color['label'], 
			'section' => 'colors',
			'settings' => $color['slug'])
		)
	);
}
}
add_action( 'customize_register', 'starkstrap_customize_register' );  



function starkstrap_customize_css()
{
  $content_text_color = get_option('content_text_color');
  $buttons_bg_color = get_option('buttons_bg_color');
  $buttons_text_color = get_option('buttons_text_color');
  ?>
    <style type="text/css">
      div.content { 
        color:  <?php echo $content_text_color; ?>; 
      }

      body .buttons-bg-color, #menu-primary-navigation .buttons-bg-color a { 
        background:  <?php echo $buttons_bg_color; ?>; 
        color:  <?php echo $buttons_text_color; ?>; 
        text-shadow: none;
      }

      body .buttons-bg-color:hover, #menu-primary-navigation .buttons-bg-color a:hover { 
        background:  <?php echo $buttons_bg_color; ?>; 
        color:  <?php echo $buttons_text_color; ?>; 
      }
    </style>
  <?php
}
add_action( 'wp_head', 'starkstrap_customize_css');

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-header', array() );
add_theme_support( 'custom-background', array() );

// Customizing the WordPress Login   
function starkstrap_login_logo_url() {
    return get_home_url(); 
}
add_filter( 'login_headerurl', 'starkstrap_login_logo_url' );

function starkstrap_login_logo_url_title() {
    return get_option('blogname');
}
add_filter( 'login_headertitle', 'starkstrap_login_logo_url_title' ); 

function starkstrap_login_stylesheet() {
  echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/css/login-styles.css" />';
}
add_action('login_head', 'starkstrap_login_stylesheet');

function custom_fonts() {
  echo '<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet" type="text/css">';
}
add_action('login_head', 'custom_fonts');


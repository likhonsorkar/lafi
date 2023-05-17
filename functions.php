<?php
/*
* My Theme Function
*/


// Theme Title
add_theme_support('title-tag');


// Theme CSS and jQuery File calling
function nexus_css_js(){
    // css file
    wp_enqueue_style('nexus-style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap_min_css', get_template_directory_uri().'/css/bootstrap.min.css', array(), '5.3.0', 'all');
    wp_enqueue_style('bootstrap_icon_css', get_template_directory_uri().'/css/bootstrap-icon.css', array(), '1.10.5', 'all');
    wp_enqueue_style('custom_css', get_template_directory_uri().'/css/custom.css', array(), '1.0.0', 'all');

    // js file include
    wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap_bondle', get_template_directory_uri().'/js/bootstrap.bondle.min.js', array(), '5.3.0', 'true' );
  wp_enqueue_script('script', get_template_directory_uri().'/js/script.js', array(), '1.0.0', 'true' );
}
add_action('wp_enqueue_scripts', 'nexus_css_js');


// Theme Custom Logo
function nexus_custom_logo_setup() {
	$defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true, 
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'nexus_custom_logo_setup' );


// Nav Menu Register

// Menu Register
register_nav_menu( 'main_menu', __('Main Menu', 'nexus') );
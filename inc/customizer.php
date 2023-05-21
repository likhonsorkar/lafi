<?php
// Theme Customizer Run

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

// Theme Customizer

function nexus_customize_register($wp_customize){
    // footer copyright text customize start
    $wp_customize->add_section('nexus_footer', array(
      'title' => __('Footer Settings', 'nexus'),
    ));
    $wp_customize->add_setting('nexus_footer_text', array(
      'default' => __('All right reserved © 2023', 'nexus'),
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('nexus_footer_text', array(
      'label' => __('Footer Text', 'nexus'),
      'section' => 'nexus_footer',
      'control' => 'nexus_footer_text',
      'type' => 'text',
    ));
    //footer copyright text customize end


}
add_action('customize_register', 'nexus_customize_register' );
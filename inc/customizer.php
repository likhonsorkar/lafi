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


     // Add a new section for color options
  $wp_customize->add_section( 'nexus_colors_section', array(
    'title'    => __( 'Colors', 'nexus' ),
    'priority' => 30,
  ) );

  // Add settings for primary and secondary colors
  $wp_customize->add_setting( 'nexus_primary_color', array(
    'default'           => '#eb4d4b',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  $wp_customize->add_setting( 'nexus_secondary_color', array(
    'default'           => '#ff7979',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  // Add controls for primary and secondary colors
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nexus_primary_color_control', array(
    'label'    => __( 'Primary Color', 'nexus' ),
    'section'  => 'nexus_colors_section',
    'settings' => 'nexus_primary_color',
  ) ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nexus_secondary_color_control', array(
    'label'    => __( 'Secondary Color', 'nexus' ),
    'section'  => 'nexus_colors_section',
    'settings' => 'nexus_secondary_color',
  ) ) );
}

add_action('customize_register', 'nexus_customize_register' );

function nexus_custom_styles() {
  ?>
    <style>
      :root{ --pm-color:<?php echo esc_attr(get_theme_mod( 'nexus_primary_color', '#eb4d4b' )); ?>;
             --sn-color:<?php echo esc_attr(get_theme_mod( 'nexus_secondary_color', '#ff7979' )); ?>;
            }
    </style>
  <?php
}
add_action( 'wp_head', 'nexus_custom_styles' );
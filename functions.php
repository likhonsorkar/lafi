<?php
/*
* My Theme Function
*/


// Theme Supports
add_theme_support('title-tag');

add_theme_support('post-thumbnails', array( 'post', 'page' ) );
add_image_size( 'my-custom-size', 970, 350, true );


// read more
function nexus_custom_excerpt_more( $more ) {
  return '<br> <br><a href="' . get_permalink( get_the_ID() ) . '" class="readmorebtn">Read More</a>';
}
add_filter( 'excerpt_more', 'nexus_custom_excerpt_more' );

function nexus_excerpt_lenght($length){
  return 40;
}
add_filter('excerpt_length', 'nexus_excerpt_lenght', 999);


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

// Pagenav Function
function nexus_pagenav(){
  global $wp_query, $wp_rewrite;
  $pages ='';
  $max = $wp_query->max_num_pages;
  if(!$current = get_query_var('paged')) $current = 1;
  $args['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $args['total'] = $max;
  $args['current'] = $current;
  $total = 1;
  $args['prev_text'] = 'Prev';
  $args['next_text'] = 'Next';
  if ($max > 1) echo '</pre>
    <div class="wp_pagenav">';
      if ($total == 1 && $max > 1) $pages = '<p class="pages"> Page ' .$current . '<span>of</span>' . $max . '</p>';
      echo $pages . paginate_links($args);
      if ($max > 1 ) echo '</div><pre>';
}

// Theme Customizer Run

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


// Menu Register
register_nav_menu( 'main_menu', __('Main Menu', 'nexus') );
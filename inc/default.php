<?php

// Theme Supports
add_theme_support('title-tag');

add_theme_support('post-thumbnails', array( 'post', 'page' ) );
add_image_size( 'my-custom-size', 970, 350, true );
add_theme_support('automatic-feed-links');


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
        wp_link_pages( $args );
        if ($max > 1 ) echo '</div><pre>';
  }
  
  // read more
function nexus_custom_excerpt_more( $more ) {
    return '<br> <br><a href="' . get_permalink( get_the_ID() ) . '" class="readmorebtn">Read More</a>';
  }
  add_filter( 'excerpt_more', 'nexus_custom_excerpt_more' );
  
  function nexus_excerpt_lenght($length){
    return 40;
  }
  add_filter('excerpt_length', 'nexus_excerpt_lenght', 999);
  
  
  
<?php
// Menu Register
register_nav_menu( 'main_menu', __('Main Menu', 'nexus') );

// Widget Register

function custom_widget_init() {
  register_sidebar( array(
      'name' => __('Sidebar Widget', 'nexus'),
      'id'            => 'sidebar_widget',
      'before_widget' => '<div class="widget">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
  ) );
  register_sidebar(array(
    'name' => __('Footer Widget Area ', 'nexus'),
    'id'   => 'footer',
    'description' => __('Apperas in the sidebar in blog page and also other page', 'nexus'),
    'before_widget' => '<div class="child_sidebar">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="title">',
    'after_title' => '</h2>',
  ));
}
add_action( 'widgets_init', 'custom_widget_init' );
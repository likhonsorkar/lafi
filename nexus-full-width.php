<?php
/*
Template Name: Nexus Full Width
Template Post Type: page
*/

get_header(); ?>
<?php
    if (have_posts()) :
    while (have_posts()) : the_post();
?>
<!-- the post -->
<?php the_content(); ?>                     
 <?php
    endwhile;
    else :
     _e('No post found', 'nexus');
    endif; ?>
<?php if(comments_open() ) : ?>
<?php comments_template(); ?>
<?php endif; ?> 
<?php get_footer(); ?>

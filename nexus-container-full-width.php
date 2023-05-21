<?php
/*
Template Name: Nexus Container Full Width
Template Post Type: page
*/

get_header(); ?>
<div class="container">
    
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

</div>
<?php get_footer(); ?>

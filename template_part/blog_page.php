<?php
    if (have_posts()) :
    while (have_posts()) : the_post();
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="blog_area">
    <!-- the post -->
        <h2 class="page-title">
                <?php the_title(); ?>
            </a>
        </h2>
    <div class="post-content">
        <?php the_content(); ?>
    </div>
                        
</div>
 <?php
    endwhile;
    else :
     _e('No post found', 'nexus');
    endif; ?>
    <div id="comments_area">
        <?php if(comments_open() ) : ?>
        <?php comments_template(); ?>
                <?php endif; ?> 
    </div>
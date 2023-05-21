<?php
    get_header();
?>
<section class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php the_archive_title( '<h1 class="page-title pm-color">', '</h1>' ); ?>
                    <?php the_archive_description( '<div class="taxonomy-description sn-color">', '</div>' ); ?>
                    <?php 
                        if(have_posts()):
                            while(have_posts()): the_post();
                    ?>
                    <!-- blog area -->
                    <div id="post-<?php the_ID(); ?>" class="blog-area p-3 mb-2">
                        <div class="blog-thumb">
                        <?php if ( has_post_thumbnail() ) : ?>
                          <a href="<?php the_permalink();?>"><?php the_post_thumbnail('my-custom-size'); ?></a>
                      <?php endif; ?>
                        </div>
                        <h2 class="blog-title">
                            <a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                        </h2>
                        <p>Posted by <?php the_author(); ?> | Category: <?php the_category(', '); ?> | Date: <?php the_date(); ?></p>
                        <?php the_excerpt();?>
                    </div>
                    <?php
                        endwhile;
                        else :
                        // _e('No post found', 'nexus');
                        ?>
                        <p class="text-center">No Post Was Found</p>
                        <?php
                        endif;
                    ?>

                    <div id="page_nav">
                            <?php if ('nexus_pagenav') {nexus_pagenav(); } else{ ?>
                                <?php next_posts_link(); ?>
                                <?php previous_posts_link(); ?>
                            <?php } ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
   </section>

   <?php get_footer(); ?>
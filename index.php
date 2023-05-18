<?php
    get_header();
?>
<section class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
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
                </div>
            </div>
        </div>
   </section>
   <?php get_footer(); ?>
<?php get_header(); ?>
<section class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php
                    if (have_posts()) :
                    while (have_posts()) : the_post();
                ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="blog_area">
                    <!-- post thumb -->
                    <div class="post_thumb">
                        <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail('my-custom-size'); ?></a>
                        <?php endif; ?>
                    </div>
                    <!-- the post -->
                        <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                        <p class="text-muted mb-5"> Posted on <?php the_date(); ?> at <?php the_time(); ?> by <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></p>
                        <div class="post-content">
                        <?php the_content(); ?>
                        </div>
                        
                        </div>
                        <?php
                            endwhile;
                            else :
                            _e('No post found', 'wpmyblog');
                            endif;
                        ?>
                    <div id="comments_area">
                        <?php if(comments_open() ) : ?>
                            <?php comments_template(); ?>
                        <?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
   </section>
<?php get_footer(); ?>
<?php get_header(); ?>
<section class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <?php get_template_part('/template_part/blog_page') ?>
                </div>
                <div class="col-lg-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
   </section>
<?php get_footer(); ?>
<?php
/*
* This template for displaying the index page
*/
?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>" class="no-js">
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
   <header id="nexus-header">
        <div class="container-fluid">
            <nav>
                <!-- Navbar Logo -->
                <div class="logo">
                    <a href="<?php echo esc_url(home_url()); ?>">
                        <?php
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                            if ( has_custom_logo() ) {
                                echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                            } else {
                                echo '<h1>' . get_bloginfo('name') . '</h1>';
                            }
                        ?>
                    </a>
                </div>
                <div class="menu-bar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                      </svg>
                </div>
                <div class="menu-links show">
                    <!-- Main Menu  -->
                     <?php wp_nav_menu( array('theme_location' => 'main_menu', 'menu_id' => 'nav') ); ?>
                </div>
            </nav>
        </div>
   </header>

   <section>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <?php 
                        if(have_posts()):
                            while(have_posts()): the_post();
                    ?>
                    <!-- blog area -->
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="blog-area">
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

                <div class="col-md-3">
                    <?php get_sidebar( ); ?>
                </div>
            </div>
        </div>
   </section>

   <footer>
        <div class="container-fluid">
            <p class="text-center">
            <?php echo esc_html(get_theme_mod('nexus_footer_text', __('All right reserved &copy 2023', 'wpmyblog'))); ?>
            </p>
        </div>
   </footer>
<?php wp_footer(); ?>
</body>
</body>
</html>
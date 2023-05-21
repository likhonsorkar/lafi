
<footer>
        <div class="container-fluid mt-1">

        <?php if ( is_active_sidebar( 'footer' ) ) : ?>
            <div class="container pt-2">
                <?php dynamic_sidebar( 'footer' ); ?>
            </div>
            <hr>
        <?php else: ?>
        <?php endif; ?>
            <p class="text-center">
            <?php echo esc_html(get_theme_mod('nexus_footer_text', __('All right reserved &copy 2023', 'nexus'))); ?>
            </p>
        </div>
   </footer>

   <?php wp_footer(); ?>
</body>
</body>
</html>
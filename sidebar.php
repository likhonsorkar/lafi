<div class="child-sidebar">
<?php if ( is_active_sidebar( 'sidebar_widget' ) ) : ?>
    <div class="widget-area">
        <?php dynamic_sidebar( 'sidebar_widget' ); ?>
    </div>
<?php else: ?>


<div class="defualt-sidebar">
    <h3>Search</h3>
            <div class="search mb-1">
                <?php get_search_form(); ?>
            </div>
    <h3>Recent Posts</h3>
    <div class="recent-posts">
        <?php
            $recent_posts = wp_get_recent_posts(array(
            'numberposts' => 5, // Specify the number of recent posts to display
            'post_status' => 'publish', // Show only published posts
             ));
                        
            foreach ($recent_posts as $post) {
                $post_thumbnail = get_the_post_thumbnail($post['ID'], 'thumbnail'); // Get the post thumbnail
                $post_title = get_the_title($post['ID']); // Get the post title
                $post_excerpt = get_the_excerpt($post['ID']); // Get the post excerpt

            ?>
            <div>
                <a href="<?php echo get_permalink($post['ID']); ?>">
                    <div class="row mb-3">
                        <div class="thumbnail col-sm-4">
                            <?php echo $post_thumbnail; ?>
                        </div>
                        <div class="post-details col-sm-7">
                            <h4><?php echo $post_title; ?></h4>
                        </div>
                    </div>
                </a>
            </div>
            <?php
            }
            ?>
    </div>

    <h3>Categories</h3>
    <ul class="category-list">
        <?php
        $categories = get_categories();
        foreach ($categories as $category) {
            $category_link = get_category_link($category->term_id);
            $subcategory_args = array(
                'child_of' => $category->term_id,
                'taxonomy' => 'category'
            );
            $subcategories = get_categories($subcategory_args);
        ?>
        <li class="category-list2">
            <a href="<?php echo esc_url($category_link); ?>">
                <div class="category-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z"/>
                <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z"/>
                </svg>
                </div>
                <div class="category-details">
                    <span class="category-name"><?php echo esc_html($category->name); ?></span>
                    <span class="post-count">(<?php echo esc_html($category->count); ?>)</span>
                </div>
            </a>
            <?php if (!empty($subcategories)) { ?>
                <ul class="sub-category-list">
                    <?php foreach ($subcategories as $subcategory) { ?>
                        <li><a href="<?php echo esc_url(get_category_link($subcategory->term_id)); ?>"><?php echo esc_html($subcategory->name); ?></a></li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </li>
        <?php } ?>  
    </ul>   

    <h3>Tags</h3>
    <div class="tag-list">
        <?php
        $tags = get_tags();
        foreach ($tags as $tag) {
            $tag_link = get_tag_link($tag->term_id);
        ?>
            <a href="<?php echo esc_url($tag_link); ?>" class="tagbtn"><?php echo esc_html($tag->name); ?>,</a>
        <?php } ?>
    </div>
    </div>
    <?php endif; ?>
</div>
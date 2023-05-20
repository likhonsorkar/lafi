<?php
if (post_password_required()) {
    return;
}

if (have_comments()) {
    ?>
    <h3 class="mb-4"><?php _e('Comments', 'nexus'); ?></h3>
    <ul class="comment-list">
        <?php
        wp_list_comments(
            array(
                'style' => 'ul',
                'avatar_size' => 64,
                'short_ping' => true,
                'callback' => 'nexus_comment_callback', // Custom callback function for comment display
            )
        );
        ?>
    </ul>
    <?php
}

$comment_form_args = array(
    'comment_field' => '<div class="form-group">
        <label for="commentInput">' . __('Comment', 'nexus') . '</label>
        <textarea class="form-control" id="commentInput" name="comment" rows="3" aria-required="true"></textarea>
    </div>',
    'fields' => array(
        'author' => '<div class="form-group">
            <label for="nameInput">' . __('Name', 'nexus') . '</label>
            <input type="text" class="form-control" id="nameInput" name="author" placeholder="' . __('Enter your name', 'nexus') . '" aria-required="true">
        </div>',
        'email' => '<div class="form-group">
            <label for="emailInput">' . __('Email', 'nexus') . '</label>
            <input type="email" class="form-control" id="emailInput" name="email" placeholder="' . __('Enter your email', 'nexus') . '" aria-required="true">
        </div>',
        'url' => '<div class="form-group">
            <label for="urlInput">' . __('Website', 'nexus') . '</label>
            <input type="url" class="form-control" id="urlInput" name="url" placeholder="' . __('Enter your website', 'nexus') . '">
        </div>',
    ),
    'class_submit' => 'btn commentbtn mt-1',
    'label_submit' => __('Submit', 'nexus'),
);

comment_form($comment_form_args);

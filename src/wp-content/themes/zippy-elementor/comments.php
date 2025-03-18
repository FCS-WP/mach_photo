<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 * @package emerce
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}

?>
<div class="row">
    <div class="col-md-12 col-12">


        <div id="comments" class="comments-area">
            <?php if (have_comments()) : ?>


                <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
                    <nav id="comment-nav-above" class="comment-navigation" role="navigation">
                        <h1 class="screen-reader-text"><?php _e('Comment navigation', 'emerce'); ?></h1>
                        <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'emerce')); ?></div>
                        <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'emerce')); ?></div>
                    </nav>
                <?php endif; ?>

                <ul class="comment-list">
                    <?php
                    wp_list_comments(array(
                        'callback' => 'emerce_comments'
                    ));
                    ?>
                </ul>

                <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
                    <nav id="comment-nav-below" class="comment-navigation" role="navigation">
                        <h1 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'emerce'); ?></h1>
                        <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'emerce')); ?></div>
                        <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'emerce')); ?></div>
                    </nav>
                <?php endif; ?>

            <?php endif; ?>


            <?php
            $commenter = wp_get_current_commenter();
            $req = get_option('require_name_email');
            $loginlink = get_theme_mod('login_url');
            $aria_req = ($req ? " aria-required='true'" : '');
            comment_form(
                array(
                    'id_form' => 'commentform',
                    'id_submit' => 'submit',
                    'title_reply' => esc_html__('Share Your Valuable Opinions', 'emerce'),
                    'title_reply_to' => esc_html__('Leave a Reply to %s', 'emerce'),
                    'cancel_reply_link' => esc_html__('Cancel Reply', 'emerce'),
                    'label_submit' => esc_html__('Post Comment', 'emerce'),
                    'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . esc_attr__('Write Your Comment....', 'emerce') . '">' . '</textarea></p>',
                    'must_log_in' => '<p class="must-log-in">' . sprintf(__('You must be <a href="%s">logged in</a> to post a comment', 'emerce'), wp_login_url(apply_filters('the_permalink', get_permalink()))) . '</p>',

                    'comment_notes_before' => '',
                    'comment_notes_after' => '',
                    'fields' => apply_filters('comment_form_default_fields', array(
                            'author' => '<div class="comment-box-information row"><p class="col-12 col-md-4 comment-form-author comment-form-field"><input id="author" name="author" type="text" placeholder="' . esc_attr__('Name', 'emerce') . '"' . $aria_req . ' /></p>',

                            'email' => '<p class="col-12 col-md-4 comment-form-email comment-form-field"><input id="email" name="email" type="text" placeholder="' . esc_attr__('Email', 'emerce') . '"' . $aria_req . ' /></p>',

                            'url' => '<p class="col-12 col-md-4 comment-form-url comment-form-field"><input id="url" name="url" type="text" placeholder="' . esc_attr__('Website (optional)', 'emerce') . '" /></p></div>'
                        )
                    ),
                    'logged_in_as' => '<p class="logged-in-as">' . sprintf(__('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s">Log out?</a>', 'emerce'), admin_url('profile.php'), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink()))) . '</p>',
                )
            );
            ?>

            <?php
            $args = array(
                'fields' => apply_filters(
                    'comment_form_default_fields', array(
                        'author' => '<p class="comment-form-author">' . '<input id="author" placeholder="' . esc_attr__('Your Name', 'emerce') . '" name="author" type="text" value="' .
                            esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' />' .
                            '<label for="author">' . esc_attr__('Your Name', 'emerce') . '</label> ' .
                            ($req ? '<span class="required">*</span>' : '') .
                            '</p>'
                    ,
                        'email' => '<p class="comment-form-email">' . '<input id="email" placeholder="' . esc_attr__('Email', 'emerce') . '" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) .
                            '" size="30"' . $aria_req . ' />' .
                            '<label for="email">' . esc_attr__('Your Email', 'emerce') . '</label> ' .
                            ($req ? '<span class="required">*</span>' : '')
                            .
                            '</p>',
                        'url' => '<p class="comment-form-url">' .
                            '<input id="url" name="url" placeholder="' . esc_attr__('Write a Comment', 'emerce') . '" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /> ' .
                            '<label for="url">' . esc_attr__('Website', 'emerce') . '</label>' .
                            '</p>'
                    )
                ),
                'comment_field' => '<p class="comment-form-comment">' .
                    '<label for="comment">' . esc_attr__('Let us know what you have to say:', 'emerce') . '</label>' .
                    '<textarea id="comment" name="comment" placeholder="' . esc_attr__('Express your thoughts, idea or write a feedback by clicking here & start an awesome comment', 'emerce') . '" cols="45" rows="8" aria-required="true"></textarea>' .
                    '</p>',
                'comment_notes_after' => '',
                'title_reply' => '<div class="crunchify-text"> <h5>' . esc_attr__('Please Post Your Comments & Reviews', 'emerce') . '</h5></div>'
            ); ?>



            <?php
            // If comments are closed and there are comments, let's leave a little note, shall we?
            if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
                ?>
                <p class="no-comments"><?php esc_html_e('Comments are closed.', 'emerce'); ?></p>
            <?php endif; ?>


        </div>
    </div>
</div>
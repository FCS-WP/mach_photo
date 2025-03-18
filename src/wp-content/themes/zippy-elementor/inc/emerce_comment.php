<?php
if (!function_exists('emerce_comments')) :
    function emerce_comments($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
            <div class="comment-body">
                <?php esc_html_e('Pingback:', 'emerce'); ?><?php comment_author_link(); ?><?php edit_comment_link(esc_attr__('Edit', 'emerce'), '<span class="edit-link">', '</span>'); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>

            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body row">

                <header class="comment-meta col-12 col-md-1">
                    <div class="comment-author vcard">
                        <?php echo get_avatar($comment, 140); ?>


                    </div><!-- .comment-author-avatar -->


                </header>


                <div class="comment-content col-12 col-md-11">
                    <div class="comment-title-meta d-md-flex justify-content-between">
                        <?php printf(esc_html__('%s', 'emerce'), sprintf('<h3 class="comment-author-title">%s</h3>', get_comment_author_link())); ?>

                        <div class="comment-metadata">
                            <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                <time datetime="<?php comment_time('c'); ?>">
                                    <?php printf(esc_html__('%1$s at %2$s', 'emerce'), get_comment_date(), get_comment_time()); ?>
                                </time>
                            </a>
                        </div><!-- .comment-metadata -->
                    </div>
                    <?php if ('0' == $comment->comment_approved) : ?>
                        <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'emerce'); ?></p>
                    <?php endif; ?>


                    <div class="comment-text"><?php comment_text(); ?></div><!-- .comment-text -->

                    <?php
                    comment_reply_link(array_merge($args, array(
                        'add_below' => 'div-comment',
                        'depth' => $depth,
                        'max_depth' => $args['max_depth'],
                        'before' => '<span class="comment-reply">',
                        'after' => '</span>',
                    )));
                    ?>

                    <?php edit_comment_link(esc_html__('Edit', 'emerce')); ?>

                    <div class="comment-separator"></div>

                </div><!-- .comment-content -->

            </article><!-- .comment-body -->

        <?php
        endif;
    }
endif; // ends check for emerce_comments()
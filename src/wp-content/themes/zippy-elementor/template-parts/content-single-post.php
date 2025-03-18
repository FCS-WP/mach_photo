<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Emerce
 */

$title_hide_wd = cs_get_option('x_sbl_width_set');

$tag_list = get_the_tag_list('', '<span class="tagcomma">,</span> ', '');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="emerce-single-blog-header">
        <div class="emerce-single-post-condensed-container">
            <div class="emerce-single-post-breadcumb">
                <?php emerce_breadcrumbs(); ?>
            </div>
            <?php
            if (is_singular()) :
                the_title('<h1 class="post-title">', '</h1>');
            else :
                the_title('<h2 class="post-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            endif;
            ?>

            <div class="post-meta">
                <ul>
                    <li><i class="zil zi-user"></i> <?php emerce_posted_by(); ?></li>
                    <?php if (get_the_category_list()) { ?>
                        <li>    <i class="zil zi-archive"></i> <?php emerce_post_cat(); ?></li>    <?php } ?>
                    <li><i class="zil zi-clock"></i> <?php emerce_posted_on(); ?></li>
                </ul>


            </div><!-- .post-meta -->


        </div>
    </div>

    <?php
    // display featured image?
    if (has_post_thumbnail()) :?>
        <div class="container post-thumb-single">

            <?php emerce_post_thumbnail('full', array('class' => 'img-responsive')); ?>

        </div>

    <?php endif; ?>
    <div class="emerce-content-post emerce-single-post-condensed-container">
        <div class="container">
            <?php the_content(); ?>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="emerce-single-post-additional-content emerce-single-post-condensed-container">
        <div class="container">


            <?php if (get_the_author_meta('description')) { ?>
                <div class="emerce-atr-block">
                    <div class="emerce-top-circle"></div>
                    <div class="emerce-author-content-box d-flex align-items-center justify-content-between">
                        <div class="emerce-author-content d-flex align-items-center">
                            <div class="emerce-author-image">
                                <?php echo get_avatar(get_the_author_meta('email'), '58'); ?>
                            </div>
                            <div class="emerce-atr-block-details">
                                <span class="author-span-dim"><?php esc_html_e('Written by', 'emerce'); ?></span>
                                <h4><?php emerce_posted_by(); ?></h4>

                            </div>


                        </div>

                        <div class="emerce-author-follow">
                            <?php
                            if (class_exists('emerce_Public')) {
                                $teconcefollow = teconce_get_follow_unfollow_links(get_the_author_meta('ID'));

                                echo maybe_unserialize($teconcefollow);

                            }
                            ?>

                        </div>

                    </div>
                    <div class="emerce-atr-description">
                        <p><?php echo esc_html(get_the_author_meta('description')); ?></p>
                    </div>
                    <div class="emerce-bottom-circle"></div>
                </div>
            <?php } ?>


            <?php if ($tag_list) { ?>
                <div class="emerce-single-post-tag-box">
                    <span class="tags-label">Tags:</span> <?php echo maybe_unserialize($tag_list); ?>
                </div>
            <?php } ?>

            <div class="emerce-post-social">

                <?php
                if (function_exists('emerce_single_blog_social')) {
                    emerce_single_blog_social();
                }
                ?>
            </div>

        </div>
    </div>
    <div class="clearfix"></div>
    <div class="emerce-bottom-content">
        <div class="container">
            <?php if (class_exists('Emerce_Core')) { ?>
                <div class="emerce-single-related-post row">
                    <h4><?php esc_html_e('Related Post', 'emerce'); ?></h4>
                    <?php
                    $orig_post = $post;
                    global $post;
                    $tags = wp_get_post_tags($post->ID);

                    if ($tags) {

                        $tag_ids = array();
                        foreach ($tags as $individual_tag) {
                            $tag_ids[] = $individual_tag->term_id;
                        }
                        $args = array(
                            'tag__in' => $tag_ids,
                            'post__not_in' => array($post->ID),
                            'posts_per_page' => 3, // Number of related posts to display.
                            'ignore_sticky_posts' => 1
                        );

                        $my_query = new wp_query($args);

                        while ($my_query->have_posts()) {
                            $my_query->the_post();
                            ?>

                            <div class="relatedthumb col-12 col-md-4">
                                <?php get_template_part('template-parts/post-style/post-style-one'); ?>
                            </div>

                        <?php }
                    }
                    $post = $orig_post;
                    wp_reset_query();
                    ?>
                </div>
            <?php } ?>

            <div class="emerce-single-post-condensed-container">
                <?php

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </div>
        </div>
    </div>
</article>
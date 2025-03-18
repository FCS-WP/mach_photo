<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Emerce
 */
$title_hide_wd = cs_get_option('x_bd_width_set');
if ($title_hide_wd == true) {
    $containerxpc = 'container emerce-extended-container';
} else {

    $containerxpc = 'w-100';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="<?php echo esc_html($containerxpc); ?>">
        <div class="emerce-common-breadcrumbs emerce-page-breadcrumb">
            <?php the_title('<h1 class="post-title">', '</h1>'); ?>
            <div class="emerce-breadcrumb">
                <?php emerce_breadcrumbs(); ?>
            </div>
        </div>
    </section><!-- .post-header -->

    <?php emerce_post_thumbnail(); ?>
    <div class="container">
        <div class="post-content single-page-content">
            <?php
            the_content();

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'emerce'),
                    'after' => '</div>',
                )
            );
            ?>
        </div><!-- .post-content -->
        <div class="clearfix">

        </div>
        <?php if (get_edit_post_link()) : ?>
            <footer class="post-footer">
                <?php
                edit_post_link(
                    sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Edit <span class="screen-reader-text">%s</span>', 'emerce'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        wp_filter_kses(get_the_title())
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
                ?>
            </footer><!-- .post-footer -->
        <?php endif; ?>

    </div>
</article><!-- #post-<?php the_ID(); ?> -->
<div class="clearfix"></div>
<div class="emerce-page-comment-section">
    <div class="container">
        <?php // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;

        ?>
    </div>

</div>

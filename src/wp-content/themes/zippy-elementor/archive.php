<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Emerce
 */

get_header();
$title_hide_wd = cs_get_option('x_bd_width_set');
if ($title_hide_wd == true) {
    $containerxpc = 'container emerce-extended-container';

} else {
    $containerxpc = 'w-100';
}
?>
    <section class="<?php echo esc_html($containerxpc); ?>">
        <div class="emerce-common-breadcrumbs ">
            <?php
            the_archive_title('<h1 class="page-title">', '</h1>');
            the_archive_description('<div class="archive-description">', '</div>');
            ?>
        </div>
    </section>
    <section class="emerce-page-main-content">
        <div class="container">
            <div class="row gx-6">
                <?php if (is_active_sidebar('emerce-sidebar')) { ?>
                <div class="col-lg-8">
                    <?php }else{ ?>
                    <div class="col-lg-8 offset-md-2">
                        <?php } ?>
                        <?php if (have_posts()) : ?>


                            <?php
                            /* Start the Loop */
                            while (have_posts()) :
                                the_post();

                                /*
                                * Include the Post-Type-specific template for the content.
                                * If you want to override this in a child theme, then include a file
                                * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                */
                                get_template_part('template-parts/content', 'post');

                            endwhile;

                            emerce_page_navs();

                        else :

                            get_template_part('template-parts/content', 'none');

                        endif;
                        ?>
                    </div>


                    <?php if (is_active_sidebar('emerce-sidebar')) { ?>
                        <div class="col-lg-4">
                            <?php dynamic_sidebar('emerce-sidebar'); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
    </section>
<?php

get_footer();

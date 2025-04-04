<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
            <h1 class="page_title_single"><?php esc_html_e('Blog', 'emerce'); ?></h1>
        </div>
    </section>
    <section class="emerce-page-main-content ">
        <div class="container">
            <div class="row gx-6">
                <?php if (is_active_sidebar('emerce-sidebar')) { ?>
                <div class="col-lg-8">
                    <?php }else{ ?>
                    <div class="col-md-12">
                        <?php } ?>

                        <?php
                        if (have_posts()) :

                            if (is_home() && !is_front_page()) :
                                ?>
                                <header>
                                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                </header>
                            <?php
                            endif;

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
            </div><!-- #container -->
    </section>
<?php

get_footer();

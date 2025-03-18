<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
            if (have_posts()) {

                ?>

                <h1 class="page_title_single"><?php
                    /* translators: %s: search query. */
                    printf(esc_html__('Search Results for: %s', 'emerce'), '<span>' . get_search_query() . '</span>');
                    ?></h1>
            <?php } else { ?>
                <h1 class="page_title_single"><?php esc_html_e('Nothing Found', 'emerce'); ?></h1>
            <?php } ?>
        </div>
    </section>
    <section class="emerce-page-main-content">
        <div class="container">
            <div class="row">


                <?php
                if (have_posts()) :

                    ?>

                    <?php


                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();

                        /*
                        * Include the Post-Type-specific template for the content.
                        * If you want to override this in a child theme, then include a file
                        * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                        */
                        get_template_part('template-parts/search/content', get_post_format());

                    endwhile;

                    emerce_page_navs();

                else :

                    get_template_part('template-parts/content', 'none');

                endif;
                ?>


            </div>
        </div><!-- #container -->
    </section>
<?php

get_footer();

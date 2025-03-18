<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package emerce
 */

get_header();

$title_hide_wd = cs_get_option('x_bd_width_set');

?>

    <section class="emerce-page-main-content-404 ">
        <div id="primary" class="container emerce-404-page text-center">
            <main id="main" class="site-main">

                <div class="container mx-auto error-404 not-found">
                    <div class="imga-404-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/404page.svg"
                             alt="<?php echo esc_attr('404', 'emerce'); ?>">
                    </div>
                    <div class="page-header w-full">
                        <h3 class="page-title-404"><?php esc_html_e('Oops.... Page Not Found!', 'emerce'); ?></h3>
                    </div><!-- .page-header -->
                    <div class="clearfix"></div>
                    <div class="page-content-404">
                        <p><?php esc_html_e('Please return to the sites homepage, It looks like nothing was found at this location', 'emerce'); ?></p>

                        <a class="back-to-hm-btn"
                           href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back to Home', 'emerce'); ?></a>


                    </div><!-- .page-content -->
                </div><!-- .error-404 -->
                <div class="clearfix"></div>


            </main><!-- #main -->
        </div><!-- #primary -->
    </section>

    <div class="clearfix"></div>
<?php
get_footer();

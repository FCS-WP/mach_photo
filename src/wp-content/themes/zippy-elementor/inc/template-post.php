<?php
if (!function_exists('emerce_post_style_list_sidebar')) {
    function emerce_post_style_list_sidebar()
    { ?>
        <li class="sidebar-post-list-item row items-center">
            <div class="list-post-image col-12 col-md-4">
                <div class="emerce_post_thumbnail_inner">
                    <a href="<?php the_permalink(); ?>"> <?php if (has_post_thumbnail()) {
                            the_post_thumbnail('emerce-woo-product-square');
                        } ?></a>
                </div>
            </div>
            <div class="list-post-meta col-12 col-md-8">
                <h4><a href="<?php the_permalink(); ?>"><?php echo emerce_title_trim($maxchar = 38); ?></a></h4>
                <div class="sidebar-post-meta">
                    <span><i class="zil zi-clock"></i> <?php emerce_posted_on(); ?></span>
                </div>

            </div>
        </li>
    <?php }
}
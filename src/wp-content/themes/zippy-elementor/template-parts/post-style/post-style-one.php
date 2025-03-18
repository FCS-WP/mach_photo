<div class="emerce-single-blog">
    <?php if (has_post_thumbnail()) { ?>
        <a href="<?php the_permalink(); ?>" class="emerce-post-thumbnail">
            <?php the_post_thumbnail('emerce-default-post-st-one'); ?>
        </a>
    <?php } ?>
    <div class="emerce-blog-meta">
                            <span class="meta-name"> <i class="zil zi-tag"></i>
                             <?php echo emerce_post_cat(); ?></span>
        <span class="meta-date"> <i class="zil zi-clock"></i>
                             <?php emerce_posted_on(); ?></span>
    </div>

    <h2 class="emerce-blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

    <a href="<?php the_permalink(); ?>" class="readmore-btn"><?php echo esc_html('Read More', 'emerce') ?></a>
</div>
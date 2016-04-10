<div class="row">
    <div class="large-6 columns">
        <a href="javascript:void(0)" class="post-thumbnail">
            <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail() ?>
            <?php else: ?>
                <img src="<?php echo get_template_directory_uri() ?>/images/thumbnail.svg" alt="Thumbnail">
            <?php endif; ?>
        </a>
    </div>
    <div class="large-6 columns">
        <?php the_title(sprintf('<h5><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h5>'); ?>
        <p>
            <span><i class="fa fa-fw fa-user"></i>By <?php the_author(); ?> &nbsp;&nbsp;</span>
            <span><i class="fa fa-fw fa-calendar"></i><?php the_date(); ?> &nbsp;&nbsp;</span>
            <span><i class="fa fa-fw fa-book"></i><?php the_category(', '); ?></span>
        </p>
        <?php the_excerpt(); ?>
        <span><?php the_tags(); ?></span>
    </div>
</div>
<hr>
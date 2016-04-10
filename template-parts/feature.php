<li>
    <a href="" class="feature-thumbnail">
        <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail() ?>
        <?php else: ?>
            <img src="<?php echo get_template_directory_uri() ?>/images/thumbnail.svg" alt="Thumbnail">
        <?php endif; ?>
    </a>
    <?php the_title(sprintf('<a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a>'); ?>
</li>
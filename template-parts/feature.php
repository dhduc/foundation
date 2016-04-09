<li>
    <a href="" class="feature-thumbnail"><?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?></a>
    <?php the_title(sprintf('<a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a>'); ?>
</li>
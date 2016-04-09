<?php
/**
 * Single index
 */
?>
<?php get_header(); ?>
    <div class="row">
        <div class="large-8 columns" style="border-right: 1px solid #E3E5E8;">
            <p><?php if (function_exists('wpbreadcrumbs')) { wpbreadcrumbs(); } ?></p>
            <article>
                <?php
                // Start the loop.
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content', 'single');
                    // End the loop.
                endwhile;
                comments_template( '', true );
                // Previous/next page navigation.
                the_posts_pagination(array(
                    'prev_text' => __('Previous page', 'twentysixteen'),
                    'next_text' => __('Next page', 'twentysixteen'),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'twentysixteen') . ' </span>',
                ));
                ?>
            </article>
        </div>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>
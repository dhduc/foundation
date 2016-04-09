<?php
/**
 * Search index
 */
?>
<?php get_header(); ?>
    <div class="row">
        <div class="large-8 columns" style="border-right: 1px solid #E3E5E8;">
            <article>
                <?php if (have_posts()) : ?>
                    <header class="page-header">
                        <h2 class="page-title success"><i class="fa fa-fw fa-search"></i><?php printf(__('Search Results for: %s', 'twentysixteen'), '<span>' . esc_html(get_search_query()) . '</span>'); ?></h2>
                    </header><!-- .page-header -->
                    <?php
                    // Start the loop.
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content', 'search');
                        // End the loop.
                    endwhile;

                // If no content, include the "No posts found" template.
                else : ?>
                    <h2 class="page-title alert"><i class="fa fa-fw fa-search"></i><?php printf(__('Search Results for: %s', 'twentysixteen'), '<span>' . esc_html(get_search_query()) . '</span>'); ?>
                        not found!</h2>
                <?php endif; ?>
            </article>
        </div>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>
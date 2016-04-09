<?php
/**
 * Archive index
 */
?>
<?php get_header(); ?>
    <div class="row">
        <div class="large-8 columns" style="border-right: 1px solid #E3E5E8;">
            <?php if (function_exists('wpbreadcrumbs')) { wpbreadcrumbs(); } ?>
            <article>
                <?php if (have_posts()) : ?>
                    <?php if (is_home() && !is_front_page()) : ?>
                        <header>
                            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                        </header>
                    <?php endif; ?>
                    <?php
                    // Start the loop.
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content', get_post_format());
                        // End the loop.
                    endwhile;
                    // Pagination
                    numeric_posts_nav();
                // If no content, include the "No posts found" template.
                else :
                    get_template_part('template-parts/content', 'none');
                endif;
                ?>
            </article>
        </div>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>
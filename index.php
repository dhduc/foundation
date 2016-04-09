<?php
/**
 * Homepage index
 */
?>
<?php get_header(); ?>
<?php if (is_home() && is_front_page()) : ?>
    <div class="row">
        <div class="medium-8 columns">
            <div class="slider-wrapper theme-default">
                <?php
                $slide = new WP_Query();
                $slide->query('showposts=5&post_type=slide');
                if ($slide->have_posts()): ?>
                    <div id="slider" class="nivoSlider">
                        <?php while ($slide->have_posts()) : $slide->the_post(); ?>
                            <a href="<?php echo the_permalink(); ?>">
                                <img src="<?php echo thumb_image(); ?>" alt="<?php the_title() ?>"
                                     title="<?php the_title() ?>"/>
                            </a>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <p>Please setup slideshow</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="medium-4 columns">
            <ul class="vertical">
                <?php if (have_posts()) : ?>
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 6;
                    $args = array(
                        'posts_per_page' => $paged,
                        'ignore_sticky_posts' => 1,
                        'orderby' => 'date',
                        'meta_key' => 'feature',
                        'meta_compare' => '=',
                        'meta_value' => 'Enable',
                    );
                    $featurePost = new WP_Query($args);
                    while ($featurePost->have_posts()) : $featurePost->the_post();
                        get_template_part('template-parts/feature', get_post_format());
                    endwhile;
                endif;
                ?>
            </ul>
        </div>
    </div>
    <hr>
<?php endif; ?>
    <div class="row">
        <div class="large-8 columns" style="border-right: 1px solid #E3E5E8;">
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
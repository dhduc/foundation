<?php
/**
 * Wordpress foundation theme
 */
?>
<?php get_header(); ?>

    
    <?php if (is_home() && is_front_page()) : ?>
          <div class="row">
        <div class="medium-8 columns">
            <p><img src="<?php echo get_template_directory_uri(); ?>/images/900x450&amp;text=Promoted Article"
                    alt="main article image"></p>
        </div>
        <div class="medium-4 columns">
            <ul class="vertical">
               <?php if (have_posts()) : ?>
                    <?php
                    // Start the loop.
                    $featurePost = new WP_Query();
                    $featurePost->query('showposts=7&featured=yes&orderby=date');
                    while($featurePost->have_posts()) : $featurePost->the_post(); 

                        get_template_part('template-parts/feature', get_post_format());

                        // End the loop.
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
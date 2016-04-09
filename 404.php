<?php
/**
 * Homepage index
 */
?>
<?php get_header(); ?>
    <div class="row">
        <div class="large-8 columns" style="border-right: 1px solid #E3E5E8;">
            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php _e('Oops! That page can&rsquo;t be found.', 'twentysixteen'); ?></h1>
                </header>
                <!-- .page-header -->

                <div class="page-content">
                    <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'twentysixteen'); ?></p>

                    <?php get_search_form(); ?>
                </div>
                <!-- .page-content -->
            </section>
            <!-- .error-404 -->
        </div>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>
<div class="row">
    <div class="large-12 columns">
        <div class="blog-post">
            <h3>
                <?php echo the_title(); ?>
            </h3>
            <p>
                <span><i class="fa fa-fw fa-calendar"></i>Date: <?php the_date(); ?> &nbsp;&nbsp;</span>
                <span><i class="fa fa-fw fa-tags"></i>Category: <?php the_category(', '); ?> </span>
                <span><i class="fa fa-fw fa-comments"></i>Tags: <?php the_tags(); ?></span>
            </p>
            <p>
                <?php echo the_excerpt() ?>
            </p>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
            <div class="callout">
                <ul class="menu simple">
                    <li><a href="#"><i class="fa fa-fw fa-user"></i>Author: <?php the_author(); ?></a></li>
                    <li><a href="#"><i class="fa fa-fw fa-comments"></i>Comments: 3</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

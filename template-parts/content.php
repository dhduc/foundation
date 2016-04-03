<div class="row">
                <div class="large-6 columns">
                    <p><?php 
     if ( has_post_thumbnail() ) {
           the_post_thumbnail();
} 
?></p>
                </div>
                <div class="large-6 columns">

                        <?php the_title( sprintf( '<h5><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>

                    <p>
                        <span><i class="fi-torso"> By <?php the_author(); ?> &nbsp;&nbsp;</i></span>
                        <span><i class="fi-calendar"> <?php the_date(); ?> &nbsp;&nbsp;</i></span>
                        <span><i class="fi-comments"> <?php the_category(', '); ?> </i></span>
                    </p>
                   <?php the_excerpt(); ?>
                   <span><i class="fi-comments">  <?php the_tags(); ?></i></span>
                </div>
            </div>
            <hr>
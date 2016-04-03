<div class="large-4 columns">
    <aside>
        <div class="row small-up-3">
            <div class="column text-center">
                <i class="fi-social-facebook"></i>
                <h6>56,009</h6>

                <p>
                    <small>FOLLOWERS</small>
                </p>
                <br>
            </div>
            <div class="column text-center">
                <i class="fi-social-twitter"></i>
                <h6>76,905</h6>

                <p>
                    <small>FOLLOWERS</small>
                </p>
                <br>
            </div>
            <div class="column text-center">
                <i class="fi-social-instagram"></i>
                <h6>34,099</h6>

                <p>
                    <small>FOLLOWERS</small>
                </p>
                <br>
            </div>
            <div class="column text-center">
                <i class="fi-social-tumblr"></i>
                <h6>13,765</h6>

                <p>
                    <small>FOLLOWERS</small>
                </p>
            </div>
            <div class="column text-center">
                <i class="fi-social-pinterest"></i>
                <h6>9,283</h6>

                <p>
                    <small>FOLLOWERS</small>
                </p>
            </div>
            <div class="column text-center">
                <i class="fi-social-youtube"></i>
                <h6>99,000</h6>

                <p>
                    <small>FOLLOWERS</small>
                </p>
            </div>
        </div>
        <br>

        <div class="row column">
            <p class="lead">FROM OUR FRIENDS</p>

            <p><img src="<?php echo get_template_directory_uri(); ?>/images/400x300&amp;text=Buy Me!"
                    alt="advertisement of ShamWow"></p>
        </div>
        <br>
        <?php if (is_active_sidebar('sidebar-1')) : ?>
            <div class="row column">
                <?php dynamic_sidebar('sidebar-1'); ?>
            </div>
        <?php endif; ?>
        <br>
        <?php if (is_active_sidebar('sidebar-2')) : ?>
            <div class="row column">
                <?php dynamic_sidebar('sidebar-2'); ?>
            </div>
        <?php endif; ?>
        <br>
        <?php if (is_active_sidebar('sidebar-3')) : ?>
            <div class="row column">
                <?php dynamic_sidebar('sidebar-3'); ?>
            </div>
        <?php endif; ?>
        <br>

        <div class="row column">
            <p class="lead">TRENDING POSTS</p>

            <div class="media-object">
                <div class="media-object-section">
                    <img class="thumbnail" src="<?php echo get_template_directory_uri(); ?>/images/100">
                </div>
                <div class="media-object-section">
                    <h5>All I need is a space suit and I'm ready to go.</h5>
                </div>
            </div>
            <div class="media-object">
                <div class="media-object-section">
                    <img class="thumbnail" src="<?php echo get_template_directory_uri(); ?>/images/100">
                </div>
                <div class="media-object-section">
                    <h5>Are the stars out tonight? I don't know if it's cloudy or bright.</h5>
                </div>
            </div>
            <div class="media-object">
                <div class="media-object-section">
                    <img class="thumbnail" src="<?php echo get_template_directory_uri(); ?>/images/100">
                </div>
                <div class="media-object-section">
                    <h5>And the world keeps spinning.</h5>
                </div>
            </div>
            <div class="media-object">
                <div class="media-object-section">
                    <img class="thumbnail" src="<?php echo get_template_directory_uri(); ?>/images/100">
                </div>
                <div class="media-object-section">
                    <h5>Cold hearted orb that rules the night.</h5>
                </div>
            </div>
        </div>


    </aside>
</div>
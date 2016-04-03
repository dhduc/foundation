<footer class="footer">
    <div class="expanded callout secondary">
        <div class="row">
            <div class="large-4 columns">
                <h5>FLICKR IMAGES</h5>

                <div class="row small-up-4">
                    <div class="column"><img class="thumbnail"
                                             src="<?php echo get_template_directory_uri(); ?>/images/75"
                                             alt="image of space dog"></div>
                    <div class="column"><img class="thumbnail"
                                             src="<?php echo get_template_directory_uri(); ?>/images/75"
                                             alt="image of space dog"></div>
                    <div class="column"><img class="thumbnail"
                                             src="<?php echo get_template_directory_uri(); ?>/images/75"
                                             alt="image of space dog"></div>
                    <div class="column"><img class="thumbnail"
                                             src="<?php echo get_template_directory_uri(); ?>/images/75"
                                             alt="image of space dog"></div>
                    <div class="column"><img class="thumbnail"
                                             src="<?php echo get_template_directory_uri(); ?>/images/75"
                                             alt="image of space dog"></div>
                    <div class="column"><img class="thumbnail"
                                             src="<?php echo get_template_directory_uri(); ?>/images/75"
                                             alt="image of space dog"></div>
                    <div class="column"><img class="thumbnail"
                                             src="<?php echo get_template_directory_uri(); ?>/images/75"
                                             alt="image of space dog"></div>
                    <div class="column"><img class="thumbnail"
                                             src="<?php echo get_template_directory_uri(); ?>/images/75"
                                             alt="image of space dog"></div>
                </div>
            </div>
            <div class="large-4 columns">
                <h5>FLICKR IMAGES</h5>
                <span class="secondary label">Space</span>
                <span class="secondary label">Galaxies</span>
                <span class="secondary label">Milky Way</span>
                <span class="secondary label">Black Holes</span>
                <span class="secondary label">Rebels</span>
                <span class="secondary label">Death Star</span>
                <span class="secondary label">Republic</span>
                <span class="secondary label">R2D2</span>
            </div>
            <div class="large-4 columns" id="contact">
                <h5>About Star Wars</h5>

                <p class="about subheader">Strike me down, and I will become more powerful than you could possibly
                    imagine.</p>
                <ul class="contact">
                    <li><p><i class="fi-marker"></i>1595 Spring Street New Britain, CT 06051</p></li>
                    <li><p><i class="fi-telephone"></i>+1-656-453-9966</p></li>
                    <li><p><i class="fi-mail"></i>contact@emperor.com</p></li>
                </ul>

                <ul class="inline-list social">
                    <a href="#"><i class="fi-social-facebook"></i></a>
                    <a href="#"><i class="fi-social-twitter"></i></a>
                    <a href="#"><i class="fi-social-linkedin"></i></a>
                    <a href="#"><i class="fi-social-github"></i></a>
                </ul>

            </div>
        </div>
    </div>
    <div class="expanded">
        <div class="row">
            <div class="medium-6 columns">
                <?php if (has_nav_menu('footer_menu')) : ?>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer_menu',
                        'menu_class' => 'menu',
                    ));
                    ?>
                <?php else: ?>
                    <p>Please set up footer menu</p>
                <?php endif; ?>
            </div>
            <div class="medium-6 columns">
                <ul class="menu align-right">
                    <li class="menu-text">Copyright © <?php echo date('Y'); ?> <?php bloginfo('name'); ?></li>
                </ul>
            </div>
        </div>
    </div>

</footer>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation.js"></script>
<script>
    $(document).foundation();
</script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/zcom.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#btn-submit').click(function (e) {
            e.preventDefault();
            $('#searchform').submit();
        });
    });
</script>

</body>
</html>
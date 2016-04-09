<footer class="footer">
    <div class="expanded callout secondary">
        <div class="row">
            <div class="large-4 columns">
                <h5>Page Site</h5>
                <?php if (has_nav_menu('page_menu')) : ?>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'page_menu',
                        'menu_class' => 'vertical',
                    ));
                    ?>
                <?php endif; ?>
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <?php dynamic_sidebar('footer-1'); ?>
                <?php endif; ?>
            </div>
            <div class="large-4 columns">
                <h5>Member Link</h5>
                <?php if (has_nav_menu('member_menu')) : ?>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'member_menu',
                        'menu_class' => 'vertical',
                    ));
                    ?>
                <?php endif; ?>
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <?php dynamic_sidebar('footer-2'); ?>
                <?php endif; ?>
            </div>
            <div class="large-4 columns" id="contact">
                <h5>About Star Wars</h5>

                <p class="about subheader">Strike me down, and I will become more powerful than you could possibly
                    imagine.</p>
                <ul class="contact">
                    <li><p><i class="fa fa-map-marker"></i><?php echo get_option('director_address', 'Please config address'); ?></p></li>
                    <li><p><i class="fa fa-phone-square"></i><?php echo get_option('director_phone', 'Please config phone'); ?></p></li>
                    <li><p><i class="fa fa-envelope"></i><?php echo get_option('director_email', 'Please config email'); ?></p></li>
                </ul>

                <ul class="inline-list social">
                    <a href="<?php echo get_option('director_facebook', 'http://facebook.com'); ?>"><i class="fa fa-facebook"></i></a>
                    <a href="<?php echo get_option('director_twitter', 'http://twitter.com'); ?>"><i class="fa fa-twitter"></i></a>
                    <a href="<?php echo get_option('director_google_plus', 'http://plus.google.com'); ?>"><i class="fa fa-google-plus"></i></a>
                    <a href="<?php echo get_option('director_youtube', 'http://youtube.com'); ?>"><i class="fa fa-youtube"></i></a>
                </ul>
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <?php dynamic_sidebar('footer-3'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="expanded">
        <div class="row">
            <div class="medium-6 columns footer-menu">
                <?php if (has_nav_menu('footer_menu')) : ?>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer_menu',
                        'menu_class' => 'menu',
                    ));
                    ?>
                <?php else: ?>
                    <p>Please setup footer menu</p>
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
<a href="#" id="back-to-top" title="Back to top"><i class="fa fa-chevron-up"></i></a>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/foundation.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery.menu.js"></script>
<script>
    $(document).foundation();
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#btn-submit').click(function (e) {
            e.preventDefault();
            $('#searchform').submit();
        });
    });
</script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
    $(window).load(function () {
        $('#slider').nivoSlider();
    });
</script>
<style>

</style>
<script type="text/javascript">
    $(document).ready(function () {
        if ($('#back-to-top').length) {
            var scrollTrigger = 100, // px
                backToTop = function () {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > scrollTrigger) {
                        $('#back-to-top').addClass('show');
                    } else {
                        $('#back-to-top').removeClass('show');
                    }
                };
            backToTop();
            $(window).on('scroll', function () {
                backToTop();
            });
            $('#back-to-top').on('click', function (e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 700);
            });
        }
    });
</script>
</body>
</html>
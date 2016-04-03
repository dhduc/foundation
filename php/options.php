<?php
// create custom plugin settings menu
add_action('admin_menu', 'add_to_appearance');

function add_to_appearance()
{

    //create new submenu
    add_menu_page("Theme Options", 'Option Settings', 'administrator', basename(__FILE__), 'director_settings_page');

    //call register settings function
    add_action('admin_init', 'register_settings');
}


function register_settings()
{
    //register our settings
    register_setting('director-settings-group', 'director_favico');
    register_setting('director-settings-group', 'director_logo');
    register_setting('director-settings-group', 'director_banner');
    register_setting('director-settings-group', 'director_address');
    register_setting('director-settings-group', 'director_phone');
    register_setting('director-settings-group', 'director_email');
    register_setting('director-settings-group', 'director_keywords');
    register_setting('director-settings-group', 'director_description');
    register_setting('director-settings-group', 'director_news');
    register_setting('director-settings-group', 'director_pagi');
    register_setting('director-settings-group', 'director_rss');
    register_setting('director-settings-group', 'director_logo');
    register_setting('director-settings-group', 'director_analytics');
    register_setting('director-settings-group', 'first_block');
    register_setting('director-settings-group', 'second_block');
    register_setting('director-settings-group', 'director_facebook');
    register_setting('director-settings-group', 'director_twitter');
    register_setting('director-settings-group', 'director_google_plus');
    register_setting('director-settings-group', 'director_youtube');
}

function director_settings_page()
{

    ?>

    <?php

    ?>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function () {

            $('ul.tabs li').click(function () {
                var tab_id = $(this).attr('data-tab');

                $('ul.tabs li').removeClass('current');
                $('.tab-content').removeClass('current');

                $(this).addClass('current');
                $("#" + tab_id).addClass('current');
            });

        });
    </script>
    <div class="wrap">
        <h2>Director Theme Settings</h2>
        <link rel="stylesheet" type="text/css" media="all"
              href="<?php echo get_template_directory_uri(); ?>/css/admin_option.css"/>

        <form id="landingOptions" method="post" action="options.php">
            <?php settings_fields('director-settings-group'); ?>
            <div class="tab_option">
                <ul class="tabs">
                    <li class="tab-link current" data-tab="tab-1">Site options</li>
                    <li class="tab-link" data-tab="tab-2">SEO</li>
                    <li class="tab-link" data-tab="tab-3">Front page options</li>
                    <li class="tab-link" data-tab="tab-4">Social options</li>

                </ul>

                <div id="tab-1" class="tab-content current">
                    <table class="form-table">
                        <tr>
                            <td id="field">
                                <table>
                                    <tr>
                                        <td>Favico icon link:</td>
                                        <td>

                                            <p><input type="text" name="director_favico"
                                                      value="<?php print get_option('director_favico'); ?>"
                                                      placeholder="URL"/></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Logo link:</td>
                                        <td>

                                            <p><input type="text" name="director_logo"
                                                      value="<?php print get_option('director_logo'); ?>"
                                                      placeholder="URL"/></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Banner link:</td>
                                        <td>

                                            <p><input type="text" name="director_banner"
                                                      value="<?php print get_option('director_banner'); ?>"
                                                      placeholder="URL"/></p>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>Address:</td>
                                        <td>
                                            <p><input type="text" name="director_address"
                                                      value="<?php print get_option('director_address'); ?>"
                                                      placeholder=""/></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Telephone number:</td>
                                        <td>
                                            <p><input type="text" name="director_phone"
                                                      value="<?php print get_option('director_phone'); ?>"
                                                      placeholder="0123456789"/></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td>
                                            <p><input type="text" name="director_email"
                                                      value="<?php print get_option('director_email'); ?>"
                                                      placeholder="example@mail.com"/></p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td id="preview">
                                <!-- Preview Favico -->
                                <p>Favico Icon:</p>
                                <?php $favico = get_option('director_favico', SITE . '/img/logo.png'); ?>
                                <p><img id="favico" src="<?php print $favico; ?>" alt="<?php bloginfo('name'); ?>"/></p>

                                <!-- Preview Logo -->
                                <p>Logo Icon:</p>
                                <?php $logo = get_option('director_logo', SITE . '/img/logo.png'); ?>
                                <p><img id="logo" src="<?php print $logo; ?>" alt="<?php bloginfo('name'); ?>"/></p>

                                <!-- Preview Banner -->
                                <p>Banner:</p>
                                <?php $banner = get_option('director_banner', SITE . '/img/logo.png'); ?>
                                <p><img id="banner" src="<?php print $banner; ?>" alt="<?php bloginfo('name'); ?>"/></p>

                            </td>
                        </tr>
                    </table>

                </div>
                <div id="tab-2" class="tab-content">
                    <table>
                        <tr>
                            <td>Meta keywords:</td>
                            <td>
                                <p><input type="text" name="director_keywords"
                                          value="<?php print get_option('director_keywords'); ?>"
                                          placeholder="Keywords"/></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Meta Descriptions:</td>
                            <td>
                                <p><input type="text" name="director_description"
                                          value="<?php print get_option('director_description'); ?>"
                                          placeholder="Description"/></p>
                            </td>
                        </tr>

                    </table>
                </div>
                <div id="tab-3" class="tab-content">
                    <table>
                        <tr>
                            <td>First block option:</td>
                            <td>
                                <p><input type="text" name="first_block"
                                          value="<?php print get_option('first_block'); ?>"
                                          placeholder="First block name"/></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Second block option:</td>
                            <td>
                                <p><input type="text" name="second_block"
                                          value="<?php print get_option('second_block'); ?>"
                                          placeholder="Second block name"/></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Post per block:</td>
                            <td>
                                <p><input type="text" name="director_news"
                                          value="<?php print get_option('director_news'); ?>" placeholder=""/></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Post per post type:</td>
                            <td>
                                <p><input type="text" name="director_pagi"
                                          value="<?php print get_option('director_pagi'); ?>" placeholder=""/></p>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="tab-4" class="tab-content">
                    <table>
                        <tr>
                            <td>Facebook:</td>
                            <td>
                                <p><input type="text" name="director_facebook"
                                          value="<?php print get_option('director_facebook'); ?>"
                                          placeholder="http://www.facebook.com"/></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Twitter:</td>
                            <td>
                                <p><input type="text" name="director_twitter"
                                          value="<?php print get_option('director_twitter'); ?>"
                                          placeholder="http://www.twitter.com"/></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Google Plus:</td>
                            <td>
                                <p><input type="text" name="director_google_plus"
                                          value="<?php print get_option('director_google_plus'); ?>"
                                          placeholder="http://plus.google.com"/></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Youtube:</td>
                            <td>
                                <p><input type="text" name="director_youtube"
                                          value="<?php print get_option('director_youtube'); ?>"
                                          placeholder="http://youtube.com"/></p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>"/>
            </p>


        </form>

    </div>
<?php } ?>
<?php

?>
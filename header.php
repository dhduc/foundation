<?php
/**
 * header
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta class="foundation-mq">
    <link rel="shortcut icon" href="./images/site/favicon.ico">
    <title> <?php wp_title('', true, 'right');
        bloginfo('name'); ?> </title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<header>

    <div class="top-bar">
        <div class="row">
            <div class="top-bar-left">
                <?php if (has_nav_menu('top_menu')) : ?>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'top_menu',
                        'menu_class' => 'menu',
                    ));
                    ?>
                <?php else: ?>
                    <p>Please set up top menu</p>
                <?php endif; ?>
            </div>

            <div class="top-bar-right">
                <ul class="menu">
                    <li>
                        <form action="<?php echo esc_url(home_url('/')); ?>" id="searchform" method="get">
                            <input type="search" onfocus="if (this.value == 'Search') {this.value = '';}"
                                   onblur="if (this.value == '')  {this.value = 'Search';}" id="s" name="s"
                                   value="Search"/>
                        </form>
                    </li>
                    <li>
                        <button type="button" class="button" id="btn-submit">Search</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="row header">
        <div class="medium-4 columns">
            <a class='logo' href="<?php echo esc_url(home_url('/')); ?>"
               title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                <img id="logo" src="<?php echo get_option('director_logo', SITE . '/images/logo'); ?>"
                     alt='<?php bloginfo('name'); ?>'/>
            </a>
        </div>
        <div class="medium-8 columns">
            <img id="banner" src="<?php echo get_option('director_banner', SITE . '/images/banner'); ?>"
                 alt='<?php bloginfo('name'); ?>'/>
        </div>
    </div>

    <br>

    <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium"
         data-responsivetoggle="vammpy-responsivetoggle" style="display: none;">
        <button class="menu-icon" type="button" data-toggle=""></button>
        <div class="title-bar-title">Menu</div>
    </div>
    <div class="top-bar" id="main-menu">
        <div class="row">
            <?php if (has_nav_menu('header_menu')) : ?>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header_menu',
                    'menu_class' => 'menu vertical medium-horizontal expanded medium-text-center dropdown',
                ));
                ?>
            <?php else: ?>
                <p>Please set up header menu</p>
            <?php endif; ?>
        </div>
    </div>
</header>
<br/>
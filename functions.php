<?php
/**
 * Core function
 */
?>

<?php
define('SITE', get_bloginfo('stylesheet_directory'));
require_once(get_stylesheet_directory() . '/php/external_function.php');
require_once(get_stylesheet_directory() . '/php/theme_function.php');
require_once(get_stylesheet_directory() . '/php/logo_function.php');
require_once(get_stylesheet_directory() . '/php/menu_function.php');
if (version_compare($GLOBALS['wp_version'], '4.4-alpha', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
}
?>
<?php
/**
 * Setup
 */
if (!function_exists('foundation_setup')) :
    function foundation_setup()
    {
        // Hidden top menu bar
        show_admin_bar(false);
        // This theme uses wp_nav_menu()
        register_nav_menus(array(
            'top_menu' => __('Top Menu', 'foundation'),
            'header_menu' => __('Header Menu', 'foundation'),
            'sidebar_menu' => __('Sidebar Menu', 'foundation'),
            'page_menu' => __('Page Menu', 'foundation'),
            'member_menu' => __('Member Menu', 'foundation'),
            'footer_menu' => __('Footer Menu', 'foundation'),
        ));
        // Thumbnail
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(370, 230);

        // Header image
        $defaults = array(
            'default-image' => '',
            'width' => 770,
            'height' => 150,
            'flex-height' => false,
            'flex-width' => false,
            'uploads' => true,
            'random-default' => false,
            'header-text' => true,
            'default-text-color' => '',
            'wp-head-callback' => '',
            'admin-head-callback' => '',
            'admin-preview-callback' => '',
        );
        add_theme_support('custom-header', $defaults);

    }
endif;
add_action('after_setup_theme', 'foundation_setup');

/**
 * Declare style and js
 */
function foundation_scripts()
{
    /**
     * Styles
     */
    // zend foundation
    wp_enqueue_style('foundation_css', get_template_directory_uri() . '/css/foundation.min.css', array(), null);
    // font awesome
    wp_enqueue_style('font_awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), null);
    // nivo slider
    wp_enqueue_style('nivo_slider', get_template_directory_uri() . '/slide/css/nivo-slider.css', array(), null);
    wp_enqueue_style('nivo_slider_theme', get_template_directory_uri() . '/slide/css/default.css', array(), null);

     // responsive menu
    wp_enqueue_style('jquery_menu', get_template_directory_uri() . '/css/jquery-menu.css', array(), null);
    // style
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), null);
    // styles
    wp_enqueue_style('styles', get_template_directory_uri() . '/css/styles.css', array(), null);

    /**
     * Scripts
     */
    // zend foundation js
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-2.1.4.min.js', array(), 2.1, true);
    // zend foundation js
    wp_enqueue_script('foundation_js', get_template_directory_uri() . '/js/foundation.js', array(), 6.0, true);
    // zcom
    wp_enqueue_script('zcom', get_template_directory_uri() . '/js/zcom.js', array(), 1.0, true);
    // jquery menu
    wp_enqueue_script('jquery_menu', get_template_directory_uri() . '/js/jquery.menu.js', array(), 1.0, true);
    // html5 for ie
    wp_enqueue_script('foundation-html5', 'https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js', array(), 3.7);
    wp_script_add_data('foundation-html5', 'conditional', 'lt IE 9');

}

add_action('wp_enqueue_scripts', 'foundation_scripts');

/**
 * Excerpt
 */
function wpdocs_custom_excerpt_length($length)
{
    return 20;
}

add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);

/**
 * Widget
 */
function foundation_widgets_init()
{
    register_sidebar(array(
        'name' => __('Slider Section', 'Foundation'),
        'id' => 'slider',
        'description' => __('Add slider widget to section', 'foundation'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
    ));

    register_sidebar(array(
        'name' => __('Sidebar 1', 'Foundation'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in sidebar section 1.', 'foundation'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="lead">',
        'after_title' => '</p>',
    ));

    register_sidebar(array(
        'name' => __('Sidebar 2', 'Foundation'),
        'id' => 'sidebar-2',
        'description' => __('Add widgets here to appear in sidebar section 2.', 'foundation'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="lead">',
        'after_title' => '</p>',
    ));

    register_sidebar(array(
        'name' => __('Sidebar 3', 'Foundation'),
        'id' => 'sidebar-3',
        'description' => __('Add widgets here to appear in sidebar section 3.', 'foundation'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="lead">',
        'after_title' => '</p>',
    ));

    register_sidebar(array(
        'name' => __('Sidebar 4', 'Foundation'),
        'id' => 'sidebar-4',
        'description' => __('Add widgets here to appear in sidebar section 4.', 'foundation'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="lead">',
        'after_title' => '</p>',
    ));

    register_sidebar(array(
        'name' => __('Sidebar 5', 'Foundation'),
        'id' => 'sidebar-5',
        'description' => __('Add widgets here to appear in sidebar section 5.', 'foundation'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="lead">',
        'after_title' => '</p>',
    ));

    register_sidebar(array(
        'name' => __('Sidebar 6', 'Foundation'),
        'id' => 'sidebar-6',
        'description' => __('Add widgets here to appear in sidebar section 6.', 'foundation'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="lead">',
        'after_title' => '</p>',
    ));

    register_sidebar(array(
        'name' => __('Footer 1', 'Foundation'),
        'id' => 'footer-1',
        'description' => __('Add widgets here to appear in footer section 1.', 'foundation'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name' => __('Footer 2', 'Foundation'),
        'id' => 'footer-2',
        'description' => __('Add widgets here to appear in footer section 2.', 'foundation'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name' => __('Footer 3', 'Foundation'),
        'id' => 'footer-3',
        'description' => __('Add widgets here to appear in footer section 3.', 'foundation'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
    ));

}

add_action('widgets_init', 'foundation_widgets_init');

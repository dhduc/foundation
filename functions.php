<?php
/**
 * Functions
 */
?>

<?php
define('SITE', get_bloginfo('stylesheet_directory'));
require_once(get_stylesheet_directory() . '/php/options.php');
if (version_compare($GLOBALS['wp_version'], '4.4-alpha', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
}

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

    }
endif;
add_action('after_setup_theme', 'foundation_setup');

/**
 * Declare style and js
 */
function foundation_scripts()
{

    // zend foundation
    wp_enqueue_style('foundation_css', get_template_directory_uri() . '/css/foundation.min.css', array(), null);
    // zend foundation icon
    wp_enqueue_style('foundation_icon', get_template_directory_uri() . '/font-icon/foundation-icons.css', array(), null);
    // flexnav menu
    wp_enqueue_style('flexnav', get_template_directory_uri() . '/css/flexnav.css', array(), null);
    // foundation style
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), null);
    // foundation styles
    wp_enqueue_style('styles', get_template_directory_uri() . '/css/styles.css', array(), null);

    // jquery
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-2.1.4.min.js', array(), '20151204', true);
    // zend foundation js
    wp_enqueue_script('foundation_js', get_template_directory_uri() . '/js/foundation.js', array(), '20151204', true);
    // zcom
    wp_enqueue_script('zcom', get_template_directory_uri() . '/js/zcom.js', array(), '20151204', true);

    // html5 for ie
    wp_enqueue_script('foundation-html5', 'https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js', array(), '3.7.3');
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
 * Pagination
 */
function numeric_posts_nav()
{

    if (is_singular())
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);

    /** Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<ul class="pagination" role="navigation" aria-label="Pagination">' . "\n";

    /** Previous Post Link */
    if (get_previous_posts_link())
        printf('<li>%s</li>' . "\n", get_previous_posts_link());

    /** Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="current"' : '';

        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

        if (!in_array(2, $links))
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array)$links as $link) {
        $class = $paged == $link ? ' class="current"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="current"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    /** Next Post Link */
    if (get_next_posts_link())
        printf('<li>%s</li>' . "\n", get_next_posts_link());

    echo '</ul>' . "\n";

}

/**
 * Widget
 */
function foundation_widgets_init()
{
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
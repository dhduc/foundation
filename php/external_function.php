<?php
/**
 * External function
 */
?>
<?php
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
 * Metabox
 */
$meta_box = array(
    'id' => 'meta-box',
    'title' => 'Option Post',
    'page' => 'post',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Feature Post: ',
            'desc' => '',
            'id' => 'feature',
            'type' => 'select',
            'std' => '',
            'options' => array(
                0 => 'Disable',
                1 => 'Enable',
            ),
        ),
    ));
function add_box()
{
    global $meta_box;
    add_meta_box($meta_box['id'], $meta_box['title'], 'show_box', 'post', $meta_box['context'], $meta_box['priority']);
}
add_action('admin_menu', 'add_box');
function show_box()
{
    global $meta_box, $post;
    // Use nonce for verification
    echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table">';
    foreach ($meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr>',
        '<th style="width:15%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
        '<td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', htmlspecialchars($meta) ? htmlspecialchars($meta) : htmlspecialchars($field['std']), '" size="30" style="width:97%" />', '<br />', $field['desc'];
                break;
            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
        }
        echo '<td>',
        '</tr>';
    }
    echo '</table>';
}
function save_data($post_id)
{
    global $meta_box;
    // verify nonce
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    foreach ($meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
add_action('save_post', 'save_data');

/**
 * Breadcrumbs
 */
if (!function_exists('wpbreadcrumbs')) :
    function wpbreadcrumbs()
    {
        $delimiter = ' <i class="fa fa-chevron-right"></i> ';
        $name = 'Trang chủ'; //text for the 'Home' link
        $currentBefore = '<span class="current bread-title">';
        $currentAfter = '</span>';
        echo '<span class="tip"> Home: </span>';
        global $post;
        $home = get_bloginfo('url');
        if (is_home() && get_query_var('paged') == 0)
            echo '<span class="home">' . $name . '</span>';
        else
            echo '<a class="home" href="' . $home . '">' . $name . '</a> ' . '' . $delimiter . ' ';
        if (is_category()) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
            echo $currentBefore;
            single_cat_title();
            echo $currentAfter;
        } elseif (is_single()) {
            $cat = get_the_category();
            $cat = $cat[0];
            if ($cat != 0) {
                echo get_category_parents($cat, TRUE, '' . $delimiter . '');
            }
            echo $currentBefore;
            the_title();
            echo $currentAfter;
        } elseif (is_page() && !$post->post_parent) {
            echo $currentBefore;
            the_title();
            echo $currentAfter;
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
            echo $currentBefore;
            the_title();
            echo $currentAfter;
        } elseif (is_search()) {
            echo $currentBefore . 'Search for ' . get_search_query() . $currentAfter;
        } elseif (is_tag()) {
            echo $currentBefore;
            single_tag_title();
            echo $currentAfter;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $currentBefore . $userdata->display_name . $currentAfter;
        } elseif (is_404()) {
            echo $currentBefore . 'Error 404' . $currentAfter;
        }
        if (get_query_var('paged'))
            echo $currentBefore . __('Page') . ' ' . get_query_var('paged') . $currentAfter;
    }
endif;

/**
 * Login custom
 */
function wptutsplus_login_logo()
{
    $wptuts_options = get_option('theme_wptuts_options');
    ?>
    <?php if ($wptuts_options['logo'] != ''):
        $logo = $wptuts_options['logo'];
    ?>
    <style type="text/css">
        #login {
            padding: 20px 50px 20px 50px;
            border-radius: 20px;
            border: 1px solid #ccc;
            background: #fff;
            position: fixed;
            top: 20px;
            left: 100px;
            right: 100px;
        }
        .login #login h1 a {
            background-image: url(<?php echo $logo ?>);
            background-size: 180px 150px;
            width: 180px;
            height: 150px;
        }
    </style>
<?php endif; ?>
<?php }
add_action('login_enqueue_scripts', 'wptutsplus_login_logo');

/**
 * Slide post
 */
function create_slide_post_type()
{
    register_post_type('slide',
        array(
            'labels' => array(
                'name' => __('SlideShow'),
                'singular_name' => __('SlideShow'),
                'add_new' => __('Add New'),
                'add_new_item' => __('Add New SlideShow'),
                'edit' => __('Edit'),
                'edit_item' => __('Edit SlideShow'),
                'new_item' => __('New SlideShow'),
                'view' => __('View SlideShow'),
                'view_item' => __('View SlideShow'),
                'search_items' => __('Search SlideShow'),
                'not_found' => __('No Slide Item found'),
                'not_found_in_trash' => __('No Slide Item found in Trash')
            ),
            'public' => true,
            'show_ui' => true,
            'publicy_queryable' => true,
            'exclude_from_search' => false,
            'menu_position' => 20,
            'menu_icon' => get_stylesheet_directory_uri() . '/adminhtml/images/slideshow.png',
            'hierarchical' => false,
            'query_var' => true,
            'supports' => array(
                'title', 'editor', 'comments', 'author', 'excerpt', 'thumbnail',
                'custom-fields'
            ),
            'rewrite' => array('slug' => 'item', 'with_front' => false),
            //'taxonomies' =>  array('post_tag', 'category'),
            'can_export' => true,
            //'register_meta_box_cb'  =>  'call_to_function_do_something',
            'description' => __('Slide')
        )
    );
}
add_action('init', 'create_slide_post_type');

/**
 * Get first image of slide post to set slideshow
 */
function thumb_image()
{
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches[1][0];
    return $first_img;
}

?>
<?php
/**
 * @param $comment
 * @param $args
 * @param $depth
 */
function wp_comment($comment, $args, $depth)    {
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class();?> id="li-comment-<?php comment_ID();?>">

        <div id="comment-<?php comment_ID();?>" class="clearfix comment-body">
            <div class="comment-author vcard">
                <?php echo get_avatar($comment, $size='60', $default='<path_to_url>'); ?>
                <?php printf(__('<span class="fn">%s</span><br />'), get_comment_author_link()); ?>
                <?php if($comment->comment_approved == '0') : ?>
                <em><?php echo 'Your coment is waiting for moderation.';?></em>
                <?php endif; ?>
            </div><!-- end comment autho vcard-->
            <div class="comment-meta commentmetadata">
            <?php printf(get_comment_date());?><?php edit_comment_link(__('(Edit)'),' ',''); ?>
            </div><!--end .comment-meta-->
            <p class="commentcontent"><?php comment_text(); ?></p>
            <div class="reply">
                <?php comment_reply_link(array_merge($args,array('depth' => $depth, 'max_depth'=> $args['max_depth'])));?>
            </div><!--end .reply-->
        </div><!--end #comment-author-vcard-->
<?php }?>

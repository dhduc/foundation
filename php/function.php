<?php

/* ------------------------------------- meta box  ----------------------------------------------*/
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

/* ------------------------------------- breadcrumb  ----------------------------------------------*/

if (!function_exists('wpbreadcrumbs')) :
    function wpbreadcrumbs()
    {
        $delimiter = ' <i class="icon-chevron-right"></i> ';
        $name = 'Trang chủ'; //text for the 'Home' link
        $currentBefore = '<span class="current bread-title">';
        $currentAfter = '</span>';
        echo '<span class="tip"> Website: </span>';
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

/* ------------------------------------- custom admin page  ---------------------------------------------- */
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

<?php
/**
 * Comment section
 */
if (post_password_required()) { ?>
    <p class="nocomments">Bài này muốn xem bạn phải đăng nhập.</p>
    <?php
    return;
}
?>

<div class="clear"></div>
<div id="comment-content" class="gird_8">
    <?php if (have_comments()) : ?>
        <h3 id="comments"><?php comments_number('Chưa có Comment', 'Một Comment', '% Comments'); ?></h3>
        <ol class="commentlist">
            <?php wp_list_comments(array('callback' => 'wp_comment')); ?>
        </ol>
    <?php else : // this is displayed if there are no comments so far ?>
        <?php if (comments_open()) : ?>
            <!-- If comments are open, but there are no comments. -->
        <?php else : // comments are closed ?>
            <!-- If comments are closed. -->
            <p class="nocomments">Comments đã đóng.</p>
        <?php endif; ?>
    <?php endif; ?>
    <?php if (comments_open()) : ?>
        <div id="respond">
            <h3><span
                    class="icon-title"></span><?php comment_form_title('Để lại comment của bạn', 'Trả lời cho bài %s'); ?>
            </h3>

            <div class="cancel-comment-reply">
                <small><?php cancel_comment_reply_link(); ?></small>
            </div>
            <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
                <p>Bạn phải <a href="<?php echo wp_login_url(get_permalink()); ?>">đăng nhập</a> để có thể comment.</p>
            <?php else : ?>
                <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                    <?php if (is_user_logged_in()) : ?>
                        <p>Logged in as <a
                                href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.
                            <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log
                                out &raquo;</a></p>
                    <?php else : ?>
                        <p>
                            <label for="author">Name</label>
                            <input type="text" name="author" id="author"
                                   value="<?php echo esc_attr($comment_author); ?>" size="22"
                                   tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                        </p>
                        <p>
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email"
                                   value="<?php echo esc_attr($comment_author_email); ?>" size="22"
                                   tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                        </p>
                        <p>
                            <label for="url">Website</label>
                            <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>"
                                   size="22" tabindex="3"/>
                        </p>
                    <?php endif; ?>
                    <p>
                        <textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
                    </p>

                    <p><input name="submit" type="submit" id="submit" tabindex="5" value="Gửi Comment"/>
                        <?php comment_id_fields(); ?>
                    </p>
                    <?php do_action('comment_form', $post->ID); ?>
                </form>
            <?php endif; // If registration required and not logged in ?>
        </div>
    <?php endif; // if you delete this the sky will fall on your head ?>
</div>

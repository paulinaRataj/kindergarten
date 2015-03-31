<?php

/**
 * Comments Template
 *
 */

?>  
    <?php
        $comments_number = get_comments_number();
        if ($comments_number > 0) {
    ?>
    <div class="comment-title">
        <h3>Comments</h3>
    </div>
    <?php } ?>
    <div class="comment-wrapper">
        <div class="comments">
        <ul class="comment-list">
            <?php wp_list_comments(); ?>
        </ul>
        <?php if ( 'open' == $post->comment_status ) : ?>

    <div id="respond" class="comment-respond">
    <h3 id="reply-title" class="comment-reply-title"><?php comment_form_title(); ?></h3>

    <?php cancel_comment_reply_link(); ?>

    <?php if ( get_option( 'comment_registration' ) && !$user_ID ) : ?>

        <p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>

    <?php else : ?>


        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="comment-form">
            <p class="comment-notes">Your email address will not be published. Required fields are marked <span class="required">*</span></p>
            <?php if ( $user_ID ) : ?>

                <p>Logged in as <a href="<?php echo get_option( 'siteurl' ); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Log out of this account">Log out &raquo;</a></p>

            <?php else : ?>

                <p>
                    <label for="author">Name <?php if ( $req ) echo "( required )"; ?></label>
                    <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="30" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                </p>

                <p>
                    <label for="email">Email ( <?php if ( $req ) echo "required, "; ?>never shared )</label>
                    <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="30" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                </p>

                <p>
                    <label for="url">Website</label>
                    <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="30" tabindex="3" />
                </p>

            <?php endif; ?>

            <p>
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" cols="45" rows="8" tabindex="4" aria-required="true"></textarea>
            </p>

            <p class="form-submit">
                <input name="submit" type="submit" id="submit" value="Post Comment">
            </p>

            <?php do_action( 'comment_form', $post->ID ); comment_id_fields(); ?>

        </form>

        </div>



    <?php endif; // If registration required and not logged in ?>

    <?php endif; // If comments are open: delete this and the sky will fall on your head ?>

    </div>
    </div>
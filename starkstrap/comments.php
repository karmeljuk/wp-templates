<?php if (comments_open()) : ?>
  <section id="respond">
    <p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
    <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
      <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'starkstrap'), wp_login_url(get_permalink())); ?></p>
    <?php else : ?>
      <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
          <?php if (is_user_logged_in()) : ?>
            <p>
              <?php printf(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'starkstrap'), get_option('siteurl'), $user_identity); ?>
              <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account', 'starkstrap'); ?>"><?php _e('Log out &raquo;', 'starkstrap'); ?></a>
            </p>
          <?php else : ?>
          <div class="controls controls-row">  
            <input type="text" class="text span6" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" <?php if ($req) echo 'aria-required="true"'; ?> placeholder="<?php _e('Name', 'starkstrap'); ?>">
            <input type="email" class="text span6" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" <?php if ($req) echo 'aria-required="true"'; ?> placeholder="<?php _e('Email (will not be published)', 'starkstrap'); ?>"> 
          </div>        
          <?php endif; ?>
          <div class="controls">            
            <textarea name="comment" id="comment" class="span12" rows="6" aria-required="true" placeholder="<?php _e('Leave a comment...', 'starkstrap'); ?>"></textarea>
          </div>
          <div class="controls">
            <input name="submit" class="btn btn-large buttons-bg-color pull-right" type="submit" id="submit" value="<?php _e('Submit', 'starkstrap'); ?>">
          </div>
          
          <?php comment_id_fields(); ?>
          <?php do_action('comment_form', $post->ID); ?>
        </form>
    <?php endif; ?>
  </section><!-- /#respond -->
<?php endif; ?>

<?php
  if (post_password_required()) {
    return;
  }

 if (have_comments()) : ?>
  <section id="comments">

    <?php wp_list_comments( array(
    'walker' => new starkstrap_walker_comment,
    'style' => 'ul',
    'callback' => null,
    'end-callback' => null,
    'type' => 'all',
    'page' => null,
    'avatar_size' => 64
    ) ); ?>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
    <nav>
      <ul class="pager">
        <?php if (get_previous_comments_link()) : ?>
          <li class="previous"><?php previous_comments_link(__('&larr; Older comments', 'starkstrap')); ?></li>
        <?php endif; ?>
        <?php if (get_next_comments_link()) : ?>
          <li class="next"><?php next_comments_link(__('Newer comments &rarr;', 'starkstrap')); ?></li>
        <?php endif; ?>
      </ul>
    </nav>
    <?php endif; ?>

    <?php if (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
    <div class="alert">
      <?php _e('Comments are closed.', 'starkstrap'); ?>
    </div>
    <?php endif; ?>
  </section><!-- /#comments -->
<?php endif; ?>

<?php if (!have_comments() && !comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
  <section id="comments">
    <div class="alert">
      <?php _e('Comments are closed.', 'starkstrap'); ?>
    </div>
  </section><!-- /#comments -->
<?php endif; ?>



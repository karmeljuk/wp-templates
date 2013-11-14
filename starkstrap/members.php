<?php
/**
 * Template Name: Members
 */

get_header(); ?>

	<div class="content">
    <div class="row-fluid">
        <div class="main span9">         
          <?php
            if ( ! is_user_logged_in() ) { ?>
              <div class="page-header">
                <h1 class="bebas-font">Access to the page is closed. Log in</h1>
              </div> 
              <form name="loginform" id="loginform" class="form-horizontal" action="#" method="post">
                <div class="control-group">
                  <div class="controls">
                    <input type="text" name="log" id="user_login" class="input input-xlarge" value="" placeholder="<?php _e('Username', 'starkstrap'); ?>" tabindex="10" />
                  </div>
                </div>
                <div class="control-group">
                  <div class="controls">
                    <input type="password" name="pwd" id="user_pass" class="input input-xlarge" value="" placeholder="<?php _e('Password', 'starkstrap'); ?>" tabindex="20" />
                  </div>
                </div>

                <div class="control-group">
                  <div class="controls">
                  <label>
                    <input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" /> 
                      <span class="remember-me">Remember Me</span>
                  </label>
                  </div>
                </div>
                
                <div class="form-actions">
                  <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-primary btn-large" value="Log In" tabindex="100" />
                  <input type="hidden" name="redirect_to" value="<?php echo get_option('home'); ?>" />
                  <input type="hidden" name="testcookie" value="1" />
                </div>
              </form>
          
            <?php } else { ?>         
            <div class="page-header">
              <h1 class="bebas-font"><?php echo get_the_title(); ?> </h1>
            </div> 
            <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class(); ?>>
                  <div class="entry">
                    <?php the_content(); ?>            
                  </div>
                </article>
              <?php endwhile; ?>
            <?php else : ?>
              <h2 class="center"><?php _e('Not Found', 'starkstrap'); ?></h2>
              <p class="center"><?php _e('Sorry, but you are looking for something that isn&#8217;t here.', 'starkstrap'); ?></p>
              <?php get_search_form(); ?>
            <?php endif; ?> 
       
          <?php }?>
        </div>
        <?php get_sidebar(); ?>        
    </div>
  </div>

<?php get_footer(); ?>

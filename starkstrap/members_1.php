<?php
/**
 * Template Name: Members
 */

get_header(); ?>

	<div class="content">
    <div class="row-fluid">
        <div class="main span9">
          <div class="page-header">
            <h1 class="bebas-font"><?php echo get_the_title(); ?> </h1>
          </div>          
          <?php
            if ( ! is_user_logged_in() ) { // Display WordPress login form:
                $args = array(
                    'redirect' => site_url( $_SERVER['REQUEST_URI'] ), 
                    'form_id' => 'loginform-custom',
                    'label_username' => __( 'Username' ),
                    'label_password' => __( 'Password' ),
                    'label_remember' => __( 'Remember Me' ),
                    'label_log_in' => __( 'Log In' ),
                    'remember' => true
                );
                wp_login_form( $args ); ?>
          
          <?php } else { ?>         

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

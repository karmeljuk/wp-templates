<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div class="content">
    <div class="row-fluid">
        <div class="main span9 ">
          <div class="page-header">
            <h1 class="bebas-font"><?php echo get_the_title(); ?> </h1>
          </div>
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); 
            $post_thumbnail_id = get_post_thumbnail_id(get_the_ID() );
            $thumbnail_info = wp_get_attachment_image_src( $post_thumbnail_id, 'original');
            if (!isset($thumbnail_info[0])){$thumbnail_info[0] = '/wp-content/uploads/img-672x302.png';}
          ?>          
            <article <?php post_class(); ?>>
              <header>
                <img class="alignnone size-full wp-image-13" alt="post-img" src="<?php echo $thumbnail_info[0];?>" width="842" height="588" />
                <div class="post-meta">                  
                  <time class="bebas-font pull-left buttons-bg-color" datetime="<?php echo get_the_time('c'); ?>">
                    <span><?php the_time('j'); ?></span><br>
                    <span><?php the_time('M'); ?></span>
                  </time>
                  <h2 class="entry-title bebas-font"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>    
              </header>
              <div class="entry">
                <?php the_content(); ?>  
              </div>
              <div class="after-meta bebas-font">
                <span><time class="updated" datetime="<?php echo get_the_time('c'); ?>" ><?php the_time('jS F, Y'); ?></time></span>
                <span>|</span>
                <span><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></span>
                <span>|</span>
                <span class="tags"><?php the_tags(); ?></span>    
              </div>
              <?php comments_template(); ?>
            </article>          
          <?php endwhile; ?>
        <?php else : ?>
          <h2 class="center"><?php _e('Not Found', 'starkstrap'); ?></h2>
          <p class="center"><?php _e('Sorry, but you are looking for something that isn&#8217;t here.', 'starkstrap'); ?></p>
          <?php get_search_form(); ?>
        <?php endif; ?> 
        </div>
        <?php get_sidebar(); ?>
    </div>
  </div>

<?php get_footer(); ?>


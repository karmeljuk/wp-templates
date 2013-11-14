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
            <h1 class="bebas-font">Home Page</h1>
          </div>
          <div class="thumbnails">
            <?php if (have_posts()) : ?>
            <?php while ($wp_query->have_posts()) : $wp_query->the_post();
              $post_meta = get_post_meta(get_the_id());
              $post_thumbnail_id = get_post_thumbnail_id(get_the_ID() );
              $thumbnail_info = wp_get_attachment_image_src( $post_thumbnail_id, 'medium-thumb');
              if (!isset($thumbnail_info[0])){$thumbnail_info[0] = '/wp-content/uploads/img-235x168.png';}
            ?>          
            <div class="span3"> 
              <a class="thumbnail" href="<?php the_permalink(); ?>">        
                <img class="" alt="post-img" src="<?php echo $thumbnail_info[0];?>"  width="235" height="168"/>        
              </a>    
              <p class="entry-title">
                <a href="<?php the_permalink(); ?>">
                <?php echo substr(the_title('', '', FALSE), 0, 50); ?> 
                </a>
              </p>
            </div>          
          <?php endwhile; 
            wp_reset_query();
          ?>
          </div><!-- /.row -->
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

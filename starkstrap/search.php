<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div class="content">
    <div class="row-fluid">
      <div class="main span9">  
        <header class="page-header">
          <h1 class="page-title bebas-font"><?php printf( __( 'Search Results for: %s', 'starkstrap' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        </header>
        <ul class="search-list">
          <?php if ( have_posts() ) : ?>  
          <?php while ($wp_query->have_posts()) : $wp_query->the_post();
            $post_thumbnail_id = get_post_thumbnail_id(get_the_ID() );
            $thumbnail_info = wp_get_attachment_image_src( $post_thumbnail_id, 'search-thumb');
            if (!isset($thumbnail_info[0])){$thumbnail_info[0] = '/wp-content/uploads/img-235x168.png';}
          ?>
          <li class="row">
            <img class="alignnone span2" alt="post-img" src="<?php echo $thumbnail_info[0];?>" width="150" height="150" />  
            <article class="span10">
              <header>
                <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> 
              </header>
              <div class="entry">
               <?php the_excerpt(); ?>
              </div>
            </article>
          </li>
          <?php endwhile; ?>
          <?php else : ?>
          <article id="post-0" class="post no-results not-found">
              <h2 class="page-title"><?php _e( 'Nothing Found', 'starkstrap' ); ?></h2>
            <div class="entry-content">
              <p class="alert"><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'starkstrap' ); ?></p>
              <?php get_search_form(); ?>
            </div><!-- .entry-content -->
          </article><!-- #post-0 -->
          <?php endif; ?>
        </ul>    
        <?php if ($wp_query->max_num_pages > 1) : ?>
        <?php bootstrap_pagination();?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>


<?php get_footer(); ?>

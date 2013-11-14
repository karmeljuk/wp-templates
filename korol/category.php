<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="content" class="narrowcolumn" >
<h2><?php single_cat_title(); ?></h2>
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<div class="entry">
				<a href="<?php the_permalink(); ?>">
				<?php yapb_thumbnail('<div class="div-yapb-image">', array('alt' => ''), '</div>', array('w=150', 'h=96', 'zc=1', 'q=90'), 'yapb-image'); ?>
					<?php the_title(); ?></a>
				</div>
							</div>

		<?php endwhile; ?>

	<?php else : ?>

		<h2 class="center"><?php _e('Not Found', 'kubrick'); ?></h2>
		<p class="center"><?php _e('Sorry, but you are looking for something that isn&#8217;t here.', 'kubrick'); ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>
		<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>


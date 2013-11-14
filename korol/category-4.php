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
				<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
				<div class="entry">
					<?php the_content(); ?>
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


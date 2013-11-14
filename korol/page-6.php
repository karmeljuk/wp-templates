<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(6); ?>

		<div id="content" class="narrowcolumn" >

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post-6" id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>
				<div class="entry">
					<?php the_content(); ?>
				</div>
			</div>
			<?php endwhile; endif; ?>
		</div>

<?php get_footer(); ?>


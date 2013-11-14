<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

	<div id="content" class="widecolumn" >

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<h3><?php the_title(); ?></h3>

			<div class="entry">
				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'kubrick') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p>' .'Tags:'. ' ', ', ', '</p>'); ?>
			</div>
		</div>


	<?php endwhile; else: ?>

		<p>'Sorry, no posts matched your criteria</p>



<?php endif; ?>
		<div class="back">
				<?php
					$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
					echo "<a href='$url'>&lArr; Вернуться назад</a>";
				?>
		</div>

	</div>

<?php get_footer(); ?>


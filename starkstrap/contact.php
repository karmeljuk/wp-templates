<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 * Template name: Contact
 */

get_header(); ?>

	<div class="container row-fluid" >
	
	<?php get_sidebar(); ?>

		<div class="span9 offset1 main">
		<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<div class="entry">
						<img class="book-contact" src="<?php echo get_template_directory_uri(); ?>/img/book-contact.jpeg" alt="" width="150" height="229"/>
						<?php the_content(); ?>						
					</div>
				</div>

			<?php endwhile; ?>

		<?php else : ?>

			<h2 class="center"><?php _e('Not Found', 'kubrick'); ?></h2>
			<p class="center"><?php _e('Sorry, but you are looking for something that isn&#8217;t here.', 'kubrick'); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
		</div>

	</div>

<?php get_footer(); ?>

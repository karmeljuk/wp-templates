<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
	<div id="sidebar" role="complementary" class="equal_height">

	<div class="sidebar-left">
<div class="sidebar-wrapper"><h2>Новости</h2>
	<?php $custom_query = new WP_Query('cat=3');
	while($custom_query->have_posts()) : $custom_query->the_post(); ?>

	<?php the_time('d.m.y') ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php the_content(); ?>
		</div>

	<?php endwhile; ?>
	<?php wp_reset_postdata(); // reset the query ?></div>

<a class="all-posts-link" href="">Все статьи &rarr;</a>
	</div>
	<div class="sidebar-right">
<div class="sidebar-wrapper"><h2>Полезное</h2>
		<?php $custom_query = new WP_Query('cat=4');
		while($custom_query->have_posts()) : $custom_query->the_post(); ?>
		<?php the_time('d.m.y') ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php the_content(); ?>
		</div>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); // reset the query ?></div>

<a class="all-posts-link" href="">Все статьи &rarr;</a>
	</div>

	</div>


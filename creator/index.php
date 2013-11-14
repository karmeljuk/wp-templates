<?php get_header(); ?>

<?php global $query_string; // required
$posts = query_posts($query_string.'&cat=9&showposts=5'); // exclude category 9 ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		
<!--Start Post-->
<div class="post clear">
      			
<div class="p-head">
<p class="p-date"><?php the_time('d') ?> <?php the_time('M') ?>, <?php the_time('Y') ?></p>
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
<?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?></a>
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

</div>

	<div class="p-con">
		<?php the_excerpt() ?>
	</div>
	<div class="p-com">
		<?php comments_popup_link(); ?> 
	</div>
	<div class="p-tag">
		<?php if (function_exists('the_tags')) { ?> <?php the_tags(); ?> <?php } ?>
	</div>
</div>
<!--End Post-->

    			
<?php endwhile; ?>
<?php include("nav.php"); ?>
<?php else : ?>

<?php include("404.php"); ?>
<?php endif; ?>
<?php wp_reset_query(); // reset the query ?>
<!--Track Theme-->
<?php if (function_exists('trackTheme')) { ?>
<?php trackTheme("fervens-a");  ?>
<?php } ?>
<!--Track Theme-->



<?php get_footer(); ?>

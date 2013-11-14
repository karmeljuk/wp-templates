

<?php get_header(); ?>
<?php query_posts('cat=11&showposts=5'); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		
<!--Start Post-->
<div class="post clear" style="margin-bottom: 20px;">
      			
<div class="p-head">

<a href="<?php the_permalink() ?>" rel="bookmark" title="Посилання до <?php the_title_attribute(); ?>">
<?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?></a>
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Посилання до <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

</div>

<div class="p-con">
		<?php the_excerpt() ?>
</div>


<?php if (function_exists('the_tags')) { ?> <?php the_tags('<div class="p-tag">Мітки: ', ', ', '</div>'); ?> <?php } ?>

</div>
<!--End Post-->

    			
<?php endwhile; ?>
<?php include("nav.php"); ?>
<?php else : ?>

<?php include("404.php"); ?>
<?php endif; ?>

<!--Track Theme-->
<?php if (function_exists('trackTheme')) { ?>
<?php trackTheme("fervens-a");  ?>
<?php } ?>
<!--Track Theme-->

<?php get_footer(); ?>

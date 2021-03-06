<?php get_header(); ?>
<?php if (have_posts()) : ?>

<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>
<h2 class="title"> <strong><?php single_cat_title(); ?></strong> </h2>
<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
<h2 class="title">Posts Tagged &#8216;<strong><?php single_tag_title(); ?></strong>&#8217;</h2>
<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<h2 class="title">Archive for <strong><?php the_time('F jS, Y'); ?></strong></h2>
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h2 class="title">Archive for <strong><?php the_time('F, Y'); ?></strong></h2>
<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<h2 class="title">Archive for <strong><?php the_time('Y'); ?></strong></h2>
<?php /* If this is an author archive */ } elseif (is_author()) { ?>
<h2 class="title">Author Archive</h2>
<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<h2 class="title">Blog Archives</h2>
<?php } ?>

<?php include("nav.php"); ?>

<?php while (have_posts()) : the_post(); ?>

<div class="post">

<div class="p-head">
<p class="p-date"><?php the_time('d') ?> <?php the_time('M') ?>, <?php the_time('Y') ?></p>

<?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?></a>
<h2><a href="<?php the_permalink() ?>" rel="bookmark" <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
</div>

<div class="p-con">
 <?php the_excerpt(); ?>
</div> 

<div class="p-com">
<?php comments_popup_link(); ?>
</div>
 
	<div class="p-tag">
		<?php if (function_exists('the_tags')) { ?> <?php the_tags(); ?> <?php } ?>
	</div>
 
</div>

<?php endwhile; ?>
<br />
<?php include("nav.php"); ?>
<?php else : ?>

<h2 class="center"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'twentyeleven' ); ?></h2>

<?php endif; ?>
<?php get_footer(); ?>

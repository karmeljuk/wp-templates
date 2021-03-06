<?php get_header(); ?>
<?php if (have_posts()) : ?>


<h2 class="title">Результати пошуку</h2>

<?php include("nav.php"); ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post">

<div class="p-head">
<p class="p-date"><?php the_time('d') ?> <?php the_time('M') ?>, <?php the_time('Y') ?></p>
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Постійне посилання до <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<p class="p-who">Опубліковано в: <?php the_category('|') ?></p>
</div>

<div class="p-con">
 <?php the_excerpt(); ?>
</div> 

<div class="p-com">
<?php comments_popup_link('Немає відгуків', '<strong>1</strong> Відгук', '<strong>%</strong> Відгуки'); ?>
</div>
 
<?php if (function_exists('the_tags')) { ?> <?php the_tags('<div class="p-tag">Мітки: ', ', ', '</div>'); ?> <?php } ?>
</div>

<?php endwhile; ?>
<br clear="all" />	
<?php include("nav.php"); ?>
<?php else : ?>

<h2 class="title">Нічого не знайдено.</h2>
<p>Спробуйте інший пошук!</p>
<?php endif; ?>


<?php get_footer(); ?>

<?php
/*
Template Name: Archives page
*/
?>

<?php ?>

<?php get_header(); ?>

<h2>Архів за місяць:</h2>
	<ul>
	 <?php wp_get_archives('type=monthly'); ?>
	</ul>
</br>
<h2>Архів за рік:</h2>
	<ul>
	 <?php wp_list_categories(); ?>
	</ul>

<?php get_footer(); ?>

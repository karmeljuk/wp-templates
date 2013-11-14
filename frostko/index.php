<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="content" class="narrowcolumn" >



	<div class="services">
		<a href="/deratizaciya" class="service-deratazia"><span>Дератизация</span> <span>Борьба с грызунами</span> <div></div></a>
		<a href="" class="service-dezinfekcia"><span>Дезинфекция</span> <span>Борьба с болезнотворными организмами</span><div></div></a>
		<a href="/dezinsekciya" class="service-dezincekcia"><span>Дезинсекция</span> <span>Борьба с вредными насекомыми</span><div></div></a>
		<a href="/fumigaciya" class="service-fumigacia"><span>Фумигация</span> <span>Обеззараживание газоподобными препаратами</span><div></div></a>
		<a href="" class="service-dezodoracia"><span>Дезодорация</span> <span>Работы по удалению неприятных запахов</span><div></div></a>
		<a href="" class="service-gazacia"><span>Газация складов элеваторов</span> <span>Борьба с болезнотворными микроорганизмами</span><div></div></a>
		<a href="" class="service-prodazh"><span>Продажа препаратов</span> <span>Борьба с вредными насекомыми</span><div></div></a>
		<a href="" class="service-arrow-right">
		<span>Перейдите в раздел услуги</span><div></div> </a>
	</div>

<div class="content-top ">
	<?php get_sidebar(); ?>


	<?php $post_id = 4;?>

	<?php $queried_post = get_post($post_id); ?>
	<div class="post-top equal_height" id="post-<?php the_ID(); ?>">
	<h2><?php echo $queried_post->post_title; ?></h2>
	<?php echo $queried_post->post_content; ?>
	</div>
</div>




<div class="content-bottom">
	<?php $post_id = 6;?>

	<?php $queried_post = get_post($post_id); ?>
	<div class="post-bottom" id="post-<?php the_ID(); ?>">
	<h2><?php echo $queried_post->post_title; ?></h2>
	<?php echo $queried_post->post_content; ?>
	</div>
</div>


 </div>



<?php get_footer(); ?>


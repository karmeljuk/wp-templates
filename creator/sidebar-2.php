<!--Start Search -->
<div class="widget">
	<div class="search ">
	 <h3>
		<?php _e( 'Search' , 'twentyeleven');	?>
	 </h3>
		<form id="search" action="<?php bloginfo('url'); ?>/">
		  <fieldset>
		  <input type="text" value="<?php the_search_query(); ?>" name="s" style="width: 250px;" />
		  </fieldset>
		  </form>
	</div>
</div>
<!--End Search -->

<!--Start Video -->
<div class="widget">
	<div class="widget-all">
<iframe width="270" height="203" src="//www.youtube.com/embed/I2d19u0F8GQ" frameborder="0" allowfullscreen></iframe>
	</div>
</div>
<!--End Video -->


<!--Start Recent -->
<div class="widget">
	<div class="recent ">
		<h3>
		<?php _e( 'Recent news' , 'twentyeleven');	?>
		</h3>
		<ul id="r-posts">		
		<li></li>
		 <?php $posts = get_posts("numberposts=7&category=5&orderby=post_date&order=DESC"); foreach($posts as $post) : ?>	
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		 <?php endforeach; ?>
		</ul>
	</div>
</div>
<!--End Recent -->

<!--Start Dynamic Sidebar -->
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
<?php endif; ?>
<!--End Dynamic Sidebar -->

<div class="s2-image"></div>

<!--Start Side Menu -->

<div class="widget">
	<div class="widget-all">
		<?php wp_nav_menu('menu=side'); ?>
	</div>
</div>
<!--End Side Menu -->

<div class="widget">
	<div class="socialmedia-buttons widget-all">
		<h3>
			<?php _e( 'Connect' , 'twentyeleven');	?>
		</h3>
		<a class="left" href="http://vk.com/club12167365" rel="nofollow" target="_blank">
			<img  src="<?php bloginfo('template_url'); ?>/images/vk.png" alt="Vkontakte" title="Vkontakte" class="soc-icon"/>
		</a>
		
				<a class="right" href="https://www.facebook.com/groups/347864051957778/" rel="nofollow" target="_blank">
			<img  src="<?php bloginfo('template_url'); ?>/images/fb.png" alt="Facebook" title="Facebook" class="soc-icon"/>
		</a>
		
				<a class="left social-bottom" href="http://oldrach.mylivepage.ru/about/index/" rel="nofollow" target="_blank">
			<img  src="<?php bloginfo('template_url'); ?>/images/mow.png" alt="mylivepage" title="mylivepage" class="soc-icon"/>
		</a>
		
				<a class="right  social-bottom" href="mailto:admin@creator.biz.ua?subject=creator.biz.ua" rel="nofollow" target="_blank">
			<img  src="<?php bloginfo('template_url'); ?>/images/mail.png" alt="E-mail" title="E-mail" class="soc-icon"/>
			
				<a class="left  social-bottom" href="https://twitter.com/CRE_A_TOR" rel="nofollow" target="_blank">
			<img  src="<?php bloginfo('template_url'); ?>/images/twitter.png" alt="E-mail" title="E-mail" class="soc-icon"/>
			
			<a class="right  social-bottom" href="#" rel="nofollow" target="_blank">
			<img  src="<?php bloginfo('template_url'); ?>/images/google.png" alt="E-mail" title="E-mail" class="soc-icon"/>
		</a>
	</div>
</div>

<div class="widget follow">
		<div class="widget-all">
		<h3>
			<?php _e( 'Follow' , 'twentyeleven');	?>
		</h3>
			<?php $content = apply_filters('the_content', '<p><!--subscribe2--></p>'); 
			echo $content; ?>
		</div>
</div>

<div class="s1-image"></div>

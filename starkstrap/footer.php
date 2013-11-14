<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>

  </div><!-- /.wrap .container -->
    <footer class="content-info" role="contentinfo">
      <?php wp_footer(); ?>
      <div class="container">
       <?php
          if (has_nav_menu('footer_navigation')) :
            wp_nav_menu(array(
                'theme_location' => 'footer_navigation','menu_class' => 'nav nav-pills'));
          endif;
        ?>
      </div>
      <?php dynamic_sidebar('sidebar-footer'); ?>
    </footer>  
  </div><!-- /.gradient -->		
</body>
</html>

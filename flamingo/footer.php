<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
</div>
<hr />
<div id="footer_holder"><div id="footer" role="contentinfo">
        <div id="footer_menu">
            <ul>
                <?php wp_nav_menu( array( 'theme_location' => 'fm', 'container_class' => 'footer-menu', 'container' => '' ) ); ?>
            </ul>
        </div>  
</div></div>
</div>
<?php wp_footer(); ?>
</body>
</html>

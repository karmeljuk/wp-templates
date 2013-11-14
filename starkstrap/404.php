<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div class="content">
    <div class="row-fluid">
        <div class="main span9 ">
          <div class="page-header">
            <h1 class="bebas-font">error 404 </h1>
          </div>   
              <div class="entry alert">
                <?php _e('Sorry, but the page you were trying to view does not exist.', 'starkstrap'); ?>
              </div>
              <p><?php _e('It looks like this was the result of either:', 'roots'); ?></p>
              <ul>
                <li><?php _e('a mistyped address', 'roots'); ?></li>
                <li><?php _e('an out-of-date link', 'roots'); ?></li>
              </ul>
              <?php get_search_form(); ?>
            </div>
        <?php get_sidebar(); ?>
    </div>
  </div>

<?php get_footer(); ?>

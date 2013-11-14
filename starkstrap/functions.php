<?php
require_once( 'options/includes.php' );
require_once( 'options/customize.php' );

// Cleane WP
global $user_login;
get_currentuserinfo();
if ($user_login !== "admin") {
  add_action('init', create_function('$a', "remove_action( 'init', 'wp_version_check' );"), 2);
  add_filter('pre_option_update_core', create_function('$a', "return null;"));
}

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

function no_more_jumping($post) {
  return '<a href="' . get_permalink($post->ID) . '" class="read-more">' . 'Continue Reading' . '</a>';
}

add_filter('excerpt_more', 'no_more_jumping');

function searchAll($query) {
  if ($query->is_search) {
    $query->set('post_type', array('site', 'plugin', 'theme', 'person'));
  }
  return $query;
}

add_filter('the_search_query', 'searchAll');

function update_active_plugins($value = '') {
  /*
    The $value array passed in contains the list of plugins with time
    marks when the last time the groups was checked for version match
    The $value->reponse node contains an array of the items that are
    out of date. This response node is use by the 'Plugins' menu
    for example to indicate there are updates. Also on the actual
    plugins listing to provide the yellow box below a given plugin
    to indicate action is needed by the user.
   */
  if ((isset($value->response)) && (count($value->response))) {

    // Get the list cut current active plugins
    $active_plugins = get_option('active_plugins');
    if ($active_plugins) {

      //  Here we start to compare the $value->response
      //  items checking each against the active plugins list.
      foreach ($value->response as $plugin_idx => $plugin_item) {

        // If the response item is not an active plugin then remove it.
        // This will prevent WordPress from indicating the plugin needs update actions.
        if (!in_array($plugin_idx, $active_plugins))
          unset($value->response[$plugin_idx]);
      }
    }
    else {
      // If no active plugins then ignore the inactive out of date ones.
      foreach ($value->response as $plugin_idx => $plugin_item) {
        unset($value->response);
      }
    }
  }
  return $value;
}

add_filter('transient_update_plugins', 'update_active_plugins');    // Hook for 2.8.+
// Add menu
if (function_exists('add_theme_support')) {
  add_theme_support('menus');
}

// Register sidebars and widgets
function starkstrap_widgets_init() {
  register_sidebar(array(
      'name' => __('Primary Sidebar', 'starkstrap'),
      'id' => 'sidebar-primary',
      'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
      'after_widget' => '</div></section>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
  ));

  register_sidebar(array(
      'name' => __('Footer Sidebar', 'starkstrap'),
      'id' => 'sidebar-footer',
      'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
      'after_widget' => '</div></section>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
  ));
}

add_action('widgets_init', 'starkstrap_widgets_init');
if (!isset($content_width))
  $content_width = 940;
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');
add_editor_style('editor-style.css');
add_filter('wp_nav_menu_args', 'nav_menu_styles');

function nav_menu_styles($args) {
  $args['container'] = 'false';
  return $args;
}

// Configuration values
define('GOOGLE_ANALYTICS_ID', ''); // UA-XXXXX-Y
define('POST_EXCERPT_LENGTH', 40);

// Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'starkstrap'),
    'footer_navigation' => __('Footer Navigation', 'starkstrap'),
    'page_navigation' => __('Page Navigation', 'starkstrap')
));

//Strip Empty Menu Classes
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);

function my_css_attributes_filter($var) {
  if (is_array($var)) {
    $varci = array_intersect($var, array('current-menu-item'));
    $cmeni = array('current-menu-item');
    $selava = array('active buttons-bg-color');
    $selavaend = array();
    $selavaend = str_replace($cmeni, $selava, $varci);
  } else {
    $selavaend = '';
  }
  return $selavaend;
}

// Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
add_theme_support('post-thumbnails');
// set_post_thumbnail_size(150, 150, false);
add_image_size('slider-images', 890, 350, true);

// Posts per page in Search Page
function SearchFilter($query) {
  if ($query->is_search) {
    $query->set('posts_per_page', '20');
  }
  return $query;
}

add_filter('pre_get_posts', 'SearchFilter');

// Comment Walker
class starkstrap_walker_comment extends Walker_Comment {

  // init classwide variables
  var $tree_type = 'comment';
  var $db_fields = array('parent' => 'comment_parent', 'id' => 'comment_ID');

  /** CONSTRUCTOR
   * You'll have to use this if you plan to get to the top of the comments list, as
   * start_lvl() only goes as high as 1 deep nested comments */
  function __construct() {
    ?>

    <h3><?php _e('Recent Comments', 'starkstrap'); ?></h3>
    <ul class="media-list">

    <?php
    }

    /** START_LVL
     * Starts the list before the CHILD elements are added. */
    function start_lvl(&$output, $depth = 0, $args = array()) {
      $GLOBALS['comment_depth'] = $depth + 1;
      ?>

      <ul class="children">
  <?php
  }

  /** END_LVL
   * Ends the children list of after the elements are added. */
  function end_lvl(&$output, $depth = 0, $args = array()) {
    $GLOBALS['comment_depth'] = $depth + 1;
    ?>

      </ul><!-- /.children -->

  <?php
  }

  /** START_EL */
  function start_el(&$output, $comment, $depth, $args, $id = 0) {
    $depth++;
    $GLOBALS['comment_depth'] = $depth;
    $GLOBALS['comment'] = $comment;
    $parent_class = ( empty($args['has_children']) ? 'media' : 'parent media' );
    ?>

      <li <?php comment_class($parent_class); ?> id="comment-<?php comment_ID() ?>">
              <?php echo get_avatar($comment, $size = '64'); ?>
        <div class="media-body">
          <h4 class="media-heading"><?php echo get_comment_author_link(); ?></h4>
          <div class="comment-meta">
            <time datetime="<?php echo comment_date('c'); ?>"><a class="muted" href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>"><?php echo human_time_diff(get_comment_time('U'), current_time('timestamp')) . ' ago'; ?> </a></time>
    <?php comment_reply_link(array_merge($args, array('reply_text' => '', 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
          <?php edit_comment_link(__('(Edit)', 'starkstrap'), '', ''); ?>

          <?php if ($comment->comment_approved == '0') : ?>
              <div class="alert">
      <?php _e('Your comment is awaiting moderation.', 'starkstrap'); ?>
              </div>
      <?php endif; ?>
          </div>

          <div class="well"><?php comment_text(); ?></div>

  <?php }

  function end_el(&$output, $comment, $depth = 0, $args = array()) {
    ?>

      </li><!-- /#comment-' . get_comment_ID() . ' -->

  <?php
  }

  /** DESTRUCTOR * */
  function __destruct() {
    ?>

    </ul><!-- /#comment-list -->

  <?php
  }

}

// Twitter Bootstrap Pagination to WordPress Theme
function bootstrap_pagination($pages = '', $range = 2) {
  $showitems = ($range * 2) + 1;

  global $paged;
  if (empty($paged))
    $paged = 1;

  if ($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if (!$pages) {
      $pages = 1;
    }
  }

  if (1 != $pages) {
    echo "<div class='pagination pagination-centered'><ul>";
    if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
      echo "<li><a href='" . get_pagenum_link(1) . "'>&laquo;</a></li>";
    if ($paged > 1 && $showitems < $pages)
      echo "<li><a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a></li>";

    for ($i = 1; $i <= $pages; $i++) {
      if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
        echo ($paged == $i) ? "<li class='active'><span class='current'>" . $i . "</span></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a></li>";
      }
    }

    if ($paged < $pages && $showitems < $pages)
      echo "<li><a href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a></li>";
    if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
      echo "<li><a href='" . get_pagenum_link($pages) . "'>&raquo;</a></li>";
    echo "</ul></div>\n";
  }
}

/*
 * Hader Image Slider
 */

// Creating the Admin Slideshow Management Functionality
function slider_images_init() {
  $labels = array(
    'name' => 'Slider Images',
    'singular_name' => 'Slider Image',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Image',
    'edit_item' => 'Edit Image',
    'new_item' => 'New Image',
    'all_items' => 'All Images',
    'view_item' => 'View Image',
    'search_items' => 'Search Images',
    'not_found' =>  'No images found',
    'not_found_in_trash' => 'No images found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Slider Images'
  );
  
  $args = array(
    'public' => true,
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'image' ),
    'capability_type' => 'post',
    'menu_position' => 90,
    'supports' => array( 'title', 'thumbnail'),
  );
  register_post_type('slider_images', $args);
}

add_action('init', 'slider_images_init');

// Header Slider function
function slider_function($type = 'slider_images') {
  $args = array(
      'post_type' => 'slider_images',
      'posts_per_page' => 5
  );


  //the loop  
  $loop = new WP_Query($args);
  $result = '';
  $result .= '<div id="img-slider" class="carousel slide">';
  $result .= '<ol class="carousel-indicators">';
      foreach ($loop->posts as $key=>$slide_post) {
      $result .= '<li data-target="#myCarousel" data-slide-to="'.$key.'"></li>';
      }
  $result .= '</ol>';
  $result .= '<div class="carousel-inner">';
  
  foreach ($loop->posts as $slide_post) {

    $the_url = wp_get_attachment_image_src(get_post_thumbnail_id($slide_post->ID), $type);
    $result .= '<div class="item">';
    $result .='<img title="' . get_the_title() . '" src="' . $the_url[0] . '" data-thumb="' . $the_url[0] . '" alt=""/>';
    $result .= '</div>';
  }
  $result .= '</div>';  
  $result .= '<div class="img-slider-shadow"></div>';
  $result .= '<a class="carousel-control left" href="#img-slider" data-slide="prev">&lsaquo;</a>';
  $result .= '<a class="carousel-control right" href="#img-slider" data-slide="next">&rsaquo;</a>';  
  $result .= '</div>';
  return $result;
}

add_shortcode('image-slider', 'slider_function');

// Building the Widget
function slider_widgets_init() {
  register_widget('slider_Widget');
}

add_action('widgets_init', 'slider_widgets_init');

// The Class
class slider_Widget extends WP_Widget {

  public function __construct() {
    parent::__construct('slider_Widget', 'Image Slider', array('description' => __('Image Slider Widget', 'text_domain')));
  }

}


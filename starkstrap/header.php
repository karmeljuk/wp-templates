<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
  
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php wp_head(); ?>

<body <?php body_class(); ?>>
<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->  
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
<div class="gradient">
  <div class="wrap container">                   
  <header class="banner" role="banner">
    <div class="header-wrap">
      <div class="brand">
        <?php $header_image = get_header_image();
        if ( ! empty( $header_image ) ) : ?>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
        <?php endif; ?>  
      </div>
      <div class="navbar">
        <div class="navbar-inner">
          <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            <a class="brand" href="<?php echo home_url(); ?>/">
              <?php bloginfo('name'); ?>
            </a>
            <nav class="nav-main nav-collapse collapse bebas-font" role="navigation">
              <?php
                if (has_nav_menu('primary_navigation')) :
                  wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav'));
                endif;
              ?>
            </nav>
          </div>
        </div>
      </div>   
      <?php echo do_shortcode("[image-slider]"); ?>
    </div><!-- class="header-wrap" -->       
    
    <div id="content-slider" class="carousel slide">
      <div class="carousel-inner">
        <?php
        $carouselPosts = new WP_Query();
        $carouselPosts->query('cat=5&showposts=3');
        ?>
        <?php while ($carouselPosts->have_posts()) : $carouselPosts->the_post(); ?>
        <div class="item">
          <span class="bebas-font">Latest Updates: </span>
          <span class="carusel-item">
            <a href="<?php the_permalink(); ?>">
              <?php echo substr(the_title('', '', FALSE), 0, 110); ?> 
            </a>
          </span>
        </div>
        <?php endwhile; 
          wp_reset_query();
        ?>        
      </div>
      <a class="carousel-control left" href="#content-slider" data-slide="prev">&lsaquo;</a>  
      <a class="carousel-control right" href="#content-slider" data-slide="next">&rsaquo;</a> 
    </div>
  </header>
                                               


<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->

<script type="text/javascript">

$(document).ready(function(){
    //set the starting bigestHeight variable
    var biggestHeight = 0;
    //check each of them
    $('.equal_height').each(function(){
        //if the height of the current element is
        //bigger then the current biggestHeight value
        if($(this).height() > biggestHeight){
            //update the biggestHeight with the
            //height of the current elements
            biggestHeight = $(this).height();
        }
    });
    //when checking for biggestHeight is done set that
    //height to all the elements
    $('.equal_height').height(biggestHeight);

});

</script>

<!--[if lt IE 8]><div style="width: 728px; height: 90px; border: 1px solid #ff0000; clear: both; position: relative; overflow: hidden;
 background-color: #FEAFAF; font-family: Arial,Helvetica,Tahoma,sans-serif; font-size: 12px; color: #000;">
	<div style="position: absolute; right: 3px; top: 1px; float: right;">
		<a style="color: #000;font-size: 16px;line-height: 16px;font-weight: bold;text-decoration: none;" onclick="javascript:this.parentNode.parentNode.style.display='none'; return false;" href="#">
			&times;
		</a>
	</div>
	<div style="margin-top: 7px; margin-bottom: 7px;">
		<div style="float: left; margin-top: 8px; width: 163px;">
			<img alt="ie6no" src="http://ie6no.org/images/ie6no-small.gif" style="border: none;" />
		</div>
		<div style="float: left; width: 281px; overflow: hidden;">
			<div style="font-weight: bold; text-align: center;">ВНИМАНИЕ!</div>
			<div style="margin-top: 10px;">
				Используемый вами браузер устарел!
				Рекомендуется установить один из современных браузеров для удобной работы с сайтом.
			</div>
		</div>
		<div style="float: left; margin-left: 7px;">
			<a target="_blank" href="http://www.mozilla-europe.org/firefox"><img alt="Get Firefox" style="border: none;" src="http://ie6no.org/images/ie6no-firefox.jpg" /></a>
		</div>
		<div style="float: left; margin-left: 5px;">
			<a target="_blank" href="http://www.microsoft.com/downloads"><img alt="Get IE" style="border: none;" src="http://ie6no.org/images/ie6no-ie.jpg" /></a>
		</div>
		<div style="float: left; margin-left: 5px;">
			<a target="_blank" href="http://www.apple.com/safari/download"><img alt="Get Safari" style="border: none;" src="http://ie6no.org/images/ie6no-safari.jpg" /></a>
		</div>
		<div style="float: left; margin-left: 5px;">
			<a target="_blank" href="http://www.google.com/chrome"><img alt="Get Chrome" style="border: none;" src="http://ie6no.org/images/ie6no-chrome.jpg" /></a>
		</div>
		<div style="float: left; margin-left: 5px; ">
			<a target="_blank" href="http://www.opera.com/download"><img alt="Get Opera" style="border: none;" src="http://ie6no.org/images/ie6no-opera.jpg" /></a>
		</div>
	</div>
</div><![endif]-->

</head>
<body <?php body_class(); ?>>
<div id="page">
	<div id="page-in">

<div id="header" >
	<div id="headerimg">
		<a href="<?php echo get_option('home'); ?>/"><span><?php bloginfo('name'); ?></span></a>
	</div>

			<?php wp_nav_menu('menu=main'); ?>

		<div class="slider">
		<?php if (function_exists("easing_slider")){ easing_slider(); }; ?>
		</div>

</div>


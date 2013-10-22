<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <!--[if IE]><![endif]-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php if(is_front_page()){
  	echo 'Manuel Schmalstieg - Art, Design, Code';} 
  	else if (is_home()) {
  	echo 'Manuel Schmalstieg - Art, Design, Code';} 
  	else if (is_page()) {
  	echo wp_title('&mdash;',true,'right').'Manuel Schmalstieg &mdash; ms-studio.net';} 
  	else {
			wp_title('&mdash;',true,'right'); 
			echo 'ms-studio.net';
	}	
  	?></title>
  <?php // ** DESCRIPTION v.0.2 **
    if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post();
    ?><meta name="description" content="<?php
     $descr = get_the_excerpt();
     $text = preg_replace( '/\r\n/', ', ', trim($descr) );
     echo $text;
    ?>" />
  <?php endwhile; endif; elseif(is_home()) :
    ?><meta name="description" content="<?php bloginfo('description'); ?>" />
  <?php endif; ?>
  	
  <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
  <meta name="author" content="Manuel Schmalstieg - Art, Design, Code" />
  <meta name="copyright" content="Copyright <?php the_date('Y'); ?> Manuel Schmalstieg" />
  
  <?php // ** SEO OPTIMIZATION v.0.1 **
  if ( is_attachment() ) {
  ?><meta name="robots" content="noindex,follow" /><?php
  } else if( is_single() || is_page() || is_home() ) { 
	?><meta name="robots" content="all,index,follow" /><?php 
	} elseif ( is_category() || is_archive() ) { 
	?><meta name="robots" content="noindex,follow" /><?php } 
	// WP Version Info
	?>
	
  <meta name="verify-v1" content="IQkQ+WbRJ95Y1H+jVTbyvCs5YkxxCpbmKQM1g9cg8FA=" />
  <meta name="google-site-verification" content="OaYK4UydhOhzKICbJBfZw8P49kpEb6rAe0WCHbJ5N-I" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="shortcut icon" href="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"] ?>images/icons/favicon.ico">
    
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"] ?>images/icons/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"] ?>images/icons/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"] ?>images/icons/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" href="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"] ?>images/icons/apple-touch-icon.png">
    
  <style>
  .hidden {display: none;}
  .wf-loading .miso-font {visibility: hidden;}
  </style>

  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/js/modernizr-1.5.min.js") ?> 
  <!-- NOTE: causes the fonts to re-load (double FOUT)
  -->

  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  <?php wp_head(); ?>
    
</head>

<body <?php body_class('no-js'); ?>>
  
    <header id="top-header" role="banner" class="miso-font xtk-inconsolata">
    	<div class="zentr">
		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		
		<?php wp_nav_menu( array(
			 'theme_location' => 'main-menu',
			 'container'       => 'nav',
			 'container_class'       => 'clearfix',
			 //'link_after'       => '&nbsp;',
			 ) ); ?>
		</div>
    </header>
    
    <div id="container" class="zentr">


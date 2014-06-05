<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>
<!-- page.php -->

<script>
function kurier(name1, name2, domain, rand, top) {
var arobase = "@";var dot = ".";var semicolon = ":";
document.write('<a class="kontakt" href="mailto'+semicolon+name1+name2+arobase+domain+dot+top+'">'+name1+name2+'&#x40;'+domain+dot+top+'</a>');}
</script>

<div id="main" role="main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
  <article <?php post_class('mainframe') ?> id="post-<?php the_ID(); ?>">
    <header>
      <h1 class="main-title miso-font"><?php the_title(); ?></h1>
    </header>
  
  <div class="full-block clearfix">
	    <div class="main-content lib-serif xtk-vollkorn">
  		  <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
  		  </div>

   </div>
   
   <?php 
   // include( TEMPLATEPATH . '/inc/newsfeed.php' );	
   ?>
  
  </article>
  <?php endwhile; endif; 
    
  ?>

</div>

<?php get_footer(); ?>

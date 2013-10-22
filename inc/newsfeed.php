<?php
/**
 * @package WordPress
 * @subpackage ms-dva
 */
?>
<section class="current-work triade clearfix">
	<section <?php post_class('triade-item leftfloat') ?>>
	<h1 class="miso-font h3link h3grey">News: Projects</h1>
	<ul class="lib-serif link-list">
  <?php    
   $second_query = new WP_Query( 'showposts=5&n3kr_type=projects' );
   while( $second_query->have_posts() ) : $second_query->the_post();
   ?>       
      	<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="dblock">
      	<b class="small date"><?php
      // http://ch.php.net/manual/en/function.date.php
      	 the_time('d M'); ?></b> <span class="u-line"><?php the_title(); ?></span></a></li>
          <?php endwhile; 
           wp_reset_postdata(); ?>    
      </ul>
      </section>      
      <div class="spacer leftfloat"></div>     

	<section <?php post_class('triade-item leftfloat') ?>>
	<h1 class="miso-font h3link h3grey">News: Tech &amp; Code</h1>
	<ul class="lib-serif link-list">
		 <?php    
		  $third_query = new WP_Query( 'showposts=5&n3kr_type=tech' );
		  while( $third_query->have_posts() ) : $third_query->the_post();
		  ?>       
    	<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="dblock">
    	<b class="small date"><?php the_time('d M'); ?></b> <span class="u-line"><?php the_title(); ?></span></a></li>
        <?php endwhile; 
         wp_reset_postdata(); ?>   
    </ul> 
    </section>      
    <div class="spacer leftfloat"></div>
    
    <section <?php post_class('triade-item leftfloat') ?>>
    <h1 class="miso-font h3link h3grey">News: Other</h1>
    <ul class="lib-serif link-list">
    	 <?php    
    	  $fourth_query = new WP_Query( 'showposts=5&n3kr_type=other' );
    	  while( $fourth_query->have_posts() ) : $fourth_query->the_post();
    	  ?>       
    	<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="dblock">
    	<b class="small date"><?php the_time('d M'); ?></b><span class="u-line"><?php the_title(); ?></span></a></li>
        <?php endwhile; 
         wp_reset_postdata(); ?> 
    </ul>   
    </section>   
    
 </section>
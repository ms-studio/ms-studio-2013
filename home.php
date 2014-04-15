<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>

<div id="main" role="main" class="mainframe page-listing">

<section class="current-work triade triade-first clearfix superwide">
	<h1 class="miso-font">Upcoming &amp; Recent</h1>
	<div class="triade-inside">
  <?php query_posts($query_string . '&showposts=9&n3kr_type=featured');
   if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <article <?php post_class('triade-item leftfloat') ?>>
      	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="unstyled diaphane"><?php 
      	if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
      	 the_post_thumbnail('landscape-wide'); 
      	} else {     	
      	image_toolbox('landscape-wide',1); } ;      	
      	 ?>
          <h3 class="miso-font list-item-title h3link"><?php the_title(); ?></h3>
                   
          <?php // check for meta fields : Title, Year, Type ...
          		$ms_year = get_post_meta($post->ID, 'Year', true);
          		$ms_type = get_post_meta($post->ID, 'Type', true);
          ?>         
          <ul class="clean lib-serif">
          	 <?php if($ms_type !== '') {
          		echo '<li>';
          		echo $ms_type;
          		echo '</li>';
          		} ?>        				
          	<li><?php if($ms_year !== '') {
          		echo $ms_year;
          		} else { echo the_time('Y'); } ?>
          	</li>		
          </ul>          
          </a>      
      </article>      
      <div class="spacer leftfloat"></div>
    <?php endwhile; ?>
    </div>
 </section>
 
<section class="current-work triade clearfix superwide">
 	<section <?php post_class('triade-item leftfloat') ?>>
 	<h1 class="miso-font h3link h3grey">News: Projects</h1>
 	<ul class="lib-serif link-list">
   <?php    
    $second_query = new WP_Query( 'showposts=5&n3kr_type=projects' );
    while( $second_query->have_posts() ) : $second_query->the_post();
    ?>       
       	<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="dblock">
       	<b class="small date"><?php the_time('d M'); ?></b> <span class="u-line"><?php the_title(); ?></span></a></li>
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
     	<b class="small date"><?php the_time('d M'); ?></b> <span class="u-line"><?php the_title(); ?></span></a></li>
         <?php endwhile; 
          wp_reset_postdata(); ?> 
     </ul>   
     </section>   
     
  </section>
   

  <?php else : ?>

    <h2>Not Found</h2>
    <p>Sorry, but you are looking for something that isn't here.</p>
    <?php get_search_form(); ?>

  <?php endif; ?>
  
  
  
  
</div>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>



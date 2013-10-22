<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>
<!-- single.php -->

<div id="main" role="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <article <?php post_class('mainframe') ?> id="post-<?php the_ID(); ?>">
  
	  <footer class="meta-inform zero miso-font link-u">
		  <ul>
			<li>Published <time datetime="<?php the_time('Y-m-d'); ?>" class="updated"><?php the_time('F jS, Y') ?></time></li>
			<li>Filed under <?php the_category(' / ') ?></li>
		  </ul>
	  </footer>
	  
    <header>
      <h1 class="main-title miso-font entry-title"><?php the_title(); ?></h1>
      
      <?php // check if we are Main-content or Sub-content
      if ( has_custom_type( 'single-large-image' ) ) {
      	 // echo('single-large-image');
      	 ?>
      	<div class="header-imagery single-large-image full-block clearfix">
	      	<div class="greyframe">
	      	<?php 
	      	image_toolbox('large',1);
	      	?>
	      	</div>
      	</div>	
      	
      	</header>
      	
      	<div class="full-block clearfix">
      		<div class="main-content lib-serif left-block">
      				
      	<?php // remove has_post_thumbnail() condition...
      } elseif ( has_custom_type( 'slideshow' )  ) { ?>
      <!-- Start Minimal Gallery Html Containers -->
      
      </header>
      
      <div class="full-block clearfix">
      	<div class="main-content lib-serif left-block">
      
	      <div id="gallery" class="">
	      	<div class="slideshow-container">
	      		<div id="loading" class="loader"></div>
	      		<div id="slideshow" class="slideshow"></div>
	      	</div><!-- slideshow-container -->
	      </div><!-- gallery -->
      
      
      <!-- End Minimal Gallery Html Containers -->
      <?php } else { ?>
      
      </header>
      
      <div class="full-block clearfix">
      	<div class="main-content lib-serif left-block">
      
      <?php } ?>
      
	    	<?php the_content('Read the rest of this entry &raquo;'); ?>
	    </div>
		
		<div class="right-block post-meta">
		
		<?php 
		if ( has_custom_type( 'single-large-image' ) ) {
		// do nothing 
		} elseif ( has_custom_type( 'slideshow' )  ) { ?>
		<!-- continue Minimal Gallery Html Containers -->

		    				<div id="thumbs" class="right-block-inner">
			      				<ul class="thumbs noscript">
			      				 <?php 
			      				 image_toolbox('thumbnail',-1,'link','li');
			      				 ?>
			      				 </ul>
		    				 </div>
		<!-- End Minimal Gallery Html Containers -->
		<?php } ?>
		
		
		<?php // check for meta fields : Title, Year, Type ...
				$ms_year = get_post_meta($post->ID, 'Year', true);
				$ms_type = get_post_meta($post->ID, 'Type', true);
		?>
		
		<ul class="clean miso-font">
			 <?php if($ms_type !== '') {
				echo '<li>What: ';
				echo $ms_type;
				echo '</li>';
				} ?>
						
			<?php if($ms_year !== '') {
				echo '<li>When: ';
				echo $ms_year;
				echo '</li>';
				} else { //echo the_time('Y'); 
				} ?>
		</ul>
		
			<?php // the_tags( '<p>Tags: ', ', ', '</p>'); ?>
			
			<nav class="miso-font">
			  <div><?php previous_post_link('&larr; Previous: %link') ?></div>
			  <div><?php next_post_link('&rarr; Next: %link') ?></div>
			</nav>			

			<?php comments_template(); ?>
			
		</div><!-- .right-block -->
    </div><!-- .full-block -->

    <?php 
    include( TEMPLATEPATH . '/inc/newsfeed.php' );	
    ?>

  </article>

<?php endwhile; else: ?>

  <p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

</div>

<?php 

include( TEMPLATEPATH . '/footer-pt1.php' );	
include( TEMPLATEPATH . '/footer-pt2.php' );	

// get_footer(); 

?>


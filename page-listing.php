<?php
/*
Template Name: Listing
*/

get_header(); ?>

<div id="main" role="main" class="page-listing">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" class="mainframe">
    <header>
      <h1 class="main-title miso-font"><?php the_title(); ?></h1>
    </header>
  
    <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

    <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
  
  <?php
  /*
  get Page slug
  
  look for 3 posts from Cat: slug
  */
  
  	$post_id = get_post($post->ID); // get current post
  	$slug = $post_id->post_name; // define slug as $slug
  	
  ?>
  	
  <div class="superwide clearfix">
  	<?php global $post;
  	
  			// GETS the NEWEST POST from FEATURED category
  			
  			$args = array( 
  				'numberposts'     => 30,
  				'category_name'     => $slug
  				 );
  			$postslist = get_posts( $args );
  	 
  			foreach ($postslist as $post) : setup_postdata($post);  ?> 
  	
  			<section class="list-item">
  			  	<a href="<?php the_permalink(); ?>" class="dblock unstyled">
  				<div class="centered">
  				<?php  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  				 the_post_thumbnail('landscape'); 
  				} else {     	
  				image_toolbox('landscape',1); } ;   
  				?>
  				</div>
  				
  				<h2 class="list-item-title miso-font h3link"><?php the_title(); ?></h2>
  				</a>
  	
  				<div class="lib-serif"><? the_excerpt(); ?>
  												 					
  					<?php $key="Format"; echo get_post_meta($post->ID, $key, true); ?>
  					
  					<?php if ( get_post_meta($post->ID, 'URL', true) ) : ?>
  					    <footer class="URL">Site en ligne: <a href="<?php echo get_post_meta($post->ID, 'URL', true) ?>" target="_blank"><?php echo get_post_meta($post->ID, 'URL', true) ?></a></footer>
  					<?php endif; ?>
  					
  					<?php if ( get_post_meta($post->ID, 'ISBN', true) ) : ?>
  					    <footer class="ISBN">ISBN <?php echo get_post_meta($post->ID, 'ISBN', true) ?></footer>
  					<?php endif; ?>
  					
  					</div>
  					  			
  			</section>
  			
  			<?php endforeach; ?>
  	</div>
  	
  	</article>
  
  
  <?php endwhile; endif; ?>
  
  <?php //edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

  <?php // comments_template(); ?>

</div>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>

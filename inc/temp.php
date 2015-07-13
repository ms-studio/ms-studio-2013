<?php

// test for custom field
// https://gist.github.com/ms-studio/5985499

if ( is_user_logged_in() ) {
	
		$search_cfield = new WP_Query( array(
			 	'posts_per_page' => -1,
			 	'post_type' => 'any',
				// 'meta_key' => array('VideoFile_MP4','VideoFile_MOV'),
				'meta_query' => array(
						array(
							'key'     => '_wp_page_template',
							'value' => 'archives.php',
						),
					),
				'orderby'  => 'title',
				'order'  => 'ASC',
			 	) ); 
		
		if ($search_cfield->have_posts()) : 
			
			echo '<ul class="unstyled footer-agenda ul-star ul-margin spacing">';
			// echo '<h4>posts with videos to check</h4>';
			         
		while( $search_cfield->have_posts() ) : $search_cfield->the_post();
		?>       
				<li class="news-list-item small">
			      <h3 class="bold"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			      <p>(<a href="<?php echo admin_url(); ?>post.php?post=<?php the_ID(); ?>&action=edit">edit</a>)</p>
		   	</li>
		 <?php endwhile; 
		 
		 	echo '</ul>';
		 
		 else :
		 
		 	echo '<p>nothing found</p>';
		 
		 endif;
		 wp_reset_postdata();
		 
		 
	}
<?php 
/**
Template Name: Custom Page
 */
 
 // define the current page slug:
 
$gsp_slug = $post->post_name;
 
if ( is_page( '2646' )  ) { 

	include( TEMPLATEPATH . '/inc/automattic/to-automattic.php' );

} else { 

	include( TEMPLATEPATH . '/single.php' );

}

?> 

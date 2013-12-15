<?php 
/**
Template Name: Custom Page
 */
 
 // define the current page slug:
 
$gsp_slug = $post->post_name;
 
if ( is_page( '2646' )  ) { 

	include( TEMPLATEPATH . '/inc/automattic/to-automattic.php' );

} else if ( is_page( '3492' )  ) { 

	include( TEMPLATEPATH . '/inc/automattic/work-with-me.php' );

} else { 

	include( TEMPLATEPATH . '/single.php' );

}

?> 

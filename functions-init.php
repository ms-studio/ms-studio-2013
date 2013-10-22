<?php


function custom_register_styles() {
	
//				wp_dequeue_style( 'thematic_style' );
				// the MAIN stylesheet
				wp_enqueue_style( 
						'main_css_style', 
						get_stylesheet_directory_uri() . '/css/ms-dva.min-2013-09-28c.css', // main.css
						false, // dependencies
						null // version
				); 
				
				wp_enqueue_style( 
						'webink_css', 
						'http://fnt.webink.com/wfs/webink.css/?project=ED7A6E85-AB2E-40AA-B132-2DC3C951A0DD&fonts=7D81F936-7D1B-2606-5123-1CD6E6766E21:f=SoleilBasic-Book,69F436D9-ADF2-1C8F-E6D6-5E7109958578:f=EditaWeb-Regular,14BC1009-2DC5-5F1D-75D7-63418F28EEDB:f=TiinaPro-NormalItalic,6CFE4940-D138-54C5-D322-63CBD6F087D4:f=TiinaPro-Normal,D71D3845-5F0E-BA7C-CC69-863C57AA788A:f=TiinaPro-Bold,0BB6004A-0690-BB90-4E9E-359C57AB5E59:f=EditaWeb-Bold,6CFB4309-F407-866F-E4CA-E4C457364584:f=EditaWeb-Italic',
						false,
						null
				); 
				
				// remove some plugin CSS
//	      wp_dequeue_style( 'mailchimpSF_main_css' );
	      // src: http://c-sideprod.ch/?mcsf_action=main_css&#038;ver=3.6
	      
	      wp_enqueue_script( 
	         // the MAIN JavaScript file 
	         		'galleriffic', // handle
	         		get_stylesheet_directory_uri() . '/galleriffic/js/jquery.galleriffic.min.js', // scripts.js
	         		array('jquery'), // dependencies
	         		null, // version
	         		true // in_footer
	         );

}
add_action( 'wp_enqueue_scripts', 'custom_register_styles', 1 );


/* Images
*********************** */

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
        // set_post_thumbnail_size( 150, 150 ); // default Post Thumbnail dimensions   
}

if ( function_exists( 'add_image_size' ) ) { 
	//add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
	add_image_size( 'landscape', 304, 184, true ); //(cropped)
	add_image_size( 'landscape-wide', 608, 368, true ); //(cropped)
	// other values:
	// thumbs: 100 x 100
	// medium: 546 x 500
	// large: 1024 x 1024
}

if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu' ),
				//'footer-fabiana' => __( 'Pied de page Fabiana' ),
				//'footer-michel' => __( 'Pied de page Michel' )
				)
			);
}

// custom taxonomies
// source: http://net.tutsplus.com/?p=11658
// et http://codex.wordpress.org/Function_Reference/register_taxonomy
add_action( 'init', 'build_taxonomies', 0 );

function build_taxonomies() {

$labels = array(
    'name' => _x( 'Content types', 'taxonomy general name' ),
    'singular_name' => _x( 'Content type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search' ),
    'all_items' => __( 'All types' ),
    'parent_item' => __( 'Parent' ),
    'parent_item_colon' => __( 'Parents:' ),
    'edit_item' => __( 'Edit' ), 
    'update_item' => __( 'Update' ),
    'add_new_item' => __( 'Add new' ),
    'new_item_name' => __( 'New type' ),
    'menu_name' => __( 'Content types' ),
  ); 	

    register_taxonomy(
	'n3kr_type',
	'post',
	array(
		'hierarchical' => true,
		'labels' => $labels,
		'query_var' => true,
		'rewrite' => true
	)
);
}


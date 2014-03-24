<?php


/* Allow Automatic Updates
 ******************************
 * http://codex.wordpress.org/Configuring_Automatic_Background_Updates
 */

add_filter( 'auto_update_plugin', '__return_true' );
add_filter( 'auto_update_theme', '__return_true' );
add_filter( 'allow_major_auto_core_updates', '__return_true' );




function custom_register_styles() {
	
//				wp_dequeue_style( 'thematic_style' );
				// the MAIN stylesheet
				wp_enqueue_style( 
						'main_css_style', 
						get_stylesheet_directory_uri() . '/css/ms-dva.2014-01-31-min.css', // main.css
						false, // dependencies
						null // version
				); 
				
				wp_enqueue_style( 
						'webink_css', 
						'http://fnt.webink.com/wfs/webink.css/?project=ED7A6E85-AB2E-40AA-B132-2DC3C951A0DD&fonts=7D81F936-7D1B-2606-5123-1CD6E6766E21:f=SoleilBasic-Book,69F436D9-ADF2-1C8F-E6D6-5E7109958578:f=EditaWeb-Regular,14BC1009-2DC5-5F1D-75D7-63418F28EEDB:f=TiinaPro-NormalItalic,6CFE4940-D138-54C5-D322-63CBD6F087D4:f=TiinaPro-Normal,D71D3845-5F0E-BA7C-CC69-863C57AA788A:f=TiinaPro-Bold,0BB6004A-0690-BB90-4E9E-359C57AB5E59:f=EditaWeb-Bold,6CFB4309-F407-866F-E4CA-E4C457364584:f=EditaWeb-Italic',
						false,
						null
				); 
				
				wp_enqueue_style( 
						'swipebox_css', 
						get_stylesheet_directory_uri() . '/js/libs/swipebox/source/swipebox.css', // main.css
						false, // dependencies
						'1.2.1' // version
				); 
				
				wp_dequeue_script( 'devicepx' ); 
				// some Jetpack stuff - 
				// "That file is used to optionally load retina/HiDPI versions of files (Gravatars etc) which are known to support it, for devices that run at a higher resolution."
				// info: http://wordpress.org/support/topic/plugin-jetpack-by-wordpresscom-unnecessary-java-script-call
				
				// remove some plugin CSS
//	      wp_dequeue_style( 'mailchimpSF_main_css' );
	      // src: http://c-sideprod.ch/?mcsf_action=main_css&#038;ver=3.6
	      
	      wp_dequeue_style( 'contact-form-7' );
//	      // and load it manually on the required page.
//	      wp_enqueue_style( 
//	         		'contact-form-7', // handle
//	         		plugins_url() . '/contact-form-7/includes/css/styles.css',
//	         		false, // dependencies
//	         		false, // WP version number
//	         		true // in_footer
//	         );
	      
	      // http://ms-studio.net/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=3.7.2'
	        
	      wp_enqueue_script( 
	         		'swipebox', // handle
	         		get_stylesheet_directory_uri() . '/js/libs/swipebox/source/jquery.swipebox.min.js',
	         		array('jquery'), // dependencies
	         		'1.2.1', // version
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

add_post_type_support( 'page', 'excerpt');

// custom taxonomies
// *********************
// source: http://net.tutsplus.com/?p=11658
// et http://codex.wordpress.org/Function_Reference/register_taxonomy
add_action( 'init', 'build_taxonomies', 0 );

function build_taxonomies() {

		$labels = array(
		    'name' => _x( 'Settings', 'taxonomy general name' ),
		    'singular_name' => _x( 'Setting', 'taxonomy singular name' ),
		    'search_items' =>  __( 'Search' ),
		    'all_items' => __( 'All settings' ),
		    'parent_item' => __( 'Parent' ),
		    'parent_item_colon' => __( 'Parents:' ),
		    'edit_item' => __( 'Edit' ), 
		    'update_item' => __( 'Update' ),
		    'add_new_item' => __( 'Add new' ),
		    'new_item_name' => __( 'New type' ),
		    'menu_name' => __( 'Settings' ),
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


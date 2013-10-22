<?php  



function custom_admin_head() {
        echo versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."admin/admin.css");
}
add_action('admin_head', 'custom_admin_head');


/**
 * remove WordPress Howdy : http://www.redbridgenet.com/?p=653
 */
function goodbye_howdy ( $wp_admin_bar ) {
    $avatar = get_avatar( get_current_user_id(), 16 );
    if ( ! $wp_admin_bar->get_node( 'my-account' ) )
        return;
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => sprintf( '%s', wp_get_current_user()->display_name ) . $avatar,
    ) );
}
add_action( 'admin_bar_menu', 'goodbye_howdy' );



/* dashboard improvement
******************************/

function wps_recent_posts_dw() {
?>
   <ul style="list-style-type: disc;padding-left: 1.5em;">
     <?php
          global $post;
          $args = array( 'numberposts' => 7 );
          $myposts = get_posts( $args );
                foreach( $myposts as $post ) :  setup_postdata($post); ?>
                    <li> <? the_time('j M Y'); ?> – <a href="<?php echo admin_url(); ?>post.php?post=<?php the_ID(); ?>&action=edit"><?php the_title(); ?></a> (<a href="<?php the_permalink(); ?>">visiter</a>)</li>
          <?php endforeach; ?>
   </ul>
<?php
}
function add_wps_recent_posts_dw() {
       wp_add_dashboard_widget( 'wps_recent_posts_dw', __( 'Recent Posts' ), 'wps_recent_posts_dw' );
}
add_action('wp_dashboard_setup', 'add_wps_recent_posts_dw' );
// source: http://wpsnipp.com/index.php/functions-php/create-most-recent-posts-dashboard-widget/



/**
 * 
 from
 http://wordpress.stackexchange.com/questions/76125/change-the-default-view-of-media-library-in-3-5/76213#76213
 
  */

add_action( 'admin_footer-post-new.php', 'wpse_76048_script' );
add_action( 'admin_footer-post.php', 'wpse_76048_script' );

function wpse_76048_script()
{
    ?>
<script>
jQuery(function($) {
    var called = 0;
    $('#wpcontent').ajaxStop(function() {
        if ( 0 == called ) {
            $('[value="uploaded"]').attr( 'selected', true ).parent().trigger('change');
            called = 1;
        }
    });
});
</script>
 <?php
 }
  
  
  /* some cleanup */
  
  remove_action('wp_head', 'shortlink_wp_head');
  
  // Prevents WordPress from testing ssl capability on domain.com/xmlrpc.php?rsd
  remove_filter('atom_service_url','atom_service_url_filter');
  
  function keep_me_logged_in_for_1_year( $expirein ) {
     return 31556926; // 1 year in seconds
  }
  add_filter( 'auth_cookie_expiration', 'keep_me_logged_in_for_1_year' );
  
    

<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>

<!--<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>-->

<?php wp_footer(); ?>

<?php
echo "<!--[if lt IE 7 ]>";
versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/js/dd_belatedpng.js") ;
echo "<![endif]-->";
?>


<script type="text/javascript">
 			
 			jQuery(document).ready(function() {				
 					// We only want these galleriffic styles applied when javascript is enabled
 					jQuery('div.navigation').css({'width' : '300px', 'float' : 'left'});
 					jQuery('div.content').css('display', 'block');
 					
 					// allow Swipebox for single images
 					jQuery("a>img.alignnone").parent().addClass("swipe");				
 					
 					jQuery(".gallery-icon a, .wp-caption a, a.swipe").swipebox();
 		
 				// Initialize Minimal Galleriffic Gallery       				
// 				jQuery('#thumbs').galleriffic({
// 					imageContainerSel:      '#slideshow',
// 					controlsContainerSel:   '#controls'
// 				});
 					// NOTE: buggy Galleriffic function, no JS will work after this.
 			});
 			       	
</script>

</body>
</html>

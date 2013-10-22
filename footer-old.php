<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>

  <footer id="main-footer">
      <p class="hidden">
        <a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>
        and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
        <!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
      </p>
  </footer>
</div> <!--! end of #container -->

  <!-- Javascript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php bloginfo('stylesheet_directory'); ?>/js/libs/jquery-1.9.0.min.js"><\/script>')</script>

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/script.js"></script>

 <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/galleriffic/js/jquery.galleriffic.min.js"></script>
  

  <!--[if lt IE 7 ]>
    <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/js/dd_belatedpng.js") ?>
  <![endif]-->
       
       <script type="text/javascript">
       			
       			$(document).ready(function() {				
       				
       					// We only want these galleriffic styles applied when javascript is enabled
       					$('div.navigation').css({'width' : '300px', 'float' : 'left'});
       					$('div.content').css('display', 'block');
       		
       				// Initialize Minimal Galleriffic Gallery       				
       				$('#thumbs').galleriffic({
       					imageContainerSel:      '#slideshow',
       					controlsContainerSel:   '#controls'
       				});
       				// NOTE: buggy Galleriffic function, no JS will work after this!!!
       			});
       			       	
       		</script>

  <?php wp_footer(); ?>

</body>
</html>

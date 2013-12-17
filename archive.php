<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>

<div id="main" role="main" class="mainframe">

  <?php if (have_posts()) : ?>

  <section >
    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    <?php /* If this is a category archive */ if (is_category()) { ?>
    <h1 class="main-title miso-font"><?php single_cat_title(); ?></h1>
    <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
    <h1 class="main-title miso-font"><?php single_tag_title(); ?></h1>
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
    <h2 class="main-title miso-font">Archive for <?php the_time('F jS, Y'); ?></h2>
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
    <h2 class="main-title miso-font">Archive for <?php the_time('F, Y'); ?></h2>
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
    <h2 class="main-title miso-font">Archive for <?php the_time('Y'); ?></h2>
    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
    <h2 class="main-title miso-font">Author Archive</h2>
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    <h2 class="pagetitle">Blog Archives</h2>
    <?php } 
    
    
    global $wp_rewrite;			
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    
    $pagination = array(
    	'base' => @add_query_arg('page','%#%'),
    	'format' => '',
    	'total' => $wp_query->max_num_pages,
    	'current' => $current,
    	'show_all' => true,
    	'type' => 'plain',
    	);
    
    if( $wp_rewrite->using_permalinks() )
    	$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg('s',get_pagenum_link(1) ) ) . 'page/%#%/', 'paged');
    
    if( !empty($wp_query->query_vars['s']) )
    	$pagination['add_args'] = array('s'=>get_query_var('s'));
    
    
    echo '<div class="pagination pagination-top clear">'. paginate_links($pagination) .'</div>'; 
    
    
    
     while (have_posts()) : the_post(); ?>
    <article <?php post_class() ?>>
      <header>
        <h3 class="post-title miso-font" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="trueblack"><?php the_title(); ?></a></h3>
        <time class="lib-serif" datetime="<?php the_time('Y-m-d')?>"><?php the_time('l, F jS, Y') ?></time>
      </header>
      <?php //the_content() ?>
      <footer class="lib-serif">
        <div class="arch-post-meta">Category: <?php the_category(' / ') ?></div>
        <div class="arch-post-meta"><?php the_tags('Tags: ', ' / ', '<br />'); ?></div>
      </footer>
    </article>
    <?php endwhile; ?>
		
    <?php 
    
    echo '<div class="pagination pagination-bottom clear">'. paginate_links($pagination) .'</div>';
    
     ?>
    
  </section>

  <?php else :

  if ( is_category() ) { // If this is a category archive
    printf("<h2>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
  } else if ( is_date() ) { // If this is a date archive
    echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
  } else if ( is_author() ) { // If this is a category archive
    $userdata = get_userdatabylogin(get_query_var('author_name'));
    printf("<h2>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
  } else {
    echo("<h2>No posts found.</h2>");
  }
  get_search_form();

  endif;
  ?>

</div>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>

<?php // NOTE: we're inside #mainframe

		// check for meta fields : Title, Year, Type
		$proj_author = get_post_meta($post->ID, 'ProjectAuthor', true);
		$proj_cat = get_post_meta($post->ID, 'ProjectCategory', true);
		$proj_dates = get_post_meta($post->ID, 'ProjectDates', true);
		$proj_loc = get_post_meta($post->ID, 'ProjectLocation', true);
		$proj_dur = get_post_meta($post->ID, 'Duration', true);
		
		$publi_label = get_post_meta($post->ID, 'PubliLabel', true);
		$publi_format = get_post_meta($post->ID, 'PubliFormat', true);
		$cat_nr = get_post_meta($post->ID, 'CatNr', true);
			
?>

<div id="publication-info-box">
	<?php image_toolbox('medium',1); ?>
	<div class="metadata">
		<ul>
			<li>title: <?php the_title(); ?></li>
			<li>artist: <?php 
				if($proj_author !== '') {
					echo $proj_author;
				} else { 
					echo 'N3krozoft Ltd';
						} ?>
			</li>
			<?php // cat_nr
					if($publi_label !== '') { ?>
					<li>label: <?php 
					echo $publi_label; ?></li>
			<?php } ?>
			<?php // cat_nr
					if($publi_format !== '') { ?>
					<li>format: <?php 
					echo $publi_format; ?></li>
			<?php } ?>
			<?php // cat_nr
					if($cat_nr !== '') { ?>
					<li>catalog number: <?php 
					echo $cat_nr; ?></li>
			<?php } ?>
			<?php // Dates
					if($proj_dates !== '') { ?>
					<li>released: <a href="<?php bloginfo('url');?>/<?php the_time('Y') ?>" title="See more projects from <?php the_time('Y') ?>..."><?php 
					echo $proj_dates; ?></a></li>
					<?php } else { ?>
					<li>released: <a href="<?php bloginfo('url');?>/<?php the_time('Y') ?>" title="See more projects from <?php the_time('Y') ?>..."><?php the_time('m/Y') ?></a></li>
			<?php } ?>
		</ul>
		</div>
</div>
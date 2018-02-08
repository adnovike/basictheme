<!-- Featured Post Format Layout for Displaying specific posts as a Slider on Home Pages
	Post Format without Date Information -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<!-- Displays Featured Image as a Thumbnail of a Post -->
			<?php if (has_post_thumbnail()): ?> 	<!-- Checks for featured Image of a Post -->
				<div class="thumbnail-img"><?php the_post_thumbnail('thumbnail'); ?> </div>
			<?php endif; ?>
			
			<!-- the_permalink makes the_title a  link to the actual post page -->			
			<?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink() )),'</a></h1>'); ?>
			
			<!-- Displays the Category of a Post -->
			<small><?php the_category(' '); ?></small>
			
</article>


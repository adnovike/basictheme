
	<div class="searchblock" style="clear: both; height: 250px; overflow:hidden;">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		
			<!-- the_permalink makes the_title a  link to the actual post page -->			
			<?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink() )),'</a></h1>'); ?>

			<?php if (has_post_thumbnail() ): ?>
			
				<div class="pull-left"><?php the_post_thumbnail('thumbnail'); ?> </div>

			<?php endif; ?>				

			<small><?php the_category(' '); ?> || <?php the_tags(); ?> || <?php edit_post_link(); ?></small>
			
			<?php the_excerpt(); ?>
			
			<hr>
			
		</article>
	</diV>


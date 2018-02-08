<!-- Default (Standard) Post Format Layout for specific post excerpt on Blog Page -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header class="blog-header">
			<!-- the_permalink makes the_title a  link to the actual post page -->			
			<?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink() )),'</a></h1>'); ?>
			
		</header>
			
		<div class="row">
		
		<!-- Displays Featured Image of a Post -->
		<?php if (has_post_thumbnail()): ?> 	<!-- Checks for featured Image of a Post -->
			<div class="col-xs-12 col-sm-4">
				<div class="thumbnail-img"><?php the_post_thumbnail('thumbnail'); ?></div>
			</div>
		
		
		<div class="col-xs-12 col-sm-8">
			<?php the_excerpt(); ?> <!-- Displays the Body Content of a Post -->
		</div>
		
		<?php else: ?>
			<div class="col-xs-12">
				<?php the_excerpt(); ?>
		</div>
		
		<?php endif; ?>
	</div>
	
			
			<hr>
</article>


<!-- Default (Standard) Post Format Layout for specific post excerpt on Blog Page -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header class="blog-header">
			<!-- the_permalink makes the_title a  link to the actual post page -->			
			<?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink() )),'</a></h1>'); ?>
			
			<!-- Displays Featured Image as a Thumbnail of a Post -->
			<?php if (has_post_thumbnail()): ?> 	<!-- Checks for featured Image of a Post -->
				<div class="thumbnail-img"><?php the_post_thumbnail('thumbnail'); ?> </div>
			<?php endif; ?>
			
			<!-- Displays the Date, Time and Category of a Post -->
			<small>Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> in <?php the_category(' '); ?></small>
		</header>
			
		<div class="row">
		
		<!-- Displays Featured Image of a Post -->
		<?php if (has_post_thumbnail()): ?> 	<!-- Checks for featured Image of a Post -->
			<div class="col-xs-12 col-sm-4">
				<div class="thumbnail-img"><?php the_post_thumbnail('thumbnail'); ?></div>
			</div>
		
		
		<div class="col-xs-12 col-sm-8">
			<?php the_content(); ?> <!-- Displays the Body Content of a Post -->
		</div>
		
		<?php else: ?>
			<div class="col-xs-12">
				<?php the_content(); ?>
		</div>
		
		<?php endif; ?>
	</div>
	
			
			<hr>
</article>


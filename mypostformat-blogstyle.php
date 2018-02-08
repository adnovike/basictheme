<!-- Featured Post Format Layout for Displaying specific posts as a Slider on Home Pages
	Post Format without Date Information -->

<div class="col-xs-<?php echo $column; echo $class; ?>">
				
				<!-- Attaching the Post Featured Image to a variable -->
				<?php	if(has_post_thumbnail() ): 
							$urlimg = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID() ) );
						 endif; 
				?>
				
				<!-- Set Featured Image as a Background Image -->
				<div class="blog-element" style="background-image: url(<?php echo $urlimg; ?>);">
					
						
				<!-- the_permalink makes the_title a  link to the actual post page -->	
				<?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink() )),'</a></h1>'); ?>
		
				<!-- Displays the Category of a Post -->
				<small><?php the_category(' '); ?></small>
					
					</div>	
</div>
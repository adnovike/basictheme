<?php
	
	get_header();

?>
	<div class="row">
	
	<div class="col-xs-12 col-sm-8">
	
	<div class="row text-center">		
		
		
		
		<?php if(have_posts() ): $i = 0; ?>	
		
			
			<?php	while(have_posts() ): the_post(); ?>	
				
				<?php 
					if($i==0): $column = 12;
					elseif($i > 0 && $i <= 2): $column = 6; $class = ' second-row-padding';
					elseif($i > 2): $column = 4; $class = ' third-row-padding';
					endif;
				?>
				
				<div class="col-xs-<?php echo $column; echo $class; ?>">
				
				<!-- Attaching the Post Featured Image to a variable -->
				<?php	if(has_post_thumbnail() ): 
							$urlimg = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID() ) );
						 endif; 
				?>
				
				<!-- Set Featured Image as a Background Image -->
				<div class="blog-element" style="background-image: url(<?php echo $urlimg; ?>);">
					
						
				<!-- the_permalink makes the_title a  link to the actual post page -->	
				<?php the_title( sprintf('<h2 class="entry-title"><a href="%s">', esc_url(get_permalink() )),'</a></h2>'); ?>
		
				<!-- Displays the Category of a Post -->
				<small><?php the_category(' '); ?></small>
					
					</div>	
				</div>
			<?php	$i++; endwhile; ?>
			
		<div class="col-xs-6">
			<?php next_posts_link('<< Older Posts'); ?>
		</div>
		
		<div class="col-xs-6">
			<?php previous_posts_link('Newer Posts >>'); ?>
		</div>
			
		<?php
		endif;	
		
		?>	

 </div>
 </div>
	
	<div class="col-xs-12 col-sm-4">
		<?php get_sidebar(); ?>
	</div>
	
</div>
	
<?php 	get_footer(); ?>
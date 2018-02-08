<?php 
/*
	Template Name: Full Width

*/

get_header(); ?>

<div class="row">

<div class="col-xs-12">	
	<?php 
	
	if(have_posts() ):
			
			while(have_posts() ): the_post(); ?>
				
				<p><?php the_content(); ?></p>
				
		<?php	endwhile;
		
				endif;	
	
	?>
	</div>
</div>
<?php get_footer(); ?>
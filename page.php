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
			
			<?php get_template_part('mypostformat', get_post_format()); ?>
				
		<?php	endwhile;
		
				endif;	
	
	?>
	</div>
</div>
<?php get_footer(); ?>
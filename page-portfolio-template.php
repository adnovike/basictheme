<?php 
/*
	Template Name: Portfolio Template

*/

get_header(); ?>

<div class="row">

<div class="col-xs-12">	
	<?php 
	
		$args = array('post_type' => 'portflio', 'post_per_page' => -1);
		$loop = new WP_Query($args);
	
	if($loop->have_posts() ):
			
			while($loop->have_posts() ): $loop->the_post(); ?>
				
				<?php get_template_part('mypostformat', 'portfolio'); ?>
				
		<?php	endwhile;
		
				endif;	
	
	?>
	</div>
</div>
<?php get_footer(); ?>
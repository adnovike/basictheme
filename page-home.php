<?php 
/*
	Template Name: Home Page

*/

get_header(); ?>

<div class="row">
	<div class="col-xs-12">

	<div id="basiccarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
	
		
	
	<div class="carousel-inner" role="listbox">
	
	<?php 
	
	// POST SLIDER
	
		$args_cat = array(
			'include' => '1, 8, 7'
			);
			
		$categories = get_categories($args_cat);
		
		$count = 0;
		$bullets ='';
		foreach($categories as $category):
			
			$args = array(
			'type' => 'post',
			'posts_per_page' => 1,
			'category__in' => $category->term_id,
			'category__not_in' => array(9)
			);
			
				$lastBlog = new WP_Query($args);
				
				if($lastBlog->have_posts()):
				
					
					while($lastBlog->have_posts() ): $lastBlog->the_post(); ?>
					
					<div class="item <?php if($count == 0): echo 'active'; endif; ?>">
							<?php the_post_thumbnail('full'); ?>
							<div class="carousel-caption">
							<?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink() )),'</a></h1>'); ?>	
							<small><?php the_category(', '); ?></small>
							</div>							
					</div>
					<?php $bullets .= '<li data-target="#basiccarousel" data-slide-to="'.$count.'" class="'; ?> 
					<?php if($count == 0): $bullets .='active'; endif; ?>
					
					<?php $bullets .= '"></li>';?>
					<?php	 endwhile;
				
				endif; 
				
				wp_reset_postdata();
				
				$count++;
				endforeach;
	?>
	
	</div>
	
			<!-- Carousel Indicators -->
			<ol class="carousel-indicators">
				<?php echo $bullets; ?>
						
			</ol>
		
		
			<!-- Carousel Arrows Controls-->
			<a class="left carousel-control"  href="#basiccarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>

			<a class="right carousel-control"  href="#basiccarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
	
	</div>
</div>
</div>



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


<div class="row">	
	
	<?php 
	
	// DISPLAYING THREE LASTEST POST
	
		$args_cat = array(
			'include' => '1, 8, 7'
			);
			
		$categories = get_categories($args_cat);
		foreach($categories as $category):
			
			$args = array(
			'type' => 'post',
			'posts_per_page' => 1,
			'category__in' => $category->term_id,
			'category__not_in' => array(9)
			);
			
				$lastBlog = new WP_Query($args);
				
				if($lastBlog->have_posts()):
					while($lastBlog->have_posts() ): $lastBlog->the_post(); ?>
					
					<div class="col-xs-12 col-sm-4">
						
							<?php get_template_part('mypostformat', 'featured'); ?>
						
					</div>	
					<?php	endwhile;
				
				endif;
				
				wp_reset_postdata();
				endforeach;
	?>
</div>



<?php get_footer(); ?>
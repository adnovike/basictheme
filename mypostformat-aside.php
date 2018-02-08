<!-- Aside Post Format Layout for specific post excerpt on Blog Page 
	Post Format without Date and Category Information -->

<article class="post">
		
			<!-- the_permalink makes the_title a  link to the actual post page -->			
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
			<!-- Displays Featured Image of a Post -->
			<div class="thumbnail-img"><?php the_post_thumbnail('thumbnail'); ?> </div>
			
			
			<!-- Displays the Body Content of a Post -->
			<?php the_content(); ?>
			
			<hr>
</article>


<footer class="site-footer">
	<p>&copy; <?php echo Date('Y'); ?> - <?php bloginfo('name'); ?></p>
	
	<!-- Displaying Secondary Menu created in functions.php -->	
	<?php wp_nav_menu(array('theme_location'=>'secondary')); ?>
</footer>


</div> <!-- Closing Container div in header.php -->




<?php wp_footer(); ?>	<!-- Connecting Page to functions.php -->

</body>
</html>
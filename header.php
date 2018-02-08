<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php bloginfo('name'); ?> <?php wp_title('|'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
		
	<?php wp_head(); ?>		<!-- Connect Page to functions.php -->
</head>

<!-- Adding additional classes to your Front Page (Home Page). 
		NB: is_home() refers to Blog Page -->
<?php
		if(is_front_page() ):
			$owuss_classes = array('owuss-class', 'my-class');
		else:
			$owuss_classes = array('no-owuss-class');
		endif;
	?>

<body <?php body_class($owuss_classes); ?> >
	
	<div class="container">

	<header class="site-header">
	
	<!-- Linking Site name to Home Page -->	
		<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
		<h4><?php bloginfo('description'); ?></h4>

		
	<!-- Displaying Primary Menu created in functions.php -->	
	
	<div class="row">
			<div class="col-xs-12">
			
			<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
					<!--	<a class="navbar-brand" href="#">Owuss Media</a> -->
					</div>
						<div class="collapse navbar-collapse" id="collapse">
							<?php 
								/* wp_nav_menu(array(
									'theme_location'=>'primary',
									'container'=>false,
									'depth' => 2,
									'menu_class' => 'nav navbar-nav navbar-left',
									'walker' => new wp_bootstrap_navwalker()
									)
								);	 */
								
								 wp_nav_menu(array(
									'theme_location'=>'primary',
									'container'=>false,
									'menu_class' => 'nav navbar-nav navbar-left',
									'walker' => new Walker_Nav_Primary()
									)
								);	 
							?>
						</div>
					</div> <!-- /.container-fluid -->
				</nav>
				
			</div>
			
			<div class="search-form-container"> 
				<?php get_search_form(); ?>			
			</div>
			
		</div>		
	
	
	
	
	
	
	
	<!-- Displaying Header image created in functions.php -->	

	<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" 
		width="<?php echo get_custom_header()->width; ?>" alt="" />
	
	</header>
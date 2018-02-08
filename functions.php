<?php 

/*
	=======================================
	Include Custom Stylesheets and Scripts 
	=======================================
*/
	function mybasic_theme_assets() {
		
		//Linking to Default Style.css Stylesheet
		//wp_enqueue_style('style', get_stylesheet_url());
		
		//Linking to Bootstrap CSS and Custom Stylesheet
		
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array());
		wp_enqueue_style('basicstyle', get_template_directory_uri() . '/css/basictheme.css', array(), '1.0.0', 'all');
		
		// Linking to JS Scripts
		wp_enqueue_script('jqueryjs', get_template_directory_uri() . '/js/jquery.min.js', array(), '', true);
		wp_enqueue_script('jquerymigratejs', get_template_directory_uri() . '/js/jquery-migrate.js', array(), '', true);
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(),'', true);
		wp_enqueue_script('customjs', get_template_directory_uri() . '/js/basictheme.js', array(), '1.0.0', true);
	}

	add_action('wp_enqueue_scripts', 'mybasic_theme_assets');


	
/*
	===========================
	Activate Menus
	==========================
*/
	function basic_theme_setup() {
		
		add_theme_support('menus'); // Hook for adding menus
		
		register_nav_menu('primary', 'Primary Header Navigation');
		register_nav_menu('secondary', 'Footer Navigation');
	}

	add_action('init', 'basic_theme_setup');
	

	
/*
	===========================
	Theme Support Functions
	==========================
*/
add_theme_support('custom-background'); // Add options to Dashboard Customize
add_theme_support('custom-header');
add_theme_support('post-thumbnails'); // Add Featured images section in Dashboard

// Add Post Formats section in Dashboard to change the appearance of a post on the Blog page.
add_theme_support('post-formats', array('aside', 'image', 'video')); 

add_theme_support('html5', array('search-form'));



/*
	===========================
	Sidebar Functions
	==========================
*/

function basictheme_widget_setup() {
	register_sidebar(
	array(
	'name' => 'Sidebar',
	'id' => 'sidebar-1',
	'class' => 'custom',
	'description' => 'Standard Sidebar',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h1 class="widget_title">',
	'after_title' => '</h1>',
	)
	);
	
	register_sidebar(
	array(
	'name' => 'Left Sidebar',
	'id' => 'sidebar-2',
	'class' => 'custom',
	'description' => 'Secondary Sidebar',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h1 class="widget_title">',
	'after_title' => '</h1>',
	)
	);
	
	register_sidebar(
	array(
	'name' => 'Footer Widget Area',
	'id' => 'sidebar-3',
	'class' => 'custom',
	'description' => 'Footer Widget Area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h1 class="widget_title">',
	'after_title' => '</h1>',
	)
	);
}
add_action('widgets_init', 'basictheme_widget_setup');


/*
	======================================
	Include Walker File for Dropdown Menu
	======================================
*/

 require get_template_directory().'/inc/walker.php';

// require get_template_directory().'/inc/wp-bootstrap-navwalker.php';

/*
	=======================================
	Removes Wordpress Version from Header.php 
	=======================================
*/

function basic_remove_wordpress_version() {
	return '';
}
add_filter('the_generator',  'basic_remove_wordpress_version');


/*
	=======================================
	Custom Post Type 
	=======================================
*/
function basic_custom_post_type () {
	$labels = array(
		'name' => 'Portfolio',
		'singular_name' => 'Portfolio',
		'add_new' => 'Add New',
		'all_items' => 'All Items',
		'add_new_item' => 'Add New Item',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_item' => 'Search Portfolio',
		'not_found' => 'No item found',
		'not_found_in_trash' => 'No item found in trash',
		'parent_item_colon' => 'Parent Item'
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		),
		// 'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false
	);
	register_post_type('portfolio', $args);
}

add_action('init', 'basic_custom_post_type');


/*
	=======================================
	Custom Taxonomies Type 
	=======================================
*/
function basic_custom_taxonomies () {
	
	// add new taxonomy hierarchical
	$labels = array(
		'name' => 'Fields',
		'singular_name' => 'Field',
		'search_item' => 'Search Field',
		'all_items' => 'All Fields',
		'parent_item_colon' => 'Parent Field',
		'parent_item_colon' => 'Parent Field',
		'edit_item' => 'Edit Field',
		'update_item' => 'Update Type',
		'add_new_item' => 'Add New Field',
		'new_item_name' => 'New Field Name',
		'menu_name' => 'Field',		
		'not_found' => 'No field found',
		'not_found_in_trash' => 'No field found in trash'
	);
	
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'field')
	);
	
	register_taxonomy('field', array('portfolio'), $args);
	
	// add new taxonomy non hierarchical
	
	register_taxonomy('software', 'portfolio', array(
		'label' => 'Software',
		'rewrite' => array('slug' => 'software'),
		'hierarchical' => false
	));


}

add_action('init', 'basic_custom_taxonomies');



/*
	============================================
	Custom Term Function on single-portfolio.php 
	============================================
*/
function basic_get_terms($postID, $term){
	$terms_list = wp_get_post_terms($postID, $term); 
	$output = '';
	$i = 0;
	foreach($terms_list as $term) { $i++;
		if($i > 1) { $output .= ', '; }
		$output .= '<a href="' . get_term_link($term) . '">' . $term->name . '</a>';
	}
	return $output;
}

?>
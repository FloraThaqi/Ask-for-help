<?php
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Theme Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));

    acf_add_options_page(array(
        'page_title'     => 'Footer Settings',
        'menu_title'    => 'Footer Settings',
        'menu_slug'     => 'footer-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));
}
function style_enqueue() {
	wp_enqueue_style( 'style-name', get_template_directory_uri() . '/public/css/tailwind.css');
    wp_enqueue_script('script',get_template_directory_uri() . '/js/script.js',array( 'jquery' ), 1.1, true);
    wp_enqueue_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'style_enqueue' );

//Add navbar

function add_navbar(){
    add_theme_support('menus');
    register_nav_menu('primary','Primary Header Navigation');
}
add_action('init','add_navbar');

    // Include Walker file
    require get_template_directory() . '/inc/walker.php';

/*
==========================================
Questions Post Type
==========================================
*/
function questions_post_type (){
	
	$labels = array(
		'name' => 'Questions',
		'singular_name' => 'Questions',
		'add_new' => 'Add Question',
		'all_items' => 'All Questions ',
		'add_new_item' => 'Add Question',
		'edit_item' => 'Edit Question',
		'new_item' => 'New Question',
		'view_item' => 'View Question',
		'search_item' => 'Search Questions',
		'not_found' => 'No questions found',
		'not_found_in_trash' => 'No questions found in trash',
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
			'thumbnail',
			'revisions',
		),
		//'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false
	);
	register_post_type('questions',$args);
}
add_action('init','questions_post_type');



/*
	==========================================
	 Sidebar function
	==========================================
*/
function awesome_widget_setup() {
	
	register_sidebar(
		array(	
			'name'	=> 'Sidebar',
			'id'	=> 'sidebar-1',
			'class'	=> 'custom',
			'description' => 'Standard Sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		)
	);
	
}
add_action('widgets_init','awesome_widget_setup');
function questions_custom_taxonomies(){
	//add new taxonomy hirarchical
	$labels = array(
		'name' => 'Questions Category',
		'singular_name' => 'Questions Category',
		'search_items' => 'Search Questions Category',
		'all_items' => 'All Questions ',
		'parent_item' => 'Parent Questions',
		'parent_item_colon' => 'Parent Questions: ',
		'edit_item' => 'Edit Questions Category',
		'update_item' => 'Update Questions Category',
		'add_new_item' => 'Add New Question Category',
		'new_item_name' => 'New Questions Name',
		'menu_name' => 'Question Category',
	);
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'questions')
	);
	register_taxonomy('field',array('questions'),$args);

// add new taxonomy NOT hirarchical

register_taxonomy('software', 'questions',array(
'label' => 'Other Questions',
'rewrite' => array('slug' => 'software'),
'hierarchical' => false,

));
}
add_action('init','questions_custom_taxonomies');	
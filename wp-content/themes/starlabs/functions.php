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
function style_enqueue()
{
    wp_enqueue_style('style-name', get_template_directory_uri() . '/public/css/tailwind.css');
    wp_enqueue_script('script', get_template_directory_uri() . '/scripts/script.js');
}
add_action('wp_enqueue_scripts', 'style_enqueue');

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
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		),
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false
	);
	register_post_type('questions',$args);
}
add_action('init','questions_post_type');

function questions_custom_taxonomies(){
	//add new taxonomy hirarchical
	$labels = array(
		'name' => 'Questions',
		'singular_name' => 'Questions',
		'search_items' => 'Search Questions',
		'all_items' => 'All Questions',
		'parent_item' => 'Parent Questions',
		'parent_item_colon' => 'Parent Questions: ',
		'edit_item' => 'Edit Questions',
		'update_item' => 'Update Questions',
		'add_new_item' => 'Add New Questions',
		'new_item_name' => 'New Questions Name',
		'menu_name' => 'Question Type',
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
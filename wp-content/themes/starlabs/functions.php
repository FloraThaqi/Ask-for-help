<?php
ob_start();
error_reporting(0);

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
	wp_enqueue_style( 'style-name', get_template_directory_uri() . './public/css/tailwind.css');
	wp_enqueue_style( 'style-comment', get_template_directory_uri() . '/public/css/comment-style.css');
  wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);
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
			'comments',
			'discussion'
		),
		//'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false
	);
	register_post_type('questions',$args);
}
add_action('init','questions_post_type');

add_action('check_admin_referer', 'logout_without_confirm', 10, 2); 
function logout_without_confirm($action, $result) 
{ 
    /** 
     * Allow logout without confirmation 
     */ 
    if ($action == "log-out" && !isset($_GET['_wpnonce'])) { 
        $redirect_to = isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : ''; 
        $location = str_replace('&amp;', '&', wp_logout_url($redirect_to));; 
        header("Location: $location"); 
        die; 
    } 
}
add_action('wp_logout','ps_redirect_after_logout');
function ps_redirect_after_logout(){
         wp_redirect( home_url() );
         exit();
}

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
			'fields' => array(
				array(
					'key' => 'field_63aeeb4ddee00',
					'label' => 'Title',
					'name' => 'title',
					'type' => 'text'
				),
				array(
					'key' => 'field_63ad7b86be29c',
					'label' => 'Pages',
					'name' => 'pages',
					'type' => 'repeater',
					'sub_fields' => array(
						array(
							'key' => 'field_63ad7b98be29d',
							'label' => 'Link',
							'name' => 'link',
							'type' => 'link'
						)
					)
				)
			)
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

/*
	==========================================
 		ACF Theme Settings
	==========================================
*/

if( function_exists('acf_add_options_page') ) {
  acf_add_options_page();
}

/*
	==========================================
 		Fonts
	==========================================
*/

function google_fonts()
{
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap', false);
}
add_action('wp_enqueue_scripts', 'google_fonts');

/*
	==========================================
 		Post Views
	==========================================
*/

function gt_get_post_view()
{
	$post_id = get_the_ID();
	$count = get_post_meta($post_id, 'post_views_count', true);
	return "$count views";
}

function gt_get_post_views($post_id)
{
	$count = get_post_meta($post_id, 'post_views_count', true);
	return "$count views";
}

function gt_set_post_view()
{
	$key = 'post_views_count';
	$post_id = get_the_ID();
	$count = (int) get_post_meta($post_id, $key, true);
	$count++;

	update_post_meta($post_id, $key, $count);
}

function gt_set_post_views($post_id)
{
	$key = 'post_views_count';
	$count = (int) get_post_meta($post_id, $key, true);

	update_post_meta($post_id, $key, $count);
}

function gt_posts_column_views($columns)
{
	$columns['post_views'] = 'Views';
	return $columns;
}

function gt_posts_custom_column_views($column)
{
	if ($column === 'post_views') {
		echo gt_get_post_view();
	}
}

add_filter('manage_posts_columns', 'gt_posts_column_views');
add_action('manage_posts_custom_column', 'gt_posts_custom_column_views');




//delete button on comment section

        
// Add script on single post & pages with comments only, if user has edit rights
add_action( 'template_redirect', 'boj_idc_addjs_ifcomments' );
function boj_idc_addjs_ifcomments() {
    if( is_single() && current_user_can( 'moderate_comments' ) ) {
        global $post;
        if( $post->comment_count ) {
            $path = plugin_dir_url( __FILE__ );
        
            wp_enqueue_script( 'boj_idc', $path.'js/script.js' );
            $protocol = isset( $_SERVER["HTTPS"]) ? 'https://' : 'http://';
            $params = array(
              'ajaxurl' =>admin_url( 'admin-ajax.php', $protocol )
            );
            wp_localize_script( 'boj_idc', 'boj_idc', $params );
        }
    }
}
     

// Add an admin link to each comment
add_filter( 'comment_text', 'delete_button' );
function delete_button( $text ) {
    // Get current comment ID
    global $comment , $user_ID;
    $comment_id = $comment->comment_ID;
	$post_id = get_the_ID();
	$author_id = get_post_field('post_author', $post_id);

	if($author_id==$user_ID){

		// Get link to admin page to trash comment, and add nonces to it
		$link =printf(
		'<a class=" text-base absolute p-6 text-red-600 bottom-0 left-0" href="%s">%s</a>',
		

		wp_nonce_url(
			admin_url( "comment.php?c=$comment_id&action=deletecomment" ),
			'delete-comment_' . $comment_id
		),
		esc_html__( 'Delete', 'text-domain' )
	);
}
	
    return $text;

}

/*
	==========================================
 		Like and Dislike
	==========================================
*/

// Add like and dislike button to comments
add_filter( 'comment_text', 'like_dislike_button' );
function like_dislike_button( $content ) {
    global $comment;
    $comment_id = $comment->comment_ID;

    $like_count = get_comment_meta($comment_id, 'like_count', true);
    $dislike_count = get_comment_meta($comment_id, 'dislike_count', true);

    $like_count = $like_count ? $like_count : 0;
    $dislike_count = $dislike_count ? $dislike_count : 0;

    $content .= '<div class="like-dislike-container relative flex justify-end gap-1">
                <span class="like-count text-gray-600">' . $like_count . '</span> 
                <a href="' . wp_nonce_url(admin_url("comment.php?c=$comment_id&action=like"), 'like_' . $comment_id) . '" class="like-button"><svg class="w-5 h-5 fill-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2H464c26.5 0 48 21.5 48 48c0 25.3-19.5 46-44.3 47.9c7.7 8.5 12.3 19.8 12.3 32.1c0 23.4-16.8 42.9-38.9 47.1c4.4 7.2 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48H294.5c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3V320 272 247.1c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192H96c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V224c0-17.7 14.3-32 32-32z"/></svg></a> 
                <span class="dislike-count text-gray-600">' . $dislike_count . '</span> 
                <a href="' . wp_nonce_url(admin_url("comment.php?c=$comment_id&action=dislike"), 'dislike_' . $comment_id) . '" class="dislike-button"><svg class="w-5 h-5 fill-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M313.4 479.1c26-5.2 42.9-30.5 37.7-56.5l-2.3-11.4c-5.3-26.7-15.1-52.1-28.8-75.2H464c26.5 0 48-21.5 48-48c0-25.3-19.5-46-44.3-47.9c7.7-8.5 12.3-19.8 12.3-32.1c0-23.4-16.8-42.9-38.9-47.1c4.4-7.3 6.9-15.8 6.9-24.9c0-21.3-13.9-39.4-33.1-45.6c.7-3.3 1.1-6.8 1.1-10.4c0-26.5-21.5-48-48-48H294.5c-19 0-37.5 5.6-53.3 16.1L202.7 73.8C176 91.6 160 121.6 160 153.7V192v48 24.9c0 29.2 13.3 56.7 36 75l7.4 5.9c26.5 21.2 44.6 51 51.2 84.2l2.3 11.4c5.2 26 30.5 42.9 56.5 37.7zM32 320H96c17.7 0 32-14.3 32-32V64c0-17.7-14.3-32-32-32H32C14.3 32 0 46.3 0 64V288c0 17.7 14.3 32 32 32z"/></svg></a>
             </div>';
    return $content;
}

// Handle like button action
add_action( 'admin_action_like', 'handle_like' );
function handle_like() {
    handle_like_dislike('like_count', 'like_');
}

add_action( 'admin_action_dislike', 'handle_dislike' );
function handle_dislike() {
    handle_like_dislike('dislike_count', 'dislike_');
}

function handle_like_dislike($meta_key, $nonce_key) {
    // Verify nonce
    if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( $_GET['_wpnonce'], $nonce_key . $_GET['c'] ) ) {
        wp_die( 'Invalid request.' );
    }

    // Get comment ID
    $comment_id = intval( $_GET['c'] );

    $like_count = get_comment_meta($comment_id, 'like_count', true);
    $dislike_count = get_comment_meta($comment_id, 'dislike_count', true);

    if ($like_count || $dislike_count) {
        delete_comment_meta( $comment_id, $meta_key);
    } else {
        // Perform action
        add_comment_meta( $comment_id, $meta_key, 1, true );
    }

    // Redirect
    wp_redirect( wp_get_referer() );
    exit;
}
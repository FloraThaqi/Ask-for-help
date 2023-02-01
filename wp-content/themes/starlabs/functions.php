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
	wp_enqueue_style( 'style-name', get_template_directory_uri() . '/public/css/tailwind.css');
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

    require(get_template_directory() . '/like-dislike.php');
    return $content;
}

// Handle like button action
add_action( 'wp_ajax_like', 'handle_like' );
add_action( 'wp_ajax_nopriv_like', 'handle_like' );
function handle_like() {
	if (is_user_logged_in()) {
			handle_like_dislike('like_count', 'like_');
	}
}

add_action( 'wp_ajax_dislike', 'handle_dislike' );
add_action( 'wp_ajax_nopriv_dislike', 'handle_dislike' );
function handle_dislike() {
	if (is_user_logged_in()) {
			handle_like_dislike('dislike_count', 'dislike_');
	}
}

function handle_like_dislike($meta_key, $nonce_key) {
	// Verify nonce
	if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], $nonce_key . $_POST['comment_id'] ) ) {
					wp_die( 'Invalid request.' );
	}

	// Get comment ID
	$comment_id = intval( $_POST['comment_id'] );

	// Get the user ID
	$user_id = get_current_user_id();

	// Check if the user has already voted
	$user_vote = get_comment_meta($comment_id, 'user_vote', true);
	$user_meta = get_comment_meta($comment_id, 'user_id', true);
	if ($user_vote) {
					// If the user has already voted, check if the vote matches the current vote
					if ($user_meta == $user_id && $user_vote == $meta_key) {
									// If the vote matches, remove the vote
									delete_comment_meta($comment_id, 'user_vote');
									delete_comment_meta($comment_id, 'user_id');
									$current_count = get_comment_meta($comment_id, $meta_key, true);
									if ($current_count > 0) {
													$current_count--;
									}
									update_comment_meta($comment_id, $meta_key, $current_count);
            } else {
                    // If the vote does not match, update the vote
                    update_comment_meta($comment_id, 'user_vote', $meta_key);
                    update_comment_meta($comment_id, 'user_id', $user_id);
                    $current_count = get_comment_meta($comment_id, $meta_key, true);
                    if(!$current_count){
                            $current_count = 1;
                    }else{
                            $current_count++;
                    }
                    update_comment_meta( $comment_id, $meta_key, $current_count);

                    // Decrement the count of the previous vote
                    $opposite_vote = $meta_key == "like_count" ? "dislike_count" : "like_count";
                    $opposite_count = get_comment_meta($comment_id, $opposite_vote, true);
                    if ($opposite_count > 0) {
                        $opposite_count--;
                    }
                    update_comment_meta($comment_id, $opposite_vote, $opposite_count);
            }
    } else {
            // If the user has not voted, add the vote
            add_comment_meta($comment_id, 'user_vote', $meta_key);
            add_comment_meta($comment_id, 'user_id', $user_id);
            $current_count = get_comment_meta($comment_id, $meta_key, true);
            if(!$current_count){
                    $current_count = 1;
            }else{
                    $current_count++;
            }
            update_comment_meta( $comment_id, $meta_key, $current_count);
    }

    $like_count = get_comment_meta($comment_id, 'like_count', true);
    $dislike_count = get_comment_meta($comment_id, 'dislike_count', true);

    // Return a response
    wp_send_json_success(array('like_count'=>$like_count, 'dislike_count'=>$dislike_count));
    exit;
}

// Enqueue JS script
add_action( 'wp_enqueue_scripts', 'enqueue_like_dislike_script' );
function enqueue_like_dislike_script() {
    wp_enqueue_script( 'like-dislike-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0', true );
    wp_localize_script( 'like-dislike-script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}


//Added search icon on nav menu
add_filter('wp_nav_menu','add_custom_nav_elements', 10, 1);
function add_custom_nav_elements( $nav ) {

    $elements = '<div class=" active  block p-1 text-black text-left px-3 font-display">
				<span class="dashicons dashicons-search md:w-12 md:h-12 flex items-center  cursor-pointer" ></span>
			</div>';
    return $elements . $nav;
}

/*
	======================================================
 		Prevent MyQuestions URL access without logging in
	======================================================
*/

function restrict_my_questions_page() {
	if ( is_page( 'my-questions' ) && ! is_user_logged_in() ) {
			wp_redirect( home_url( '/login' ) );
			exit;
	}
}
add_action( 'template_redirect', 'restrict_my_questions_page' );




//search filter with pagination

function search_filter($query) {
	if ( !is_admin() && $query->is_main_query() ) {
	  if ($query->is_search) {
		$query->set('paged', ( get_query_var('paged') ) ? get_query_var('paged') : 1 );
		$query->set('posts_per_page',10);
	  }
	}
  }
  add_action( 'pre_get_posts', 'search_filter' );

/*
	==========================================================
 		Email notification when someone answers your question
	==========================================================
*/

// Send email via SMTP
add_action( 'phpmailer_init', 'send_smtp_email' );
function send_smtp_email( $phpmailer ) {
    $phpmailer->isSMTP();     
    $phpmailer->Host = SMTP_HOST;
    $phpmailer->SMTPAuth = SMTP_AUTH;
    $phpmailer->Port = SMTP_PORT;
    $phpmailer->Username = SMTP_USER;
    $phpmailer->Password = SMTP_PASS;
    $phpmailer->SMTPSecure = SMTP_SECURE;
    $phpmailer->From = SMTP_FROM;
    $phpmailer->FromName = SMTP_NAME;
}

function send_email_on_comment( $comment_id ) {
  $comment = get_comment( $comment_id );
  $post = get_post( $comment->comment_post_ID );
  $author = get_userdata( $post->post_author );

  $to = $author->user_email;
  $subject = "New comment on your question";
  $message = "A new comment has been added to the question you posted: \n\n" .
             get_the_title( $post->ID ) . "\n\n" .
             "Comment: " . $comment->comment_content . "\n\n" .
             "You can view the comment here: " . get_permalink( $post->ID ) . "#comments";
  $headers = array();
  $headers[] = 'From: Your Name <sender@example.com>';
  $headers[] = 'Content-Type: text/plain; charset=UTF-8';

  wp_mail( $to, $subject, $message, $headers );
}
add_action( 'comment_post', 'send_email_on_comment' );

/*
	===============================
 		Mark an answer as correct
	===============================
*/

add_filter( 'comment_text', 'add_correct_answer_button' );
function add_correct_answer_button( $text ) {
    global $comment, $post;
    $comment_id = $comment->comment_ID;
    $author_id = $post->post_author;
    $user_id = get_current_user_id();
    $is_correct = get_comment_meta( $comment_id, 'is_correct', true );
    if($author_id==$user_id){
        if ($is_correct) {
            $text .= '<p class="absolute top-0 right-0 pr-4"><button name="is_correct" id="iscorrect">Correct</button></p>';
        } else {
            $text .= '<p class="absolute top-0 right-0 pr-4"><button name="is_correct" id="iscorrect'.$comment_id.'" onclick="markAsCorrect('.$comment_id.')">Mark as correct</button></p>';
        }
    }
    return $text;
}

function markAsCorrect($comment_id) {
    update_comment_meta($comment_id, 'is_correct', true);
}

add_action( 'wp_ajax_mark_as_correct', 'mark_as_correct_handler' );
function mark_as_correct_handler() {
    $comment_id = intval($_POST['comment_id']);
    update_comment_meta($comment_id, 'is_correct', true);
    wp_send_json_success();
}

wp_localize_script( 'correct-answer-script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

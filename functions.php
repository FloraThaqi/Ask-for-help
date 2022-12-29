<?php 
if( function_exists('acf_add_options_page') ) {

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
}
add_action( 'wp_enqueue_scripts', 'style_enqueue' );

?>
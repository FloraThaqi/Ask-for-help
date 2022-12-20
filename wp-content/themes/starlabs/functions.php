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
?>
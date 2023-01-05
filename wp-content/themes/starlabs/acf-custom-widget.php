<?php
/*
  A custom ACF widget.
*/
class ACF_Custom_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'acf_custom_widget', // Base ID
            __('ACF Custom Widget', 'text_domain'), // Name
            array( 'description' => __( 'A custom ACF widget', 'text_domain' ), 'classname' => 'acf-custom-widget' ) // Args
        );
    }

    public function widget( $args, $instance ) {
        // Get the widget ID
		    $widget_id = $args['widget_id']; 
        // Get the value of the 'title' field
        $title = get_field( 'title', 'widget_' . $widget_id ); 
        // Get the value of the 'links' field
        $links = get_field( 'pages', 'widget_' . $widget_id ); 
        // Display the title
        echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; 
        if ( !empty( $pages ) ) {
        echo '<ul>';
        foreach ( $pages as $page ) {
            $link = $page['link'];
            echo '<li><a href="#">' . $page . '</a></li>';
        }
        echo '</ul>';
        }
        echo $args['after_widget'];
    }

	public function form( $instance ) {
		// Output the Title field
        the_field('title', $instance['id']);

        // Check if the Repeater field has rows
        if( have_rows('pages', $instance['id']) ):
          // Iterate over the rows
          while( have_rows('pages', $instance['id']) ): the_row();
            // Output the Link field
            the_sub_field('link', $instance['id']);
          endwhile;
        endif;
	}

	public function update( $new_instance, $old_instance ) {
		  $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['pages'] = ( ! empty( $new_instance['pages'] ) ) ? array_map( 'strip_tags', $new_instance['pages'] ) : array();

        

        return $instance;
	}
} 
add_action( 'widgets_init', function(){
  register_widget( 'ACF_Custom_Widget' );
});
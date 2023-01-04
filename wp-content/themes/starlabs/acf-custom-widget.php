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
    // Extract the arguments for use in the widget
    extract( $args );

    // Get the values of the Title and Questions fields
    $title = get_field( 'title', 'widget_' . $this->id );
    $links = get_field( 'links', 'widget_' . $this->id );

    // Display the widget
    echo $before_widget;
    if ( ! empty( $title ) ) {
      echo $before_title . $title . $after_title;
    }
    if ( have_rows( 'links', 'widget_' . $this->id ) ) {
      echo '<ul>';
      while ( have_rows( 'links', 'widget_' . $this->id ) ) {
        the_row();
        $link = get_sub_field( 'questions' );
        echo '<li><a href="' . $link . '">' . $link . '</a></li>';
      }
      echo '</ul>';
    }
    echo $after_widget;
    }

	public function form( $instance ) {
		// Output the Title field
        the_field('title', $instance['id']);

        // Check if the Repeater field has rows
        if( have_rows('links', $instance['id']) ):
          // Iterate over the rows
          while( have_rows('links', $instance['id']) ): the_row();
            // Output the Link field
            the_sub_field('questions', $instance['id']);
          endwhile;
        endif;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['links'] = ( ! empty( $new_instance['links'] ) ) ? strip_tags( $new_instance['links'] ) : '';

    // Save the values of the Title and Questions fields
    update_field( 'title', $instance['title'], 'widget_' . $this->id );
    update_field( 'links', $instance['links'], 'widget_' . $this->id );

    return $instance;
	}
} 
add_action( 'widgets_init', function(){
  register_widget( 'ACF_Custom_Widget' );
});
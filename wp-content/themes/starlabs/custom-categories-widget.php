<?php

class Custom_Categories_Widget extends WP_Widget {

  public function __construct() {
      // widget actual processes
      parent::__construct(
        'custom_categories_widget', // Base ID
        'Custom Categories', // Name
        array( 'description' => __( 'A widget that displays a list of custom categories as links', 'text_domain' ), ) // Args
      );
    }

    public function form( $instance ) {
      // outputs the options form on admin
    $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Categories', 'text_domain' );
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>" class="text-2xl"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <ul>
      <?php
      $categories = get_terms( array(
        'taxonomy' => 'field',
        'hide_empty' => false,
      ) );
      foreach( $categories as $category ) {
        printf( '<li><a href="%s" class="text-blue-500 text-xl">%s</a></li>', esc_url( get_term_link( $category ) ), $category->name );
      }
      ?>
    </ul>
    <?php  
    }

    public function update( $new_instance, $old_instance ) {
      // processes widget options to be saved
      $instance = array();
      $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
      $instance['selected_categories'] = $new_instance['selected_categories'];

      return $instance;
    }

    public function widget( $args, $instance ) {
      // outputs the content of the widget
    $title = apply_filters( 'widget_title', $instance['title'] );

    echo $args['before_widget'];

    if ( ! empty( $title ) ) {
      echo $args['before_title'] . $title . $args['after_title'];
    }

    // Output the categories as links
    echo '<ul>';
    $categories = get_terms( array(
      'taxonomy' => 'field',
      'hide_empty' => false,
    ) );
    foreach( $categories as $category ) {
      printf( '<li><a href="%s">%s</a></li>', esc_url( get_term_link( $category ) ), $category->name );
    }
    echo '</ul>';

    echo $args['after_widget'];
  }
}

function register_custom_categories_widget() {
  register_widget('Custom_Categories_Widget');
}
add_action('widgets_init', 'register_custom_categories_widget');


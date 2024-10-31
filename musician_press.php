<?php
/*
Plugin Name:  Musician Press
Plugin URI:   https://travisbrant.com/musician-tv/
Description:  Video entertainment for musicians. 24/7 Programming. Includes specific channels for bass, clarinet, drums, flute, guitar, keyboard, saxophone, trumpet, violin, and singers. 
Author:       Travis Brant
Author URI:   https://www.travisbrant.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Version: 1.0
*/

// Create class
class Musician_TV extends WP_Widget {

	function __construct() {
		parent::__construct(
		'wpb_widget', 
		__('Musician Press', 'wpb_widget_domain'), // Widget name will appear in UI
		array( 'description' => __( 'Video entertainment for musicians. 24/7 Programming. Includes channels for bass, clarinet, drums, flute, guitar, keyboard, saxophone, trumpet, violin, and singers.', 'wpb_widget_domain' ), )
		);// Widget description
	}//End function

	// Widget front-end
	public function widget( $args, $instance ) {
	
		$title = apply_filters( 'widget_title', $instance['title'] );

		// Before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . esc_attr($title) . $args['after_title'];
			echo "<div style='position: relative; padding-bottom: 56.25%; padding-top: 80px; overflow: hidden;'><iframe src='https://travisbrant.com/tvchannels/tv-musicpress' scrolling='no' style='width: 100%; height: 100%; border: 0px; position: absolute; top: 0; left: 0;'></iframe></div>";
			echo $args['after_widget'];
		}//End if
		
		// Widget Backend 
		public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}else{
			$title = __( 'Musician Press', 'wpb_widget_domain' );
		}//End if
	}//End function
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	return $instance;
	}//End function
} // End class

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'Musician_TV' );
}//End function
add_action( 'widgets_init', 'wpb_load_widget' );

?>
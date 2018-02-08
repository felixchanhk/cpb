<?php

/**
 * Single Service Icon Widget
 */


if( ! class_exists('Somalite_Single_Service_Widget')) :
class Somalite_Single_Service_Widget extends WP_Widget {
	var $defaults;
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'sm_single_service_widget', // Base ID
			__( 'Soma: Single Service Icon Widget', 'somalite' ), // Name
			array( 'description' => __( 'Adds Single Service Icon', 'somalite' ),
			'panels_groups' => array('soma') ) // Args
		);	        
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		extract( wp_parse_args( $instance, $this->defaults ) ); 

		$ins_icon = wp_filter_post_kses($instance['icon']);
		$ins_heading = wp_filter_post_kses($instance['heading']);
		$ins_content = wp_filter_post_kses($instance['content']);

		$icon = ! empty( $ins_icon ) ? $ins_icon : '';
        $heading = ! empty( $ins_heading ) ? $ins_heading : '';
        $content = ! empty( $ins_content ) ? $ins_content : '';      		

		?>
		<div class="service-wrapper wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
			<div class="pb-content">
				<div class="service center">
				    <div class="icon">
				    	<span class="<?php echo $icon; ?> hvr-ripple-out"></span>
				    </div>
		            <div class="content">
		                <div class="heading">
		                    <h4><?php echo $heading; ?></h4>
		                </div>
		                <div class="descr">
		                    <p><?php echo $content; ?></p>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
       <?php
    }
	
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
	$icon = ! empty( $instance['icon'] ) ? $instance['icon'] : '';
    $heading = ! empty( $instance['heading'] ) ? $instance['heading'] : '';
    $content = ! empty( $instance['content'] ) ? $instance['content'] : '';      		
    ?>  
    

		<p>
	        <label for="<?php echo $this->get_field_id('icon'); ?>"><?php _e('Icon name: For eg For Linear icons use <b>lnr lnr-layers</b> and For Font Awesome use <b>fa fa-facebook</b> ','somalite'); ?></label>
	        <input class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="text" value="<?php echo $icon; ?>" />
	    </p>    	
        <p>
	        <label for="<?php echo $this->get_field_id('heading'); ?>"><?php _e('Heading:','somalite'); ?></label>
	        <input class="widefat" id="<?php echo $this->get_field_id('heading'); ?>" name="<?php echo $this->get_field_name('heading'); ?>" type="text" value="<?php echo $heading; ?>" />
	    </p>
		<p>
	        <label for="<?php echo $this->get_field_id('content'); ?>"><?php _e('Content:','somalite'); ?></label>
	        <input class="widefat" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>" type="text" value="<?php echo $content; ?>" />	        
	    </p>	    
       
    <?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'icon'] = wp_filter_post_kses( $new_instance['icon'] );
		$instance[ 'heading'] = wp_filter_post_kses( $new_instance['heading'] );
        $instance[ 'content'] = wp_filter_post_kses( $new_instance['content'] );      	
    	return $instance;
	}

}
endif;



if( ! function_exists('register_somalite_single_service_widget')) :
// register widget
function register_somalite_single_service_widget() {
    register_widget( 'Somalite_Single_Service_Widget' );
}
endif;

add_action( 'widgets_init', 'register_somalite_single_service_widget' );

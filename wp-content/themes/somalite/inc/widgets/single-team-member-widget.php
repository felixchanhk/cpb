<?php

/**
 * Single Team Member Widget
 */


if( ! class_exists('Somalite_Single_Team_Member_Widget')) :
class Somalite_Single_Team_Member_Widget extends WP_Widget {
	var $defaults;
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'sm_single_team_member_widget', // Base ID
			__( 'Soma: Single Team Member Widget', 'somalite' ), // Name
			array( 'description' => __( 'Adds Single Team Member', 'somalite' ),
			'panels_groups' => array('soma') ) // Args
		);

		add_action( 'admin_enqueue_scripts', 'somalite_admin_enqueue_js' );	        

		function somalite_admin_enqueue_js($hook){		
	        wp_enqueue_media(); 
	        wp_enqueue_script( 'soma-admin-js', get_template_directory_uri() . '/js/admin.js', array('jquery'), '', true );
		}
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

		$ins_image =  strip_tags($instance['image']);
		$ins_name = wp_filter_post_kses($instance['name']);
		$ins_desg = wp_filter_post_kses($instance['desg']);

		$image = ! empty( $ins_image ) ? $ins_image : '';
        $name = ! empty( $ins_name ) ? $ins_name : '';
        $desg = ! empty( $ins_desg ) ? $ins_desg : '';    		


		?>
		<div class="pb-content team-member-section wow fadeInUp" data-wow-delay="0.5s" >		
			<div class="hovereffect">
                <img class="img-responsive hvr-icon-spin" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr(basename($image)); ?>">
            </div>
            <div class="teaminfo">
                <h5><?php echo $name; ?></h5>
                <h6><?php echo $desg; ?></h6>
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
	$image = ! empty( $instance['image'] ) ? $instance['image'] : '';
    $name = ! empty( $instance['name'] ) ? $instance['name'] : '';
    $desg = ! empty( $instance['desg'] ) ? $instance['desg'] : '';    		

    ?>  
    
    	<div>
            <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e('Member Image', 'somalite'); ?>:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo esc_url($image); ?>" class="pr-img-field"/>
            <a href="#" class="pr-img-select-image-btn button"><?php _e('Select image', 'somalite'); ?></a>
        </div> 
        <p>
	        <label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Name:','somalite'); ?></label>
	        <input class="widefat" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php echo $name; ?>" />
	    </p>
		<p>
	        <label for="<?php echo $this->get_field_id('desg'); ?>"><?php _e('Designation:','somalite'); ?></label>
	        <input class="widefat" id="<?php echo $this->get_field_id('desg'); ?>" name="<?php echo $this->get_field_name('desg'); ?>" type="text" value="<?php echo $desg; ?>" />
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
		$instance[ 'image'] = strip_tags( $new_instance['image'] );
		$instance[ 'name'] = wp_filter_post_kses( $new_instance['name'] );
        $instance[ 'desg'] = wp_filter_post_kses( $new_instance['desg'] );             
    	return $instance;
	}

}
endif;

if( ! function_exists('register_somalite_single_team_member_widget')) :
// register widget
function register_somalite_single_team_member_widget() {
    register_widget( 'Somalite_Single_Team_Member_Widget' );
}
endif;

add_action( 'widgets_init', 'register_somalite_single_team_member_widget' );
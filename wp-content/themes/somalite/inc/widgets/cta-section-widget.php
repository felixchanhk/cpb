<?php

/**
 * Call to Action Widget
 */


if( ! class_exists('Somalite_CTA_Widget')) :
class Somalite_CTA_Widget extends WP_Widget {
	var $defaults;
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'sm_cta_widget', // Base ID
			__( 'Soma: Call To Action Widget', 'somalite' ), // Name
			array( 'description' => __( 'Adds Call to Action Section', 'somalite' ),
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

		$ins_heading = wp_filter_post_kses($instance['heading']);
		$ins_subheading = wp_filter_post_kses($instance['subheading']);
		$ins_buttontext =  wp_filter_post_kses($instance['buttontext']);
		$ins_buttonurl = esc_url($instance['buttonurl']);

        $heading = ! empty( $ins_heading ) ? $ins_heading : '';        
        $subheading = ! empty( $ins_subheading ) ? $ins_subheading : '';    
        $buttontext = ! empty( $ins_buttontext ) ? $ins_buttontext : '';
        $buttonurl = ! empty( $ins_buttonurl ) ? $ins_buttonurl : '';  		
		?>

		<div class="pb-content cta-section center">
			<div class="cta-inner">
            	<div class="row">
                	<div class="col-md-7">
                    	<div class="heading wow flipInX" data-wow-duration="1s" data-wow-delay="0.5s">
                        	<h4><?php echo $heading; ?></h4>
                        	<p><?php echo $subheading; ?></p>
                    	</div>
                	</div>
                	<div class="col-md-5"> 
                		<?php
                			if(!empty($buttontext)) {
                				?>
	                				<div class="read-more wow flipInY" data-wow-duration="1s" data-wow-delay="0.5s">
			                        	<a class="btn" href="<?php echo esc_url($buttonurl); ?>"><?php echo $buttontext; ?> <i class="fa fa-angle-double-right"></i></a>
			                        </div>
                				<?php
                			}
                		?>                                           
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

    $heading = ! empty( $instance['heading'] ) ? $instance['heading'] : '';        
    $subheading = ! empty( $instance['subheading'] ) ? $instance['subheading'] : '';    
    $buttontext = ! empty( $instance['buttontext'] ) ? $instance['buttontext'] : '';
    $buttonurl = ! empty( $instance['buttonurl'] ) ? $instance['buttonurl'] : '';  		

    ?>  		 	

        <p>
	        <label for="<?php echo $this->get_field_id('heading'); ?>"><?php _e('Heading:','somalite'); ?></label>
	        <input class="widefat" id="<?php echo $this->get_field_id('heading'); ?>" name="<?php echo $this->get_field_name('heading'); ?>" type="text" value="<?php echo $heading; ?>" />
	    </p>
		<p>
	        <label for="<?php echo $this->get_field_id('subheading'); ?>"><?php _e('Sub heading:','somalite'); ?></label>
	        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'subheading' ); ?>" name="<?php echo $this->get_field_name( 'subheading'); ?>" value="<?php echo esc_attr( $subheading ); ?>" />	        
	    </p>
	    <p>
            <label for="<?php echo $this->get_field_id( 'buttontext'); ?>"><?php _e( 'Button Text', 'somalite' ); ?>:</label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'buttontext' ); ?>" name="<?php echo $this->get_field_name( 'buttontext'); ?>" value="<?php echo esc_attr( $buttontext ); ?>" />
        </p>        
        <p>
            <label for="<?php echo $this->get_field_id( 'buttonurl' ); ?>"><?php _e( 'Button Url', 'somalite' ); ?>:</label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'buttonurl' ); ?>" name="<?php echo $this->get_field_name( 'buttonurl' ); ?>" value="<?php echo esc_url( $buttonurl ); ?>" />
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
		$instance[ 'heading'] = wp_filter_post_kses( $new_instance['heading'] );
        $instance[ 'subheading'] = wp_filter_post_kses( $new_instance['subheading'] );
        $instance[ 'buttontext'] = wp_filter_post_kses( $new_instance['buttontext'] );
        $instance[ 'buttonurl'] = esc_url( $new_instance['buttonurl'] );    	
    	return $instance;
	}

}
endif;


if( ! function_exists('register_somalite_cta_widget')) :
// register widget
function register_somalite_cta_widget() {
    register_widget( 'Somalite_CTA_Widget' );
}
endif;

add_action( 'widgets_init', 'register_somalite_cta_widget' );

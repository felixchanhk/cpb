<?php

/**
 * Blog Footer Widget
 */


if( ! class_exists('Somalite_Blog_Footer_Widget')) :
class Somalite_Blog_Footer_Widget extends WP_Widget {
	var $defaults;
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'sm_blog_footer_widget', // Base ID
			__( 'Soma: Blog Footer Widget', 'somalite' ), // Name
			array( 'description' => __( 'Adds Blog Footer Section', 'somalite' ),
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

		$ins_heading= wp_filter_post_kses($instance['heading']);
		$ins_nop= absint($instance['nop']);

        $heading = ! empty( $ins_heading ) ? $ins_heading : '';
    	$nop = ! empty( $ins_nop ) ? $ins_nop : '';           
		?>
		<div class="quick-blog">
	        <div class="heading">
	            <h4><?php echo $heading; ?></h4>
	        </div>
	        <div class="blog-links">
	            <ul>
	              	<?php
	                  	$options = array(
	                   		'post_type' => 'post',
	                   		'posts_per_page' => $nop,
	                     );
	                     $query = new WP_Query( $options );
	                     // run the loop based on the query
	                     if ( $query->have_posts() ) {
	                       	while ( $query->have_posts() ) {
	                         	$query->the_post();
	                         	$postid = get_the_ID();
	                         	?>
		                         	<li>
		                             	<div class="blog-thumb">
		                               		<div class="row">
		                                 		<div class="col-md-3 col-sm-3 col-xs-3 nopadding-right">
		                                   			<div class="thumb">
		                                       			<?php 
		                                       				if ( has_post_thumbnail()) {
		                                            			the_post_thumbnail('soma-blog-footer-thumb');
		                                        			}
		                                        			else{
		                                        				?>
		                                          					<img src="<?php echo get_template_directory_uri(); ?>/img/noimage.jpg" class="noimage">
		                                        				<?php 
		                                        			}
		                                        		?>
		                                   			</div>
		                                 		</div>
		                                 		<div class="col-md-9 col-sm-9 col-xs-9 nopadding-right content">
		                                   			<h6><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h6>
		                                   			<p><i class="fa fa-calendar"></i><span><?php the_time('F j, Y'); ?></span></p>
		                                 		</div>
		                             		</div>
		                             		<div class="clear"></div>
		                             	</div>
		                         	</li>
	                         	<?php
	                      	}
	                    }
	                    wp_reset_postdata();
	              	?>
	            </ul>
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
    $nop = ! empty( $instance['nop'] ) ? $instance['nop'] : '';  
    ?>  		 	

        <p>
	        <label for="<?php echo $this->get_field_id('heading'); ?>"><?php _e('Heading:','somalite'); ?></label>
	        <input class="widefat" id="<?php echo $this->get_field_id('heading'); ?>" name="<?php echo $this->get_field_name('heading'); ?>" type="text" value="<?php echo $heading; ?>" />
	    </p>
		<p>
	        <label for="<?php echo $this->get_field_id('nop'); ?>"><?php _e('Number of posts:','somalite'); ?></label>
	        <input class="widefat" id="<?php echo $this->get_field_id('nop'); ?>" name="<?php echo $this->get_field_name('nop'); ?>" type="text" value="<?php echo $nop; ?>" />
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
		$instance[ 'nop'] = absint( $new_instance['nop']);
    	return $instance;
	}
}
endif;

if( ! function_exists('register_somalite_blog_footer_widget')) :
// register widget
function register_somalite_blog_footer_widget() {
    register_widget( 'Somalite_Blog_Footer_Widget' );
}
endif;

add_action( 'widgets_init', 'register_somalite_blog_footer_widget' );

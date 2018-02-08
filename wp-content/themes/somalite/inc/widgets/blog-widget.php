<?php

/**
 * Blog widget.
 */


if( ! class_exists('Somalite_Blog_Widget')) :
class Somalite_Blog_Widget extends WP_Widget {
	  /**
	   * Register widget with WordPress.
	   */
  	function __construct() {
  		  parent::__construct(
  			    'sm_blog_widget', // Base ID
  			     __( 'Soma: Blog Section', 'somalite' ), // Name
  			    array( 'description' => __( 'Adds Blog section.', 'somalite' ),
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
  	$options = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
    );

    $query = new WP_Query( $options );
    // run the loop based on the query
    if ( $query->have_posts() ) { ?>
        <div class="pb-content">
            <section class="blog">
                <div class="section-inner">
                    <div class="container">
                        <div class="blog-section">              
                            <div class="row">
                                <div class="content">
        					                 <?php
                                        $i=1;
      							                    while ( $query->have_posts() ) {
          							                    $query->the_post();
          							                    $postid = get_the_ID();
          						                      ?>
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="blog-wrap wow fadeInUp" data-wow-duration="1s" data-wow-delay="<?php echo $i/3; ?>s">
                                                        <div class="image">
                                                            <?php 
                                                                if ( has_post_thumbnail()) {
                                                                    the_post_thumbnail('soma-blog-section-thumb');
                                                                }                         
                                                            ?>                            
                                                        </div>
                                                        <div class="meta">
                                                            <span class="meta-item"><span class="lnr lnr-clock"></span><?php the_time('F j, Y'); ?></span>
                                                            <span class="meta-item"><span class="lnr lnr-user"></span><?php the_author() ?></span>
                                                            <span class="meta-item"><span class="lnr lnr-bubble"></span><?php comments_number('0','1','%'); ?></span>
                                                        </div>
                                                        <div class="heading">
                                                            <h4><a href="<?php esc_url(the_permalink()) ?>"><?php the_title(); ?></a></h4>
                                                        </div>
                                      
                                                        <div class="blog-content">
                                                            <p><?php the_excerpt(); ?></p>
                                                            <a class="read-more" href="<?php esc_url(the_permalink()) ?>"><?php _e('READ MORE ','somalite'); ?><i class="fa fa-plus-circle"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
              					                    <?php 
                                            $i++;
          					                    }  
                                    ?>
                                </div>
                	          </div>
            		        </div>
                    </div>
                </div>
            </section>
        </div>
       <?php
      }
      wp_reset_postdata();
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {    
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
    return $instance;
	}  

}
endif;



if( ! function_exists('register_somalite_blog_widget')) :
// register widget
function register_somalite_blog_widget() {
    register_widget( 'Somalite_Blog_Widget' );
}
endif;

add_action( 'widgets_init', 'register_somalite_blog_widget' );
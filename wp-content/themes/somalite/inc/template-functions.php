<?php
/**
 * @package somalite
 */


/**
 * Get the page title
 */
if ( ! function_exists( 'somalite_get_page_title' ) ) :
function somalite_get_page_title($blogtitle=false,$shop=false) {
	if (!is_front_page() ){
		if ('color' === esc_attr(get_theme_mod( 'sm_bg_radio' ))) {
			?>
				<section id="page-title" style="background:<?php echo sanitize_hex_color(get_theme_mod( 'sm_bg_color' )); ?>;"> 
                                    
			<?php
		}
		else if ('image' === esc_attr(get_theme_mod( 'sm_bg_radio' ))) {
			?>
				<section id="page-title" style="background: url(<?php echo esc_url(get_theme_mod( 'sm_bg_image' )); ?>) no-repeat;background-attachment:fixed;background-size: cover;"> 
                                <div id="cpb-video-test">
                                                                        
				<?php
				
					if(true ===  get_theme_mod( 'sm_bg_radio_overlay' ) ) {
						?>
							<div class="inner-overlay"> 
						<?php
					}
				?>
			<?php
		}
		else {
			?>
				<section id="page-title" > 
			<?php	
		}

		?>
			<div class="cpb-video-banner-container">
                             
				<div class="row">
					<div class="col-md-12">
                                            <div id="cpb_video-banner">
                                                <video autoplay loop id="video-background" muted plays-inline width="100%">
                                                    <source src="<?php echo get_template_directory_uri() . '/img/Web-Use-Scodix-Banner-03.mp4' ?>" type="video/mp4">
                                                </video> 
                                            </div>
						<div class="page-heading">
		                    <?php                    
		                    	$page_id = get_the_ID();
		                    ?>    	            
		    	            <?php 
		    	            	if(false==$blogtitle && false==$shop){
		    	            		?><h1 class="wow fadeInDown" data-wow-delay="1s"><?php the_title(); ?></h1>
		    	            		<p class="wow fadeInUp" data-wow-delay="2s"><?php echo get_post_meta($page_id, 'page_description', true); ?></p>
		    	            		<?php
		    	            	}
		    	            	else if(true==$blogtitle && false==$shop){
			    	           		?><h1 class="wow fadeInDown" data-wow-delay="1s"><?php single_post_title(); ?></h1>
			    	           		<p class="wow fadeInUp" data-wow-delay="2s"><?php echo get_post_meta(get_queried_object_ID(), 'page_description', true); ?></p>
			    	           		<?php
		    	            	}
		    	            	else if(true==$shop){
		    	            		?><h1 class="wow fadeInDown" data-wow-delay="1s"><?php single_post_title(); ?></h1>
		    	            		<p class="wow fadeInUp" data-wow-delay="1s"><?php echo get_post_meta(wc_get_page_id('shop'), 'page_description', true); ?></p>
		    	            		<?php
		    	            	}    	            	
		    	            ?>
						</div>						
						<div class="bread-crumb" typeof="BreadcrumbList" vocab="http://schema.org/">
						    <?php 
						    	if(function_exists('bcn_display')){
						        	bcn_display();
						    	}
						    ?>
						</div>
					</div>
				</div>
			</div>

			<?php 
				if ( 'image' === esc_attr(get_theme_mod( 'sm_bg_radio' ))  &&  true === get_theme_mod( 'sm_bg_radio_overlay' ) ){
					?> 
						</div> 
					<?php
				}
			?>
		</section>
	<?php }
}
endif;



/**
 * Archive Page Title
 */
if ( ! function_exists( 'somalite_get_page_title_archives' ) ) :
function somalite_get_page_title_archives() {
	if ('color' === esc_attr(get_theme_mod( 'sm_bg_radio' ))) {
	    ?>
	    	<section id="page-title" style="background:<?php echo sanitize_hex_color(get_theme_mod( 'sm_bg_color' )); ?>"> 
	    <?php
	 }
	 else if ('image' ===  esc_attr(get_theme_mod( 'sm_bg_radio' ))) {
		?>
			<section id="page-title" style="background: url(<?php echo esc_url(get_theme_mod( 'sm_bg_image' )); ?>) no-repeat;background-attachment:fixed;background-size:cover;"> 
			<?php
				if( true === get_theme_mod( 'sm_bg_radio_overlay' ) ) {
					?>
						<div class="inner-overlay"> 
					<?php
				}
			?>
		<?php
	}
	else {
		?>
			<section id="page-title" style="background:#dd3333;"> 
		<?php	
	}

	?>
        <div class="cpb-video-banner-container">
            <div class="row">
                <div class="col-md-12">
                    <div id="cpb_video-banner">
	<video autoplay loop id="video-background" muted plays-inline width="100%">
        	<source src="<?php echo get_template_directory_uri() . '/img/Web-Use-Scodix-Banner-03.mp4' ?>" type="video/mp4">
	</video> 
</div>
                    <div class="page-heading">                        
                        <h1 class="wow fadeInDown" data-wow-delay="1s"><?php the_archive_title(); ?></h1>
                    </div>
                    <div class="bread-crumb" typeof="BreadcrumbList" vocab="http://schema.org/">
						<?php 
						   	if(function_exists('bcn_display')){
						        bcn_display();
						    }
						?>
					</div>
                </div>
            </div>
        </div>
        <?php 
        	if ( 'image' === esc_attr(get_theme_mod( 'sm_bg_radio' ))  &&  true === get_theme_mod( 'sm_bg_radio_overlay' ) ){
				?> 
					</div> 
				<?php
			}
		?>
    </section>
    <?php
}
endif;


/**
 * Search Title
 */
if ( ! function_exists( 'somalite_get_page_title_search' ) ) :
function somalite_get_page_title_search() {
	if ( 'color' === esc_attr(get_theme_mod( 'sm_bg_radio' ))) {
    	?>
    		<section id="page-title" style="background:<?php echo sanitize_hex_color(get_theme_mod( 'sm_bg_color' )); ?>"> 
    	<?php
  	}
  	else if ( 'image' === esc_attr(get_theme_mod( 'sm_bg_radio' ))) {
		?>
			<section id="page-title" style="background: url(<?php echo esc_url(get_theme_mod( 'sm_bg_image' )); ?>) no-repeat;background-attachment:fixed;background-size:cover;"> 
			<?php
				if( true === get_theme_mod( 'sm_bg_radio_overlay' ) ){
					?>
						<div class="inner-overlay"> 
					<?php
				}
			?>
		<?php
	}
  	else {
		?>
			<section id="page-title" style="background:#dd3333;"> 
		<?php	
  	}
	
	?>
		<div class="cpb-video-banner-container">
	    	<div class="row">
	            <div class="col-md-12">
                        <div id="cpb_video-banner">
	<video autoplay loop id="video-background" muted plays-inline width="100%">
        	<source src="<?php echo get_template_directory_uri() . '/img/Web-Use-Scodix-Banner-03.mp4' ?>" type="video/mp4">
	</video> 
</div>
	                <div class="page-heading">
	                    <h1 class="wow fadeInDown" data-wow-delay="1s"><?php printf( esc_attr__( 'Search Results For: %s', 'somalite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	                </div>
	                <div class="bread-crumb" typeof="BreadcrumbList" vocab="http://schema.org/">
						<?php 
						   	if(function_exists('bcn_display')){
						        bcn_display();
						    }
						?>
					</div>
	            </div>
	        </div>
	    </div>
    	<?php 
    		if ( 'image' === esc_attr(get_theme_mod( 'sm_bg_radio' ))  &&  true === get_theme_mod( 'sm_bg_radio_overlay' ) ){
				?> 
					</div> 
				<?php
			}
		?>
		</section>
	<?php
}
endif;


/**
 * 404 Title
 */
if ( ! function_exists( 'somalite_get_page_title_error' ) ) :
function somalite_get_page_title_error() {
	if ( 'color' === esc_attr(get_theme_mod( 'sm_bg_radio' ))) {
    	?>
    		<section id="page-title" style="background:<?php echo sanitize_hex_color(get_theme_mod( 'sm_bg_color' )); ?>"> 
    	<?php
  	}
  	else if ( 'image' === esc_attr(get_theme_mod( 'sm_bg_radio' ))) {
		?>
			<section id="page-title" style="background: url(<?php echo esc_url(get_theme_mod( 'sm_bg_image' )); ?>) no-repeat;background-attachment:fixed;background-size:cover;"> 
			<?php
				if( true === get_theme_mod( 'sm_bg_radio_overlay' ) ){
					?>
						<div class="inner-overlay"> 
					<?php
				}
			?>
		<?php
	}
  	else {
		?>
			<section id="page-title" style="background:#dd3333;"> 
		<?php	
  	}
	
	?>
		<div class="cpb-video-banner-container">
	    	<div class="row">
	            <div class="col-md-12">
                        <div id="cpb_video-banner">
	<video autoplay loop id="video-background" muted plays-inline width="100%">
        	<source src="<?php echo get_template_directory_uri() . '/img/Web-Use-Scodix-Banner-03.mp4' ?>" type="video/mp4">
	</video> 
</div>
	                <div class="page-heading">
	                    <h1 class="wow fadeInDown" data-wow-delay="1s"><?php _e( 'PAGE NOT FOUND', 'somalite' ); ?></h1>
	                </div>
	                <div class="bread-crumb" typeof="BreadcrumbList" vocab="http://schema.org/">
						<?php 
						   	if(function_exists('bcn_display')){
						        bcn_display();
						    }
						?>
					</div>
	            </div>
	        </div>
	    </div>
    	<?php 
    		if ( 'image' === esc_attr(get_theme_mod( 'sm_bg_radio' ))  &&  true === get_theme_mod( 'sm_bg_radio_overlay' ) ){
				?> 
					</div> 
				<?php
			}
		?>
		</section>
	<?php
}
endif;


/**
 *  Single Page Title
 */
if ( ! function_exists( 'somalite_get_page_title_single' ) ) :
function somalite_get_page_title_single() {
	if (!is_front_page() ){
		if ('color' === esc_attr(get_theme_mod( 'sm_bg_radio' ))) {
			?>
				<section id="page-title" style="background:<?php echo sanitize_hex_color(get_theme_mod( 'sm_bg_color' )); ?>"> 
			<?php
		}
		else if ('image' === esc_attr(get_theme_mod( 'sm_bg_radio' ))) {
			?>
				<section id="page-title" style="background: url(<?php echo esc_url(get_theme_mod( 'sm_bg_image' )); ?>) no-repeat;background-attachment:fixed;background-size:cover;"> 
				<?php
					if(true ===  get_theme_mod( 'sm_bg_radio_overlay' ) ) {
						?>
							<div class="inner-overlay"> 
						<?php
					}
				?>
			<?php
		}
		else {
			?><section id="page-title" style="background:#dd3333;"> <?php	
		}
	?>
	<div class="cpb-video-banner-container">
		<div class="row">
			<div class="col-md-12">
                            <div id="cpb_video-banner">
	<video autoplay loop id="video-background" muted plays-inline width="100%">
        	<source src="<?php echo get_template_directory_uri() . '/img/Web-Use-Scodix-Banner-03.mp4' ?>" type="video/mp4">
	</video> 
</div>
				<div class="page-heading">                    
    	            <h1 class="wow fadeInDown" data-wow-delay="1s"><?php _e('BLOG','somalite') ?></h1>					
				</div>
				<div class="bread-crumb" typeof="BreadcrumbList" vocab="http://schema.org/">
					<?php 
						if(function_exists('bcn_display')){
						    bcn_display();
						}
					?>
				</div>
			</div>
		</div>
	</div>

	<?php 
		if ( 'image' === esc_attr(get_theme_mod( 'sm_bg_radio' ))  &&  true === get_theme_mod( 'sm_bg_radio_overlay' ) ){
			?> </div> <?php
		}
	?>

	</section>
	<?php
	}	
}
endif;


/**
 * SiteOrigin Page Builder Content Check
 */
if ( ! function_exists( 'somalite_content_is_pagebuilder' ) ) :
function somalite_content_is_pagebuilder() {
    global $post;

    // consider empty content the WP editor
    if ( empty( $post ) ) 
        return false;

    // does pagebuilder content exist in custom fields?
    $panels_data = get_post_meta( $post->ID, 'panels_data', true );

    return ( empty( $panels_data ) ) ? false : true;
}
endif;

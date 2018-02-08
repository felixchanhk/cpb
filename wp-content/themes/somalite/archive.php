<?php
/**
 * @package somalite
 */

get_header();

somalite_get_page_title_archives();

?>
  
<section id="blog-section">
    <div class="container">
        <div class="row">
        	<?php 
        		if('left'===esc_attr(get_theme_mod('sm_blog_sidebar'))) {
        			?>
	        			<?php
	        				if ( is_active_sidebar('primary')){
	        					?>
	        						<div class="col-md-3">
						                <?php get_sidebar('primary'); ?>
						           	</div>
			        				<div class="col-md-8 col-md-offset-1">
										<?php
											if(have_posts() ) {
												while(have_posts() ) {
													the_post();
													/*
													 * Include the Post-Format-specific template for the content.
													 * If you want to override this in a child theme, then include a file
													 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
													 */
													get_template_part( 'template-parts/content-archive', get_post_format());
												}
												?>
													<nav class="pagination">
								                    	<?php the_posts_pagination(); ?>
								                	</nav>
								                <?php
								            }
								        ?>		
						            </div>
	        					<?php
	        				}
	        				else{
	        					?>
	        						<div class="col-md-12">
										<?php
											if(have_posts() ) {
												while(have_posts() ) {
													the_post();
													/*
													 * Include the Post-Format-specific template for the content.
													 * If you want to override this in a child theme, then include a file
													 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
													 */
													get_template_part( 'template-parts/content-archive', get_post_format());
												}
												?>
													<nav class="pagination">
								                    	<?php the_posts_pagination(); ?>
								                	</nav>
								                <?php
								            }
								        ?>		
						            </div>
	        					<?php
	        				}
	        			?>	        				
        			<?php
        		}
        		else{
        			?>
	        			<?php
	        				if ( is_active_sidebar('primary')){
	        					?>
	        						<div class="col-md-8">
										<?php
											if(have_posts() ) {
												while(have_posts() ) {
													the_post();
													/*
													 * Include the Post-Format-specific template for the content.
													 * If you want to override this in a child theme, then include a file
													 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
													 */
													get_template_part( 'template-parts/content-archive', get_post_format());
												}

												?>
													<nav class="pagination">
								                    	<?php the_posts_pagination(); ?>
								                	</nav>
								                <?php
								            }
								        ?>		
						            </div>
						            <div class="col-md-3 col-md-offset-1">
						                <?php get_sidebar('primary'); ?>
						           </div>
	        					<?php
	        				}
	        				else{
	        					?>
	        						<div class="col-md-12">
										<?php
											if(have_posts() ) {
												while(have_posts() ) {
													the_post();
													/*
													 * Include the Post-Format-specific template for the content.
													 * If you want to override this in a child theme, then include a file
													 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
													 */
													get_template_part( 'template-parts/content-archive', get_post_format());
												}

												?>
													<nav class="pagination">
								                    	<?php the_posts_pagination(); ?>
								                	</nav>
								                <?php
								            }
								        ?>		
						            </div>
	        					<?php
	        				}
	        			?>	        				
        			<?php
        		}				
			?>	
		</div>
	</div>
</section>

<?php

get_footer();

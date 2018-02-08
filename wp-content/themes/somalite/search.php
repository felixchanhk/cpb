<?php
/**
 * @package somalite
 */

get_header(); 

somalite_get_page_title_search();

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
											if ( have_posts() ) : ?>
												<div class="search-content">
													<h1 class="page-search"><?php printf( __( 'Search Results for: %s', 'somalite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
												</div><!-- .page-header -->

												<?php
													/* Start the Loop */
													while ( have_posts() ) : the_post();

														/**
														 * Run the loop for the search to output the results.
														 * If you want to overload this in a child theme then include a file
														 * called content-search.php and that will be used instead.
														 */
														get_template_part( 'template-parts/content', 'search' );

												endwhile;
												the_posts_navigation();

											else :
												get_template_part( 'template-parts/content', 'none' );
											endif; 
										?>
									</div>
	        					<?php
	        				}
	        				else{
	        					?>
	        						<div class="col-md-12">
										<?php
											if ( have_posts() ) : ?>
												<div class="search-content">
													<h1 class="page-search"><?php printf( __( 'Search Results for: %s', 'somalite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
												</div><!-- .page-header -->

												<?php
													/* Start the Loop */
													while ( have_posts() ) : the_post();

														/**
														 * Run the loop for the search to output the results.
														 * If you want to overload this in a child theme then include a file
														 * called content-search.php and that will be used instead.
														 */
														get_template_part( 'template-parts/content', 'search' );

												endwhile;
												the_posts_navigation();

											else :
												get_template_part( 'template-parts/content', 'none' );
											endif; 
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
											if ( have_posts() ) : ?>
												<div class="search-content">
													<h1 class="page-search"><?php printf( __( 'Search Results for: %s', 'somalite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
												</div><!-- .page-header -->

												<?php
													/* Start the Loop */
													while ( have_posts() ) : the_post();

														/**
														 * Run the loop for the search to output the results.
														 * If you want to overload this in a child theme then include a file
														 * called content-search.php and that will be used instead.
														 */
														get_template_part( 'template-parts/content', 'search' );

												endwhile;
												the_posts_navigation();

											else :
												get_template_part( 'template-parts/content', 'none' );
											endif; 
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
											if ( have_posts() ) : ?>
												<div class="search-content">
													<h1 class="page-search"><?php printf( __( 'Search Results for: %s', 'somalite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
												</div><!-- .page-header -->

												<?php
													/* Start the Loop */
													while ( have_posts() ) : the_post();

														/**
														 * Run the loop for the search to output the results.
														 * If you want to overload this in a child theme then include a file
														 * called content-search.php and that will be used instead.
														 */
														get_template_part( 'template-parts/content', 'search' );

												endwhile;
												the_posts_navigation();

											else :
												get_template_part( 'template-parts/content', 'none' );
											endif; 
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
?>
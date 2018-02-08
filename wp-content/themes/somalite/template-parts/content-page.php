<?php
/**
 * Template part for displaying content in page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package somalite
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">		
		<?php
			if(somalite_content_is_pagebuilder()){
				the_content();
			}
			else{
				?>
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="pb-content">
									<?php the_content(); ?>					
								</div>
							</div>
						</div>
					</div>
				<?php
			}
			wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'somalite' ),
			'after'  => '</div>',
			));
		?>
	</div><!-- .entry-content -->

	<!-- .entry-footer <footer class="entry-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php
						edit_post_link(
							sprintf(
							/* translators: %s: Name of current post */
							__( 'Edit %s', 'somalite' ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							),
							'<span class="edit-link">',
							'</span>'
						);
					?>
				</div>
			</div>
		</div>
	</footer> -->
</article><!-- #post-## -->
	


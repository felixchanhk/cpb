<?php
/**
 * Template part for displaying content in cart page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package somalite
 */

?>

<div class="container">
	<div class="row">
		<?php
			if("right" === esc_attr(get_theme_mod( 'sm_shop_styles','right' ))) {
				?>
					<div class="col-lg-12">
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="entry-content">
								<?php
									the_content();						
								?>
							</div><!-- .entry-content -->				
						</div><!-- #post-## -->
					</div>
					<div class="col-md-3 col-md-offset-1">
						<div class="woo-sidebar">
							<div class="entry-content">
								<div class="woocommerce">
									<?php get_sidebar('woosidebar'); ?>
								</div>
							</div>
						</div>
					</div>
				<?php
			}
			else if("left" === esc_attr(get_theme_mod( 'sm_shop_styles','right' ))) {
				?>
					<div class="col-md-3">
						<div class="woo-sidebar">
							<div class="entry-content">
								<div class="woocommerce">
									<?php get_sidebar('woosidebar'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8  col-md-offset-1">
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="entry-content">
								<?php
									the_content();						
								?>
							</div><!-- .entry-content -->				
						</div><!-- #post-## -->
					</div>
				<?php
			}
			else{
				?>
					<div class="col-md-12">
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="entry-content">
								<?php
									the_content();						
								?>
							</div><!-- .entry-content -->				
						</div><!-- #post-## -->
					</div>
				<?php
			}
		?>		
	</div>
</div>
	


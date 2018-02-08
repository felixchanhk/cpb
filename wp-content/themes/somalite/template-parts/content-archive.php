<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package somalite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-post wow fadeInUp" data-wow-delay="0.5s">
		<div class="row">
			<?php
				if ( has_post_thumbnail()) {
					?>
						<div class="col-md-4">
							<div class="image">
								<?php the_post_thumbnail('medium');	?>
							</div>
						</div>
						<div class="col-md-8">
							<div class="meta">
								<span class="meta-item"><span class="lnr lnr-clock"></span><?php _e('Posted on','somalite'); ?>: <?php the_time('F j, Y'); ?></span>
								<span class="meta-item"><span class="lnr lnr-user"></span><?php _e('Posted by','somalite'); ?>: <a class="author-post-url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php the_author() ?></a></span>
								<span class="meta-item"><span class="lnr lnr-bubble"></span><?php _e('Comments','somalite'); ?>: <?php comments_number('0','1','%'); ?></span>
							</div>
							<div class="content">
								<h3 class="entry-title">
									<?php
										if ( is_sticky() && is_home() ) :
											echo "<i class='fa fa-thumb-tack'></i>";
										endif;
									?>
									<a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
								</h3>
								
								<?php
									the_excerpt( sprintf(
									/* translators: %s: Name of current post. */
									wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'somalite' ), array( 'span' => array( 'class' => array() ) ) ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
									) );
								?>
							</div>
							<div class="read-more">
								<a href="<?php echo esc_url( get_permalink() ); ?>"><?php _e('READ MORE','somalite'); ?></a>
							</div>
						</div>
					<?php
				}
				else{
					?>
						<div class="col-md-12">
							<div class="meta">
								<span class="meta-item"><span class="lnr lnr-clock"></span><?php _e('Posted on','somalite'); ?>: <?php the_time('F j, Y'); ?></span>
								<span class="meta-item"><span class="lnr lnr-user"></span><?php _e('Posted by','somalite'); ?>: <a class="author-post-url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php the_author() ?></a></span>
								<span class="meta-item"><span class="lnr lnr-bubble"></span><?php _e('Comments','somalite'); ?>: <?php comments_number('0','1','%'); ?></span>
							</div>
							<div class="content">
								<h3 class="entry-title">
									<?php
										if ( is_sticky() && is_home() ) :
											echo "<i class='fa fa-thumb-tack'></i>";
										endif;
									?>
									<a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
								</h3>
								
								<?php
									the_excerpt( sprintf(
									/* translators: %s: Name of current post. */
									wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'somalite' ), array( 'span' => array( 'class' => array() ) ) ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
									) );
								?>
							</div>
							<div class="read-more">
								<a href="<?php echo esc_url( get_permalink() ); ?>"><?php _e('READ MORE','somalite'); ?></a>
							</div>
						</div>
					<?php
				}
			?>			
		</div>
	</div>
</article>
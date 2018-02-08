<?php
/**
 *
 * @package somalite
 */

if ( ! is_active_sidebar( 'primary' ) ) {
	return;
}

?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'primary' ); ?>
</aside><!-- #secondary -->

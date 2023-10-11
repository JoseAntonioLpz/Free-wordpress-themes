<?php
/**
 * The template for displaying widget areas in the footer.
 *
 * @package Grood
 */

if ( ! is_active_sidebar( 'sidebar-4' ) ) {
	return;
}
?>

<aside id="footer-widgets" class="site-footer-widgets">
	<div class="row">
		<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
			<div class="col-md-8 col-md-offset-2 widget-area">
				<?php dynamic_sidebar( 'sidebar-4' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>
	</div><!-- .row -->
</aside><!-- .site-footer-widgets -->

<?php
/**
 * The template for the content bottom widget area on posts.
 *
 * @package Akella
 */

if ( ! is_active_sidebar( 'sidebar-3' ) ) {
	return;
}

// If we get this far, we have widgets. Let's do this.
?>

<aside id="content-bottom-widgets-2" class="col-md-12 content-bottom-widgets content-bottom-widgets-2">
	<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
		<div class="widget-area">
			<?php dynamic_sidebar( 'sidebar-3' ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>
</aside><!-- .content-bottom-widgets -->

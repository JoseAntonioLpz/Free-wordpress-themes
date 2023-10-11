<?php
/**
 * The template for before the comments widget area on posts.
 *
 * @package Akella
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}

// If we get this far, we have widgets. Let's do this.
?>

<aside id="content-bottom-widgets-1" class="content-bottom-widgets content-bottom-widgets-1">
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div class="widget-area">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>
</aside><!-- .content-bottom-widgets -->

<?php
/**
 * The template for the sidebar containing the main widget area.
 *
 * @package Akella
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="<?php akella_sidebar_classes(); ?> sidebar">
	<?php if ( true === get_theme_mod( 'affix_sidebar', false ) ) : ?>

		<div id="secondary-affix" class="widget-area affix">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- .widget-area -->

	<?php else : ?>

		<div class="widget-area">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- .widget-area -->

	<?php endif; ?>
</aside><!-- .sidebar -->

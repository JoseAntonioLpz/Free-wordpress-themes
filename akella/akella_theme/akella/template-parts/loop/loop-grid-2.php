<?php
/**
 * Template part for displaying loop.
 *
 * @package Akella
 */

?>

<div class="row content-grid content-grid-2">
	<?php
	/* Start the Loop */
	while ( have_posts() ) : the_post();

		if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div class="col-sm-6 grid-item">
				<?php if ( 'image' === get_post_format() || 'gallery' === get_post_format() ) {
					/* Print post-card-specific template. */
					akella_post_card( 'post-card-image', 'akella-thumbnail-medium', false );
				} else {
					/* Print post-card-specific template. */
					akella_post_card( '', 'akella-thumbnail-small' );
				} ?>
			</div><!-- .col-md-6 .grid-item -->
		<?php else : ?>
			<div class="col-sm-6 col-md-4 grid-item">
				<?php if ( 'image' === get_post_format() || 'gallery' === get_post_format() ) {
					/* Print post-card-specific template. */
					akella_post_card( 'post-card-image', 'akella-thumbnail-medium', false );
				} else {
					/* Print post-card-specific template. */
					akella_post_card( '', 'akella-thumbnail-small' );
				} ?>
			</div><!-- .col-md-6 .col-md-4 .grid-item -->
		<?php endif;
	endwhile; ?>
</div><!-- .row .content-grid .content-grid-2 -->

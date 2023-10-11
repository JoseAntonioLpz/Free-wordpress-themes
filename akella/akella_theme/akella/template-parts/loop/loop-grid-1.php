<?php
/**
 * Template part for displaying loop.
 *
 * @package Akella
 */

?>

<div class="row content-grid content-grid-1">
	<?php
	$i = 0;

	/* Start the Loop */
	while ( have_posts() ) : the_post();

		if ( is_active_sidebar( 'sidebar-1' ) ) :
			if ( $i % 5 == 0 ) : ?>
				<div class="col-md-12 grid-item">
					<?php
					/* Print post-card-specific template. */
					akella_post_card( 'post-card-medium', 'akella-thumbnail-medium' ); ?>
				</div><!-- .col-md-12 .grid-item -->
			<?php
			else : ?>
				<div class="col-sm-6 grid-item">
					<?php if ( 'image' === get_post_format() || 'gallery' === get_post_format() ) {
						/* Print post-card-specific template. */
						akella_post_card( 'post-card-image', 'akella-thumbnail-medium', false );
					} else {
						/* Print post-card-specific template. */
						akella_post_card( '', 'akella-thumbnail-small' );
					} ?>
				</div><!-- .col-md-6 .grid-item -->
			<?php
			endif;
		else :
			if ( $i % 10 == 0 || $i % 10 == 6 ) : ?>
				<div class="col-sm-6 col-md-8 grid-item grid-item-medium">
					<?php
					/* Print post-card-specific template. */
					akella_post_card( 'post-card-medium post-card-image', 'akella-thumbnail-medium', false ); ?>
				</div><!-- .col-md-8 .grid-item .grid-item-medium -->
			<?php
			else : ?>
				<div class="col-sm-6 col-md-4 grid-item">
					<?php if ( 'image' === get_post_format() || 'gallery' === get_post_format() ) {
						/* Print post-card-specific template. */
						akella_post_card( 'post-card-image', 'akella-thumbnail-medium', false );
					} else {
						/* Print post-card-specific template. */
						akella_post_card( '', 'akella-thumbnail-small' );
					} ?>
				</div><!-- .col-md-6 .col-md-4 .grid-item -->
			<?php
			endif;
		endif;

		$i++;
	endwhile; ?>
</div><!-- .row .content-grid .content-grid-1 -->

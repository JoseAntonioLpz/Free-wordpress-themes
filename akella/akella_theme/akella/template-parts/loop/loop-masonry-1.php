<?php
/**
 * Template part for displaying loop.
 *
 * @package Akella
 */

?>

<div class="row">
	<div id="content-masonry" class="content-masonry content-masonry-1">

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div class="col-xs-12 col-sm-6 masonry-grid-sizer"></div>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>

				<div class="col-xs-12 col-sm-6 masonry-item js-masonry-item">
					<?php if ( 'image' === get_post_format() || 'gallery' === get_post_format() ) {
						/* Print post-card-specific template. */
						akella_post_card( 'post-card-image', 'akella-thumbnail-medium', false );
					} else {
						/* Print post-card-specific template. */
						akella_post_card( '', 'akella-thumbnail-small' );
					} ?>
				</div><!-- .col-xs-12 .col-sm-6 .masonry-item -->

			<?php endwhile;
		else : ?>
			<div class="col-xs-12 col-sm-6 col-md-4 masonry-grid-sizer"></div>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>

				<div class="col-xs-12 col-sm-6 col-md-4 masonry-item js-masonry-item">
					<?php if ( 'image' === get_post_format() || 'gallery' === get_post_format() ) {
						/* Print post-card-specific template. */
						akella_post_card( 'post-card-image', 'akella-thumbnail-medium', false );
					} else {
						/* Print post-card-specific template. */
						akella_post_card( '', 'akella-thumbnail-small' );
					} ?>
				</div><!-- .col-xs-12 .col-sm-6 .col-md-4 .masonry-item -->
			<?php endwhile;
		endif; ?>

	</div><!-- .content-masonry .content-masonry-1 -->
</div><!-- .row -->

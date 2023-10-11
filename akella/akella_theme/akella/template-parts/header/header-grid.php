<?php
/**
 * The template for displaying header posts grid.
 *
 * @package Akella
 */
?>

<?php if ( akella_has_featured_posts() && count( akella_get_featured_posts() ) >= 5 ) :
	$featured_posts = akella_get_featured_posts(); ?>

	<div class="featured">
		<div class="container">

			<div class="row header-grid">
				<?php
				$i = 0;

				foreach ( (array) $featured_posts as $order => $post ) :
					setup_postdata( $post );

					if ( $i == 1 || $i == 3 ) : ?>
						<div class="col-md-3">
							<div class="row">
					<?php
					elseif ( $i == 0 ) : ?>
						<div class="col-md-6 grid-item grid-item-large">
					<?php
					endif;

					if ( $i == 0 ) :
						/* Print post-card-specific template. */
						akella_post_card( 'post-card-medium', 'akella-thumbnail-medium', true );
					else : ?>
						<div class="col-sm-6 col-md-12 grid-item">
							<?php
							/* Print post-card-specific template. */
							akella_post_card( '', null, false ); ?>
						</div>
					<?php
					endif;

					if ( $i == 2 || $i == 4 ) : ?>
							</div><!-- .row -->
						</div><!-- .col-md-3 -->
					<?php
					elseif ( $i == 0 ) : ?>
						</div><!-- .col-md-6 -->
					<?php
					endif;

					$i++;
				endforeach;

				// Restore original Post Data
				wp_reset_postdata(); ?>
			</div><!-- .row.header-grid -->

		</div><!-- .container -->
	</div><!-- .featured -->
<?php endif;

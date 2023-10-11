<?php
/**
 * The template for displaying header posts carousel (type 1).
 *
 * @package Akella
 */
?>

<?php if ( akella_has_featured_posts() ) :
	$featured_posts = akella_get_featured_posts(); ?>

	<div class="featured">
		<div class="container">

			<div id="header-carousel" class="header-carousel header-carousel-1">
				<?php
				foreach ( (array) $featured_posts as $order => $post ) :
					setup_postdata( $post ); ?>

					<div class="carousel-item">
						<?php
						/* Print post-card-specific template. */
						akella_post_card( 'post-card-large post-card-image', 'akella-thumbnail-large', false ); ?>
					</div><!-- .carousel-item -->

				<?php
				endforeach;

				// Restore original Post Data
				wp_reset_postdata(); ?>
			</div><!-- .header-carousel -->

		</div><!-- .container -->
	</div><!-- .featured -->
<?php endif;

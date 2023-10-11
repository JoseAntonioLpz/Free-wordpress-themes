<?php
/**
 * The template for displaying header image.
 *
 * @package Akella
 */
?>

<?php if ( get_header_image() ) : ?>

	<div class="featured has-header-image">
		<div class="container">
			<?php
			/**
			 * Filter the default Akella custom header sizes attribute.
			 *
			 * @param string $custom_header_sizes sizes attribute
			 * for Header Image. Default '(max-width: 767px) 96vw,
			 * (max-width: 991px) 720px, (max-width: 1199px) 940px, 1200px'.
			 */
			$custom_header_sizes = apply_filters( 'akella_custom_header_sizes', '(max-width: 767px) 96vw, (max-width: 991px) 720px, (max-width: 1199px) 940px, 1200px' ); ?>

			<div class="header-image">
				<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
			</div><!-- .header-image -->
		</div><!-- .container -->
	</div><!-- .featured.has-header-image -->

<?php endif; ?>

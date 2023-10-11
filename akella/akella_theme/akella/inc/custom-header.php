<?php
/**
 * Implementation of the Custom Header and Background feature.
 *
 * @package Akella
 */


/**
 * Set up the WordPress core custom header and custom background features.
 *
 * @uses akella_header_style()
 */
function akella_custom_header_and_background() {
	/**
	 * Filter the arguments used when adding 'custom-background' support in Akella.
	 *
	 * @param array $args {
	 *     An array of custom-background support arguments.
	 *
	 *     @type string $default-color Default color of the background.
	 * }
	 */
	add_theme_support( 'custom-background', apply_filters( 'akella_custom_background_args', array(
		'default-color' => '#ececef',
	) ) );

	/**
	 * Filter the arguments used when adding 'custom-header' support in Akella.
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type int      $width            	Width in pixels of the custom header image. Default 1200.
	 *     @type int      $height           	Height in pixels of the custom header image. Default 670.
	 *     @type bool     $flex-height      	Whether to allow flexible-height header images. Default true.
	 *     @type callable $wp-head-callback 	Callback function used to style the header image and text
	 *                                      	displayed on the blog.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'akella_custom_header_args', array(
		'width'              => 1200,
		'height'             => 670,
		'flex-height'        => true,
		'wp-head-callback'   => 'akella_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'akella_custom_header_and_background' );

if ( ! function_exists( 'akella_header_style' ) ) :
/**
 * Styles the header text displayed on the site.
 *
 * Create your own akella_header_style() function to override in a child theme.
 *
 * @see akella_custom_header().
 */
function akella_header_style() {
	// If the header text option is untouched, let's bail.
	if ( display_header_text() ) {
		return;
	}

	// If the header text has been hidden.
	?>
	<style id="akella-header-css" type="text/css">
		.site-branding .site-title,
		.site-description {
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
	</style>
	<?php
}
endif;

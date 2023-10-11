<?php
/**
 * Additional features to allow styling of the templates.
 *
 * @package Akella
 */


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function akella_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	$akella_layout = get_theme_mod( 'akella_layout', 'default' );

	if ( ! is_singular() ) {
		$classes[] = 'content-layout-' . $akella_layout;
	}

	// Adds a class of content layout.
	$classes[] = 'hfeed';

	// Get the color scheme or the default if there isn't one.
	$colors = akella_sanitize_color_scheme( get_theme_mod( 'color_scheme', 'red' ) );
	$classes[] = 'colors-' . $colors;

	return $classes;
}
add_filter( 'body_class', 'akella_body_classes' );

if ( ! function_exists( 'akella_content_area_classes' ) ) :
/**
 * Adds Bootstrap classes to content area.
 *
 * Create your own akella_content_area_classes() function to override in a child theme.
 */
function akella_content_area_classes() {
	$sidebar_position = get_theme_mod( 'sidebar_position', 'right' );

	if ( $sidebar_position == 'right' && is_active_sidebar( 'sidebar-1') ) {
		$classes = 'col-md-8';
	}

	if ( $sidebar_position == 'left' && is_active_sidebar( 'sidebar-1') ) {
		$classes = 'col-md-8 col-md-push-4';
	}

	if ( ! is_active_sidebar( 'sidebar-1') ) {
		$classes = 'col-lg-12';
	}

	echo esc_attr( $classes );
}
endif;

if ( ! function_exists( 'akella_sidebar_classes' ) ) :
/**
 * Adds Bootstrap classes to sidebar.
 *
 * Create your own akella_sidebar_classes() function to override in a child theme.
 */
function akella_sidebar_classes() {
	$sidebar_position = get_theme_mod( 'sidebar_position', 'right' );

	if ( $sidebar_position == 'right' && is_active_sidebar( 'sidebar-1') ) {
		$classes = 'col-md-4';
	}

	if ( $sidebar_position == 'left' && is_active_sidebar( 'sidebar-1') ) {
		$classes = 'col-md-4 col-md-pull-8';
	}

	echo esc_attr( $classes );
}
endif;

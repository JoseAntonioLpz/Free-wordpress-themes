<?php
/**
 * Akella Child Theme functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * @package Akella
 */

function akella_child_enqueue_styles() {
	// Parent Theme stylesheet.
	wp_enqueue_style( 'akella-main', get_template_directory_uri() . '/assets/css/main.css', array(), '20170412' );
	wp_enqueue_style( 'akella-style', get_template_directory_uri() . '/style.css' );

	// Load the cyan color scheme.
	if ( 'cyan' === get_theme_mod( 'color_scheme', 'red' ) || is_customize_preview() ) {
		wp_enqueue_style( 'akella-colors-blue', get_template_directory_uri() . '/assets/css/colors-cyan.css', array( 'akella-main' ), '1.0' );
	}

	// Load the teal color scheme.
	if ( 'teal' === get_theme_mod( 'color_scheme', 'red' ) || is_customize_preview() ) {
		wp_enqueue_style( 'akella-colors-green', get_template_directory_uri() . '/assets/css/colors-teal.css', array( 'akella-main' ), '1.0' );
	}

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'akella-ie', get_template_directory_uri() . '/assets/css/ie.css', array( 'akella-main' ), '20170412' );
	wp_style_add_data( 'akella-ie', 'conditional', 'lt IE 10' );

	wp_enqueue_style( 'akella-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'akella-main' ),
		wp_get_theme()->get('Version')
	);
}
add_action( 'wp_enqueue_scripts', 'akella_child_enqueue_styles' );

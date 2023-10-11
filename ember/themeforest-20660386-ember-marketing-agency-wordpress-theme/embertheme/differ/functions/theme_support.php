<?php

if ( ! isset( $content_width ) ) {
	$content_width = 1170;
}

/* THEME SUPPORT SETTINGS */
function differ_init_theme_support() {
	if ( function_exists( 'differ_get_images_sizes' ) ) {
		foreach ( differ_get_images_sizes() as $post_type => $sizes ) {
			foreach ( $sizes as $config ) {
				differ_add_image_size( $post_type, $config );
			}
		}
	}
}

function differ_add_image_size( $post_type, $config ) {
	add_image_size( $config['name'], $config['width'], $config['height'], $config['crop'] );
}






add_action( 'init', 'differ_init_theme_support' );



function differ_after_setup_theme() {
	add_editor_style();
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'post-formats', array( 'video', 'gallery' ) );
	add_theme_support( "title-tag" );
	global $wp_version;
	if ( version_compare( $wp_version, '3.4', '<=' ) ) :
		add_theme_support( "custom-background" );
		add_theme_support( "custom-header" );
	endif;

}

add_action( 'after_setup_theme', 'differ_after_setup_theme' );



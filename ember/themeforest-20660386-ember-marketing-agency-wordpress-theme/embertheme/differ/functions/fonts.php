<?php
function differ_fonts_url() {

	$primary_font   = get_theme_mod( 'main_font', 'Raleway' );
	$secondary_font = get_theme_mod( 'sec_font', 'Roboto' );
	$heading_font   = get_theme_mod( 'head_font', $primary_font );
	$logo_font      = get_theme_mod( 'logo_font', 'Gloria Hallelujah' );
	$desktop_nav_link_font = get_theme_mod( 'desktop_nav_link_font_family', $primary_font );


	get_theme_mod( 'fonts_subset' ) ? $fonts_subset = implode( ',', get_theme_mod( 'fonts_subset' ) ) : $fonts_subset = 'latin,latin-ext';
	$fonts_url = '';
	$fonts     = array();
	$fonts[]   = '' . $primary_font . ':100,300,300i,400,400i,500,600,700';
	$fonts[]   = '' . $secondary_font . ':100,300,300i,400,400i,500,500i,600';
	$fonts[]   = '' . $heading_font . ':100,300,300i,400,400i,500,500i,600';
	$fonts[]   = '' . $logo_font . ':100,300,300i,400,400i,500,500i,600';
	$fonts[]   = '' . $desktop_nav_link_font . ':100,300,300i,400,400i,500,500i,600';
	$fonts     = array_unique( $fonts );

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $fonts_subset ),
		),
			'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

function differ_load_fonts() {
	$primary_font   = get_theme_mod( 'primary_font', 'Raleway' );
	$secondary_font = get_theme_mod( 'secondary_font', 'Roboto' );
	$heading_font   = get_theme_mod( 'heading_font', $primary_font );
	$logo_font      = get_theme_mod( 'logo_font', 'Gloria Hallelujah' );
	$desktop_nav_link_font = get_theme_mod( 'desktop_nav_link_font_family', $primary_font );


	$fonts_css = "
		:root{
	       --primary-font: '{$primary_font}', sans-serif ,Arial, Helvetica, sans-serif;
	       --secondary-font: '{$secondary_font}', sans-serif ,Arial, Helvetica, sans-serif;
	       --heading-font: '{$heading_font}', sans-serif ,Arial, Helvetica, sans-serif;
	       --logo-font: '{$logo_font}',Arial, Helvetica, sans-serif;
	       --desktop-nav-link-font: '{$desktop_nav_link_font}',Arial, Helvetica, sans-serif;
		}
	";

	wp_add_inline_style( 'differ-main-css', $fonts_css );
	wp_enqueue_style( 'differ-fonts', differ_fonts_url() );
}

add_action( 'wp_enqueue_scripts', 'differ_load_fonts' );
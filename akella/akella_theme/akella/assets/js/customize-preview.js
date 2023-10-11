/**
 * Live-update changed settings in real time in the Customizer preview.
 */


( function( $ ) {
	"use strict";

	// Site title.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	// Site tagline.
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Footer copyright text.
	wp.customize( 'copyright_text', function( value ) {
		value.bind( function( to ) {
			$( '.copyright' ).text( to );
		} );
	} );

	// Color scheme.
	wp.customize( 'color_scheme', function( value ) {
		value.bind( function( to ) {

			// Update color body class.
			$( 'body' )
				.removeClass( 'colors-red colors-cyan colors-teal' )
				.addClass( 'colors-' + to );
		});
	});
} )( jQuery );

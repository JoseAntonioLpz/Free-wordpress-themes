/**
 * Init Carousel 2.
 */


( function( $ ) {
	"use strict";

	$( document ).ready( function() {
		// Header Carousel.
		$( '#header-carousel' ).slick( {
			slidesToShow: 3,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 10000,
			responsive: [
				{
					breakpoint: 992,
					settings: {
						slidesToShow: 2
					}
				},
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 1
					}
				}
			]
		} );
	} );
} )( jQuery );

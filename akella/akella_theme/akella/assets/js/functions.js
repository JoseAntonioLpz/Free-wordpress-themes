/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */


( function( $ ) {
	"use strict";

	var body, masthead, menuToggle, mainNavigation, resizeTimer;

	function initMainNavigation( container ) {

		// Add dropdown toggle that displays child menu items.
		var dropdownToggle = $( '<button />', {
			'class': 'dropdown-toggle',
			'aria-expanded': false
		} ).append( $( '<span />', {
			'class': 'screen-reader-text',
			text: screenReaderText.expand
		} ) );

		container.find( '.menu-item-has-children > a' ).after( dropdownToggle );

		// Toggle buttons and submenu items with active children menu items.
		container.find( '.current-menu-ancestor > button' ).addClass( 'toggled-on' );
		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

		// Add menu items with submenus to aria-haspopup="true".
		container.find( '.menu-item-has-children' ).attr( 'aria-haspopup', 'true' );

		container.find( '.dropdown-toggle' ).click( function( e ) {
			var _this            = $( this ),
				screenReaderSpan = _this.find( '.screen-reader-text' );

			e.preventDefault();
			_this.toggleClass( 'toggled-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );

			// jscs:disable
			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			// jscs:enable
			screenReaderSpan.text( screenReaderSpan.text() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand );
		} );
	}
	initMainNavigation( $( '.main-navigation' ) );

	masthead            = $( '#masthead' );
	menuToggle          = masthead.find( '#menu-toggle' );
	mainNavigation      = masthead.find( '#main-navigation' );

	// Enable menuToggle.
	( function() {

		// Return early if menuToggle is missing.
		if ( ! menuToggle.length ) {
			return;
		}

		// Add an initial values for the attribute.
		menuToggle.add( mainNavigation ).attr( 'aria-expanded', 'false' );

		menuToggle.on( 'click.akella', function() {
			$( this ).add( mainNavigation ).toggleClass( 'toggled-on' );

			// jscs:disable
			$( this ).add( mainNavigation ).attr( 'aria-expanded', $( this ).add( mainNavigation ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			// jscs:enable
		} );
	} )();

	// Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
	( function() {
		if ( ! mainNavigation.length || ! mainNavigation.children().length ) {
			return;
		}

		// Toggle `focus` class to allow submenu access on tablets.
		function toggleFocusClassTouchScreen() {
			if ( window.innerWidth >= 992 ) {
				$( document.body ).on( 'touchstart.akella', function( e ) {
					if ( ! $( e.target ).closest( '.main-navigation li' ).length ) {
						$( '.main-navigation li' ).removeClass( 'focus' );
					}
				} );
				mainNavigation.find( '.menu-item-has-children > a' ).on( 'touchstart.akella', function( e ) {
					var el = $( this ).parent( 'li' );

					if ( ! el.hasClass( 'focus' ) ) {
						e.preventDefault();
						el.toggleClass( 'focus' );
						el.siblings( '.focus' ).removeClass( 'focus' );
					}
				} );
			} else {
				mainNavigation.find( '.menu-item-has-children > a' ).unbind( 'touchstart.akella' );
			}
		}

		if ( 'ontouchstart' in window ) {
			$( window ).on( 'resize.akella', toggleFocusClassTouchScreen );
			toggleFocusClassTouchScreen();
		}

		mainNavigation.find( 'a' ).on( 'focus.akella blur.akella', function() {
			$( this ).parents( '.menu-item' ).toggleClass( 'focus' );
		} );
	} )();

	// Add the default ARIA attributes for the menu toggle and the navigations.
	function onResizeARIA() {
		if ( window.innerWidth < 992 ) {
			if ( menuToggle.hasClass( 'toggled-on' ) ) {
				menuToggle.attr( 'aria-expanded', 'true' );
			} else {
				menuToggle.attr( 'aria-expanded', 'false' );
			}

			if ( mainNavigation.hasClass( 'toggled-on' ) ) {
				mainNavigation.attr( 'aria-expanded', 'true' );
			} else {
				mainNavigation.attr( 'aria-expanded', 'false' );
			}

			menuToggle.attr( 'aria-controls', 'main-navigation' );
		} else {
			menuToggle.removeAttr( 'aria-expanded' );
			mainNavigation.removeAttr( 'aria-expanded' );
			menuToggle.removeAttr( 'aria-controls' );
		}
	}

	// Add 'below-entry-meta' class to elements.
	function belowEntryMetaClass( param ) {
		if ( body.hasClass( 'page' ) || body.hasClass( 'search' ) || body.hasClass( 'single-attachment' ) || body.hasClass( 'error404' ) ) {
			return;
		}

		$( '.entry-content' ).find( param ).each( function() {
			var element              = $( this ),
				elementPos           = element.offset(),
				elementPosTop        = elementPos.top,
				entryFooter          = element.closest( 'article' ).find( '.entry-footer' ),
				entryFooterPos       = entryFooter.offset(),
				entryFooterPosBottom = entryFooterPos.top + ( entryFooter.height() + 20 ),
				caption              = element.closest( 'figure' ),
				newImg;

			// Add 'below-entry-meta' to elements below the entry meta.
			if ( elementPosTop > entryFooterPosBottom ) {

				// Check if full-size images and captions are larger than or equal to 840px.
				if ( 'img.size-full' === param ) {

					// Create an image to find native image width of resized images (i.e. max-width: 100%).
					newImg = new Image();
					newImg.src = element.attr( 'src' );

					$( newImg ).on( 'load.akella', function() {
						if ( newImg.width >= 690  ) {
							element.addClass( 'below-entry-meta' );

							if ( caption.hasClass( 'wp-caption' ) ) {
								caption.addClass( 'below-entry-meta' );
								caption.removeAttr( 'style' );
							}
						}
					} );
				} else {
					element.addClass( 'below-entry-meta' );
				}
			} else {
				element.removeClass( 'below-entry-meta' );
				caption.removeClass( 'below-entry-meta' );
			}
		} );
	}

	$( document ).ready( function() {
		body = $( document.body );

		$( window )
			.on( 'load.akella', onResizeARIA )
			.on( 'resize.akella', function() {
				clearTimeout( resizeTimer );
				resizeTimer = setTimeout( function() {
					belowEntryMetaClass( 'img.size-full' );
					belowEntryMetaClass( 'blockquote.alignleft, blockquote.alignright' );
				}, 300 );
				onResizeARIA();
			} );

		belowEntryMetaClass( 'img.size-full' );
		belowEntryMetaClass( 'blockquote.alignleft, blockquote.alignright' );

		// Search.
		$('.site-search-form > .button-search').on('click', function(event) {
			event.preventDefault();
			$('.site-search-form').addClass('expanded');
			$('.site-search-form > label > input[type="search"]').focus();
			$('.site-navigation > .main-navigation').addClass('hidden');
			$('.site-navigation > .menu-toggle').addClass('hidden');
		});

		$('.site-search-form .button-search-close').on('click keyup', function(event) {
			if (event.target == this || event.target.className == 'button-search-close' || event.keyCode == 27) {
				$('.site-search-form').removeClass('expanded');
				$('.site-navigation > .main-navigation').removeClass('hidden');
				$('.site-navigation > .menu-toggle').removeClass('hidden');
			}
		});

		// Scroll to top button.
		$( window )
			.scroll( function() {
				if ( $( this ).scrollTop() > $( window ).height() / 2 ) {
					$( '#scroll-to-top' ).fadeIn( 1000 );
				} else {
					$( '#scroll-to-top' ).fadeOut( 1000 );
				}
			} );

			$( '#scroll-to-top' ).on( 'click', function() {
				$( 'html, body' ).animate( { scrollTop: 0 }, 1000 );
				return false;
			} );
	} );
} )( jQuery );

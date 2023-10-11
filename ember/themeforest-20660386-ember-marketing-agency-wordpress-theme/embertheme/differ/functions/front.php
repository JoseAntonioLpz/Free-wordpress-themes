<?php

function differ_enqueue_styles() {

	/** Register Styles **/
	wp_register_style( 'differ-main-css', DIFFER_THEME_URL . '/assets/css/main.css', array(), DIFFER_THEME_VERSION );
	wp_register_style( 'differ_reset', DIFFER_THEME_URL . '/assets/css/reset.css', array(), DIFFER_THEME_VERSION );
	wp_register_style( 'differ_bootstrap4-grid', DIFFER_THEME_URL . '/assets/libs/bootstrap/bootstrap-grid.css', array(), DIFFER_THEME_VERSION );
	wp_register_style( 'differ-fontello-css', DIFFER_THEME_URL . '/assets/libs/fontello/css/fontello.css', array(), DIFFER_THEME_VERSION );
	wp_register_style( 'differ-fontawesome', DIFFER_THEME_URL . '/assets/libs/font-awesome-5/css/fontawesome-all.css', array(), DIFFER_THEME_VERSION );
	wp_register_style( 'differ-swiper-css', DIFFER_THEME_URL . '/assets/libs/swiper-4.3.2/swiper.min.css', array(), DIFFER_THEME_VERSION );
	wp_register_style( 'differ-slick-css', DIFFER_THEME_URL . '/assets/libs/slick/slick.css', array(), DIFFER_THEME_VERSION );


	/** Include Styles  **/
	wp_enqueue_style( 'differ_reset' );
	wp_enqueue_style( 'differ-fontawesome' );
	wp_enqueue_style( 'differ_bootstrap4-grid' );
	wp_enqueue_style( 'differ-fontello-css' );
	wp_enqueue_style( 'differ-swiper-css' );
	wp_enqueue_style( 'differ-main-css' );

}

add_action( 'wp_enqueue_scripts', 'differ_enqueue_styles' );


function differ_enqueue_scripts() {

	/** Google API Key  **/
	if ( differ_get_option( 'google_api_key' ) && ! empty( differ_get_option( 'google_api_key' ) ) ) {
		wp_register_script( 'differ-google-api-key', 'https://maps.googleapis.com/maps/api/js?key=' . differ_get_option( 'google_api_key' ), false, null, true );
	}

	/** Register Scripts **/
	wp_register_script( 'differ-browsers-js', DIFFER_THEME_URL . '/assets/js/browser.js', array( 'jquery' ), DIFFER_THEME_VERSION, true );
	wp_register_script( 'differ-main-js', DIFFER_THEME_URL . '/assets/js/scripts.js', array( 'jquery' ), DIFFER_THEME_VERSION, true );
	wp_register_script( 'differ-ajax-comments', DIFFER_THEME_URL . '/assets/js/comments.js', array( 'jquery' ), DIFFER_THEME_VERSION, true );
	wp_register_script( 'isotope', DIFFER_THEME_URL . '/assets/libs/isotope/isotope.js', array( 'jquery' ), DIFFER_THEME_VERSION, true );
	wp_register_script( 'differ-swiper-js', DIFFER_THEME_URL . '/assets/libs/swiper-4.3.2/swiper.min.js', array( 'jquery' ), DIFFER_THEME_VERSION, true );
	wp_register_script( 'differ-slick-js', DIFFER_THEME_URL . '/assets/libs/slick/slick.js', array( 'jquery' ), DIFFER_THEME_VERSION, true );
	wp_register_script( 'differ-sticky-sidebar-js', DIFFER_THEME_URL . '/assets/libs/sticky-sidebar/sticky-sidebar.js', array( 'jquery' ), DIFFER_THEME_VERSION, true );


	/** Include Scripts **/
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'differ-browsers-js' );
	wp_enqueue_script( 'differ-swiper-js' );


	if ( get_theme_mod( 'sticky_sidebar', true ) ) {
		wp_enqueue_script( 'differ-sticky-sidebar-js' );
	}

	wp_enqueue_script( 'differ-main-js' );


	/** Comments Scripts **/
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply', 'wp-includes/js/comment-reply', array(), DIFFER_THEME_VERSION, true );
		differ_get_option( 'ajax_comments' ) ? wp_enqueue_script( 'differ-ajax-comments' ) : null;
	}


	wp_enqueue_script( 'differ-addtoany', "https://static.addtoany.com/menu/page.js", array( 'jquery' ), DIFFER_THEME_VERSION, true );

}

add_action( 'wp_enqueue_scripts', 'differ_enqueue_scripts' );












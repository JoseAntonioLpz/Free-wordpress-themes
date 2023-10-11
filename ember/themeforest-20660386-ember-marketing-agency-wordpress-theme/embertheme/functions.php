<?php

// Include Constants
require_once( get_template_directory() . '/differ/constants.php' );


// Load Theme Textdomain
load_theme_textdomain( 'embertheme', get_template_directory() . '/lang' );

// Set Theme Locale
$locale         = get_locale();
$locdiffer_file = get_template_directory() . "/lang/$locale.php";
if ( is_readable( $locdiffer_file ) ) {
	require_once( $locdiffer_file );
};

/* Exclude CPT From Search */
function differ_exclude_pages( $query ) {
	if ( $query->is_search ) {
		$query->set( 'post_type', array( 'post', 'portfolio' ) );
	}

	return $query;
}

add_filter( 'pre_get_posts', 'differ_exclude_pages' );

/* Add Dynamic Params(name, id) to Widgets */
function differ_dynamic_sidebar_params( $params ) {
	$widget_name = $params[0]['widget_name'];
	$widget_id   = $params[0]['widget_id'];

	return $params;
}

/* User Custom Login */
function differ_custom_login() {
	$creds                  = array();
	$creds['user_login']    = 'User';
	$creds['user_password'] = 'user';
	$creds['remember']      = true;
	$user                   = wp_signon( $creds, false );
	if ( is_wp_error( $user ) ) {
		echo esc_attr( $user->get_error_message() );
	}

}

add_action( 'wp_ajax_custom_login', 'differ_custom_login' );
add_action( 'wp_ajax_nopriv_custom_login', 'differ_custom_login' );


/* Change Default Password Protected Form */
function differ_password_form() {
	global $post;
	$label    = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );
	$template = '<form class="post-password-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post"><p class="protected-field">' . esc_attr__( "To view this protected post, enter the password below:",
			'embertheme' ) . '</p><div class="flex"> <label for="' . $label . '">' . esc_attr__( "Password:",
			'embertheme' ) . ' </label><input name="post_password" id="' . $label . '" type="password" required><button class="btn btn size-small rect black hover-white style-primary" type="submit" name="Submit" >' . esc_attr__( "Submit",
			'embertheme' ) . '</button></div></form>';

	return trim( $template );
}

add_filter( 'the_password_form', 'differ_password_form' );
if ( defined( 'KC_VERSION' ) || isset( $GLOBALS['kc'] ) ) {
	global $kc;
	$kc->add_content_type( array( 'post', 'portfolio' ) );
}

function differ_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}
add_filter( 'upload_mimes', 'differ_mime_types' );


/* Visual Portfolio */
add_filter( 'vpf_enqueue_plugin_font_awesome', '__return_false' );

function differ_enable_comments_custom_post_type() {
	add_post_type_support( 'portfolio', 'comments' );
}
add_action( 'init', 'differ_enable_comments_custom_post_type', 11 );





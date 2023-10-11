<?php

/* ACF THEME OPTIONS PANEL */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
		'page_title' => esc_attr__( 'Theme Options', 'embertheme' ),
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'read',
		'redirect'   => false,
		'position'   => 60
	) );



}


/* ACF SAVE FIELDS IN JSON  */
function differ_acf_json_save_point( $path ) {
	$path = DIFFER_PATH . '/acf/acf-json';

	return $path;
}

add_filter( 'acf/settings/save_json', 'differ_acf_json_save_point' );


/* ACF LOAD FIELDS FROM JSON */
function differ_acf_json_load_point( $paths ) {
	unset( $paths[0] );
	$paths[] = DIFFER_PATH . '/acf/acf-json';

	return $paths;
}

add_filter( 'acf/settings/load_json', 'differ_acf_json_load_point' );



/* GOOGLE API KEY FOR ACF METABOX IN ADMIN PANEL */
function differ_acf_admin_google_api_key() {
	acf_update_setting( 'google_api_key', differ_get_option( 'google_api_key' ) );
}

add_action( 'acf/init', 'differ_acf_admin_google_api_key' );










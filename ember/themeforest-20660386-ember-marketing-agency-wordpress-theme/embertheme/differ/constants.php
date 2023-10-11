<?php
define( 'DIFFER_THEME_PATH', get_template_directory() );
define( 'DIFFER_THEME_URL', get_template_directory_uri() );
define( 'DIFFER_PATH', get_template_directory() . '/differ' );
define( 'DIFFER_URL', get_template_directory_uri() . '/differ' );
define( 'DIFFER_SHORTNAME', 'Ember' );
define( 'DIFFER_EMAIL', 'differ.themes@gmail.com' );
define( "DIFFER_THEME_OPTIONS_NAME", "differ" );
define( "DIFFER_DEMO", "https://differ-themes.com/themeforest/wp/ember" );
define( "DIFFER_THEME_VERSION", 2.0 );
define( 'KC_LICENSE', 'htcy81gm-qzjp-r9qn-xi6s-f39f-m8fvcjr89cpu' );
define( 'KC_ATTACHS_XML_EXPIRATION', 7 * DAY_IN_SECONDS );


/* ADVANCED CUSTOM FIELDS CONFIG */
if ( class_exists( 'acf' ) ) {
	get_template_part( 'differ/acf/acf-config' );
}
/* KIRKI CUSTOMIZER */
if ( class_exists( 'Kirki' ) ) {
	get_template_part( 'differ/customizer/customizer' );
}

/* THEME SUPPORTS  */
get_template_part( 'differ/functions/theme_support' );

/* CORE FRAMEWORK FUNCTIONS */
get_template_part( 'differ/functions/general' );

/* MENU WALKER AND SETTINGS */
get_template_part( 'differ/functions/nav' );

/* DEMO IMPORT */
get_template_part( 'differ/functions/demo-import' );

/* AJAX COMMENTS */
get_template_part( 'differ/functions/ajax-comments' );

/* TGM SCRIPTS */
get_template_part( 'differ/functions/class-tgm-plugin-activation' );

require_once get_parent_theme_file_path( '/merlin/vendor/autoload.php' );
require_once get_parent_theme_file_path( '/merlin/class-merlin.php');
require_once get_parent_theme_file_path( '/differ/functions/merlin-config.php');

/* INCLUDE SCRIPTS AND STYLES */
get_template_part( 'differ/functions/front' );

/* FONTS */
get_template_part( 'differ/functions/fonts' );

/* INLINE CSS */
get_template_part( 'differ/functions/inline-css' );

/* INLINE JS */
get_template_part( 'differ/functions/inline-js' );

/* LOADMORE ACTIONS */
get_template_part( 'differ/functions/loadmore' );

/* ADMIN PANEL SETTINGS */
get_template_part( 'differ/admin/admin' );

/* WIDGETS */
get_template_part( 'differ/functions/sidebars' );

/* REGISTER REQUIRED PLUGINS */
get_template_part( '/plugins/load-plugins' );

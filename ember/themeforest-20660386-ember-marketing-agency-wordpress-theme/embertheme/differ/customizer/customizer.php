<?php
if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Please do not load this page directly. Thanks!' );
}


Kirki::add_config( 'embertheme',
	array(
		'capability'     => 'read',
		'option_type'    => 'theme_mod',
		'disable_output' => false
	) );


/* Dequene FA Icons */
function differ_dequeue_script() {
	wp_dequeue_script( 'kirki-fontawesome-font' );
}

add_action( 'wp_print_scripts', 'differ_dequeue_script', 100 );

$priority = 1;


/* Typography */
Kirki::add_panel( 'typo_panel',
	array(
		'priority' => $priority ++,
		'title'    => esc_attr__( 'Typography', 'embertheme' ),
	) );
get_template_part( '/differ/customizer/typography' );


/* Colors */
Kirki::add_section( 'color_section',
	array(
		'title'    => esc_attr__( 'Color Scheme', 'embertheme' ),
		'priority' => $priority ++,
	) );
get_template_part( '/differ/customizer/color_scheme' );

/* General Settings */
Kirki::add_section( 'general',
	array(
		'priority' => $priority ++,
		'title'    => esc_attr__( 'General Settings', 'embertheme' ),
	) );
get_template_part( '/differ/customizer/general' );


/* Navigation */
Kirki::add_panel( 'nav_panel',
	array(
		'priority' => $priority++,
		'title'    => esc_attr__( 'Navigation & Menu', 'embertheme' ),
	) );
get_template_part( '/differ/customizer/navigation' );


/* Blog */
Kirki::add_panel( 'blog_panel',
	array(
		'priority' => $priority ++,
		'title'    => esc_attr__( 'Blog', 'embertheme' ),
	) );
get_template_part( '/differ/customizer/blog' );

/* Preloader */
Kirki::add_section( 'preloader_section',
	array(
		'title'    => esc_attr__( 'Preloader', 'embertheme' ),
		'priority' => $priority ++,
	) );
get_template_part( '/differ/customizer/preloader' );

/* Scrollbar */
Kirki::add_section( 'scrollbar_section',
	array(
		'title'    => esc_attr__( 'Scrollbar', 'embertheme' ),
		'priority' => $priority ++,
	) );
get_template_part( '/differ/customizer/scrollbar' );

/* Breadcrumbs */
Kirki::add_section( 'breadcrumbs_section',
	array(
		'title'    => esc_attr__( 'Breadcrumbs', 'embertheme' ),
		'priority' => $priority ++,
	) );
get_template_part( '/differ/customizer/breadcrumbs' );



/* Tooltips */
Kirki::add_section( 'tooltips_section',
	array(
		'title'    => esc_attr__( 'Tooltips', 'embertheme' ),
		'priority' => $priority ++,
	) );
//get_template_part( '/differ/customizer/tooltips' );

/* Footer */
Kirki::add_section( 'footer_section',
	array(
		'title'    => esc_attr__( 'Footer', 'embertheme' ),
		'priority' => $priority ++,
	) );
get_template_part( '/differ/customizer/footer' );



































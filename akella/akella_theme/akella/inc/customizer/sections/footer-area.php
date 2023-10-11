<?php
/**
 * Akella Customizer Footer Area.
 *
 * @package Akella
 */


/**
 * Add support for footer area settings for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function akella_customize_register_footer_area( $wp_customize ) {
	// Add section to change footer area.
	$wp_customize->add_section( 'footer_area_settings', array(
		'title'    => esc_html__( 'Footer Area Settings', 'akella' ),
		'priority' => 142,
	) );

	// Add footer copyright settings and controls.
	$wp_customize->add_setting( 'copyright_text', array(
		'default'       	  => esc_html__( 'Copyright 2017. All rights reserved.', 'akella' ),
		'sanitize_callback' => 'akella_sanitize_text',
		'transport' 		    => 'postMessage',
	) );

	$wp_customize->add_control( 'copyright_text', array(
		'label' 		  => esc_html__( 'Footer Copyright', 'akella' ),
		'description' => esc_html__( 'You can change footer copyright and use your own custom text from here.', 'akella' ),
		'section'  		=> 'footer_area_settings',
		'type'     		=> 'text',
		'priority' 		=> 1,
	) );

	$wp_customize->selective_refresh->add_partial( 'copyright_text', array(
		'selector'        => '.copyright',
		'render_callback' => 'akella_copyright_text',
	) );

	// Add footer author link settings and controls.
	$wp_customize->add_setting( 'hide_author_link', array(
		'default'  			    => false,
		'sanitize_callback' => 'akella_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'hide_author_link', array(
		'label'    => esc_html__( 'Hide Author Link', 'akella' ),
		'section'  => 'footer_area_settings',
		'type'     => 'checkbox',
		'priority' => 2,
	) );
}
add_action( 'customize_register', 'akella_customize_register_footer_area' );

/**
 * Render the copyright text for the selective refresh partial.
 *
 * @return void
 */
function akella_copyright_text() {
	echo get_theme_mod( 'copyright_text' );
}

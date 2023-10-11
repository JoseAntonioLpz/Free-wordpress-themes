<?php
/**
 * Akella Theme Customizer.
 *
 * @package Akella
 */


// Add Theme Customizer Sections.
$sections = array( 'header-area', 'content-area', 'footer-area' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function akella_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	// Remove the core header textcolor control.
	$wp_customize->remove_control( 'header_textcolor' );

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'akella_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'akella_customize_partial_blogdescription',
	) );

	// Add color scheme setting and control.
	$wp_customize->add_setting( 'color_scheme', array(
		'default'           => 'red',
		'sanitize_callback' => 'akella_sanitize_color_scheme',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'color_scheme', array(
		'label'    => esc_html__( 'Color Scheme', 'akella' ),
		'type'     => 'radio',
		'choices'  => array(
			'red'    => esc_html__( 'Red', 'akella' ),
			'cyan'   => esc_html__( 'Cyan', 'akella' ),
			'teal'   => esc_html__( 'Teal', 'akella' ),
		),
		'section'  => 'colors',
		'priority' => 10,
	) );
}
add_action( 'customize_register', 'akella_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function akella_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function akella_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Handles sanitization for color scheme.
 *
 * Create your own akella_sanitize_color_scheme() function to override
 * in a child theme.
 *
 * @param string $value color scheme value.
 * @return string sidebar position.
 */
function akella_sanitize_color_scheme( $value ) {
	$color_scheme = array (
		'red'   => esc_html__( 'Red', 'akella' ),
		'cyan'  => esc_html__( 'Cyan', 'akella' ),
		'teal'  => esc_html__( 'Teal', 'akella' ),
	);

	if ( array_key_exists( $value, $color_scheme ) ) {
		return $value;
	}

	return 'red';
}

/* Include Sections */
foreach( $sections as $section ){
	require get_template_directory() . '/inc/customizer/sections/' . $section . '.php';
}

/**
 * Handles sanitization for customizer text field.
 *
 * Create your own akella_sanitize_text() function to override
 * in a child theme.
 *
 * @return string text.
 */
function akella_sanitize_text( $text ) {
	return wp_kses_post( $text );
}

/**
 * Handles sanitization for customizer checkbox.
 *
 * Create your own akella_sanitize_checkbox() function to override
 * in a child theme.
 *
 * @return bool.
 */
function akella_sanitize_checkbox( $input ) {
	if ( $input == true ) {
  	return true;
  } else {
    return false;
  }
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function akella_customize_preview_js() {
	wp_enqueue_script( 'akella-customize-preview', get_template_directory_uri() . '/assets/js/customize-preview.js', array(), '1.0', true );
}
add_action( 'customize_preview_init', 'akella_customize_preview_js' );

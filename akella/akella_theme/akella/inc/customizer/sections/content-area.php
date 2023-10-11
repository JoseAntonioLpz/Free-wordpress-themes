<?php
/**
 * Akella Customizer Content Area.
 *
 * @package Akella
 */


/**
 * Add support for content area settings for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function akella_customize_register_content_area( $wp_customize ) {
	// Add section to change content area.
	$wp_customize->add_section( 'content_area_settings', array(
		'title'    => esc_html__( 'Content Area Settings', 'akella' ),
		'priority' => 141,
	) );

	// Add layout settings and controls.
	$wp_customize->add_setting( 'akella_layout', array(
		'default'  			    => 'default',
		'sanitize_callback' => 'akella_sanitize_layout',
	) );

	$wp_customize->add_control( 'akella_layout', array(
		'label'    		=> esc_html__( 'Layout', 'akella' ),
		'description' => esc_html__( 'Select your theme content layout.', 'akella' ),
		'section'  		=> 'content_area_settings',
		'type'     		=> 'radio',
		'choices' 		=> array(
			'default' 	=> esc_html__( 'Default List Layout', 'akella' ),
			'grid-1' 	  => esc_html__( 'Grid 1 Layout', 'akella' ),
			'grid-2'   	=> esc_html__( 'Grid 2 Layout', 'akella' ),
			'masonry-1' => esc_html__( 'Masonry 1 Layout', 'akella' ),
			'masonry-2' => esc_html__( 'Masonry 2 Layout', 'akella' ),
		),
		'priority'    => 1,
	) );

	// Add related posts settings and controls.
	$wp_customize->add_setting( 'related_posts', array(
		'default'  					=> true,
		'sanitize_callback' => 'akella_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'related_posts', array(
		'label'    		=> esc_html__( 'Display related posts', 'akella' ),
		'description' => esc_html__( 'Display related posts on posts.', 'akella' ),
		'section'  		=> 'content_area_settings',
		'type'     		=> 'checkbox',
		'priority' 		=> 2,
	) );

	// Add sidebar position settings and controls.
	$wp_customize->add_setting( 'sidebar_position', array(
		'default'  			    => 'right',
		'sanitize_callback' => 'akella_sanitize_sidebar_position',
	) );

	$wp_customize->add_control( 'sidebar_position', array(
		'label'    		=> esc_html__( 'Sidebar Position', 'akella' ),
		'description' => esc_html__( 'Select sidebar position. Delete all widgets from sidebar to turn on "Full Width" mode.', 'akella' ),
		'section'  		=> 'content_area_settings',
		'type'     		=> 'radio',
		'choices' 		=> array(
			'right' 	  => esc_html__( 'Right Sidebar', 'akella' ),
			'left' 		  => esc_html__( 'Left Sidebar', 'akella' ),
		),
		'priority'    => 3,
	) );

	// Add affix sidebar settings and controls.
	$wp_customize->add_setting( 'affix_sidebar', array(
		'default'  					=> false,
		'sanitize_callback' => 'akella_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'affix_sidebar', array(
		'label'    		=> esc_html__( 'Affix Sidebar', 'akella' ),
		'description' => esc_html__( 'Affix sidebar when scrolling.', 'akella' ),
		'section'  		=> 'content_area_settings',
		'type'     		=> 'checkbox',
		'priority' 		=> 4,
	) );
}
add_action( 'customize_register', 'akella_customize_register_content_area' );

/**
 * Handles sanitization for layout type.
 *
 * Create your own akella_sanitize_layout() function to override
 * in a child theme.
 *
 * @param string $value layout type.
 * @return string layout type.
 */
function akella_sanitize_layout( $value ) {
	$akella_layout = array (
		'default'   => esc_html__( 'Default List Layout', 'akella' ),
		'grid-1'    => esc_html__( 'Grid 1 Layout', 'akella' ),
		'grid-2'    => esc_html__( 'Grid 2 Layout', 'akella' ),
		'masonry-1' => esc_html__( 'Masonry 1 Layout', 'akella' ),
		'masonry-2' => esc_html__( 'Masonry 2 Layout', 'akella' ),
	);

	if ( array_key_exists( $value, $akella_layout ) ) {
		return $value;
	}

	return 'default';
}

/**
 * Handles sanitization for sidebar position.
 *
 * Create your own akella_sanitize_sidebar_position() function to override
 * in a child theme.
 *
 * @param string $value sidebar position value.
 * @return string sidebar position.
 */
function akella_sanitize_sidebar_position( $value ) {
	$sidebar_position = array (
		'right' => esc_html__( 'Right Sidebar', 'akella' ),
		'left' 	=> esc_html__( 'Left Sidebar', 'akella' ),
	);

	if ( array_key_exists( $value, $sidebar_position ) ) {
		return $value;
	}

	return 'right';
}

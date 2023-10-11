<?php
/**
 * Akella Customizer Header Area.
 *
 * @package Akella
 */


/**
 * Add support for header area settings for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function akella_customize_register_header_area( $wp_customize ) {
	// Add section to change header area.
	$wp_customize->add_section( 'header_area_settings', array(
		'title'    => esc_html__( 'Header Area Settings', 'akella' ),
		'priority' => 140,
	) );

	// Add header featured content settings and controls.
	$wp_customize->add_setting( 'header_featured_content', array(
		'default' 			    => 'image',
		'sanitize_callback' => 'akella_sanitize_header_featured_content',
	) );

	$wp_customize->add_control( 'header_featured_content', array(
		'label'    		 => esc_html__( 'Header Featured Content', 'akella' ),
		'description'  => esc_html__( 'Select what type of content you want to see in header featured area.', 'akella' ),
		'section'      => 'header_area_settings',
		'type'         => 'radio',
		'choices'      => array(
			'none' 		   => esc_html__( 'Don\'t Display Header Featured Content', 'akella' ),
			'image'      => esc_html__( 'Header Image', 'akella' ),
			'carousel-1' => esc_html__( 'Posts Carousel 1', 'akella' ),
			'carousel-2' => esc_html__( 'Posts Carousel 2', 'akella' ),
			'grid'       => esc_html__( 'Posts Grid', 'akella' ),
		),
		'priority' 		 => 1,
	) );
}
add_action( 'customize_register', 'akella_customize_register_header_area' );

/**
 * Handles sanitization for header featured content.
 *
 * Create your own akella_sanitize_header_featured_content() function to override
 * in a child theme.
 *
 * @param string $value content type value.
 * @return string content type.
 */
function akella_sanitize_header_featured_content( $value ) {
  $header_featured_content = array (
    'none'       => esc_html__( 'Don\'t Display Header Featured Content', 'akella' ),
    'image'      => esc_html__( 'Header Image', 'akella' ),
    'carousel-1' => esc_html__( 'Posts Carousel 1', 'akella' ),
		'carousel-2' => esc_html__( 'Posts Carousel 2', 'akella' ),
		'grid'       => esc_html__( 'Posts Grid', 'akella' ),
  );
  if ( array_key_exists( $value, $header_featured_content ) ) {
    return $value;
  }
 	return 'image';
}

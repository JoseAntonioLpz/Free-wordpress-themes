<?php
$priority = 1;


// Enable Disable Preloader
Kirki::add_field( 'embertheme',
	array(
		'type'     => 'toggle',
		'settings' => 'theme_preloader_enable',
		'label'    => esc_attr__( 'Enable Preloader', 'embertheme' ),
		'section'  => 'preloader_section',
		'default'  => '1',
		'priority' => $priority ++,
	) );

// Choose Default Theme Preloader or Custom Image
Kirki::add_field( 'embertheme',
	array(
		'type'     => 'radio',
		'settings' => 'theme_preloader_check',
		'section'  => 'preloader_section',
		'default'  => 'theme',
		'priority' => $priority ++,
		'choices'  => array(
			'theme'  => esc_attr__( 'Use Theme Preloader', 'embertheme' ),
			'custom' => esc_attr__( 'Upload Custom', 'embertheme' ),
		),
	) );

// Choose Theme Preloader
Kirki::add_field( 'embertheme',
	array(
		'type'     => 'radio-image',
		'settings' => 'theme_preloader',
		'section'  => 'preloader_section',
		'default'  => 'preloader1',
		'priority' => $priority ++,
		'choices'  => array(
			'preloader1'  => DIFFER_THEME_URL . '/assets/img/preloaders/preloader1.gif',
			'preloader2'  => DIFFER_THEME_URL . '/assets/img/preloaders/preloader2.gif',
			'preloader3'  => DIFFER_THEME_URL . '/assets/img/preloaders/preloader3.gif',
			'preloader4'  => DIFFER_THEME_URL . '/assets/img/preloaders/preloader4.gif',
			'preloader5'  => DIFFER_THEME_URL . '/assets/img/preloaders/preloader5.gif',
			'preloader6'  => DIFFER_THEME_URL . '/assets/img/preloaders/preloader6.gif',
			'preloader7'  => DIFFER_THEME_URL . '/assets/img/preloaders/preloader7.gif',
			'preloader8'  => DIFFER_THEME_URL . '/assets/img/preloaders/preloader8.gif',
			'preloader9'  => DIFFER_THEME_URL . '/assets/img/preloaders/preloader9.gif',
			'preloader10' => DIFFER_THEME_URL . '/assets/img/preloaders/preloader10.gif',
			'preloader11' => DIFFER_THEME_URL . '/assets/img/preloaders/preloader11.gif',
			'preloader12' => DIFFER_THEME_URL . '/assets/img/preloaders/preloader12.gif',
			'preloader13' => DIFFER_THEME_URL . '/assets/img/preloaders/preloader13.gif',
			'preloader14' => DIFFER_THEME_URL . '/assets/img/preloaders/preloader14.gif',
			'preloader15' => DIFFER_THEME_URL . '/assets/img/preloaders/preloader15.gif',
			'preloader16' => DIFFER_THEME_URL . '/assets/img/preloaders/preloader16.gif',
		),
	) );

// Upload Custom Image
Kirki::add_field( 'embertheme',
	array(
		'type'        => 'image',
		'settings'    => 'preloader_img',
		'label'       => esc_attr__( 'Upload Custom Preloader', 'embertheme' ),
		'description' => esc_attr__( 'Upload image GIF|PNG|JPG|JPEG|SVG', 'embertheme' ),
		'section'     => 'preloader_section',
		'default'     => '',
		'priority'    => $priority ++,
	) );

// Preloader Background Color
Kirki::add_field( 'embertheme',
	array(
		'type'     => 'color',
		'settings' => 'preloader_bg_color',
		'label'    => __( 'Background Color', 'embertheme' ),
		'section'  => 'preloader_section',
		'priority' => $priority ++,
		'default'  => '#fff',
	) );


// Preloader Elements Colors
Kirki::add_field( 'embertheme',
	array(
		'type'     => 'color',
		'settings' => 'preloader_color1',
		'label'    => __( 'Preloader Element1 Color', 'embertheme' ),
		'section'  => 'preloader_section',
		'priority' => $priority ++,
		'default'  => '#498EF3',
	) );

Kirki::add_field( 'embertheme',
	array(
		'type'     => 'color',
		'settings' => 'preloader_color2',
		'label'    => __( 'Preloader Element2 Color', 'embertheme' ),
		'section'  => 'preloader_section',
		'priority' => $priority ++,
		'default'  => '#498EF3',
	) );

Kirki::add_field( 'embertheme',
	array(
		'type'     => 'color',
		'settings' => 'preloader_color3',
		'label'    => __( 'Preloader Element3 Color', 'embertheme' ),
		'section'  => 'preloader_section',
		'priority' => $priority ++,
		'default'  => '#498EF3',
	) );


<?php
$priority = 1;


// Enable Disable Scrollbar
Kirki::add_field( 'embertheme',
	array(
		'type'        => 'toggle',
		'settings'    => 'theme_scrollbar_enable',
		'label'       => esc_attr__( 'Enable Custom Scrollbar ', 'embertheme' ),
		'description' => esc_attr__( 'Work only in WebKit browsers : Chrome, Opera, Safari', 'embertheme' ),
		'section'     => 'scrollbar_section',
		'default'     => '1',
		'priority'    => $priority ++,
	) );

// Scrollbar Width
Kirki::add_field( 'embertheme',
	array(
		'type'     => 'slider',
		'settings' => 'scrollbar_width',
		'label'    => esc_attr__( 'Scrollbar width', 'embertheme' ),
		'section'  => 'scrollbar_section',
		'default'  => 8,
		'priority' => $priority ++,
		'choices'  => array(
			'min'  => 4,
			'max'  => 20,
			'step' => 1,
		),
	) );

// Scrollbar Background Color
Kirki::add_field( 'embertheme',
	array(
		'type'     => 'color',
		'settings' => 'scrollbar_bg_color',
		'label'    => __( 'Scrollbar Background Color', 'embertheme' ),
		'section'  => 'scrollbar_section',
		'default'  => '#fdfdfd',
		'priority' => $priority ++,

	) );

// Scrollbar  Color
Kirki::add_field( 'embertheme',
	array(
		'type'     => 'color',
		'settings' => 'scrollbar_color',
		'label'    => __( 'Scrollbar Color', 'embertheme' ),
		'section'  => 'scrollbar_section',
		'default'  => '#F8BB5C',
		'priority' => $priority ++,

	) );

// Scrollbar Hover Color
Kirki::add_field( 'embertheme',
	array(
		'type'     => 'color',
		'settings' => 'scrollbar_hover_color',
		'label'    => __( 'Scrollbar Hover Color', 'embertheme' ),
		'section'  => 'scrollbar_section',
		'default'  => '#F8BB5C',
		'priority' => $priority ++,
	) );

// Scrollbar Border Color
Kirki::add_field( 'theme_config_id',
	array(
		'type'     => 'color',
		'settings' => 'scrollbar_border_color',
		'label'    => __( 'Scrollbar Border Color', 'embertheme' ),
		'section'  => 'scrollbar_section',
		'default'  => '#c6c6c2',
		'priority' => $priority ++,

		'choices' => array(
			'alpha' => true,
		),
	) );
<?php
$priority = 1;

Kirki::add_field( 'embertheme',
	array(
		'type'        => 'background',
		'settings'    => 'body_bg',
		'label'       => esc_attr__( 'Site Background', 'embertheme' ),
		'description' => esc_attr__( 'Upload Image or Choose color', 'embertheme' ),
		'section'     => 'general',
		'default'     => array(
			'background-color'      => '#fff',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		),
		'priority'    => $priority ++,
	) );


Kirki::add_field( 'embertheme',
	array(
		'type'     => 'toggle',
		'settings' => 'up_button',
		'label'    => esc_attr__( 'Scroll to top Button', 'embertheme' ),
		'section'  => 'general',
		'default'  => '1',
		'priority' => $priority ++,
	) );



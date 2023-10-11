<?php

$priority = 1;


/* Primary Hover Color */
Kirki::add_field( 'embertheme',
	array(
		'section'  => 'color_section',
		'type'     => 'color',
		'label'    => __( 'Select primary color', 'embertheme' ),
		'default'  => '#F8BB5C',
		'settings' => 'primary_color',
		'priority' => $priority ++
	) );


Kirki::add_field( 'embertheme',
	array(
		'section'  => 'color_section',
		'type'     => 'color',
		'label'    => __( 'Select black color', 'embertheme' ),
		'default'  => '#080909',
		'settings' => 'black_color',
		'priority' => $priority ++
	) );

Kirki::add_field( 'embertheme',
	array(
		'section'  => 'color_section',
		'type'     => 'color',
		'label'    => __( 'Select white color', 'embertheme' ),
		'default'  => '#fff',
		'settings' => 'white_color',
		'priority' => $priority ++
	) );

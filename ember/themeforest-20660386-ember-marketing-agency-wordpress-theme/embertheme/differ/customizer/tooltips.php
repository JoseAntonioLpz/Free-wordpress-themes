<?php

$priority = 1;


/* Tooltips Text Color */
Kirki::add_field( 'embertheme',
	array(
		'section'  => 'tooltips_section',
		'type'     => 'color',
		'label'    => __( 'Select Tooltips Text Color', 'embertheme' ),
		'default'  => '#fff',
		'settings' => 'tooltips_color',
		'priority' => $priority ++
	) );


// Tooltips Font Sizex
Kirki::add_field( 'embertheme',
	array(
		'type'     => 'slider',
		'settings' => 'tooltips_font_size',
		'label'    => esc_attr__( 'Select Tooltips Font Size', 'embertheme' ),
		'section'  => 'tooltips_section',
		'default'  => 13,
		'choices'  => array(
			'min'  => '7',
			'max'  => '20',
			'step' => '1',
		),
		'priority' => $priority ++

	) );
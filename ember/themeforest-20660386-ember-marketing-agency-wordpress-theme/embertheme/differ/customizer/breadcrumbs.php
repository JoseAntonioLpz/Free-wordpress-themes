<?php


$priority = 1;


Kirki::add_field( 'embertheme',
	array(
		'type'        => 'text',
		'settings'    => 'breadcrumbs_delimiter',
		'label'       => __( 'Breadcrumbs Delimiter', 'embertheme' ),
		'section'     => 'breadcrumbs_section',
		'default'     => '<i class="icon-right-open-mini" aria-hidden="true"></i>',
		'priority'    => $priority ++,
		'description' => esc_attr__( 'You can use icons from kingcomposer or symbols, as example ( > | / \)', 'embertheme' ),

	) );



Kirki::add_field( 'embertheme',
	array(
		'type'     => 'background',
		'settings' => 'breadcrumbs_background',
		'label'    => esc_attr__( 'Global Breadcrumbs Background', 'embertheme' ),
		'section'  => 'breadcrumbs_section',
		'default'  => array(
			'background-color'      => '#848181',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		),
	) );


Kirki::add_field( 'embertheme',
	array(
		'type'     => 'color',
		'settings' => 'breadcrumbs_color',
		'label'    => __( 'Breadcrumbs Color', 'embertheme' ),
		'section'  => 'breadcrumbs_section',
		'default'  => '#fff',
	) );
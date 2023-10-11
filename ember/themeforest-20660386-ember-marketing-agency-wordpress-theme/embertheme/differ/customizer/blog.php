<?php
$priority = 1;
Kirki::add_section( 'blog_list',
	array(
		'title'    => esc_attr__( 'Blog List', 'embertheme' ),
		'priority' => $priority ++,
		'panel'    => 'blog_panel'
	) );

Kirki::add_field( 'embertheme',
	array(
		'type'     => 'toggle',
		'settings' => 'sticky_sidebar',
		'label'    => esc_attr__( 'Sticky Sidebar', 'embertheme' ),
		'section'  => 'blog_panel',
		'default'  => '1',
		'priority' => $priority,
	) );

Kirki::add_field( 'embertheme',
	array(
		'type'     => 'radio',
		'settings' => 'blog_type',
		'label'    => __( 'Blog List Type', 'embertheme' ),
		'section'  => 'blog_list',
		'default'  => 'right_sidebar',
		'priority' => $priority,
		'choices'  => array(
			'right_sidebar' => esc_attr__( 'Right sidebar', 'embertheme' ),
			'left_sidebar'  => esc_attr__( 'Left sidebar', 'embertheme' ),
			'wide'          => esc_attr__( 'Wide, without sidebar', 'embertheme' ),
		),
	) );

Kirki::add_field( 'embertheme',
	array(
		'type'     => 'radio-buttonset',
		'settings' => 'pagination-align',
		'label'    => __( 'Pagination Alignment', 'embertheme' ),
		'section'  => 'blog_list',
		'default'  => 'center',
		'priority' => $priority,
		'choices'  => array(
			'left'   => esc_attr__( 'Center', 'embertheme' ),
			'center' => esc_attr__( 'Center', 'embertheme' ),
			'right'  => esc_attr__( 'Right', 'embertheme' ),
		),
	) );

Kirki::add_field( 'embertheme',
	array(
		'type'     => 'toggle',
		'settings' => 'blog_list_date',
		'label'    => esc_attr__( 'Show Date', 'embertheme' ),
		'section'  => 'blog_list',
		'default'  => '1',
		'priority' => $priority,
	) );

Kirki::add_field( 'embertheme',
	array(
		'type'     => 'toggle',
		'settings' => 'blog_list_author',
		'label'    => esc_attr__( 'Show Author Link', 'embertheme' ),
		'section'  => 'blog_list',
		'default'  => '1',
		'priority' => $priority,
	) );

Kirki::add_field( 'embertheme',
	array(
		'type'     => 'toggle',
		'settings' => 'blog_list_cats',
		'label'    => esc_attr__( 'Show Categories', 'embertheme' ),
		'section'  => 'blog_list',
		'default'  => '1',
		'priority' => $priority,
	) );

Kirki::add_field( 'embertheme',
	array(
		'type'     => 'toggle',
		'settings' => 'blog_list_comments',
		'label'    => esc_attr__( 'Show Comments Count', 'embertheme' ),
		'section'  => 'blog_list',
		'default'  => '1',
		'priority' => $priority,
	) );

Kirki::add_field( 'embertheme',
	array(
		'type'     => 'toggle',
		'settings' => 'blog_list_likes',
		'label'    => esc_attr__( 'Show Likes', 'embertheme' ),
		'section'  => 'blog_list',
		'default'  => '1',
		'priority' => $priority,
	) );

Kirki::add_field( 'embertheme',
	array(
		'type'     => 'toggle',
		'settings' => 'blog_list_views',
		'label'    => esc_attr__( 'Show Views', 'embertheme' ),
		'section'  => 'blog_list',
		'default'  => '1',
		'priority' => $priority,
	) );


$priority = 1;
Kirki::add_section( 'blog_single',
	array(
		'title'    => esc_attr__( 'Blog Single', 'embertheme' ),
		'priority' => $priority ++,
		'panel'    => 'blog_panel'
	) );


Kirki::add_field( 'embertheme',
	array(
		'type'     => 'toggle',
		'settings' => 'blog_single_date',
		'label'    => esc_attr__( 'Show Date', 'embertheme' ),
		'section'  => 'blog_single',
		'default'  => '1',
		'priority' => $priority,
	) );

Kirki::add_field( 'embertheme',
	array(
		'type'     => 'toggle',
		'settings' => 'blog_single_author',
		'label'    => esc_attr__( 'Show Author Link', 'embertheme' ),
		'section'  => 'blog_single',
		'default'  => '1',
		'priority' => $priority,
	) );

Kirki::add_field( 'embertheme',
	array(
		'type'     => 'toggle',
		'settings' => 'blog_single_cats',
		'label'    => esc_attr__( 'Show Categories', 'embertheme' ),
		'section'  => 'blog_single',
		'default'  => '1',
		'priority' => $priority,
	) );


Kirki::add_field( 'embertheme',
	array(
		'type'     => 'toggle',
		'settings' => 'blog_single_likes',
		'label'    => esc_attr__( 'Show Likes', 'embertheme' ),
		'section'  => 'blog_single',
		'default'  => '1',
		'priority' => $priority,
	) );

Kirki::add_field( 'embertheme',
	array(
		'type'     => 'toggle',
		'settings' => 'blog_single_views',
		'label'    => esc_attr__( 'Show Views', 'embertheme' ),
		'section'  => 'blog_single',
		'default'  => '1',
		'priority' => $priority,
	) );






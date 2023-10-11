<?php

/* LOAD TEXTDOMAIN FOR TGM */
function differ_load_textdomain() {
	load_theme_textdomain( 'embertheme', get_template_directory() . '/lang/tgm' );
}

add_action( 'init', 'differ_load_textdomain', 1 );

function differ_register_required_plugins() {
	$plugins = array(
		array(
			'name'               => 'ACF Pro',
			'slug'               => 'advanced-custom-fields-pro',
			'source'             => DIFFER_THEME_PATH . '/plugins/advanced-custom-fields-pro.zip',
			'required'           => true,
			'version'            => '',
			'force_activation'   => false,
		),
		array(
			'name'             => 'ACF Pro Contact Form 7 Field',
			'slug'             => 'acf-cf7',
			'source'           => DIFFER_THEME_PATH . '/plugins/acf-cf7.zip',
			'required'         => true,
			'force_activation' => false,
		),
		array(
			'name'             => 'ACF Pro Font Awesome 5',
			'slug'             => 'acffa5',
			'source'           => DIFFER_THEME_PATH . '/plugins/acffa5.zip',
			'required'         => true,
			'force_activation' => false,
		),
		array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => true,
		),

		array(
			'name'     => 'Kirki',
			'slug'     => 'kirki',
			'required' => true,
		),
		array(
			'name'     => 'King Composer',
			'slug'     => 'kingcomposer',
			'required' => true,
		),
		array(
			'name'     => 'Demo Import',
			'slug'     => 'one-click-demo-import',
			'required' => true,
		),
		array(
			'name'     => 'Visual Portfolio',
			'slug'     => 'visual-portfolio',
			'required' => true,
		),
		array(
			'name'             => 'KC Pro ',
			'slug'             => 'kc_pro',
			'source'           => DIFFER_THEME_PATH . '/plugins/kc_pro.zip',
			'required'         => true,
			'force_activation' => false,
		),
		array(
			'name'             => 'DifferThemes Widgets',
			'slug'             => 'differ-widgets',
			'source'           => DIFFER_THEME_PATH . '/plugins/differ-widgets.zip',
			'required'         => true,
			'force_activation' => false,
		),
		array(
			'name'             => 'DifferThemes Views',
			'slug'             => 'df_views',
			'source'           => DIFFER_THEME_PATH . '/plugins/df_views.zip',
			'required'         => true,
			'force_activation' => false,
		),
		array(
			'name'             => 'DifferThemes Likes',
			'slug'             => 'df_likes',
			'source'           => DIFFER_THEME_PATH . '/plugins/differ_likes.zip',
			'required'         => true,
			'force_activation' => false,
		),
		array(
			'name'             => 'DifferThemes KC Addons',
			'slug'             => 'df_kc_addons',
			'source'           => DIFFER_THEME_PATH . '/plugins/df_kc_addons.zip',
			'required'         => true,
			'force_activation' => false,
		),

	);

	$config = array(
		'id'           => 'embertheme',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'differ_register_required_plugins' );

<?php

if ( ! class_exists( 'Merlin' ) ) {
	return;
}


$wizard = new Merlin(
	$config = array(
		'directory'            => 'merlin', // Location / directory where Merlin WP is placed in your theme.
		'merlin_url'           => 'merlin',  // The wp-admin page slug where Merlin WP loads.
		'child_action_btn_url' => 'https://codex.wordpress.org/child_themes', // URL for the 'child-action-link'.
		'dev_mode'             => true, // Enable development mode for testing.
		'license_step'         => false, // EDD license activation step.
		'license_required'     => false, // Require the license activation step.
		'license_help_url'     => '', // URL for the 'license-tooltip'.
		'edd_remote_api_url'   => '', // EDD_Theme_Updater_Admin remote_api_url.
		'edd_item_name'        => '', // EDD_Theme_Updater_Admin item_name.
		'edd_theme_slug'       => '', // EDD_Theme_Updater_Admin item_slug.
	),
	$strings = array(
		'admin-menu'               => esc_html__( 'Theme Setup', '@@textdomain' ),
		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s'            => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', '@@textdomain' ),
		'return-to-dashboard'      => esc_html__( 'Return to the dashboard', '@@textdomain' ),
		'ignore'                   => esc_html__( 'Disable this wizard', '@@textdomain' ),
		'btn-skip'                 => esc_html__( 'Skip', '@@textdomain' ),
		'btn-next'                 => esc_html__( 'Next', '@@textdomain' ),
		'btn-start'                => esc_html__( 'Start', '@@textdomain' ),
		'btn-no'                   => esc_html__( 'Cancel', '@@textdomain' ),
		'btn-plugins-install'      => esc_html__( 'Install', '@@textdomain' ),
		'btn-child-install'        => esc_html__( 'Install', '@@textdomain' ),
		'btn-content-install'      => esc_html__( 'Install', '@@textdomain' ),
		'btn-import'               => esc_html__( 'Import', '@@textdomain' ),
		'btn-license-activate'     => esc_html__( 'Activate', '@@textdomain' ),
		'btn-license-skip'         => esc_html__( 'Later', '@@textdomain' ),
		/* translators: Theme Name */
		'license-header%s'         => esc_html__( 'Activate %s', '@@textdomain' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', '@@textdomain' ),
		/* translators: Theme Name */
		'license%s'                => esc_html__( 'Enter your license key to enable remote updates and theme support.', '@@textdomain' ),
		'license-label'            => esc_html__( 'License key', '@@textdomain' ),
		'license-success%s'        => esc_html__( 'The theme is already registered, so you can go to the next step!', '@@textdomain' ),
		'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', '@@textdomain' ),
		'license-tooltip'          => esc_html__( 'Need help?', '@@textdomain' ),
		/* translators: Theme Name */
		'welcome-header%s'         => esc_html__( 'Welcome to %s', '@@textdomain' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', '@@textdomain' ),
		'welcome%s'                => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', '@@textdomain' ),
		'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', '@@textdomain' ),
		'child-header'             => esc_html__( 'Install Child Theme', '@@textdomain' ),
		'child-header-success'     => esc_html__( 'You\'re good to go!', '@@textdomain' ),
		'child'                    => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', '@@textdomain' ),
		'child-success%s'          => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', '@@textdomain' ),
		'child-action-link'        => esc_html__( 'Learn about child themes', '@@textdomain' ),
		'child-json-success%s'     => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', '@@textdomain' ),
		'child-json-already%s'     => esc_html__( 'Awesome. Your child theme has been created and is now activated.', '@@textdomain' ),
		'plugins-header'           => esc_html__( 'Install Plugins', '@@textdomain' ),
		'plugins-header-success'   => esc_html__( 'You\'re up to speed!', '@@textdomain' ),
		'plugins'                  => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', '@@textdomain' ),
		'plugins-success%s'        => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', '@@textdomain' ),
		'plugins-action-link'      => esc_html__( 'Advanced', '@@textdomain' ),
		'import-header'            => esc_html__( 'Import Content', '@@textdomain' ),
		'import'                   => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.', '@@textdomain' ),
		'import-action-link'       => esc_html__( 'Advanced', '@@textdomain' ),
		'ready-header'             => esc_html__( 'All done. Have fun!', '@@textdomain' ),
		/* translators: Theme Author */
		'ready%s'                  => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', '@@textdomain' ),
		'ready-action-link'        => esc_html__( 'Extras', '@@textdomain' ),
		'ready-big-button'         => esc_html__( 'View your website', '@@textdomain' ),
		'ready-link-1'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://wordpress.org/support/', esc_html__( 'Explore WordPress', '@@textdomain' ) ),
		'ready-link-2'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://themebeans.com/contact/', esc_html__( 'Get Theme Support', '@@textdomain' ) ),
		'ready-link-3'             => sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'customize.php' ), esc_html__( 'Start Customizing', '@@textdomain' ) ),
	)
);



function merlin_import_files() {
	return array(
		array(
			'import_file_name'           => 'Ember Demo',
			'categories'                 => array( 'Main', 'Corporate', 'Marketing', 'Agency' ),
			'import_file_url'            => 'http://themeforest.differ-themes.com/demo-content/ember/content.xml',
			'import_widget_file_url'     => 'http://themeforest.differ-themes.com/demo-content/ember/widgets.wie',
			'import_customizer_file_url' => 'http://themeforest.differ-themes.com/demo-content/ember/customizer.dat',
			'import_preview_image_url'   => DIFFER_THEME_URL . '/screenshot.png',
			'preview_url'                => 'https://differ-themes.com/themeforest/wp/ember/',
		),
	);
}

add_filter( 'merlin_import_files', 'merlin_import_files' );


function differ_merlin_after_import_setup() {
// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
	set_theme_mod( 'nav_menu_locations',
		array(
			'main_menu' => $main_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home Slider' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

	update_field( 'field_5b2c06a0a665b', 1, 'option' );
	update_field( 'field_5b2bd717669ad', 'all', 'option' );
	update_field( 'field_5acb4db902b80', 'differ_themes', 'option' );
	update_field( 'field_5acb4def02b82', '3504282899.5dcead7.caf8685c4a014d17a679d600f3367c9f', 'option' );
	update_field( 'field_5abbc2710d299', '404  Page Not Found', 'option' );
	update_field( 'field_5aa3f0f57db5a', 'AIzaSyBGrMNnBDyhdtCRnOcXNaNwQdnk1ZKSWts', 'option' );
	update_field( 'field_5a9ac45b30601', 'Copyright &copy; 2018. All Rights Reserved', 'option' );


	$socials = array(
		array(
			'link' => '#',
			'icon' => 'fab fa-facebook-f',
		),
		array(
			'link' => '#',
			'icon' => 'fab fa-instagram',
		),
		array(
			'link' => '#',
			'icon' => 'fab fa-flickr',
		),
		array(
			'link' => '#',
			'icon' => 'fab fa-500px'
		),
		array(
			'link' => '#',
			'icon' => 'fab fa-twitter',
		),
		array(
			'link' => '#',
			'icon' => 'fab fa-pinterest-p',
		)
	);
	update_field( 'field_5a9920a84137b', $socials, 'option' );


	// Permalinks
	global $wp_rewrite;

	$wp_rewrite->set_permalink_structure( '/%postname%/' );
	update_option( "rewrite_rules", false );
	$wp_rewrite->flush_rules( true );


}

add_action( 'merlin_after_all_import', 'differ_merlin_after_import_setup' );
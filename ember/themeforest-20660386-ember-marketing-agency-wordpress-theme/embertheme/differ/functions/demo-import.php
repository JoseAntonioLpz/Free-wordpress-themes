<?php

function differ_import_files() {
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

add_filter( 'pt-ocdi/import_files', 'differ_import_files' );


function differ_after_import_setup() {

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

add_action( 'pt-ocdi/after_import', 'differ_after_import_setup' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );




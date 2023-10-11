<?php

/* Styles and Scripts in Admin PanelL */
function differ_add_scripts() {

	/** Register Style **/
	wp_register_style( 'differ-admin-css', DIFFER_URL . '/admin/assets/css/admin.css' );
	wp_register_style( 'bootstrap4-grid', DIFFER_URL . '/admin/assets/css/bootstrap4-grid.css' );
	wp_register_style( 'differ-admin-fontawesome-5', DIFFER_URL . '/admin/assets/font-awesome-5/css/fontawesome-all.css' );

	/** Include Styles **/
	wp_enqueue_style( 'bootstrap4-grid' );
	wp_enqueue_style( 'differ-admin-css' );
	wp_enqueue_style( 'differ-admin-fontawesome-5' );


	/** Customizer JS **/
	wp_enqueue_script( 'differ-customizer', DIFFER_URL . '/admin/assets/js/customizer.js', array( 'jquery' ) );
	$current_user = wp_get_current_user();
	wp_localize_script( 'differ-customizer',
		'user',
		array(
			'name' => $current_user->user_login
		) );

}

add_action( 'admin_enqueue_scripts', 'differ_add_scripts', 10 );



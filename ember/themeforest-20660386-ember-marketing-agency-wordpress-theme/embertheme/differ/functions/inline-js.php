<?php


function differ_inline_js() {


	/* Comments */
	$comments_obj = array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'loading'  => esc_attr( 'Loading', 'embertheme' ),
		'send'     => esc_attr( 'Post Comment', 'embertheme' ),
		'nonce'    => wp_create_nonce( 'differ_comments' )
	);
	wp_localize_script( 'differ-ajax-comments', 'emberComments', $comments_obj );




	/* Main Scripts */
	$scripts_object = array(
		'ajaxurl'          => admin_url( 'admin-ajax.php' ),
		'google_map_style' => differ_get_option( 'map_style' ),

	);
	wp_localize_script( 'differ-main-js', 'ember', $scripts_object );



}

add_action( 'wp_enqueue_scripts', 'differ_inline_js' );
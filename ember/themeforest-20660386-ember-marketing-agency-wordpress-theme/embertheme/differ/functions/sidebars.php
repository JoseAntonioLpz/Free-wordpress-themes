<?php

function differ_init_sidebars() {
	if ( function_exists( 'register_sidebar' ) ) {
		register_sidebar( array(
			'name'          => 'Blog Sidebar',
			'id'            => 'blog-sidebar',
			'description'   => esc_attr__( 'Sidebar on posts page', 'embertheme' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s" >',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget_title">',
			'after_title'   => '</h6>',
		) );

		register_sidebar( array(
			'name'          => 'Portfolio Sidebar',
			'id'            => 'portfolio-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s" >',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget_title">',
			'after_title'   => '</h6>',
		) );


		register_sidebar( array(
			'name'          => 'Footer Sidebar 1',
			'id'            => 'footer1-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s" >',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget_title">',
			'after_title'   => '</h6>',
		) );

		register_sidebar( array(
			'name'          => 'Footer Sidebar 2',
			'id'            => 'footer2-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s" >',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget_title">',
			'after_title'   => '</h6>',
		) );

		register_sidebar( array(
			'name'          => 'Footer Sidebar 3',
			'id'            => 'footer3-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s" >',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget_title">',
			'after_title'   => '</h6>',
		) );


	}
}

add_action( 'widgets_init', 'differ_init_sidebars' );

<?php
/**
 * The template for displaying social navigation.
 *
 * @package Akella
 */
?>

<nav class="social-navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'akella' ); ?>">
	<?php
		wp_nav_menu( array(
			'theme_location' => 'social',
			'menu_class'     => 'social-links-menu',
			'depth'          => 1,
			'link_before'    => '<span class="screen-reader-text">',
			'link_after'     => '</span>',
		) );
	?>
</nav><!-- .social-navigation -->

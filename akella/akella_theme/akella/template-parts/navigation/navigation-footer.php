<?php
/**
 * The template for displaying footer navigation.
 *
 * @package Akella
 */
?>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Secondary Menu', 'akella' ); ?>">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'secondary',
					'menu_class'     => 'secondary-menu',
					'depth'          => 1,
				) );
			?>
		</nav><!-- .footer-navigation -->
	</div><!-- .col-md-8.col-md-offset-2 -->
</div><!-- .row -->

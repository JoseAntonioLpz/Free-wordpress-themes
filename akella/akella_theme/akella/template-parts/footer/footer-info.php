<?php
/**
 * The template for displaying footer site info.
 *
 * @package Akella
 */
?>

<div class="site-footer-info">
	<?php
		/**
		 * Fires before the akella footer text for footer customization.
		 */
		do_action( 'akella_credits' );
	?>

	<span class="copyright">
		<?php echo get_theme_mod( 'copyright_text', esc_html__( 'Copyright 2017. All rights reserved.', 'akella' ) ); ?>
	</span>

	<?php if ( get_theme_mod( 'hide_author_link' ) == false ) : ?>
		&nbsp;<?php printf( esc_html__( 'Developed by', 'akella' ) ); ?>&nbsp;<a href="<?php echo esc_url( esc_html__( 'https://themeforest.net/user/v_kulesh?ref=v_kulesh', 'akella' ) ); ?>"><?php printf( esc_html__( 'Vladimir Kulesh', 'akella' ) ); ?></a>
	<?php endif; ?>
</div><!-- .site-footer-info -->

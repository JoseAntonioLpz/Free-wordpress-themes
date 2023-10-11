<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Akella
 */

$site_info_text = get_theme_mod( 'site_info_text', '' );
?>

				</div><!-- .container -->
			</div><!-- .row -->
		</div><!-- .site-content -->

		<footer id="colophon" class="site-footer">
			<div class="container">
				<?php if ( has_nav_menu( 'secondary' ) ) :
					get_template_part( 'template-parts/navigation/navigation', 'footer' );
				endif;

				get_template_part( 'template-parts/footer/footer', 'widgets' );

				if ( has_nav_menu( 'social' ) ) :
					get_template_part( 'template-parts/navigation/navigation', 'social' );
				endif;

				get_template_part( 'template-parts/footer/footer', 'info' ); ?>
			</div><!-- .container -->
		</footer><!-- .site-footer -->
	</div><!-- .site -->

	<!-- Scroll to top button -->
	<a id="scroll-to-top" class="scroll-to-top" href="#"></a>

	<?php wp_footer(); ?>
</body>
</html>

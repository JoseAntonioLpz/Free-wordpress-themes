<footer class="footer">


	<?php if ( is_active_sidebar( 'footer1-sidebar' ) || is_active_sidebar( 'footer2-sidebar' ) || is_active_sidebar( 'footer3-sidebar' ) ): ?>
        <div class="top footer-sidebars">
            <div class="container">
                <div class="sidebar-flex">
                    <div class="footer-sidebar footer1-sidebar">
						<?php dynamic_sidebar( 'footer1-sidebar' ); ?>
                    </div>
                    <div class="footer-sidebar footer2-sidebar">
						<?php dynamic_sidebar( 'footer2-sidebar' ); ?>
                    </div>
                    <div class="footer-sidebar footer3-sidebar">
						<?php dynamic_sidebar( 'footer3-sidebar' ); ?>
                    </div>
                </div>
            </div>
        </div>
	<?php endif; ?>


    <div class="bot">
        <div class="container">
            <div class="flex">

				<?php if ( differ_get_option( 'copyright' ) ): ?>
                    <div class="copy">
						<?php differ_the_option( 'copyright' ); ?>
                    </div>
				<?php else: ?>
                    <div class="copy">
                        <p>
							<?php echo esc_attr( date( 'Y' ) ); ?>
							<?php esc_attr_e( "All Right Reserved ", 'embertheme' ); ?>
                        </p>
                    </div>
				<?php endif; ?>

				<?php if ( function_exists( 'have_rows' ) && have_rows( 'socials_networks_list', 'option' ) ): ?>
                    <div class="social">
						<?php while ( have_rows( 'socials_networks_list', 'option' ) ): the_row(); ?>
                            <a href="<?php the_sub_field( 'link' ); ?>"><i class="<?php the_sub_field( 'icon' ); ?>"></i></a>
						<?php endwhile; ?>
                    </div>
				<?php endif; ?>

            </div>
        </div>
    </div>

</footer>


<?php get_theme_mod( 'up_button', true ) ? get_template_part( 'includes/up_button' ) : null; ?>

<?php wp_footer(); ?>
</body>
</html>


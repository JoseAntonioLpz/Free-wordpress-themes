<?php
/**
 * The template for displaying site main navigation.
 *
 * @package Akella
 */
?>

<div class="site-navigation">
	<form role="search" method="get" class="site-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<button type="button" class="button-search"><span class="screen-reader-text"><?php esc_html_e( 'Search', 'akella' ); ?></span></button>

		<div class="search-input-wrapper">
			<label>
				<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'akella' ); ?></span>
				<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'akella' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
			</label>
			<button type="button" class="button-search-close"><span class="screen-reader-text"><?php esc_html_e( 'Close', 'akella' ); ?></span></button>
		</div>
	</form><!-- .site-search-form -->

	<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<button id="menu-toggle" class="menu-toggle">
			<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'akella' ); ?></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button><!-- .menu-toggle -->

		<nav id="main-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'akella' ); ?>">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'     => 'primary-menu',
				) );
			?>
		</nav><!-- .main-navigation -->
	<?php endif; ?>
</div><!-- .site-navigation -->

<?php
// Navigation Type (fixed_on_scroll | fixed_fill  | static_fill | static_transparent)
$desktop_nav_type = get_theme_mod( 'desktop_nav_type', 'fixed_on_scroll' );
$mobile_nav_type  = get_theme_mod( 'mobile_nav_type', 'fixed' );


if ( differ_get_field( 'desktop_navigation_type' ) !== 'global' && ! empty( differ_get_field( 'desktop_navigation_type' ) ) ) {
	$desktop_nav_type = differ_get_field( 'desktop_navigation_type' );
}

if ( differ_get_field( 'mob_navigation_type' ) !== 'global' && ! empty( differ_get_field( 'mob_navigation_type' ) ) ) {
	$mobile_nav_type = differ_get_field( 'mob_navigation_type' );
}

?>

<nav class="nav" data-desktop-type="<?php echo esc_attr( $desktop_nav_type ); ?>" data-mobile-type="<?php echo esc_attr( $mobile_nav_type ); ?>">

    <div class="container">
        <div class="menu-flex">
            <div class="logo">
                <a href="<?php echo esc_url( home_url( "/" ) ); ?>">
					<?php if ( get_theme_mod( 'logo_type', 'image' ) == 'image' ): ?>
						<?php $image = get_theme_mod( 'logo_img', DIFFER_THEME_URL . '/assets/img/logo.png' ) ?>
                        <img src="<?php echo esc_url( $image ); ?>" alt="Logo">
					<?php elseif ( get_theme_mod( 'logo_type', 'image' ) == 'text' ): ?>
						<?php echo esc_attr( get_theme_mod( 'logo_text', DIFFER_SHORTNAME ) ); ?>
					<?php endif; ?>
                </a>
            </div>
			<?php if ( has_nav_menu( 'main_menu' ) ) { ?>
				<?php $args = array(
					'theme_location' => 'main_menu',
					'menu_class'     => 'menu menu-header',
					'walker'         => new Differ_Nav_Walker(),
				);
				wp_nav_menu( $args );
			} else { ?>
                <ul class="menu">
                    <li class=" menu-item no-menu">
                        <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>" target="_blank">
                            <span><?php esc_html_e( 'Please register Menu in ', 'embertheme' ); ?></span>
							<?php esc_html_e( ' Appearance / Menus', 'embertheme' ); ?></a>
                    </li>
                </ul>
			<?php } ?>

			<?php if ( function_exists( 'have_rows' ) && get_theme_mod( 'desktop_nav_socials', '0' ) && have_rows( 'socials_networks_list', 'option' ) ) {
				$socials_nav = true;
			} else {
				$socials_nav = false;
			}
			?>

			<?php if ( isset( $_GET['nav_socials'] ) ): $socials_nav = $_GET['nav_socials']; endif; ?>

			<?php if ( $socials_nav ): ?>
                <div class="socials">
					<?php while ( have_rows( 'socials_networks_list', 'option' ) ) : the_row(); ?>
                        <a href="<?php the_sub_field( 'link' ); ?>" data-tooltip="top">
                            <i class="<?php the_sub_field( 'icon' ); ?>"></i>
                        </a>
					<?php endwhile; ?>
                </div>
			<?php endif; ?>


            <div class="menu-icon-wrap">
                <!-- Mobile menu icon -->
                <div class="menu-icon ">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
            </div>

        </div>
    </div>

</nav>


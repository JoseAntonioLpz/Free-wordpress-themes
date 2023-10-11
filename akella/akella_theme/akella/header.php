<?php
/**
 * The template for displaying the header.
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Akella
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'akella' ); ?></a>

		<header id="masthead" class="site-header">
			<div class="container">
				<div class="site-branding">
					<?php akella_the_custom_logo(); ?>

					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo esc_attr( $description ); ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<?php if ( has_nav_menu( 'primary' ) ) :
					get_template_part( 'template-parts/navigation/navigation', 'site' );
				endif; ?>
			</div><!-- .container -->
		</header><!-- .site-header -->

		<?php if ( get_query_var( 'paged' ) == 0 && is_front_page() && is_home() ) :
			get_template_part( 'template-parts/header/header', 'featured' );
		endif; ?>

		<div id="content" class="site-content">
			<div class="container">
				<div class="row">

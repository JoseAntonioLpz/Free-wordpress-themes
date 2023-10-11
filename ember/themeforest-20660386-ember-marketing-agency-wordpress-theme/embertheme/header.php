<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-transcluent">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?>">
    <meta name="application-name" content="<?php bloginfo( 'name' ); ?>">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php get_theme_mod( 'theme_preloader_enable' ) ? get_template_part( 'includes/preloader' ) : null; ?>

<!-- Navigation  -->
<?php get_template_part( 'includes/navigation' ); ?>

<!-- Breadcrumbs -->
<?php get_template_part( 'includes/breadcrumbs' ); ?>


<?php


array(
	'singular' => esc_attr__( 'Name', 'textdomain' )
);


$var = esc_attr__( 'Name', 'textdomain' );


?>



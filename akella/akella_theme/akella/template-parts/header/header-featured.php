<?php
/**
 * The template for displaying header featured content.
 *
 * @package Akella
 */

$header_featured_content = get_theme_mod( 'header_featured_content', 'image' );
?>

<?php
if ( $header_featured_content !== 'none' ) :
  // Display Header Featured Ccontent.
  get_template_part( 'template-parts/header/header', $header_featured_content );
endif; ?>

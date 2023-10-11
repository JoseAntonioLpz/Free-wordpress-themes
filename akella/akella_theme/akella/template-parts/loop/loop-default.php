<?php
/**
 * Template part for displaying loop.
 *
 * @package Akella
 */

?>

<?php
/* Start the Loop */
while ( have_posts() ) : the_post();

	/*
	 * Include the Post-Format-specific template for the content.
	 * If you want to override this in a child theme, then include a file
	 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
	 */
	if ( is_search() ) {
		get_template_part( 'template-parts/content/content', 'search' );
	} else {
		get_template_part( 'template-parts/content/content', get_post_format() );
	}

endwhile;
?>

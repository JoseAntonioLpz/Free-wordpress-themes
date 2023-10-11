<?php
/**
 * The template for displaying all single posts and attachments.
 *
 * @package Akella
 */

get_header(); ?>

<div id="primary" class="<?php akella_content_area_classes(); ?> content-area">
	<main id="main" class="site-main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content/content', 'single' );

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => wp_kses( _x( '<span class="nav-link-meta"><span class="meta-nav">Published in</span><span class="post-title">%title</span></span>', 'Parent post link', 'akella' ), array( 'span' => array( 'class' => array() ) ) ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				akella_the_post_navigation();
			}

			// Include biography template.
			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/content/biography' );
			}

			// Include related posts template.
			if ( true === get_theme_mod( 'related_posts', true ) ) {
				akella_related_posts();
			}

			get_template_part( 'template-parts/content/content', 'widgets-1' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

		// End of the loop.
		endwhile; ?>

	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_template_part( 'template-parts/content/content', 'widgets-2' ); ?>
<?php get_footer(); ?>

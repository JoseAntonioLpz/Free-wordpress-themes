<?php
/**
 * The template used for displaying page content.
 *
 * @package Akella
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'akella' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<div class="entry-header-meta"><span class="edit-link">',
			'</span></div><!-- .entry-header-meta -->'
		); ?>
	</header><!-- .entry-header -->

	<?php akella_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		if ( is_singular() ) :
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'akella' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'akella' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		endif; ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

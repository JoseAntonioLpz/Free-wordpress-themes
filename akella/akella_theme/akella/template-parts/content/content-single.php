<?php
/**
 * The template part for displaying single posts.
 *
 * @package Akella
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-header-meta">
			<?php akella_entry_header_meta(); ?>
			<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'akella' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			); ?>
		</div><!-- .entry-header-meta -->
	</header><!-- .entry-header -->

	<?php akella_post_thumbnail(); ?>

	<?php akella_excerpt(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'akella' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'akella' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );

		if ( '' !== get_the_author_meta( 'description' ) ) {
			get_template_part( 'template-parts/biography' );
		} ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="entry-footer-meta">
			<?php akella_entry_footer_meta(); ?>
		</div><!-- .entry-footer-meta -->
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

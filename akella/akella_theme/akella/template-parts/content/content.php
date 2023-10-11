<?php
/**
 * The template part for displaying content.
 *
 * @package Akella
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php esc_html_e( 'Featured', 'akella' ); ?></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

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
		/* translators: %s: Name of current post */
		the_content( sprintf(
			esc_html__( 'Read more%s', 'akella' ),
			the_title( '<span class="screen-reader-text"> "', '"</span>', false )
		) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="entry-footer-meta">
			<?php akella_entry_footer_meta(); ?>
		</div><!-- .entry-footer-meta -->
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

<?php
/**
 * The template part for displaying results in search pages.
 *
 * @package Akella
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
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
					);
				?>
			</div><!-- .entry-header-meta -->
		<?php else : ?>
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'akella' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<div class="entry-header-meta"><span class="edit-link">',
					'</span></div><!-- .entry-header-meta -->'
				);
			?>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php akella_post_thumbnail(); ?>

	<?php akella_excerpt(); ?>

	<?php if ( 'post' === get_post_type() ) : ?>
		<footer class="entry-footer">
			<div class="entry-footer-meta">
				<?php akella_entry_footer_meta(); ?>
			</div><!-- .entry-footer-meta -->
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->

<?php
/**
 * The template for displaying image attachments.
 *
 * @package Akella
 */

get_header(); ?>

	<div id="primary" class="<?php akella_content_area_classes(); ?> content-area">
		<main id="main" class="site-main">

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<nav id="image-navigation" class="navigation image-navigation">
						<div class="nav-links">
							<div class="nav-previous"><?php previous_image_link( false, esc_html__( 'Previous Image', 'akella' ) ); ?></div>
							<div class="nav-next"><?php next_image_link( false, esc_html__( 'Next Image', 'akella' ) ); ?></div>
						</div><!-- .nav-links -->
					</nav><!-- .image-navigation -->

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

					<div class="entry-content">

						<div class="entry-attachment">
							<?php
							/**
							 * Filter the default akella image attachment size.
							 *
							 * @param string $image_size Image size. Default 'large'.
							 */
							$image_size = apply_filters( 'akella_attachment_size', 'large' );

							echo wp_get_attachment_image( get_the_ID(), $image_size ); ?>

							<?php akella_excerpt( 'entry-caption' ); ?>

						</div><!-- .entry-attachment -->

						<?php
						the_content();
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'akella' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'akella' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) ); ?>
					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<div class="entry-footer-meta">
							<?php
							// Retrieve attachment metadata.
							$metadata = wp_get_attachment_metadata();
							if ( $metadata ) {
								printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
									esc_html_x( 'Full size', 'Used before full size attachment link.', 'akella' ),
									esc_url( wp_get_attachment_url() ),
									absint( $metadata['width'] ),
									absint( $metadata['height'] )
								);
							} ?>
						</div><!-- .entry-footer-meta -->
					</footer><!-- .entry-footer -->
				</article><!-- #post-## -->

				<?php
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => wp_kses( _x( '<span class="nav-link-meta"><span class="meta-nav">Published in</span><span class="post-title">%title</span></span>', 'Parent post link', 'akella' ), array( 'span' => array( 'class' => array() ) ) ),
				) );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			// End the loop.
			endwhile;
			?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

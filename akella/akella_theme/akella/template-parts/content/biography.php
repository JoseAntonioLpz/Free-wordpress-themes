<?php
/**
 * The template part for displaying an Author biography.
 *
 * @package Akella
 */
?>

<div class="author-info">
	<div class="author-avatar">
		<?php
		/**
		 * Filter the Akella author bio avatar size.
		 *
		 * @param int $size The avatar height and width size in pixels.
		 */
		$author_bio_avatar_size = apply_filters( 'akella_author_bio_avatar_size', 80 );

		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
	</div><!-- .author-avatar -->

	<div class="author-description">
		<h2 class="author-title">
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php printf( esc_html__( 'View all posts by %s', 'akella' ), get_the_author() ); ?>" rel="author"><?php echo get_the_author(); ?></a>
		</h2>

		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
		</p><!-- .author-bio -->
	</div><!-- .author-description -->
</div><!-- .author-info -->

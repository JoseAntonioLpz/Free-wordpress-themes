<?php
/**
 * Custom Akella template tags
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Akella
 */


if ( ! function_exists( 'akella_entry_header_meta' ) ) :
/**
 * Prints HTML with meta information for the post format, categories and date.
 *
 * Create your own akella_entry_header_meta() function to override in a child theme.
 */
function akella_entry_header_meta() {
	if ( 'post' === get_post_type() ) {
		akella_entry_categories();
	}

	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		akella_entry_date();
	}

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', esc_html_x( 'Format', 'Used before post format.', 'akella' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}
}
endif;

if ( ! function_exists( 'akella_entry_footer_meta' ) ) :
/**
 * Prints HTML with meta information for the tags, author and comments.
 *
 * Create your own akella_entry_footer_meta() function to override in a child theme.
 */
function akella_entry_footer_meta() {
	if ( is_singular() && 'post' === get_post_type() ) {
		akella_entry_tags();
	}

	if ( 'post' === get_post_type() ) {
		$author_avatar_size = apply_filters( 'akella_author_avatar_size', 20 );
		printf( '<span class="byline"><span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>',
			get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
			esc_html_x( 'Author', 'Used before post author name.', 'akella' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
	}

	if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( sprintf( wp_kses( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'akella' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'akella_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own akella_entry_date() function to override in a child theme.
 */
function akella_entry_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		get_the_date(),
		esc_attr( get_the_modified_date( 'c' ) ),
		get_the_modified_date()
	);

	printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
		esc_html_x( 'Posted on', 'Used before publish date.', 'akella' ),
		esc_url( get_permalink() ),
		$time_string
	);
}
endif;

if ( ! function_exists( 'akella_entry_categories' ) ) :
/**
 * Prints HTML with categories for current post.
 *
 * Create your own akella_entry_categories() function to override in a child theme.
 */
function akella_entry_categories() {
	$categories_list = get_the_category_list( esc_html_x( ', ', 'Used between list items, there is a space after the comma.', 'akella' ) );
	if ( $categories_list && akella_categorized_blog() ) {
		printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			esc_html_x( 'Categories', 'Used before category names.', 'akella' ),
			$categories_list
		);
	}
}
endif;

if ( ! function_exists( 'akella_entry_tags' ) ) :
/**
 * Prints HTML with tags for current post.
 *
 * Create your own akella_entry_tags() function to override in a child theme.
 */
function akella_entry_tags() {
	$tags_list = get_the_tag_list( '', wp_kses( _x( '<span class="screen-reader-text">, </span>', 'Used between list items, there is a space after the comma.', 'akella' ), array( 'span' => array( 'class' => array() ) ) ) );
	if ( $tags_list ) {
		printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			esc_html_x( 'Tags', 'Used before tag names.', 'akella' ),
			$tags_list
		);
	}
}
endif;

if ( ! function_exists( 'akella_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * Create your own akella_post_thumbnail() function to override in a child theme.
 */
function akella_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) : ?>

	<div class="post-thumbnail">
		<?php if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			the_post_thumbnail( 'akella-thumbnail-large' );
		} else {
			the_post_thumbnail( 'akella-thumbnail-medium' );
		} ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php esc_url( the_permalink() ); ?>" aria-hidden="true">
		<?php if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			the_post_thumbnail( 'akella-thumbnail-large', array( 'alt' => the_title_attribute( 'echo=0' ) ) );
		} else {
			the_post_thumbnail( 'akella-thumbnail-medium', array( 'alt' => the_title_attribute( 'echo=0' ) ) );
		} ?>
	</a>

	<?php endif; // End is_singular()
}
endif;

if ( ! function_exists( 'akella_excerpt' ) ) :
	/**
	 * Displays the optional excerpt.
	 *
	 * Wraps the excerpt in a div element.
	 *
	 * Create your own akella_excerpt() function to override in a child theme.
	 *
	 * @param string $class Optional. Class string of the div element. Defaults to 'entry-summary'.
	 */
	function akella_excerpt( $class = 'entry-summary' ) {
		if ( has_excerpt() || is_search() ) : ?>
			<div class="<?php echo esc_attr( $class ); ?>">
				<?php the_excerpt(); ?>
			</div><!-- .<?php echo esc_attr( $class ); ?> -->
		<?php endif;
	}
endif;

if ( ! function_exists( 'akella_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * Create your own akella_excerpt_more() function to override in a child theme.
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function akella_excerpt_more() {
	$link = sprintf( '<br /><br /><a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( wp_kses( __( 'Read more<span class="screen-reader-text"> "%s"</span>', 'akella' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'akella_excerpt_more' );
endif;

if ( ! function_exists( 'akella_categorized_blog' ) ) :
/**
 * Determines whether blog/site has more than one category.
 *
 * Create your own akella_categorized_blog() function to override in a child theme.
 *
 * @return bool True if there is more than one category, false otherwise.
 */
function akella_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'akella_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'akella_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so akella_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so akella_categorized_blog should return false.
		return false;
	}
}
endif;

/**
 * Flushes out the transients used in akella_categorized_blog().
 */
function akella_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'akella_categories' );
}
add_action( 'edit_category', 'akella_category_transient_flusher' );
add_action( 'save_post',     'akella_category_transient_flusher' );

if ( ! function_exists( 'akella_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 */
function akella_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

if ( ! function_exists( 'akella_post_card' ) ) :
/**
 * Prints Post Card HTML.
 *
 * Create your own akella_post_card() function to override in a child theme.
 *
 * @param string $classes Post-card classes.
 * @param string $thumbnail_size Post-card thumbnail size.
 * @param bool True for display post-card caption, false otherwise.
 * @return string Prints Post Card HTML.
 */
function akella_post_card( $classes = '', $thumbnail_size = 'null', $content = true, $show_id = true ) {
	if ( has_post_thumbnail() && $thumbnail_size !== 'null' ) {
		if ( ! $classes ) {
			$post_card_classes = 'post-card has-post-thumbnail';
		} else {
			$post_card_classes = join( ' ', array( 'post-card has-post-thumbnail', $classes ) );
		}
	} else {
		if ( ! $classes ) {
			$post_card_classes = 'post-card';
		} else {
			$post_card_classes = join( ' ', array( 'post-card', $classes ) );
		}
	} ?>

	<article <?php if ( false !== $show_id ) : ?>id="post-<?php the_ID(); ?>"<?php endif; ?> class="<?php echo esc_attr( $post_card_classes ); ?>">
		<?php if ( has_post_thumbnail() && $thumbnail_size !== 'null' ) : ?>
			<div class="post-card-media">
				<a class="post-card-thumbnail" href="<?php esc_url( the_permalink() ); ?>" aria-hidden="true">
					<?php the_post_thumbnail( $thumbnail_size, array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
				</a>
			</div><!-- .post-card-media -->
		<?php endif; ?>

		<div class="post-card-caption">
			<header class="post-card-header">
				<?php if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) : ?>
					<div class="post-card-header-meta">
						<?php if ( 'post' === get_post_type() ) {
							akella_entry_categories();
						}

						akella_entry_date(); ?>
					</div><!-- .post-card-header-meta -->
				<?php endif; ?>

				<?php the_title( sprintf( '<h2 class="post-card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header><!-- .post-card-header -->

			<?php if ( false !== $content ) : ?>
				<div class="post-card-content">
					<?php
					$content = get_the_content( '' );
					$content = strip_tags( $content );
					if ( has_post_thumbnail() && $thumbnail_size !== 'null' ) {
						echo substr( $content, 0, 120 );
					} else {
						echo substr( $content, 0, 300 );
					} ?>...
				</div><!-- .post-card-content -->
			<?php endif; ?>

			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
				<footer class="post-card-footer">
					<div class="post-card-footer-meta">
						<?php echo '<span class="comments-link">';
						comments_popup_link( sprintf( wp_kses( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'akella' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
						echo '</span>'; ?>
					</div><!-- .post-card-footer-meta -->
				</footer><!-- .post-card-footer -->
			<?php endif; ?>
		</div><!-- .post-card-caption -->
	</article><!-- .post-card -->

<?php
}
endif;

if ( ! function_exists( 'akella_the_post_navigation' ) ) :
/**
 * Prints HTML for previous/next post navigation.
 *
 * Create your own akella_the_post_navigation() function to override in a child theme.
 */
function akella_the_post_navigation() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'akella-thumbnail-extra-small' );
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'akella-thumbnail-extra-small' );
	}
?>

<nav class="navigation post-navigation">
	<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'akella' ); ?></h2>

	<div class="nav-links">
		<?php if ( $previous ) : ?>
			<div class="nav-previous">
				<a href="<?php echo esc_url( get_permalink( $previous->ID ) ); ?>" rel="prev">
					<?php if ( has_post_thumbnail( $previous->ID ) ) : ?>
						<span class="nav-link-thumbnail"><img src="<?php echo esc_url( $prevthumb[0] ); ?>" alt="<?php echo get_the_title( $previous->ID ); ?>"></span>
					<?php endif; ?>
					<span class="nav-link-meta">
						<span class="meta-nav" aria-hidden="true"><?php esc_html_e( 'Previous', 'akella' ); ?></span>
						<span class="screen-reader-text"><?php esc_html_e( 'Previous post:', 'akella' ); ?></span>
						<span class="post-title"><?php echo get_the_title( $previous->ID ); ?></span>
					</span>
				</a>
			</div>
		<?php endif;

		if ( $next ) : ?>
			<div class="nav-next">
				<a href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>" rel="next">
					<span class="nav-link-meta">
						<span class="meta-nav" aria-hidden="true"><?php esc_html_e( 'Next', 'akella' ); ?></span>
						<span class="screen-reader-text"><?php esc_html_e( 'Next post:', 'akella' ); ?></span>
						<span class="post-title"><?php echo get_the_title( $next->ID ); ?></span>
					</span>
					<?php if ( has_post_thumbnail( $next->ID ) ) : ?>
						<span class="nav-link-thumbnail"><img src="<?php echo esc_url( $nextthumb[0] ); ?>" alt="<?php echo get_the_title( $previous->ID ); ?>"></span>
					<?php endif; ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
</nav>

<?php
}
endif;

if ( ! function_exists( 'akella_related_posts' ) ) :
/**
 * Prints HTML for related posts.
 *
 * Create your own akella_related_posts() function to override in a child theme.
 */
function akella_related_posts() {
	if ( ! is_single() ) {
		return;
	}

	global $post;
	$categories = get_the_category( $post->ID );
	$categories_array = '';

	if ( $categories ) {
		foreach ( $categories as $category ) {
			$categories_array .= $category->slug . ',';
		}

		// Params for our query.
		$args = array(
			'post_type'           => 'post',
			'post__not_in'        => array( $post->ID ),
			'post_status'         => 'publish',
			'posts_per_page'      => 2,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
			'category_name'       => $categories_array,
			'orderby'             => 'rand'
		);

		// The Query.
		$related_posts = new WP_Query( $args );

		// The loop.
		if ( $related_posts->have_posts() ) : ?>
			<section class="related-posts-section">

				<div class="related-posts-title">
					<h3><span><?php esc_html_e( 'Related Posts', 'akella' ); ?></span></h3>
				</div><!-- .related-posts-title -->

				<div class="related-posts">
					<div class="row">
						<?php
						// Start the loop.
						while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
							<div class="col-sm-6 related-posts-item">
								<?php
								/* Print post-card-specific template. */
								akella_post_card( '', 'akella-thumbnail-small' ); ?>
							</div>
						<?php
						// End the loop.
						endwhile; ?>
					</div><!-- .row -->
				</div><!-- .related-posts -->

			</section><!-- .related-posts -->
		<?php endif;
	}

	// Restore original Post Data
	wp_reset_postdata();
}
endif;

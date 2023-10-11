<?php
/**
 * The template for displaying search results pages.
 *
 * @package Akella
 */

get_header();

$akella_layout = get_theme_mod( 'akella_layout', 'default' );
?>

	<section id="primary" class="<?php akella_content_area_classes(); ?> content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'akella' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			// Start the loop.
			get_template_part( 'template-parts/loop/loop', $akella_layout );

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => esc_html__( 'Previous', 'akella' ),
				'next_text'          => esc_html__( 'Next', 'akella' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'akella' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

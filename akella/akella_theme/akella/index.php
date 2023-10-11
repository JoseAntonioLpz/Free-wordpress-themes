<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Akella
 */

get_header();

$akella_layout = get_theme_mod( 'akella_layout', 'default' );
?>

	<div id="primary" class="<?php akella_content_area_classes(); ?> content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif;

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
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

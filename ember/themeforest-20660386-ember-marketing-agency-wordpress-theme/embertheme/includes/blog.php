<?php
$blog_type = get_theme_mod( 'blog_type', 'right_sidebar' );

if ( isset( $_GET['blog'] ) ): $blog_type = $_GET['blog']; endif;

$sticky_sidebar = get_theme_mod( 'sticky_sidebar', true );



if ( isset( $_GET['sidebar'] ) ): $sticky_sidebar = $_GET['sidebar']; endif;

$pagination_align = get_theme_mod( 'pagination-align', 'center' );



?>

<?php if ( $blog_type == 'right_sidebar' ): ?>

    <div class="blog-wrapper blog-list right-sidebar">
        <div class="container">
            <div class="row no-margin">
                <!-- Posts -->
                <div class="posts-wrap col-lg-12 col-xl-8">
                    <main class="story">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<?php if ( has_post_format( 'video' ) ) {
								get_template_part( 'includes/posts/video' );
							} ?>

							<?php if ( has_post_format( 'gallery' ) ) {
								get_template_part( 'includes/posts/gallery' );
							} ?>

							<?php if ( has_post_format( 'link' ) ) {
								get_template_part( 'includes/posts/link' );
							} ?>
							<?php if ( ! has_post_format() ) {
								get_template_part( 'includes/posts/standart' );
							} ?>

						<?php endwhile; else: ?>
							<?php get_template_part( 'includes/notfound' ) ?>
						<?php endif; ?>

						<?php global $wp_query; ?>
						<?php if ( $wp_query->max_num_pages > 1 ) { ?>
                            <div class="pagination-wrap <?php echo esc_attr( $pagination_align ); ?>">
								<?php
								if ( function_exists( 'differ_pagination' ) ) {
									differ_pagination();
								} else {
									the_posts_navigation();
								}
								?>
                            </div>
						<?php } ?>
                    </main>
                </div>

                <!-- Sidebar -->
                <div class="sidebar-wrap <?php $sticky_sidebar ? print 'sticky-sidebar-wrap' : false; ?> col-lg-12 col-xl-4">
                    <aside class="sidebar blog-sidebar">
						<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'blog-sidebar' ); ?>
						<?php } ?>
                    </aside>
                </div>

            </div>
        </div>
    </div>

<?php elseif ( $blog_type == 'left_sidebar' ): ?>

    <div class="blog-wrapper blog-list left-sidebar">
        <div class="container">
            <div class="row no-margin">
                <!-- Sidebar -->
                <div class="sidebar-wrap <?php $sticky_sidebar ? print 'sticky-sidebar-wrap' : false; ?> col-lg-12  col-xl-4">
                    <aside class="sidebar blog-sidebar">
						<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'blog-sidebar' ); ?>
						<?php } ?>
                    </aside>
                </div>

                <!-- Posts -->
                <div class="posts-wrap col-lg-12  col-xl-8">
                    <main class="story">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<?php if ( has_post_format( 'video' ) ) {
								get_template_part( 'includes/posts/video' );
							} ?>

							<?php if ( has_post_format( 'gallery' ) ) {
								get_template_part( 'includes/posts/gallery' );
							} ?>

							<?php if ( has_post_format( 'link' ) ) {
								get_template_part( 'includes/posts/link' );
							} ?>
							<?php if ( ! has_post_format() ) {
								get_template_part( 'includes/posts/standart' );
							} ?>

						<?php endwhile; else: ?>
							<?php get_template_part( 'includes/notfound' ) ?>
						<?php endif; ?>

						<?php global $wp_query; ?>
						<?php if ( $wp_query->max_num_pages > 1 ) { ?>
                            <div class="pagination-wrap <?php echo esc_attr( $pagination_align ); ?>">
								<?php
								if ( function_exists( 'differ_pagination' ) ) {
									differ_pagination();
								} else {
									the_posts_navigation();
								}
								?>
                            </div>
						<?php } ?>
                    </main>
                </div>
            </div>
        </div>
    </div>

<?php elseif ( $blog_type == 'wide' ): ?>

    <div class="blog-wrapper blog-list blog-wide">
        <div class="container">
            <div class="row no-margin flex-center">
                <!-- Posts -->
                <div class="posts-wrap col-lg-12 col-xl-10">
                    <main class="story">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<?php if ( has_post_format( 'video' ) ) {
								get_template_part( 'includes/posts/video' );
							} ?>

							<?php if ( has_post_format( 'gallery' ) ) {
								get_template_part( 'includes/posts/gallery' );
							} ?>

							<?php if ( has_post_format( 'link' ) ) {
								get_template_part( 'includes/posts/link' );
							} ?>
							<?php if ( ! has_post_format() ) {
								get_template_part( 'includes/posts/standart' );
							} ?>

						<?php endwhile; else: ?>
							<?php get_template_part( 'includes/notfound' ) ?>
						<?php endif; ?>

						<?php global $wp_query; ?>
						<?php if ( $wp_query->max_num_pages > 1 ) { ?>

                            <div class="pagination-wrap <?php echo esc_attr( $pagination_align ); ?>">
								<?php
								if ( function_exists( 'differ_pagination' ) ) {
									differ_pagination();
								} else {
									the_posts_navigation();
								}
								?>
                            </div>


						<?php } ?>
                    </main>
                </div>

            </div>
        </div>
    </div>


<?php endif; ?>
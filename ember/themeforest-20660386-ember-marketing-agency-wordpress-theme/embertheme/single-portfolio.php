<?php get_header(); ?>

<?php
$post_template  = differ_get_field( 'post_template' ) ? differ_get_field( 'post_template' ) : 'right_sidebar';
$sticky_sidebar = get_theme_mod( 'sticky_sidebar', true );
?>

<?php if ( $post_template == 'right_sidebar' ): ?>

    <div class="blog-wrapper blog-list right-sidebar portfolio-wrapper">
        <div class="container">
            <div class="row no-margin">

                <div class="posts-wrap col-lg-12 col-xl-8">
                    <main class="post-single portfolio-single">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'includes/portfolio-single' ); ?>

						<?php endwhile; else: ?>
							<?php get_template_part( 'includes/notfound' ) ?>
						<?php endif; ?>
                    </main>
                </div>

                <!-- Sidebar -->
                <div class="sidebar-wrap <?php $sticky_sidebar ? print 'sticky-sidebar-wrap' : false; ?> col-lg-12 col-xl-4">
                    <aside class="sidebar blog-sidebar">
						<?php if ( is_active_sidebar( 'portfolio-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'portfolio-sidebar' ); ?>
						<?php } ?>
                    </aside>
                </div>

            </div>
        </div>
    </div>

<?php elseif ( $post_template == 'left_sidebar' ): ?>

    <div class="blog-wrapper blog-list left-sidebar portfolio-wrapper">
        <div class="container">
            <div class="row no-margin">

                <!-- Sidebar -->
                <div class="sidebar-wrap <?php $sticky_sidebar ? print 'sticky-sidebar-wrap' : false; ?> col-lg-12 col-xl-4">
                    <aside class="sidebar blog-sidebar">
						<?php if ( is_active_sidebar( 'portfolio-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'portfolio-sidebar' ); ?>
						<?php } ?>
                    </aside>
                </div>

                <div class="posts-wrap col-lg-12 col-xl-8">
                    <main class="post-single portfolio-single">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'includes/portfolio-single' ); ?>

						<?php endwhile; else: ?>
							<?php get_template_part( 'includes/notfound' ) ?>
						<?php endif; ?>
                    </main>
                </div>
            </div>
        </div>
    </div>


<?php elseif ( $post_template == 'wide' ): ?>

    <div class="blog-wrapper blog-list  portfolio-wrapper">
        <div class="container">
            <div class="row no-margin">
                <div class="posts-wrap col-lg-12 offset-xl-1 col-xl-10">
                    <main class="post-single portfolio-single">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'includes/portfolio-single' ); ?>

						<?php endwhile; else: ?>
							<?php get_template_part( 'includes/notfound' ) ?>
						<?php endif; ?>
                    </main>
                </div>
            </div>
        </div>
    </div>


<?php endif; ?>


<?php get_footer(); ?>
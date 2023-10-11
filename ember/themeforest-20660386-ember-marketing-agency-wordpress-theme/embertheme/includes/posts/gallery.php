<article <?php post_class( 'post' ); ?> id="post-<?php the_ID() ?>" data-post-id="<?php the_ID() ?>">
	<?php

	/* Slick Slider */
	wp_enqueue_style( 'differ-slick-css' );
	wp_enqueue_script( 'differ-slick-js' );

	$images = differ_get_field( 'gallery' ); ?>

	<?php if ( $images || has_post_thumbnail() ): ?>

        <div class="thumbnail-wrap">

			<?php if ( $images ) { ?>

                <!-- Gallery -->
                <div class="post-gallery">
					<?php foreach ( $images as $image ): ?>




                        <img src="<?php echo esc_attr( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">


					<?php endforeach; ?>
                </div>

			<?php } elseif ( has_post_thumbnail() ) { ?>

                <!-- Thumbnail -->
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php the_post_thumbnail_url( 'differ_post_blogimg' ); ?>" alt="<?php the_title(); ?>">
                </a>

			<?php } ?>

        </div>

	<?php endif; ?>


	<?php get_template_part( 'includes/posts/post_footer' ); ?>
</article>



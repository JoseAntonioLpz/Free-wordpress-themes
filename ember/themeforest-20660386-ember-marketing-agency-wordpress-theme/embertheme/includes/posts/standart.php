<article <?php post_class( 'post' ); ?> id="post-<?php the_ID() ?>" data-post-id="<?php the_ID() ?>">
	<?php if ( has_post_thumbnail() ) { ?>
        <div class="thumbnail-wrap">





            <a href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url( 'differ_post_blogimg' ); ?>" alt="<?php the_title(); ?>">
            </a>
        </div>
	<?php } ?>

	<?php get_template_part( 'includes/posts/post_footer' ); ?>
</article>



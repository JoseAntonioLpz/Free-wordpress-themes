<article <?php post_class( 'post' ); ?> id="post-<?php the_ID() ?>" data-post-id="<?php the_ID() ?>">
	<?php if ( has_post_thumbnail() ) { ?>
        <div class="thumbnail-wrap">




            <img src="<?php the_post_thumbnail_url( 'differ_post_blogimg' ); ?>" alt="<?php the_title(); ?>">

			<?php if ( differ_get_field( 'link' ) ): ?>
               <div class="post-link-wrap">
                   <a class="post-link" target="_blank" href="<?php differ_the_field( 'link' ); ?>"><?php differ_the_field( 'title' ); ?></a>
               </div>
			<?php endif; ?>


        </div>
	<?php } ?>

	<?php get_template_part( 'includes/posts/post_footer' ); ?>
</article>



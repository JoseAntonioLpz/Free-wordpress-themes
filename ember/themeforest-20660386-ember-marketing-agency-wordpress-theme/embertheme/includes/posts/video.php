<article <?php post_class( 'post' ); ?> id="post-<?php the_ID() ?>" data-post-id="<?php the_ID() ?>">
	<?php $video_type = differ_get_field( 'video_type' );
	$html_video       = differ_get_field( 'upload_video' );
	$iframe           = differ_get_field( 'iframe' );
	?>

	<?php if ( $html_video || $iframe || has_post_thumbnail() ): ?>
        <div class="thumbnail-wrap">

			<?php if ( $video_type == 'html' && $html_video ) { ?>
                <!-- HTML Video -->
                <video playsinline="true" loop="false" muted="true" controls="true">
                    <source src="<?php echo esc_url($html_video['url']); ?>" type="<?php echo  esc_attr($html_video['mime_type']); ?>">
                </video>
			<?php } elseif ( $video_type == 'youtube' && $iframe ) { ?>
                <!-- YouTube Video -->
                <div class="ytv-wrap">
					<?php differ_the_field( 'iframe' ); ?>
                </div>
			<?php } elseif ( has_post_thumbnail() ) { ?>
                <!-- Post Thumbnail -->
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php the_post_thumbnail_url( 'differ_post_blogimg' ); ?>" alt="<?php the_title(); ?>">
                </a>
			<?php } ?>
        </div>
	<?php endif; ?>


	<?php get_template_part( 'includes/posts/post_footer' ); ?>
</article>



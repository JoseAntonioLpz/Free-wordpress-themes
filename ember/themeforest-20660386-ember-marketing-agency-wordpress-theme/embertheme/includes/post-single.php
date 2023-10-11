<?php
$tags       = get_theme_mod( 'blog_single_tags', true );
$categories = get_theme_mod( 'blog_single_cats', true );
$author     = get_theme_mod( 'blog_single_author', true );
$date       = get_theme_mod( 'blog_single_date', true );
$views      = get_theme_mod( 'blog_single_views', true );
$likes      = get_theme_mod( 'blog_single_likes', true );

?>

<h3 class="post-title"><?php the_title(); ?></h3>

<!-- Post Info -->
<div class="info">
	<?php if ( $author ) : ?>
        <div class="item author-item">
			<?php the_author_posts_link(); ?>
        </div>
	<?php endif; ?>

	<?php if ( $date ) : ?>
        <div class="item data-item">
			<?php echo esc_attr( get_the_date() ); ?>
        </div>
	<?php endif; ?>

	<?php if ( $categories ): ?>
		<?php if ( has_category( '' ) ) { ?>
            <div class="item cats-item">
				<?php esc_attr_e( 'Categories: ', 'embertheme' ); ?>
				<?php the_category( ',  ', 'single' ); ?>
            </div>
		<?php } ?>
	<?php endif; ?>

	<?php if ( $views && function_exists( 'differ_the_postviews' ) ) : ?>
        <div class="item views-item">
            <div class="icon fa fa-eye"></div>
            <span>
                    <?php differ_the_postviews(); ?>
                 </span>
        </div>
	<?php endif; ?>

	<?php if ( $likes && function_exists( 'differ_the_likes_button' ) ) : ?>
        <div class="item likes-item">
			<?php differ_the_likes_button( get_the_ID() ); ?>
        </div>
	<?php endif; ?>
</div>


<?php if ( has_post_format( 'video' ) ) : ?>
    <!-- VIDEO -->
	<?php $video_type = differ_get_field( 'video_type' );
	$html_video       = differ_get_field( 'upload_video' );
	$iframe           = differ_get_field( 'iframe' );
	?>

	<?php if ( $html_video || $iframe || has_post_thumbnail() ): ?>
        <div class="thumbnail-wrap">

			<?php if ( $video_type == 'html' && $html_video ) { ?>
                <!-- HTML Video -->
                <video playsinline="true" loop="false" muted="true" controls="true">
                    <source src="<?php echo esc_url( $html_video['url'] ); ?>" type="<?php echo esc_attr( $html_video['mime_type'] ); ?>">
                </video>
			<?php } elseif ( $video_type == 'youtube' && $iframe ) { ?>
                <!-- YouTube Video -->
                <div class="ytv-wrap">
					<?php differ_the_field( 'iframe' ); ?>
                </div>
			<?php } elseif ( has_post_thumbnail() ) { ?>
                <!-- Post Thumbnail -->
                <img src="<?php the_post_thumbnail_url( 'differ_post_blogimg' ); ?>" alt="<?php the_title(); ?>">
			<?php } ?>
        </div>
	<?php endif; ?>
<?php endif; ?>

<?php if ( has_post_format( 'gallery' ) ) { ?>
    <!-- GALLERY -->

	<?php
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
                <img src="<?php the_post_thumbnail_url( 'differ_post_blogimg' ); ?>" alt="<?php the_title(); ?>">

			<?php } ?>

        </div>

	<?php endif; ?>

<?php } ?>

<?php if ( ! has_post_format() ) { ?>
	<?php if ( has_post_thumbnail() ) { ?>
        <div class="thumbnail-wrap">
            <img src="<?php the_post_thumbnail_url( 'differ_post_blogimg' ); ?>" alt="<?php the_title(); ?>">
        </div>
	<?php } ?>
<?php } ?>


<div class="post-content clearfix">
	<?php the_content(); ?>
</div>

<?php wp_link_pages( array(
	'before' => '<p class="post_pages">' . esc_html__( 'Pages:', 'embertheme' ),
	'after'  => '</p>',
) ); ?>


<?php if ( wp_get_post_tags( get_the_ID() ) && $tags ): ?>
    <div class="tags ">
        <i class="fa fa-tags" aria-hidden="true"></i>
        <div class="tagcloud">
			<?php the_tags( '  ', ', ', '' ); ?>
        </div>
    </div>
<?php endif; ?>


<div class="comment-actions">
	<?php if ( comments_open() ) { ?>
        <div class="actives">
            <div>
                <div class="comments-count">
					<?php $comments_count = get_comments_number(); ?>
                    <h6 class="no-margin">
                        <span class="comments-counter"><?php echo esc_html( $comments_count ); ?></span>
						<?php echo esc_attr( _n( "Comment", "Comments", $comments_count, 'embertheme' ) ); ?>
                    </h6>
                </div>
            </div>
        </div>
	<?php } ?>

    <div class="share">
        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
            <a class="a2a_button_facebook"></a>
            <a class="a2a_button_twitter"></a>
            <a class="a2a_button_google_plus"></a>
            <a class="a2a_button_pinterest"></a>
            <a class="a2a_button_linkedin"></a>
            <a class="a2a_button_email"></a>
            <a class="a2a_button_whatsapp"></a>
        </div>
    </div>
</div>


<?php if ( comments_open() || get_comments_number() ) : ?>
	<?php comments_template(); ?>
<?php endif; ?>





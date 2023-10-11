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
	<?php if ( $date ) : ?>
        <div class="item data-item">
			<?php echo esc_attr( get_the_date() ); ?>
        </div>
	<?php endif; ?>

	<?php if ( $categories ): ?>
		<?php if ( has_term( '', 'portfolio_category' ) ) { ?>
            <div class="item cats-item">
				<?php esc_attr_e( 'Categories: ', 'embertheme' ); ?>
				<?php the_terms( get_the_ID(), 'portfolio_category', '', ', ', '' ); ?>
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


<!-- Thumbnail -->
<?php if ( has_post_thumbnail() ) { ?>
    <div class="thumbnail-wrap">
        <img src="<?php the_post_thumbnail_url( 'differ_post_blogimg' ); ?>" alt="<?php the_title(); ?>">
    </div>
<?php } ?>

<div class="post-content clearfix">
	<?php the_content(); ?>
</div>

<?php wp_link_pages( array(
	'before' => '<p class="post_pages">' . esc_html__( 'Pages:', 'embertheme' ),
	'after'  => '</p>',
) ); ?>

<?php if ( has_term( '', 'portfolio_tag' ) && $tags ): ?>
    <div class="tags ">
        <i class="fa fa-tags" aria-hidden="true"></i>
        <div class="tagcloud">
			<?php the_terms( get_the_ID(), 'portfolio_tag', '', ', ', '' ); ?>
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



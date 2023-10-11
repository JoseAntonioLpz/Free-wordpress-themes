<?php
$date       = get_theme_mod( 'blog_list_date', true );
$author     = get_theme_mod( 'blog_list_author', true );
$categories = get_theme_mod( 'blog_list_cats', true );
$comments   = get_theme_mod( 'blog_list_comments', true );
$likes      = get_theme_mod( 'blog_list_likes', true );
$views      = get_theme_mod( 'blog_list_views', true );
?>


<div class="post-footer">

    <!-- Post Title -->
    <h4>
        <a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
    </h4>

    <!-- Post Info -->
    <div class="info">
		<?php if ( $date ) : ?>
            <div class="item data-item">
				<?php echo esc_attr( get_the_date() ); ?>
            </div>
		<?php endif; ?>

		<?php if ( $author ) : ?>
            <div class="item author-item">
				<?php the_author_posts_link(); ?>
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

		<?php if ( $comments ) : ?>
			<?php if ( comments_open() || get_comments_number() ) { ?>
                <div class="item comments-item">
                    <a href="<?php echo get_comments_link( get_the_ID() ); ?>">
                        <i class="fas fa-comments"></i>
                        <span><?php comments_number( '0', '1', '%' ); ?></span>
                    </a>
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

    <!-- Excerpt -->
    <div class="post-content">
		<?php echo differ_wp_kses( wp_trim_words( get_the_excerpt(), 60 ) ); ?>
    </div>

    <!-- Permalink -->
    <a href="<?php the_permalink(); ?>" class="btn permalink rect hover-black color-black size-default style-primary">
		<?php esc_attr_e( 'Read More', 'embertheme' ); ?>
    </a>

</div>
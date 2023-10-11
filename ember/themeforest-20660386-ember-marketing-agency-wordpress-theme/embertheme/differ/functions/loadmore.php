<?php

/* Albums */
function differ_load_albums() {
	$args                = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged']       = $_POST['page'] + 1; // следующая страница
	$args['post_status'] = 'publish';
	$grid_type           = $_POST['grid_type'];
	$colums_count        = $_POST['columns_class'];
	$likes               = $_POST['likes'];
	$comments_count      = $_POST['comments_count'];
	$images_count        = $_POST['images_count'];

	$args2 = array(
		'posts_per_page' => $args['posts_per_page'],
		'paged'          => $args['paged'],
		'post_status'    => 'publish',
		'post_type'      => $args['post_type']
	);

	query_posts( $args2 );

	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); ?>


			<?php if ( $grid_type == 'grid' ) {
				$img_url = get_the_post_thumbnail_url( get_the_ID(), 'differ_grid' );
			} else {
				$img_url = get_the_post_thumbnail_url( get_the_ID(), 'differ_masonry' );
			}

			$grid_ratio = differ_get_option( 'grid_sizes' ) ? differ_get_option( 'grid_sizes' ) : '4/3';
			if ( $grid_ratio == '16/9' ) {
				$grid_w       = 1200;
				$grid_h       = 675;
				$grid_img_src = DIFFER_THEME_URL . '/assets/img/grid-placeholder16x9.jpg';

			} elseif ( $grid_ratio == '4/3' ) {
				$grid_w       = 1200;
				$grid_h       = 900;
				$grid_img_src = DIFFER_THEME_URL . '/assets/img/grid-placeholder4x3.jpg';

			} elseif ( $grid_ratio == '1/1' ) {
				$grid_w       = 1200;
				$grid_h       = 1200;
				$grid_img_src = DIFFER_THEME_URL . '/assets/img/grid-placeholder1x1.jpg';
			}

			?>

			<?php if ( $grid_type == 'grid' ) { ?>
                <div class="masonry-item grid-item album-item  <?php echo esc_attr($colums_count); ?>">
                    <div class="img-wrap">
                        <div class="image-bg" style="background-image: url(<?php echo esc_url($img_url); ?>)">
                            <img src="<?php echo esc_url($grid_img_src); ?>" alt="<?php the_title(); ?>" class="img-responsive">
                        </div>
                        <div class="preview">
                            <a href="<?php the_permalink(); ?>" class="title"><h4><?php the_title(); ?></h4></a>
                            <div class="actions">
								<?php if ( $images_count ) { ?>
                                    <div class="item item-images">
                                        <i class="far fa-images"></i> <span class="number"><?php echo count( differ_get_field( 'gallery' ) ); ?></span>
                                    </div>
								<?php } ?>

								<?php if ( $comments_count && comments_open() ) { ?>
                                    <div class="item item-comments">
                                        <i class="far fa-comments"></i>
                                        <span class="number"><?php echo get_comments_number( get_the_ID() ); ?></span>
                                    </div>
								<?php } ?>

								<?php if ( $likes ) { ?>
									<?php echo differ_get_simple_likes_button( get_the_ID() ); ?>
								<?php } ?>
                            </div>
                        </div>

                    </div>
                </div>
			<?php } else { ?>
                <div class="masonry-item album-item  <?php echo esc_attr($colums_count); ?>">
                    <div class="img-wrap">
                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>">
                        <div class="preview">
                            <a href="<?php the_permalink(); ?>" class="title"><h4><?php the_title(); ?></h4></a>
                            <div class="actions">

								<?php if ( $images_count ) { ?>
                                    <div class="item item-images">
                                        <i class="far fa-images"></i> <span class="number"><?php echo count( differ_get_field( 'gallery' ) ); ?></span>
                                    </div>
								<?php } ?>

								<?php if ( $comments_count && comments_open() ) { ?>
                                    <div class="item item-comments">
                                        <i class="far fa-comments"></i>
                                        <span class="number"><?php echo get_comments_number( get_the_ID() ); ?></span>
                                    </div>
								<?php } ?>

								<?php if ( $likes ) { ?>
									<?php echo differ_get_simple_likes_button( get_the_ID() ); ?>
								<?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
			<?php } ?>

		<?php }
		wp_reset_query();
	} else {
		echo 'Error - Bad Request';
	}

}

add_action( 'wp_ajax_albums_loadmore', 'differ_load_albums' );
add_action( 'wp_ajax_nopriv_albums_loadmore', 'differ_load_albums' );


/* Blog Posts */
function differ_load_posts() {
	$args                = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged']       = $_POST['page'] + 1; // следующая страница
	$args['post_status'] = 'publish';

	$sticky = get_option( 'sticky_posts' );
	$args2 = array(
		'posts_per_page' => $args['posts_per_page'],
		'paged'          => $args['paged'],
		'post_status'    => 'publish',
		'post_type'      => $args['post_type'],
		'ignore_sticky_posts' => 1,
		'post__not_in' => $sticky,
	);
	query_posts( $args2 );

	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); ?>

            <div class="dynamic-added-post">
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
            </div>

		<?php }
		wp_reset_query();
	} else {
		echo 'Error - Bad Request';
	}

}

add_action( 'wp_ajax_blog_loadmore', 'differ_load_posts' );
add_action( 'wp_ajax_nopriv_blog_loadmore', 'differ_load_posts' );






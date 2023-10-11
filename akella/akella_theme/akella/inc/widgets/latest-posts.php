<?php
/**
 * Latest Posts Theme Widget.
 *
 * Displays latest posts widget.
 *
 * @link https://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Akella
 */


class Akella_Latest_Posts_Widget extends WP_Widget {
	/**
	 * Constructor.
	 *
	 * @return Akella_Latest_Posts_Widget
	 */
	public function __construct() {
		parent::__construct( 'widget_akella_latest_posts', esc_html__( 'Akella Latest Posts', 'akella' ), array(
			'classname'   => 'widget_akella_latest_posts',
			'description' => esc_html__( 'Use this widget to list your latest posts. Well-suited to display in the Content Bottom 2 widget area.', 'akella' ),
			'customize_selective_refresh' => true,
		) );
	}

	/**
	 * Output the HTML for this widget.
	 *
	 * @access public
	 *
	 * @param array $args     An array of standard parameters for widgets in this theme.
	 * @param array $instance An array of settings for this widget instance.
	 */
	public function widget( $args, $instance ) {
		global $post;

		$number = empty( $instance['number'] ) ? 6 : absint( $instance['number'] );
		$title  = apply_filters( 'widget_title', empty( $instance['title'] ) ? esc_html__( 'Latest Posts', 'akella' ) : $instance['title'], $instance, $this->id_base );

		// Params for our query.
		$query_args = array(
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'posts_per_page'      => $number,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true
		);

		if ( is_singular() ) {
			$query_args['post__not_in'] = array( $post->ID );
		}

		// The Query.
		$latestPosts = new WP_Query( $query_args );

		if ( $latestPosts->have_posts() ) :
			echo wp_kses_post( $args['before_widget'] );
			?>
			<h2 class="widget-title"><span><?php echo esc_html( $title ); ?></span></h2>

			<div class="row latest-posts-grid">
				<?php
				// Start the loop.
				while ( $latestPosts->have_posts() ) : $latestPosts->the_post(); ?>

					<div class="col-sm-6 col-md-4 grid-item">
						<?php
						$id = get_the_ID();
						if ( 'image' === get_post_format( $id ) || 'gallery' === get_post_format( $id ) ) {
							/* Print post-card-specific template. */
							akella_post_card( 'post-card-image', 'akella-thumbnail-medium', false );
						} else {
							/* Print post-card-specific template. */
							akella_post_card( '', 'akella-thumbnail-small' );
						} ?>
					</div>

				<?php
				endwhile; ?>
			</div>
			<?php
			echo wp_kses_post( $args['after_widget'] );

			// Reset the post globals as this query will have stomped on it.
			wp_reset_postdata();
		endif; // End check for latest posts.
	}

	/**
	 * Deal with the settings when they are saved by the admin.
	 *
	 * Here is where any validation should happen.
	 *
	 * @param array $new_instance New widget instance.
	 * @param array $instance     Original widget instance.
	 * @return array Updated widget instance.
	 */
	function update( $new_instance, $instance ) {
		$instance['title']  = strip_tags( $new_instance['title'] );
		$instance['number'] = empty( $new_instance['number'] ) ? 6 : absint( $new_instance['number'] );

		return $instance;
	}

	/**
	 * Display the form for this widget on the Widgets page of the Admin area.
	 *
	 * @param array $instance
	 */
	function form( $instance ) {
		$title  = empty( $instance['title'] ) ? '' : esc_attr( $instance['title'] );
		$number = empty( $instance['number'] ) ? 6 : absint( $instance['number'] );
		?>
			<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'akella' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"></p>

			<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'akella' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3"></p>
		<?php
	}
}

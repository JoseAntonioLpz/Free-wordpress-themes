<?php

if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Please do not load this page directly. Thanks!' );
}
if ( post_password_required() ) {
	return;
}
?>
<?php
function differ_comment( $comment, $args, $depth ) {

    $GLOBALS['comment'] = $comment; ?>
     <li <?php comment_class( 'comment-item' ); ?> id="li-comment-<?php comment_ID() ?>">
        <div class="comment-wrap " id="comment-<?php comment_ID(); ?>">
            <img class="comment-avatar" src="<?php echo get_avatar_url( $comment ); ?>" alt="<?php echo get_comment_author(); ?>">

            <div class="comment-body media-body">
                <div class="comment-item-title">
                    <div class="comment-author">
						<?php printf( differ_wp_kses( ( '%s' ) ), get_comment_author_link() ) ?>  <?php edit_comment_link( esc_html__( "(Edit)", 'embertheme' ) ); ?>
                        <div class="comment-date">
							<?php printf( esc_html__( '%1$s at %2$s', 'embertheme' ), get_comment_date(), get_comment_time() ); ?>
							<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
                        </div>
                    </div>
                    <div class="comment-text"><?php if ( $comment->comment_approved == '0' ) : ?>
                            <div class="wait"><?php esc_html_e( "Your comment is awaiting moderation.", 'embertheme' ) ?></div>
						<?php endif; ?>
						<?php comment_text(); ?>
                    </div>
                </div>
            </div>
        </div>


<?php } ?>


<?php if ( comments_open() ) { ?>
    <div id="comments" class="comments-area">

		<?php
		if ( have_comments() ) : ?>


            <ol class="comment-list">
				<?php
				$reply_text = esc_attr( ' Reply', 'embertheme' );
				$args       = array(
					'callback'    => 'differ_comment',
					'avatar_size' => 70,
					'style'       => 'ol',
					'short_ping'  => true,
					'reply_text'  => '<span class="slash-divider"> - </span>' . $reply_text,
				);
				wp_list_comments( $args );
				?>
            </ol>


			<?php
			$paginate_args = array(
				'prev_text' => '<i class="icon-left-open-mini"></i>',
				'next_text' => '<i class="icon-right-open-mini"></i>'
			);
			?>
            <div class="comments-pagination mb50"><?php paginate_comments_links( $paginate_args ) ?></div>


		<?php endif; ?>


		<?php
		$submit_label     = esc_html__( 'Post Comment', 'embertheme' );
		$commenter        = wp_get_current_commenter();
		$fields           = array();
		$fields['author'] = '<div class="form-flex row"><div class="col-xl-6 col-md-12"><input id="author" name="author" type="text"  value="' . esc_attr( $commenter['comment_author'] ) . '"  placeholder="' . esc_html__( 'Name', 'embertheme' ) . '" required ></div>';
		$fields['email']  = '<div class="col-xl-6 col-md-12"><input id="email" name="email" type="email"   value="' . esc_attr( $commenter['comment_author_email'] ) . '"  placeholder="' . esc_html__( 'Email', 'embertheme' ) . '" required ></div></div>';

		$comments_args = array(
			'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
			'comment_field'        => '<div class="form-flex row"><div class="col-12"><textarea name="comment" id="comment"  required class="textarea-comment" placeholder="' . esc_html__( 'Comment...', 'embertheme' ) . '"></textarea></div></div>',
			'title_reply_to'       => esc_attr( 'Leave a Reply to %s', 'noenix' ),
			'title_reply'          => esc_attr( 'Leave comment:', 'embertheme' ),
			'cancel_reply_link'    => esc_attr( 'Cancel', 'embertheme' ),
			'comment_notes_before' => '',
			'label_submit'         => $submit_label,
			'submit_field'         => '%1$s %2$s',
			'submit_button'        => ' <button type="submit" class="btn btn-dark-fill" name="submit">' . $submit_label . '</button>',


			'must_log_in'  => '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a comment.', 'embertheme' ),
					'<a href="' . wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) . '">',
					'</a>' ) . '</p>',
			'logged_in_as' => '<p class="logged-in-as">' . sprintf( esc_html__( 'Logged in as %1$s. %2$sLog out &raquo;%3$s', 'embertheme' ),
					'<a href="' . admin_url( 'profile.php' ) . '">' . $user_identity . '</a>',
					'<a href="' . wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) . '" title="' . esc_html__( 'Log out of this account', 'embertheme' ) . '">',
					'</a>' ) . '</p>',
		);


		function differ_comment_after() {
			echo '</div>';
		}

		function differ_comment_before() {
			echo '<div class="form comment-form-wrap">';
		}

		add_action( 'comment_form_after', 'differ_comment_after' );
		add_action( 'comment_form_before', 'differ_comment_before' );


		add_filter( 'comment_form_fields', 'differ_comments_fields_order' );
		function differ_comments_fields_order( $fields ) {
			$new_fields = array();
			$myorder    = array( 'author', 'email', 'comment' );

			foreach ( $myorder as $key ) {
				$new_fields[ $key ] = $fields[ $key ];
				unset( $fields[ $key ] );
			}
			if ( $fields ) {
				foreach ( $fields as $key => $val ) {
					$new_fields[ $key ] = $val;
				}
			}

			return $new_fields;
		}


		?>

		<?php comment_form( $comments_args ); ?>

    </div>
<?php } ?>




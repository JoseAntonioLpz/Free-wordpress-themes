<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="page-content clearfix <?php if (!function_exists( 'get_field' ) &&  !isset( $GLOBALS['kc']) ) {
		echo 'default-content';
	} ?> ">
		<?php the_content(); ?>

		<?php if ( comments_open() ) { ?>
            <div class="comment-actions">
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
		<?php } ?>

    </div>
<?php endwhile; else: ?>
	<?php get_template_part( 'includes/notfound' ) ?>
<?php endif; ?>


<?php get_footer(); ?>
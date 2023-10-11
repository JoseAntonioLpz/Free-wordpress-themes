<?php get_header();

$image = differ_get_option( '404_page_background_image' ) ? differ_get_option( '404_page_background_image' ) : 'http://via.placeholder.com/1920x1080';
?>
    <div class="wrap-404" style="background-image: url(<?php echo esc_url( $image ); ?>);">
        <div class="container">
			<?php if ( differ_get_option( '404_error_text' ) ) { ?>
                <h2 class="page_title"> <?php differ_the_option( '404_error_text' ); ?></h2>
			<?php } else { ?>
                <h1 class="page_title"> <?php esc_attr_e( '404 Page not found', 'embertheme' ); ?></h1>
			<?php } ?>
            <div class="links404">
                <a href="<?php echo esc_url( home_url( "/" ) ); ?>" class="home-link">
					<?php esc_attr_e( 'Home', 'embertheme' ); ?>
                </a>
                <a href="javascript: history.go(-1)" class="back">
					<?php esc_attr_e( ' Go Back ', 'embertheme' ); ?>
                </a>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
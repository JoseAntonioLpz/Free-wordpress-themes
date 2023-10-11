<?php


$breadcrumbs = differ_get_field( 'breadcrumbs' );


// Local Settings
if ( differ_get_field( 'breadcrumbs_bg' ) && ! empty( differ_get_field( 'breadcrumbs_bg' ) ) ) {
	$bg = differ_get_field( 'breadcrumbs_bg' );
} else {
	$bg = false;
}


if ( differ_is_blog() ) {
	$breadcrumbs = true;
}


if ( ! function_exists( 'get_field' ) || ! isset( $GLOBALS['kc'] ) ) {
	$breadcrumbs = true;
}

if ( is_404() ) {
	$breadcrumbs = false;
}


if ( $breadcrumbs ): ?>

    <div class="breadcrumbs-wrap" <?php $bg ? print 'style="background-image:url(' . esc_url( $bg ) . ')"' : null; ?>>
        <div class="container">
            <h2 class="page-title"><?php echo differ_page_title(); ?></h2>
			<?php differ_custom_breadcrumbs(); ?>
        </div>
    </div>

<?php endif; ?>





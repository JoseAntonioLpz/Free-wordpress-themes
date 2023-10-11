<?php

// Check Use Theme Preloader or Custom Image
$preloader_type = get_theme_mod( 'theme_preloader_check', 'theme' );


// Theme Preloader
$theme_preloader = get_theme_mod( 'theme_preloader', 'preloader1' );

if ( isset( $_GET['preloader'] ) ): $theme_preloader = $_GET['preloader']; endif;


// Custom Preloader
$custom_preloader = get_theme_mod( 'preloader_img' );

if ( $preloader_type == 'theme' ) {
	if ( $theme_preloader == 'preloader1' ): ?>

        <!-- Preloader 1 -->
        <div class="loader-wrapper">
            <div class='differ-preloader differ-preloader1'>
                <div class='cssload-inner cssload-one'></div>
                <div class='cssload-inner cssload-two'></div>
                <div class='cssload-inner cssload-three'></div>
            </div>
        </div>

	<?php elseif ( $theme_preloader == 'preloader2' ): ?>

        <!-- Preloader 2 -->
        <div class="loader-wrapper">
            <div class="differ-preloader differ-preloader2">
                <div class="spin-loader"></div>
            </div>
        </div>

	<?php elseif ( $theme_preloader == 'preloader3' ): ?>

        <!-- Preloader 3 -->
        <div class="loader-wrapper">
            <div class="differ-preloader differ-preloader3">
            </div>
        </div>

	<?php elseif ( $theme_preloader == 'preloader4' ): ?>

        <!-- Preloader 4 -->
        <div class="loader-wrapper">
            <div class="differ-preloader4">
                <div class='sk-rotating-plane'></div>
            </div>
        </div>


	<?php elseif ( $theme_preloader == 'preloader5' ): ?>

        <!-- Preloader 5 -->
        <div class="loader-wrapper">
            <div class="differ-preloader5">
                <div class='sk-double-bounce'>
                    <div class='sk-child sk-double-bounce-1'></div>
                    <div class='sk-child sk-double-bounce-2'></div>
                </div>
            </div>
        </div>


	<?php elseif ( $theme_preloader == 'preloader6' ): ?>

        <!-- Preloader 6 -->
        <div class="loader-wrapper">
            <div class="differ-preloader6">
                <div class='sk-wave'>
                    <div class='sk-rect sk-rect-1'></div>
                    <div class='sk-rect sk-rect-2'></div>
                    <div class='sk-rect sk-rect-3'></div>
                    <div class='sk-rect sk-rect-4'></div>
                    <div class='sk-rect sk-rect-5'></div>
                </div>
            </div>
        </div>

	<?php elseif ( $theme_preloader == 'preloader7' ): ?>

        <!-- Preloader7 -->
        <div class="loader-wrapper">
            <div class="differ-preloader7">
                <div class='sk-wandering-cubes'>
                    <div class='sk-cube sk-cube-1'></div>
                    <div class='sk-cube sk-cube-2'></div>
                </div>
            </div>
        </div>


	<?php elseif ( $theme_preloader == 'preloader8' ): ?>

        <!-- Preloader 8 -->
        <div class="loader-wrapper">
            <div class="differ-preloader8">
                <div class='sk-three-bounce'>
                    <div class='sk-bounce-1 sk-child'></div>
                    <div class='sk-bounce-2 sk-child'></div>
                    <div class='sk-bounce-3 sk-child'></div>
                </div>
            </div>
        </div>


	<?php elseif ( $theme_preloader == 'preloader9' ): ?>

        <!-- Preloader 9 -->
        <div class="loader-wrapper">
            <div class="differ-preloader9">
                <div class='sk-circle-bounce'>
                    <div class='sk-child sk-circle-1'></div>
                    <div class='sk-child sk-circle-2'></div>
                    <div class='sk-child sk-circle-3'></div>
                    <div class='sk-child sk-circle-4'></div>
                    <div class='sk-child sk-circle-5'></div>
                    <div class='sk-child sk-circle-6'></div>
                    <div class='sk-child sk-circle-7'></div>
                    <div class='sk-child sk-circle-8'></div>
                    <div class='sk-child sk-circle-9'></div>
                    <div class='sk-child sk-circle-10'></div>
                    <div class='sk-child sk-circle-11'></div>
                    <div class='sk-child sk-circle-12'></div>
                </div>
            </div>
        </div>
	<?php elseif ( $theme_preloader == 'preloader10' ): ?>

        <!-- Preloader 10 -->
        <div class="loader-wrapper">
            <div class="differ-preloader10">
                <div class='sk-cube-grid'>
                    <div class='sk-cube sk-cube-1'></div>
                    <div class='sk-cube sk-cube-2'></div>
                    <div class='sk-cube sk-cube-3'></div>
                    <div class='sk-cube sk-cube-4'></div>
                    <div class='sk-cube sk-cube-5'></div>
                    <div class='sk-cube sk-cube-6'></div>
                    <div class='sk-cube sk-cube-7'></div>
                    <div class='sk-cube sk-cube-8'></div>
                    <div class='sk-cube sk-cube-9'></div>
                </div>
            </div>
        </div>

    <?php elseif ( $theme_preloader == 'preloader11' ): ?>

        <!-- Preloader 11 -->
        <div class="loader-wrapper">
            <div class="differ-preloader11">
                <div class='sk-folding-cube'>
                    <div class='sk-cube sk-cube-1'></div>
                    <div class='sk-cube sk-cube-2'></div>
                    <div class='sk-cube sk-cube-4'></div>
                    <div class='sk-cube sk-cube-3'></div>
                </div>
            </div>
        </div>

	<?php elseif ( $theme_preloader == 'preloader12' ): ?>

        <!-- Preloader 12 -->
        <div class="loader-wrapper">
            <div class="differ-preloader12">

                <div class='spinner'>
                    <div class='item'></div>
                    <div class='item'></div>
                    <div class='item'></div>
                    <div class='item'></div>
                    <div class='item'></div>
                    <div class='item'></div>
                    <div class='item'></div>
                    <div class='item'></div>
                </div>

                <svg>
                    <defs>
                        <filter id='goo'>
                            <feGaussianBlur in='SourceGraphic' stdDeviation='8' result='blur' />
                            <feColorMatrix in='blur' mode='matrix' values='
                                                           1 0 0 0 0
                                                           0 1 0 0 0
                                                           0 0 1 0 0
                                                           0 0 0 50 -8' result='goo' />
                            <feBlend in='SourceGraphic' in2='goo' />
                        </filter>
                    </defs>
                </svg>

            </div>
        </div>

    <?php elseif ( $theme_preloader == 'preloader13' ): ?>

        <!-- Preloader 13 -->
        <div class="loader-wrapper">
            <div class="differ-preloader13">

                <div class="spinner"></div>

            </div>
        </div>


	<?php elseif ( $theme_preloader == 'preloader14' ): ?>

        <!-- Preloader 14 -->
        <div class="loader-wrapper">
            <div class="differ-preloader14">


                <div class="loader">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

            </div>
        </div>


	<?php elseif ( $theme_preloader == 'preloader15' ): ?>

        <!-- Preloader 15 -->
        <div class="loader-wrapper">
            <div class="differ-preloader15">


                <div class="loader">
                    <div></div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                    <defs>
                        <filter id="goo">
                            <fegaussianblur in="SourceGraphic" stddeviation="15" result="blur"></fegaussianblur>
                            <fecolormatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 26 -7" result="goo"></fecolormatrix>
                            <feblend in="SourceGraphic" in2="goo"></feblend>
                        </filter>
                    </defs>
                </svg>

            </div>
        </div>


	<?php elseif ( $theme_preloader == 'preloader16' ): ?>

        <!-- Preloader 16 -->
        <div class="loader-wrapper">
            <div class="differ-preloader16">

                    <div class="preloader--spinner"></div>

            </div>
        </div>


	<?php endif;


} elseif ( $preloader_type == 'custom' ) { ?>

    <div class="loader-wrapper">
        <div class="patheon-preloader custom-preloader">
            <img src="<?php echo esc_url( $custom_preloader ); ?>" alt="Preloader">
        </div>
    </div>

<?php } ?>



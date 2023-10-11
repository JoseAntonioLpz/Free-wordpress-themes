<?php

function differ_inline_css() {

	/* Body Backgroung */
	$body_bg = get_theme_mod( 'body_bg' );
	if ( $body_bg ) {
		$body_css = "
		body{
			background-color: {$body_bg['background-color']};
			background-image: url({$body_bg['background-image']});
			background-size: {$body_bg['background-size']};
			background-repeat:{$body_bg['background-repeat']};
			background-position:{$body_bg['background-position']};
			background-attachment:{$body_bg['background-attachment']};
		}";

	} else {
		$body_css = "
		body{
			background-color: #fff;
		}";
	}
	wp_add_inline_style( 'differ-main-css', $body_css );


	/* Scrollbar  CSS */
	$scrollbar_width        = get_theme_mod( 'scrollbar_width', '8' );
	$scrollbar_bg_color     = get_theme_mod( 'scrollbar_bg_color', '#fdfdfd' );
	$scrollbar_color        = get_theme_mod( 'scrollbar_color', '#F8BB5C' );
	$scrollbar_hover_color  = get_theme_mod( 'scrollbar_hover_color', '#F8BB5C' );
	$scrollbar_border_color = get_theme_mod( 'scrollbar_border_color', '#498EF3' );
	$scroll_css             = "
		body::-webkit-scrollbar {
			background-color: {$scrollbar_bg_color};
			width:  {$scrollbar_width}px;
			transition: 0.3s all ease;
			border-left:1px solid {$scrollbar_border_color};
			border-right:1px solid {$scrollbar_border_color};
		}
		
		body::-webkit-scrollbar-thumb {
			background: {$scrollbar_color};
			transition: 0.3s all ease;
		}
		
		body::-webkit-scrollbar-thumb:hover {
			background: {$scrollbar_hover_color};
			transition: 0.3s all ease;
		}
		";
	get_theme_mod( 'theme_scrollbar_enable', true ) ? wp_add_inline_style( 'differ-main-css', $scroll_css ) : false;


	$body_text_color = get_theme_mod( 'body_text_color', '#000' );
	$xl_body_fz      = get_theme_mod( 'xl_body_fz', '15' );
	$lg_body_fz      = get_theme_mod( 'xl_body_fz', '15' );
	$md_body_fz      = get_theme_mod( 'xl_body_fz', '15' );
	$sm_body_fz      = get_theme_mod( 'xl_body_fz', '14' );
	$xs_body_fz      = get_theme_mod( 'xl_body_fz', '14' );


	$heading_color = get_theme_mod( 'heading_color', '#000' );


	/* Headings Font Weight */
	$h1_fw = get_theme_mod( 'h1_fw', '700' );
	$h2_fw = get_theme_mod( 'h2_fw', '700' );
	$h3_fw = get_theme_mod( 'h3_fw', '700' );
	$h4_fw = get_theme_mod( 'h4_fw', '700' );
	$h5_fw = get_theme_mod( 'h5_fw', '600' );
	$h6_fw = get_theme_mod( 'h6_fw', '600' );

	$xl_h1_fz = get_theme_mod( 'xl_h1_fz', '70' );
	$xl_h2_fz = get_theme_mod( 'xl_h2_fz', '55' );
	$xl_h3_fz = get_theme_mod( 'xl_h3_fz', '48' );
	$xl_h4_fz = get_theme_mod( 'xl_h4_fz', '40' );
	$xl_h5_fz = get_theme_mod( 'xl_h5_fz', '32' );
	$xl_h6_fz = get_theme_mod( 'xl_h6_fz', '25' );

	$lg_h1_fz = get_theme_mod( 'lg_h1_fz', '65' );
	$lg_h2_fz = get_theme_mod( 'lg_h2_fz', '50' );
	$lg_h3_fz = get_theme_mod( 'lg_h3_fz', '42' );
	$lg_h4_fz = get_theme_mod( 'lg_h4_fz', '35' );
	$lg_h5_fz = get_theme_mod( 'lg_h5_fz', '27' );
	$lg_h6_fz = get_theme_mod( 'lg_h6_fz', '22' );

	$md_h1_fz = get_theme_mod( 'md_h1_fz', '57' );
	$md_h2_fz = get_theme_mod( 'md_h2_fz', '43' );
	$md_h3_fz = get_theme_mod( 'md_h3_fz', '36' );
	$md_h4_fz = get_theme_mod( 'md_h4_fz', '30' );
	$md_h5_fz = get_theme_mod( 'md_h5_fz', '24' );
	$md_h6_fz = get_theme_mod( 'md_h6_fz', '22' );

	$sm_h1_fz = get_theme_mod( 'sm_h1_fz', '37' );
	$sm_h2_fz = get_theme_mod( 'sm_h2_fz', '30' );
	$sm_h3_fz = get_theme_mod( 'sm_h3_fz', '28' );
	$sm_h4_fz = get_theme_mod( 'sm_h4_fz', '24' );
	$sm_h5_fz = get_theme_mod( 'sm_h5_fz', '20' );
	$sm_h6_fz = get_theme_mod( 'sm_h6_fz', '18' );

	$xs_h1_fz = get_theme_mod( 'xs_h1_fz', '32' );
	$xs_h2_fz = get_theme_mod( 'xs_h2_fz', '28' );
	$xs_h3_fz = get_theme_mod( 'xs_h3_fz', '25' );
	$xs_h4_fz = get_theme_mod( 'xs_h4_fz', '20' );
	$xs_h5_fz = get_theme_mod( 'xs_h5_fz', '18' );
	$xs_h6_fz = get_theme_mod( 'xs_h6_fz', '16' );


	$xl_headings_mb = get_theme_mod( 'xl-headings-mb', '0.35' );
	$lg_headings_mb = get_theme_mod( 'lg-headings-mb', '0.35' );
	$md_headings_mb = get_theme_mod( 'md-headings-mb', '0.35' );
	$sm_headings_mb = get_theme_mod( 'sm-headings-mb', '0.38' );
	$xs_headings_mb = get_theme_mod( 'xs-headings-mb', '0.45' );

	$typography_css = "
	:root{
  --text-color: {$body_text_color};
  --text-font-weight: 400;
  --text-xl-size: {$xl_body_fz}px;
  --text-lg-size: {$lg_body_fz}px;
  --text-md-size: {$md_body_fz}px;
  --text-sm-size: {$sm_body_fz}px;
  --text-xs-size: {$xs_body_fz}px;

  --headings-color: {$heading_color};
  --h1-fw: {$h1_fw};
  --h2-fw: {$h2_fw};
  --h3-fw: {$h3_fw};
  --h4-fw: {$h4_fw};
  --h5-fw: {$h5_fw};
  --h6-fw: {$h6_fw};



  /* Headings XL 1200px+ */
  --xl-headings-mb: {$xl_headings_mb}em;
  --xl-h1-size: {$xl_h1_fz}px;
  --xl-h2-size: {$xl_h2_fz}px;
  --xl-h3-size: {$xl_h3_fz}px;
  --xl-h4-size: {$xl_h4_fz}px;
  --xl-h5-size: {$xl_h5_fz}px;
  --xl-h6-size: {$xl_h6_fz}px;

  /* Headings LG 1199px- */
  --lg-headings-mb: {$lg_headings_mb}em;
  --lg-h1-size: {$lg_h1_fz}px;
  --lg-h2-size: {$lg_h2_fz}px;
  --lg-h3-size: {$lg_h3_fz}px;
  --lg-h4-size: {$lg_h4_fz}px;
  --lg-h5-size: {$lg_h5_fz}px;
  --lg-h6-size: {$lg_h6_fz}px;

  /* Headings MD 991px- */
  --md-headings-mb: {$md_headings_mb}em;
  --md-h1-size: {$md_h1_fz}px;
  --md-h2-size: {$md_h2_fz}px;
  --md-h3-size: {$md_h3_fz}px;
  --md-h4-size: {$md_h4_fz}px;
  --md-h5-size: {$md_h5_fz}px;
  --md-h6-size: {$md_h6_fz}px;

  /* Headings SM 767px- */
  --sm-headings-mb: {$sm_headings_mb}em;
  --sm-h1-size: {$sm_h1_fz}px;
  --sm-h2-size: {$sm_h2_fz}px;
  --sm-h3-size: {$sm_h3_fz}px;
  --sm-h4-size: {$sm_h4_fz}px;
  --sm-h5-size: {$sm_h5_fz}px;
  --sm-h6-size: {$sm_h6_fz}px;

  /* Headings XS 440px- */
  --xs-headings-mb: {$xs_headings_mb}em;
  --xs-h1-size: {$xs_h1_fz}px;
  --xs-h2-size: {$xs_h2_fz}px;
  --xs-h3-size: {$xs_h3_fz}px;
  --xs-h4-size: {$xs_h4_fz}px;
  --xs-h5-size: {$xs_h5_fz}px;
  --xs-h6-size: {$xs_h6_fz}px;
	}";

	wp_add_inline_style( 'differ-main-css', trim( $typography_css ) );


	/* Navigation  */

	$filled_nav_bg                = get_theme_mod( 'fill_nav_bg', '#000' );
	$desktop_nav_height           = get_theme_mod( 'desktop_nav_height', '60' );
	$desktop_nav_link_fz          = get_theme_mod( 'desktop_nav_link_font_size', 14 );
	$desktop_nav_link_color       = get_theme_mod( 'desktop_nav_link_color', '#fff' );
	$desktop_nav_link_hover_color = get_theme_mod( 'desktop_nav_link_hover_color', '#F8BB5C' );

	$logo_height      = get_theme_mod( 'logo_height', '36' );
	$logo_font_size   = get_theme_mod( 'logo_font_size', '32' );
	$logo_font_weight = get_theme_mod( 'logo_font_weight', '700' );
	$logo_color       = get_theme_mod( 'logo_color', '#fff' );
	$logo_hover_color = get_theme_mod( 'logo_hover_color', '#fff' );

	$desktop_nav_sub_menu_background       = get_theme_mod( 'desktop_nav_sub_menu_background', '#231e1e' );
	$desktop_nav_sub_menu_link_font_family = get_theme_mod( 'desktop_nav_sub_menu_link_font_family', 'Raleway' );
	$desktop_nav_sub_menu_link_color       = get_theme_mod( 'desktop_nav_sub_menu_link_color', '#fff' );
	$desktop_nav_sub_menu_link_hover_color = get_theme_mod( 'desktop_nav_sub_menu_link_hover_color', '#F8BB5C' );
	$desktop_nav_sub_menu_link_font_size   = get_theme_mod( 'desktop_nav_sub_menu_link_font_size', '14' );

	$mobile_fill_nav_bg          = get_theme_mod( 'mobile_fill_nav_bg', '#000' );
	$mobile_nav_height           = get_theme_mod( 'mobile_nav_height', '60' );
	$mobile_nav_menu_wrap_bg     = get_theme_mod( 'mobile_nav_menu_wrap_bg', '#231e1e' );
	$mobile_nav_sub_menu_bg      = get_theme_mod( 'mobile_nav_sub_menu_bg', '#635f58' );
	$mobile_nav_link_font_size   = get_theme_mod( 'mobile_nav_link_font_size', '18' );
	$mobile_nav_link_color       = get_theme_mod( 'mobile_nav_link_color', '#fff' );
	$mobile_nav_link_line_height = get_theme_mod( 'mobile_nav_link_line_height', '40' );
	$mobile_nav_link_hover_color = get_theme_mod( 'mobile_nav_link_hover_color', '#F8BB5C' );

	$nav_css = "
	:root{
		--desktop_nav-height:{$desktop_nav_height}px;
		--nav-fill-bg:{$filled_nav_bg};
		--desktop-nav-link-fz:{$desktop_nav_link_fz}px;
		--desktop-nav-link-color:{$desktop_nav_link_color};
		--desktop-nav-link-hover-color:{$desktop_nav_link_hover_color};
		
		--logo-height:{$logo_height}px;
		--logo-font-size:{$logo_font_size}px;
		--logo-font-weight:{$logo_font_weight};
		--logo-color:{$logo_color};
		--logo-hover-color:{$logo_hover_color};
		
		--desktop-sub-menu-bg:{$desktop_nav_sub_menu_background};
		--desktop-sub-menu-link-font:{$desktop_nav_sub_menu_link_font_family};
		--sub-menu-link-fz:{$desktop_nav_sub_menu_link_font_size}px;
		--desktop-sub-menu-link-color:{$desktop_nav_sub_menu_link_color};
		--desktop-sub-menu-link-hover-color:{$desktop_nav_sub_menu_link_hover_color};
		
		--mobile-nav-bg :{$mobile_fill_nav_bg};
		--mobile-nav-height: {$mobile_nav_height}px;
		--mobile-nav-menu-wrap-bg:{$mobile_nav_menu_wrap_bg};
		--mobile-nav-sub-menu-bg:{$mobile_nav_sub_menu_bg};
		--mobile-nav-link-font-size:{$mobile_nav_link_font_size}px;
		--mobile-nav-link-color:{$mobile_nav_link_color};
		--mobile-nav-link-line-height:{$mobile_nav_link_line_height}px;
		--mobile-nav-link-hover-color:{$mobile_nav_link_hover_color};
		

		
	
	}
	
	";
	wp_add_inline_style( 'differ-main-css', trim( $nav_css ) );


	/* Breadcrumbs */

	$br_color = get_theme_mod( 'breadcrumbs_color', '#fff' );
	$br_bg    = get_theme_mod( 'breadcrumbs_background' );

	if ( empty( $br_bg['background-color'] ) ) {
		$br_bgc = '#968b8b';
	} else {
		$br_bgc = $br_bg['background-color'];
	}

	$br_css = "
	
	.breadcrumbs-wrap{
	
	--color:{$br_color};
	background-color:{$br_bgc};
	background-repeat:{$br_bg['background-repeat']};
	background-position:{$br_bg['background-position']};
	background-size:{$br_bg['background-size']};
	background-attachment:{$br_bg['background-attachment']};
		
	}
		
	";

	wp_add_inline_style( 'differ-main-css', trim( $br_css ) );


	if ( $br_bg['background-image'] ) {
		wp_add_inline_style( 'differ-main-css', ".breadcrumbs-wrap{ background-image:url({$br_bg['background-image']})};" );
	}


	if ( get_theme_mod( 'preloader_bg_color', '#fff' ) ) {
		$color = get_theme_mod( 'preloader_bg_color', '#fff' );
		wp_add_inline_style( 'differ-main-css',
			"
			.loader-wrapper{ 
			background-color:{$color};
			}"
		);
	}


	/* Colors */

	$primary_color = get_theme_mod( 'primary_color', '#F8BB5C' );
	$black_color   = get_theme_mod( 'black_color', '#080909' );
	$white_color   = get_theme_mod( 'white_color', '#fff' );
	$colors_css    = "
	:root{
		--primary-color:{$primary_color};
		--black-color:{$black_color};
		--white-color:{$white_color};
	
	}
	
	";
	wp_add_inline_style( 'differ-main-css', trim( $colors_css ) );


	/* Preloader */
	$preloader_bg     = get_theme_mod( 'preloader_bg_color', '#fff' );
	$preloader_color1 = get_theme_mod( 'preloader_color1', 'var(--primary-color)' );
	$preloader_color2 = get_theme_mod( 'preloader_color2', 'var(--primary-color)' );
	$preloader_color3 = get_theme_mod( 'preloader_color3', 'var(--primary-color)' );


	$preloader_css = "
.loader-wrapper {
	/* Preloader */
	--preloader-bg: {$preloader_bg};
  --preloader-line1: {$preloader_color1};
  --preloader-line2: {$preloader_color2};
  --preloader-line3: {$preloader_color3};
  }
  ";

	wp_add_inline_style( 'differ-main-css', trim( $preloader_css ) );

}

add_action( 'wp_enqueue_scripts', 'differ_inline_css' );

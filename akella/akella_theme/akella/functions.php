<?php
/**
 * Akella functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package Akella
 */


/**
 * Akella only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own akella_setup() function to override in a child theme.
 */
function akella_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Akella, use a find and replace
	 * to change 'akella' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'akella', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 150,
		'width'       => 290,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'akella-thumbnail-large', 1200, 800, true );
  add_image_size( 'akella-thumbnail-medium', 750, 500, true );
	add_image_size( 'akella-thumbnail-small', 450, 300, true );
	add_image_size( 'akella-thumbnail-extra-small', 150, 150, true );
	add_image_size( 'akella-thumbnail-noncropped', 450, 9999 );

	// This theme uses wp_nav_menu() in three locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'akella' ),
		'secondary'  => esc_html__( 'Secondary Menu', 'akella' ),
		'social'  => esc_html__( 'Social Links Menu', 'akella' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', akella_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place widgets in the sidebar area.
			'sidebar-1' => array(
				'recent-comments',
				'recent-posts',
				'text_business_info',
			),

			// Put widgets in the footer area.
			'sidebar-4' => array(
				'text_about',
			),
		),

		// Specify the core-defined pages to create.
		'posts' => array(
			'home',
			'about',
			'contact',
		),

		// Customizer settings.
		'theme_mods' => array(
			'header_featured_content' => 'grid',
			'akella_layout' => 'grid-1',
		),

		// Set up nav menus for each of the tree areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "header" location.
			'primary' => array(
				'name' => esc_html__( 'Primary Menu', 'akella' ),
				'items' => array(
					'link_home',
					'page_about',
					'page_contact',
				),
			),

			// Assign a menu to the "footer" location.
			'secondary' => array(
				'name' => esc_html__( 'Secondary Menu', 'akella' ),
				'items' => array(
					'link_home',
					'page_about',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => esc_html__( 'Social Links Menu', 'akella' ),
				'items' => array(
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_pinterest',
				),
			),
		),
	);

	/**
	 * Filters Akella array of starter content.
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'akella_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'akella_get_featured_posts',
		'max_posts' => 5,
	) );
}
add_action( 'after_setup_theme', 'akella_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function akella_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'akella_content_width', 750 );
}
add_action( 'after_setup_theme', 'akella_content_width', 0 );

/**
 * Getter function for Featured Content.
 *
 * @return array An array of WP_Post objects.
 */
function akella_get_featured_posts() {
	/**
	 * Filter the featured posts to return in Akella.
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'akella_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @return bool Whether there are featured posts.
 */
function akella_has_featured_posts() {
	return ! is_paged() && (bool) akella_get_featured_posts();
}

/**
 * Register custom fonts.
 */
function akella_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by PT Sans or Droid Serif, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$pt_sans = esc_html_x( 'on', 'PT Sans font: on or off', 'akella' );
	$droid_serif = esc_html_x( 'on', 'Droid Serif font: on or off', 'akella' );

	if ( 'off' !== $pt_sans && 'off' !== $droid_serif ) {
		$font_families = array();

		$font_families[] = 'PT Sans:400,400i,700,700i';
		$font_families[] = 'Droid Serif:400,400i,700,700i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function akella_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'akella-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'akella_resource_hints', 10, 2 );

/**
 * Registers widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 */
function akella_widgets_init() {
	/* Recent Posts Widget */
	require get_template_directory() . '/inc/widgets/recent-posts.php';
	register_widget( 'Akella_Recent_Posts_Widget' );
	/* Latest Posts Widget */
	require get_template_directory() . '/inc/widgets/latest-posts.php';
	register_widget( 'Akella_Latest_Posts_Widget' );
	/* Most Commented Widgets */
	require get_template_directory() . '/inc/widgets/most-commented-1.php';
	register_widget( 'Akella_Most_Commented_One_Widget' );
	require get_template_directory() . '/inc/widgets/most-commented-2.php';
	register_widget( 'Akella_Most_Commented_Two_Widget' );
	/* Random Posts Widget */
	require get_template_directory() . '/inc/widgets/random-posts.php';
	register_widget( 'Akella_Random_Posts_Widget' );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'akella' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'akella' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Content Bottom 1', 'akella' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Appears before the comments on posts.', 'akella' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Content Bottom 2', 'akella' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Appears at the bottom of the content on posts.', 'akella' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar', 'akella' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'akella' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'akella_widgets_init' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function akella_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'akella_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 */
function akella_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'akella-fonts', akella_fonts_url(), array(), null );

	// Add Bootstrap stylesheet.
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.css', array(), '3.3.7' );

	// Add Font Awesome, used in the main stylesheet.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/vendor/font-awesome/css/font-awesome.min.css', array(), '4.7.0' );

	// Add Slick Carousel stylesheet.
	if ( 'carousel-1' === get_theme_mod( 'header_featured_content', 'image' ) || 'carousel-2' === get_theme_mod( 'header_featured_content', 'image' ) ) {
		wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/vendor/slick/slick.css', array(), '1.6.0' );
		wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/vendor/slick/slick-theme.css', array( 'slick' ), '1.6.0' );
	}

	// Theme stylesheet.
	wp_enqueue_style( 'akella-main', get_template_directory_uri() . '/assets/css/main.css', array(), '20170412' );
	wp_enqueue_style( 'akella-style', get_stylesheet_uri() );

	// Load the cyan color scheme.
	if ( 'cyan' === get_theme_mod( 'color_scheme', 'red' ) || is_customize_preview() ) {
		wp_enqueue_style( 'akella-colors-blue', get_theme_file_uri( '/assets/css/colors-cyan.css' ), array( 'akella-main' ), '1.0' );
	}

	// Load the teal color scheme.
	if ( 'teal' === get_theme_mod( 'color_scheme', 'red' ) || is_customize_preview() ) {
		wp_enqueue_style( 'akella-colors-green', get_theme_file_uri( '/assets/css/colors-teal.css' ), array( 'akella-main' ), '1.0' );
	}

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'akella-ie', get_template_directory_uri() . '/assets/css/ie.css', array( 'akella-main' ), '20170412' );
	wp_style_add_data( 'akella-ie', 'conditional', 'lt IE 10' );

	wp_enqueue_script( 'akella-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20170412', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'akella-keyboard-image-navigation', get_template_directory_uri() . '/assets/js/keyboard-image-navigation.js', array( 'jquery' ), '20170412' );
	}

	// Add Slick Carousel js.
	if ( 'carousel-1' === get_theme_mod( 'header_featured_content', 'image' ) || 'carousel-2' === get_theme_mod( 'header_featured_content', 'image' ) ) {
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/vendor/slick/slick.min.js', array( 'jquery' ), '1.6.0', true );
	}

	if ( 'carousel-1' === get_theme_mod( 'header_featured_content', 'image' ) ) {
		wp_enqueue_script( 'init-carousel', get_template_directory_uri() . '/assets/js/init-carousel-1.js', array( 'jquery' ), '20170503', true );
	}

	if ( 'carousel-2' === get_theme_mod( 'header_featured_content', 'image' ) ) {
		wp_enqueue_script( 'init-carousel', get_template_directory_uri() . '/assets/js/init-carousel-2.js', array( 'jquery' ), '20170823', true );
	}

	if ( 'masonry-1' === get_theme_mod( 'akella_layout', 'default' ) || 'masonry-2' === get_theme_mod( 'akella_layout', 'default' ) || is_customize_preview() ) {
		// Add imagesLoaded js.
		wp_enqueue_script( 'imagesloaded' );

		// Add Masonry js.
		wp_enqueue_script( 'masonry' );
		wp_enqueue_script( 'init-masonry', get_template_directory_uri() . '/assets/js/init-masonry.js', array( 'jquery' ), '20170503', true );
	}

	if ( true === get_theme_mod( 'affix_sidebar', false ) ) {
		// Add Affix Sidebar js.
		wp_enqueue_script( 'affix_sidebar', get_template_directory_uri() . '/assets/js/affix-sidebar.js', array( 'jquery' ), '20170725', true );
	}

	wp_enqueue_script( 'akella-script', get_template_directory_uri() . '/assets/js/functions.js', array( 'jquery' ), '20170411', true );

	wp_localize_script( 'akella-script', 'screenReaderText', array(
		'expand'   => esc_html__( 'expand child menu', 'akella' ),
		'collapse' => esc_html__( 'collapse child menu', 'akella' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'akella_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Theme metaboxes.
 */
require get_template_directory() . '/inc/metaboxes.php';

/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function akella_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	750 <= $width && $sizes = '(max-width: 767px) 93vw, (max-width: 991px) 660px, 750px';
	750 > $width && $sizes = '(max-width: ' . $width . 'px) 93vw, ' . $width . 'px';

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'akella_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function akella_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'akella-thumbnail-large' === $size ) {
		$attr['sizes'] = '(max-width: 767px) 96vw, (max-width: 991px) 720px, (max-width: 1199px) 940px, 1200px';
	} // 1200px thumbnail width

	if ( 'akella-thumbnail-medium' === $size ) {
		$attr['sizes'] = '(max-width: 767px) 96vw, (max-width: 991px) 720px, (max-width: 1199px) 620px, 750px';
	} // 750px thumbnail width

	if ( 'akella-thumbnail-small' === $size ) {
		$attr['sizes'] = '(max-width: 767px) 96vw, (max-width: 991px) 345px, (max-width: 1199px) 294px, 360px';
	} // 450px thumbnail width

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'akella_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function akella_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'akella_widget_tag_cloud_args' );

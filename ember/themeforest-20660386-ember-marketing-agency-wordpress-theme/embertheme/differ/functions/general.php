<?php

function differ_return_bytes( $ini_v ) {
	$ini_v = trim( $ini_v );
	$s     = [ 'g' => 1 << 30, 'm' => 1 << 20, 'k' => 1 << 10 ];

	return intval( $ini_v ) * ( $s[ strtolower( substr( $ini_v, - 1 ) ) ] ?: 1 );
}

function differ_get_human_time() {
	return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) . esc_attr__( ' ago', 'embertheme' );
}

/* BREADCRUMBS  */
function differ_custom_breadcrumbs() {
	$separator        = get_theme_mod( 'breadcrumbs_delimiter', '<i class="icon-right-open-mini" aria-hidden="true"></i>' );
	$breadcrums_class = 'breadcrumbs';
	$home_title       = esc_attr__( 'Home', 'embertheme' );
	$prefix           = '';

	// If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
	$custom_taxonomy = 'product_cat';

	// Get the query & post information
	global $post, $wp_query;

	// Do not display on the homepage
	if ( ! is_front_page() ) {

		// Build the breadcrums
		echo '<ul  class="' . $breadcrums_class . '">';

		// Home page
		echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
		echo '<li class="separator separator-home"> ' . $separator . ' </li>';

		if ( is_archive() && ! is_tax() && ! is_category() && ! is_tag() && ! is_author() && ! is_year() && ! is_day() && ! is_month() ) {

			echo '<li class="item-current item-archive"><span class="bread-current bread-archive year">' . post_type_archive_title( $prefix,
					false ) . '</span></li>';

		} elseif ( is_year() ) {

			// Display year archive
			echo '<li class="item-current item-current-' . get_the_time( 'Y' ) . '"><span class="bread-current bread-current-' . get_the_time( 'Y' ) . '" title="' . get_the_time( 'Y' ) . '">' . get_the_time( 'Y' ) . ' ' . esc_html__( 'Archives',
					'embertheme' ) . '</span></li>';
		} elseif ( is_archive() && is_tax() && ! is_category() && ! is_tag() && ! is_year() && ! is_day() && ! is_month() ) {


			$term = get_queried_object();
			$tax  = $term->taxonomy;

			// If post is a custom post type
			$post_type = get_post_type();

			// If it is a custom post type display name and link
			if ( $post_type != 'post' ) {
				if ( get_post_type_object( get_post_type() )->has_archive ) {
					$post_type_object  = get_post_type_object( $post_type );
					$post_type_archive = get_post_type_archive_link( $post_type );
					echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
					echo '<li class="separator"> ' . $separator . ' </li>';
				}
			}


			$custom_tax_name = get_queried_object()->name;
			echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . $custom_tax_name . ' </span></li>';

		} elseif ( is_single() ) {

			// If post is a custom post type
			$post_type = get_post_type();

			// If it is a custom post type display name and link
			if ( $post_type != 'post' ) {

				if ( get_post_type_object( get_post_type() )->has_archive ) {
					$post_type_object  = get_post_type_object( $post_type );
					$post_type_archive = get_post_type_archive_link( $post_type );

					echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
					echo '<li class="separator"> ' . $separator . ' </li>';
				}


			} else {
				// Get post category info
				$category = get_the_category();
				if ( ! empty( $category ) ) {

					// Get last category post is in
					$last_category = end( $category );

					// Get parent any categories and create array
					$get_cat_parents = rtrim( get_category_parents( $last_category->term_id, true, ',' ), ',' );
					$cat_parents     = explode( ',', $get_cat_parents );

					// Loop through parent categories and store in variable $cat_display
					$cat_display = '';
					foreach ( $cat_parents as $parents ) {
						$cat_display .= '
                <li class="item-cat">' . $parents . '</li>';
						$cat_display .= '
                <li class="separator"> ' . $separator . '</li>';
					}

				}

				// If it's a custom post type within a custom taxonomy
				$taxonomy_exists = taxonomy_exists( $custom_taxonomy );
				if ( empty( $last_category ) && ! empty( $custom_taxonomy ) && $taxonomy_exists ) {

					$taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
					$cat_id         = $taxonomy_terms[0]->term_id;
					$cat_nicename   = $taxonomy_terms[0]->slug;
					$cat_link       = get_term_link( $taxonomy_terms[0]->term_id, $custom_taxonomy );
					$cat_name       = $taxonomy_terms[0]->name;

				}
			}


			$differ_post_type = get_post_type();
			if ( $differ_post_type == 'post' ) {
				// Blog url
				$posts_page_id = get_option( 'page_for_posts' );
				$blog_title    = get_the_title( $posts_page_id );
				$blog_link     = get_permalink( get_option( 'page_for_posts' ) );
				if ( $posts_page_id ) {
					echo '<li class="item-cat"><a href="' . $blog_link . '">' . $blog_title . '</a></li>';
					echo '<li class="separator"> ' . $separator . ' </li>';
				}
			}


			// Check if the post is in a category
			if ( ! empty( $last_category ) ) {
				echo differ_wp_kses( $cat_display );

				echo '
                <li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';
				// Else if post is in a custom taxonomy
			} elseif ( ! empty( $cat_id ) ) {

				echo '
                <li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a
                            class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '"
                            href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
				echo '
                <li class="separator"> ' . $separator . '</li>';
				echo '
                <li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '"
                                                                      title="' . get_the_title() . '">' . get_the_title() . '</span>
                </li>';
			} else {
				echo '
                <li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '"
                                                                      title="' . get_the_title() . '">' . get_the_title() . '</span>
                </li>';

			}

		} elseif ( is_category() ) {

			// Category page
			echo '
                <li class="item-current item-cat"><span class="bread-current bread-cat">' . single_cat_title( '', false ) . '</span></li>';

		} elseif ( is_page() ) {

			// Standard page
			if ( $post->post_parent ) {


				// If child page, get parents
				$anc = get_post_ancestors( $post->ID );

				// Get parents in the right order
				$anc = array_reverse( $anc );

				// Current page
				echo '
                <li class="item-current item-' . $post->ID . '"><span title="' . get_the_title() . '"> ' . get_the_title() . '</span>
                </li>';

			} else {

				// Just display current page if not parents
				echo '
                <li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</span>
                </li>';

			}

		} elseif ( is_tag() ) {

			// Tag page

			// Get tag information
			$term_id       = get_query_var( 'tag_id' );
			$taxonomy      = 'post_tag';
			$args          = 'include=' . $term_id;
			$terms         = get_terms( $taxonomy, $args );
			$get_term_id   = $terms[0]->term_id;
			$get_term_slug = $terms[0]->slug;
			$get_term_name = $terms[0]->name;

			// Display the tag name
			echo '
                <li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '">
                <span class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '"> 
                 
                 ' . esc_attr__( 'Tag', 'embertheme' ) . '&nbsp;' . $get_term_name . '
                
                </span>
                </li>
                ';


		} elseif ( is_home() ) { ?>

            <li class="item"><span><?php esc_attr_e( 'Blog', 'embertheme' ); ?></span></li>

		<?php } elseif ( is_day() ) {

			// Day archive

			// Year link
			echo '<li class="item-year item-year-' . get_the_time( 'Y' ) . '"><a class="bread-year bread-year-' . get_the_time( 'Y' ) . '" href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( 'Y' ) . '">' . get_the_time( 'Y' ) . ' ' . esc_html__( 'Archives',
					'embertheme' ) . '</a></li>';
			echo '<li class="separator separator-' . get_the_time( 'Y' ) . '"> ' . $separator . ' </li>';

			// Month link
			echo '<li class="item-month item-month-' . get_the_time( 'm' ) . '"><a class="bread-month bread-month-' . get_the_time( 'm' ) . '" href="' . get_month_link( get_the_time( 'Y' ),
					get_the_time( 'm' ) ) . '" title="' . get_the_time( 'M' ) . '">' . get_the_time( 'M' ) . ' ' . esc_html__( 'Archives',
					'embertheme' ) . '</a></li>';
			echo '<li class="separator separator-' . get_the_time( 'm' ) . '"> ' . $separator . ' </li>';

			// Day display
			echo '<li class="item-current item-' . get_the_time( 'j' ) . '"><span class="bread-current bread-' . get_the_time( 'j' ) . '"> ' . get_the_time( 'jS' ) . ' ' . get_the_time( 'M' ) . ' ' . esc_html__( 'Archives',
					'embertheme' ) . '</span></li>';

		} elseif ( is_month() ) {


			// Year link
			echo '<li class="item-year item-year-' . get_the_time( 'Y' ) . '"><a class="bread-year bread-year-' . get_the_time( 'Y' ) . '" href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( 'Y' ) . '">' . get_the_time( 'Y' ) . ' ' . esc_html__( 'Archives',
					'embertheme' ) . '</a></li>';
			echo '<li class="separator separator-' . get_the_time( 'Y' ) . '"> ' . $separator . ' </li>';

			// Month display
			echo '<li class="item-month item-month-' . get_the_time( 'm' ) . '"><span class="bread-month bread-month-' . get_the_time( 'm' ) . '" title="' . get_the_time( 'M' ) . '">' . get_the_time( 'M' ) . ' ' . esc_html__( 'Archives',
					'embertheme' ) . '</span></li>';

		} elseif ( is_author() ) {

			// Auhor archive

			// Get the author information
			global $author;
			$userdata = get_userdata( $author );

			// Display author name
			echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><span class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . $userdata->display_name . '</span></li>';

		} elseif ( get_query_var( 'paged' ) ) {

			// Paginated archives
			echo '<li class="item-current item-current-' . get_query_var( 'paged' ) . '"><span class="bread-current bread-current-' . get_query_var( 'paged' ) . '" title="Page ' . get_query_var( 'paged' ) . '">' . esc_html_e( "Page",
					"embertheme" ) . ' ' . get_query_var( 'paged' ) . '</span></li>';

		} elseif ( is_search() ) {

			// Search results page
			echo '<li class="item-current item-current-' . get_search_query() . '"><span class="bread-current bread-current-' . get_search_query() . '" >' . esc_attr__( 'Search results for: ',
					'embertheme' ) . '' . get_search_query() . '</span></li>';

		}
		echo '</ul>';

	}

}

/* PAGINATION */
function differ_pagination( $before = '', $after = '', $echo = true, $args = array(), $wp_query = null ) {
	if ( ! $wp_query ) {
		wp_reset_query();
		global $wp_query;
	}

	$default_args = array(
		'text_num_page'   => '', // Text Before Navigation
		'num_pages'       => 5, // Links to show
		'step_link'       => 0, // Step
		'dotright_text'   => '...',
		'dotright_text2'  => '...',
		'back_text'       => '<i class="icon-left-open-mini"></i>',
		'next_text'       => '<i class="icon-right-open-mini"></i>',
		'first_page_text' => 0,
		'last_page_text'  => 0, // text "to last page". Or 0, if you wanna show number.
	);

	$default_args = apply_filters( 'differ_pagenavi_args', $default_args );
	$args         = array_merge( $default_args, $args );

	extract( $args );
	$posts_per_page = (int) $wp_query->get( 'posts_per_page' );
	$paged          = (int) $wp_query->get( 'paged' );
	$max_page       = $wp_query->max_num_pages;

	if ( $max_page <= 1 ) {
		return false;
	}
	if ( empty( $paged ) || $paged == 0 ) {
		$paged = 1;
	}
	$pages_to_show         = intval( $num_pages );
	$pages_to_show_minus_1 = $pages_to_show - 1;

	$half_page_start = floor( $pages_to_show_minus_1 / 2 );
	$half_page_end   = ceil( $pages_to_show_minus_1 / 2 );

	$start_page = $paged - $half_page_start;
	$end_page   = $paged + $half_page_end;

	if ( $start_page <= 0 ) {
		$start_page = 1;
	}
	if ( ( $end_page - $start_page ) != $pages_to_show_minus_1 ) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if ( $end_page > $max_page ) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page   = (int) $max_page;
	}

	if ( $start_page <= 0 ) {
		$start_page = 1;
	}

	$out = '';

	$link_base = str_replace( 99999999, '___', get_pagenum_link( 99999999 ) );
	$first_url = get_pagenum_link( 1 );
	if ( false === strpos( $first_url, '?' ) ) {
		$first_url = user_trailingslashit( $first_url );
	}

	$out .= $before . "<ul class='differ-pagination'>\n";

	if ( $text_num_page ) {
		$text_num_page = preg_replace( '!{current}|{last}!', '%s', $text_num_page );
		$out           .= sprintf( "<span class='pages'>$text_num_page</span> ", $paged, $max_page );
	}
	if ( $back_text && $paged != 1 ) {
		$out .= '<li><a class="prev" href="' . ( ( $paged - 1 ) == 1 ? $first_url : str_replace( '___', ( $paged - 1 ), $link_base ) ) . '">' . $back_text . '</a></li> ';
	}
	if ( $start_page >= 2 && $pages_to_show < $max_page ) {
		$out .= '<li><a class="first" href="' . $first_url . '">' . ( $first_page_text ? $first_page_text : 1 ) . '</a></li>';
		if ( $dotright_text && $start_page != 2 ) {
			$out .= '<li><span class="extend">' . $dotright_text . '</span></li>';
		}
	}
	for ( $i = $start_page; $i <= $end_page; $i ++ ) {
		if ( $i == $paged ) {
			$out .= '<li><span class="current">' . $i . '</span></li> ';
		} elseif ( $i == 1 ) {
			$out .= '<li><a href="' . $first_url . '">1</a></li> ';
		} else {
			$out .= '<li><a href="' . str_replace( '___', $i, $link_base ) . '">' . $i . '</a></li> ';
		}
	}

	$dd = 0;
	if ( $step_link && $end_page < $max_page ) {
		for ( $i = $end_page + 1; $i <= $max_page; $i ++ ) {
			if ( $i % $step_link == 0 && $i !== $num_pages ) {
				if ( ++ $dd == 1 ) {
					$out .= '<li><span class="extend">' . $dotright_text2 . '</span></li> ';
				}
				$out .= '<li><a href="' . str_replace( '___', $i, $link_base ) . '">' . $i . '</a></li>';
			}
		}
	}
	if ( $end_page < $max_page ) {
		if ( $dotright_text && $end_page != ( $max_page - 1 ) ) {
			$out .= '<li><span class="extend">' . $dotright_text2 . '</span></li> ';
		}
		$out .= '<li><a class="last" href="' . str_replace( '___', $max_page, $link_base ) . '">' . ( $last_page_text ? $last_page_text : $max_page ) . '</a></li> ';
	}
	if ( $next_text && $paged != $end_page ) {
		$out .= '<li><a class="next" href="' . str_replace( '___', ( $paged + 1 ), $link_base ) . '">' . $next_text . '</a></li> ';
	}

	$out .= "</ul>" . $after . "\n";

	$out = apply_filters( 'differ_pagenavi', $out );

	if ( $echo ) {
		return print differ_wp_kses( $out );
	}

	return $out;
}


function differ_is_woo() {
	if ( in_array( 'woocommerce/woocommerce.php',
		apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		return true;
	} else {
		return false;
	}
}


function differ_page_title() {
	if ( is_singular( 'post' ) ) :
		$posts_page_id = get_option( 'page_for_posts' );
		$blog_title    = get_the_title( $posts_page_id );
		if ( $posts_page_id ) {
			return esc_attr( $blog_title );
		} else {
			return esc_attr( 'Blog', 'embertheme' );
		}
    elseif ( is_home() ):
		$frontpage_id    = get_option( 'page_for_posts' );
		$frontpage_title = get_the_title( $frontpage_id );
		if ( $frontpage_id ) {
			return esc_attr( $frontpage_title );
		} else {
			return esc_attr( 'Blog', 'embertheme' );
		}
    elseif ( is_singular() ):
		return get_the_title();
    elseif ( is_search() ):
		return esc_attr( 'Search', 'embertheme' ) . " - " . get_search_query();
    elseif ( is_404() ):
		$error_text = differ_get_option( '404_error_text' );
		if ( $error_text ) {
			return $error_text;
		} else {
			return esc_attr( '404 Page not found', 'embertheme' );
		}
    elseif ( is_tag() ):
		return single_tag_title( null, false );
    elseif ( is_category() ):
		return single_cat_title( null, false );
    elseif ( is_tax() ):
		return single_term_title( null, false );
    elseif ( is_author() ):
		return esc_attr( 'Author - ', 'embertheme' ) . get_the_author();
    elseif ( is_archive() ):

		if ( ! empty( post_type_archive_title( null, false ) ) ) {
			return post_type_archive_title( null, false );
		} else {

			if ( get_post_type() == 'post' ) {
				$frontpage_id    = get_option( 'page_for_posts' );
				$frontpage_title = get_the_title( $frontpage_id );
				if ( $frontpage_id ) {
					return esc_attr( $frontpage_title );
				}
			} elseif ( get_post_type() == 'portfolio' ) {
				return esc_attr( 'Portfolio', 'embertheme' );
			}

		}


    elseif ( is_page() ):
		return get_the_title();
	else:
		return get_the_title();
	endif;
}


function differ_check_url( $url ) {
	$headers = @get_headers( $url );
	$headers = ( is_array( $headers ) ) ? implode( "\n ", $headers ) : $headers;

	return (bool) preg_match( '#^HTTP/.*\s+[(200|301|302)]+\s#i', $headers );
}

function differ_is_blog() {
	return ( is_archive() || is_author() || is_category() || is_search() || is_home() || is_single() || is_tag() ) ;
}


// wp_kes function
function differ_wp_kses( $differ_string ) {
	$allowed_tags = array(
		'img'    => array(
			'src'    => array(),
			'alt'    => array(),
			'width'  => array(),
			'height' => array(),
			'class'  => array(),
		),
		'a'      => array(
			'href'  => array(),
			'title' => array(),
			'class' => array(),
		),
		'span'   => array(
			'class' => array(),
		),
		'br'     => array(),
		'div'    => array(
			'class' => array(),
			'id'    => array(),
		),
		'h1'     => array(
			'class' => array(),
			'id'    => array(),
		),
		'h2'     => array(
			'class' => array(),
			'id'    => array(),
		),
		'h3'     => array(
			'class' => array(),
			'id'    => array(),
		),
		'h4'     => array(
			'class' => array(),
			'id'    => array(),
		),
		'h5'     => array(
			'class' => array(),
			'id'    => array(),
		),
		'h6'     => array(
			'class' => array(),
			'id'    => array(),
		),
		'p'      => array(
			'class' => array(),
			'id'    => array(),
		),
		'strong' => array(
			'class' => array(),
			'id'    => array(),
		),
		'b'      => array(
			'class' => array(),
			'id'    => array(),
		),
		'i'      => array(
			'class' => array(),
			'id'    => array(),
		),
		'del'    => array(
			'class' => array(),
			'id'    => array(),
		),


		'ul'    => array(
			'class' => array(),
			'id'    => array(),
		),
		'li'    => array(
			'class' => array(),
			'id'    => array(),
		),
		'ol'    => array(
			'class' => array(),
			'id'    => array(),
		),
		'input' => array(
			'class' => array(),
			'id'    => array(),
			'type'  => array(),
			'style' => array(),
			'name'  => array(),
			'value' => array(),
		),


		'textarea' => array(
			'class' => array(),
			'id'    => array(),
			'type'  => array(),
			'style' => array(),
			'name'  => array(),
			'value' => array(),
		),
	);
	if ( function_exists( 'wp_kses' ) ) {
		return wp_kses( $differ_string, $allowed_tags );
	}
}

/* ACF FIELDS */
function differ_get_field( $param, $id = null ) {

	if ( $id == null ) {
		$id = get_the_ID();
	}

	if ( function_exists( 'get_field' ) ) {
		return get_field( $param, $id );
	}
}

function differ_the_field( $param, $id = null ) {

	if ( $id == null ) {
		$id = get_the_ID();
	}

	if ( function_exists( 'the_field' ) ) {
		return the_field( $param );
	}
}

/* ACF OPTIONS */
function differ_get_option( $param ) {
	if ( function_exists( 'get_field' ) ) {
		return get_field( $param, 'option' );
	}
}

function differ_the_option( $param ) {
	if ( function_exists( 'the_field' ) ) {
		return the_field( $param, 'option' );
	}
}
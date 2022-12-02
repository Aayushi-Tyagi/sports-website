<?php
/**
 * Default customizer option
 */
function beetan_default_option( $index ) {
	$defaults = apply_filters( 'beetan_default_options', array(
		'header_container'                       => 'container',
		'sticky_header'                          => false,
		'float_header'                           => false,
		'site_header_background_color'           => '#ffffff',
		'site_header_box_shadow'                 => '#f1f1f1',
		'header_variation'                       => '3',
		'site_container_width'                   => 1200,
		'box_layout_inner_gap'                   => 40,
		'box_layout_background_color'            => '#ffffff',
		'default_container_layout'               => 'box',
		'page_container_layout'                  => '',
		'post_container_layout'                  => '',
		'archive_post_container_layout'          => 'contained',
		'archive_product_container_layout'       => 'contained',
		'product_container_layout'               => '',
		'sidebar_width'                          => 30,
		'page_sidebar_position'                  => 'no_sidebar',
		'post_sidebar_position'                  => 'no_sidebar',
		'archive_post_sidebar_position'          => 'no_sidebar',
		'archive_product_sidebar_position'       => 'no_sidebar',
		'product_sidebar_position'               => 'no_sidebar',
		'blog_layout'                            => 'default',
		'blog_grid_columns'                      => '2',
		'blog_content'                           => 'full',
		'blog_excerpt_length'                    => 30,
		'blog_readmore'                          => true,
		'blog_posts_gap'                         => 5,
		'blog_post_inner_gap'                    => 40,
		'blog_post_background_color'             => '#ffffff',
		'blog_featured_image_display_style'      => 'cover',
		'hide_single_post_title'                 => false,
		'hide_page_title'                        => false,
		'primary_color'                          => '#29B475',
		'site_background_color'                  => '#f8f8f8',
		'text_color'                             => '#343a40',
		'heading_color'                          => '#16252d',
		'sub_heading_color'                      => '#16252d',
		'link_color'                             => '#343a40',
		'link_hover_color'                       => '#29B475',
		'base_font_scale'                        => 1.5,
		'base_font_size'                         => 16,
		'base_font_weight'                       => 400,
		'base_line_height'                       => 1.7,
		'paragraph_margin_top'                   => 0,
		'paragraph_margin_bottom'                => 30,
		'body_font'                              => array(
			'family' => 'roboto',
			'style'  => array( '300', '400', '500', '700' ),
			'subset' => array( 'latin', 'latin-ext' ),
		),
		'heading_font'                           => array(
			'family' => 'roboto',
			'style'  => array( '300', '400', '500', '700' ),
			'subset' => array( 'latin', 'latin-ext' ),
		),
		'h1_font_size'                           => 48,
		'h2_font_size'                           => 40,
		'h3_font_size'                           => 32,
		'h4_font_size'                           => 28,
		'h5_font_size'                           => 24,
		'h6_font_size'                           => 20,
		'h1_font_weight'                         => 300,
		'h2_font_weight'                         => 300,
		'h3_font_weight'                         => 400,
		'h4_font_weight'                         => 400,
		'h5_font_weight'                         => 400,
		'h6_font_weight'                         => 500,
		'h1_line_height'                         => 1.3,
		'h2_line_height'                         => 1.25,
		'h3_line_height'                         => 1.2,
		'h4_line_height'                         => 1.2,
		'h5_line_height'                         => 1.75,
		'h6_line_height'                         => 1.75,
		'h1_margin_top'                          => 0,
		'h1_margin_bottom'                       => 30,
		'h2_margin_top'                          => 0,
		'h2_margin_bottom'                       => 16,
		'h3_margin_top'                          => 0,
		'h3_margin_bottom'                       => 16,
		'h4_margin_top'                          => 0,
		'h4_margin_bottom'                       => 16,
		'h5_margin_top'                          => 0,
		'h5_margin_bottom'                       => 0,
		'h6_margin_top'                          => 0,
		'h6_margin_bottom'                       => 0,
		'product_quantity_plus_minus_button'     => true,
		'shop_cart_layout'                       => 'layout-1',
		'sticky_cart_totals'                     => false,
		'cart_auto_update'                       => true,
		'hide_coupon_cart_page'                  => false,
		'change_proceed_to_checkout_button_text' => false,
		'enable_cart_cross_sells'                => true,
		'cart_cross_sells_products_limit'        => 3,
		'cart_cross_sells_columns'               => 3,
		'proceed_to_checkout_button_text'        => esc_html( 'Proceed to checkout' ),
		'copyright_text'                         => sprintf( /* translators: %s: StorePress. */ wp_kses_post( __( 'Copyright &copy; %1$s %2$s. All Rights Reserved.', 'beetan' ) ), date( 'Y' ), esc_html( get_option( 'blogname' ) ) )
	) );
	
	return isset( $defaults[ $index ] ) ? $defaults[ $index ] : false;
}

/**
 * Getting Theme Option data
 */
if ( ! function_exists( 'beetan_get_option' ) ) {
	function beetan_get_option( $index, $index2 = false ) {
		$theme_option = get_theme_mod( $index, beetan_default_option( $index ) );
		
		if ( $index2 ) {
			return isset( $theme_option[ $index2 ] ) ? $theme_option[ $index2 ] : false;
		}
		
		return $theme_option;
	}
}

/**
 * Standard Fonts
 */
if ( ! function_exists( 'beetan_standard_fonts' ) ) {
	function beetan_standard_fonts() {
		return apply_filters( 'beetan_standard_fonts', array(
			"arial"               => "Arial, Helvetica, sans-serif",
			"arial-black"         => "'Arial Black', Gadget, sans-serif",
			"bookman-old-style"   => "'Bookman Old Style', serif",
			"comic-sans-ms"       => "'Comic Sans MS', cursive",
			"courier"             => "Courier, monospace",
			"garamond"            => "Garamond, serif",
			"georgia"             => "Georgia, serif",
			"impact"              => "Impact, Charcoal, sans-serif",
			"lucida"              => "'Lucida Console', Monaco, monospace",
			"lucida-sans-unicode" => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
			"ms-sans-serif"       => "'MS Sans Serif', Geneva, sans-serif",
			"ms-serif"            => "'MS Serif', 'New York', sans-serif",
			"palatino-linotype"   => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
			"tahoma"              => "Tahoma, Geneva, sans-serif",
			"times-new-roman"     => "'Times New Roman', Times, serif",
			"trebuchet-ms"        => "'Trebuchet MS', Helvetica, sans-serif",
			"verdana"             => "Verdana, Geneva, sans-serif",
		) );
	}
}

/**
 * Standard Fonts Style
 */
if ( ! function_exists( 'beetan_standard_font_width' ) ) {
	function beetan_standard_font_width() {
		return apply_filters( 'beetan_standard_font_width', array(
			'400'  => 'Regular 400',
			'700'  => 'Bold 700',
			'400i' => 'Regular 400 Italic',
			'700i' => 'Bold 700 Italic',
		) );
	}
}

/**
 * Standard Fonts Subset
 */
if ( ! function_exists( 'beetan_standard_font_subset' ) ) {
	function beetan_standard_font_subset() {
		return apply_filters( 'beetan_standard_font_subset', array(
			'latin'     => 'Latin',
			'latin-ext' => 'Latin Extended'
		) );
	}
}

/**
 * Get all Google Fonts
 */
if ( ! function_exists( 'beetan_all_google_fonts' ) ) {
	function beetan_all_google_fonts() {
		return include apply_filters( 'beetan_google_fonts_file_path', get_theme_file_path( '/inc/google-fonts-default.php' ) ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	}
}

/**
 * Get Google Fonts
 */
if ( ! function_exists( 'beetan_google_fonts' ) ) {
	function beetan_google_fonts() {
		$fonts = beetan_all_google_fonts();
		
		return apply_filters( 'beetan_google_fonts', wp_list_pluck( $fonts, 'name', 'id' ) );
	}
}

/**
 * Get Google Font
 */
if ( ! function_exists( 'beetan_get_google_font' ) ) {
	function beetan_get_google_font( $name, $key = 'name' ) {
		$google_fonts = beetan_all_google_fonts();
		$fonts        = wp_list_pluck( $google_fonts, $key, 'id' );
		
		return isset( $fonts[ $name ] ) ? $fonts[ $name ] : false;
	}
}

/**
 * Get Font Family
 */
if ( ! function_exists( 'beetan_get_font_family' ) ) {
	function beetan_get_font_family( $key ) {
		$name = ( ! empty( beetan_get_option( $key, 'family' ) ) ) ? trim( beetan_get_option( $key, 'family' ) ) : 'roboto';
		
		return str_replace( array( '"', "'" ), "", beetan_get_google_font( $name, 'family' ) );
	}
}

/**
 * Get Font Style
 */
if ( ! function_exists( 'beetan_get_font_style' ) ) {
	function beetan_get_font_style( $key ) {
		$name = trim( beetan_get_option( $key, 'style' ) );
		
		$italic = strpos( $name, 'i' );
		
		if ( $italic ) {
			return 'italic';
		}
		
		return 'normal';
	}
}

/**
 * Get Google Font URL
 */
if ( ! function_exists( 'beetan_get_google_fonts_url' ) ) {
	function beetan_get_google_fonts_url( $keys ) {
		$families     = array();
		$family_group = array();
//		$subsets      = array();
		
		foreach ( (array) $keys as $key ) {
			$font = beetan_get_option( $key );
			
			if ( ! isset( $font['family'] ) ) {
				// continue;
				$font['family'] = 'roboto';
			}
			
			if ( isset( $font['family'] ) ) {
				$family = trim( $font['family'] );
			}
			
			if ( isset( $font['style'] ) ) {
				$style = (array) $font['style'];
			}
			
			/*if ( isset( $font['subset'] ) ) {
				$subset = $font['subset'];
			}*/
			
			$family = ucwords( beetan_get_google_font( $family, 'name' ) );
			
			if ( $family ) {
				// Add Family to store.
				if ( ! isset( $families[ $family ] ) ) {
					$families[ $family ] = array();
				}
				
				// Add variation under a family to store.
				if ( ! empty( $style ) ) {
					$families[ $family ] = $style;
				}
				
				// Add subset
				/*if ( ! empty( $subset ) ) {
					$subsets = $subset;
				}*/
			}
		}
		
		foreach ( $families as $family => $style ) {
			if ( $style ) {
				$family_group[] = $family . ':wght@' . implode( ';', array_unique( $style ) );
			} else {
				$family_group[] = $family;
			}
		}
		
		$query_args = array(
			'family'  => implode( '&family=', array_unique( $family_group ) ),
			'display' => 'swap',
//			'subset'  => implode( ',', array_unique( $subsets ) ),
		);
		
		if ( ! empty( $families ) ) {
			return esc_url_raw( add_query_arg( $query_args, 'https://fonts.googleapis.com/css2' ) );
		} else {
			return false;
		}
	}
}

/**
 * Add YITH Wishlist count ajax for live number update
 */
if ( defined( 'YITH_WCWL' ) && beetan_is_woocommerce_active() ) {
	function beetan_wishlist_ajax_update_count() {
		$count_num = yith_wcwl_count_all_products();
		
		wp_send_json( array(
			'count_num' => esc_html( $count_num )
		) );
	}
	
	add_action( 'wp_ajax_sp_update_wishlist_count', 'beetan_wishlist_ajax_update_count' );
	add_action( 'wp_ajax_nopriv_sp_update_wishlist_count', 'beetan_wishlist_ajax_update_count' );
}


/**
 * Add YITH Wishlist supportive scripts
 */
if ( defined( 'YITH_WCWL' ) && beetan_is_woocommerce_active() ) {
	function beetan_wishlist_enqueue_custom_script() {
		wp_add_inline_script(
			'jquery-yith-wcwl',
			"
			jQuery( function( $ ) {
				$( document ).on( 'added_to_wishlist removed_from_wishlist', function() {
					$.get( yith_wcwl_l10n.ajax_url, {
						action: 'sp_update_wishlist_count'
					}, function( data ) {
						$('.wishlist_items_count').hide().text( data.count_num ).fadeIn(500);
					} );
				} );
			} );
			"
		);
	}
	
	add_action( 'wp_enqueue_scripts', 'beetan_wishlist_enqueue_custom_script', 20 );
}
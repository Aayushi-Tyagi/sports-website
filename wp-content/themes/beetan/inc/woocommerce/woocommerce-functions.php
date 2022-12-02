<?php
if ( ! function_exists( 'beetan_product_quantity_button' ) ) {
	/**
	 * Product quantity plus minus button
	 */
	function beetan_product_quantity_button() {
		echo '<div class="beetan-quantity-buttons">';
		echo '<a href="#" class="quantity-plus" role="button">' . esc_html( '+' ) . '</a>';
		echo '<a href="#" class="quantity-minus" role="button">' . esc_html( '-' ) . '</a>';
		echo '</div>';
	}
}

if ( ! function_exists( 'beetan_product_sale_percentage' ) ) {
	/**
	 * Product discount percentage
	 */
	function beetan_product_sale_percentage() {
		global $product;
		
		$percentages  = array();
		$product_type = $product->get_type();
		$is_on_sale   = $product->is_on_sale();
		
		if ( ! $is_on_sale ) {
			return false;
		}
		
		if ( 'variable' == $product_type ) {
			$prices = $product->get_variation_prices();
			
			foreach ( $prices['price'] as $key => $price ) {
				// Only on sale variations
				if ( $prices['regular_price'][ $key ] !== $price ) {
					$percentages[] = round( 100 - ( floatval( $prices['sale_price'][ $key ] ) / floatval( $prices['regular_price'][ $key ] ) * 100 ) );
				}
			}
			
			// Keep the highest value
			$percentage = max( $percentages ) . '%';
		} elseif ( 'grouped' == $product_type ) {
			$children_ids = $product->get_children();
			
			foreach ( $children_ids as $child_id ) {
				$child_product = wc_get_product( $child_id );
				$regular_price = (float) $child_product->get_regular_price();
				$sale_price    = (float) $child_product->get_sale_price();
				
				if ( $sale_price != 0 || ! empty( $sale_price ) ) {
					$percentages[] = round( 100 - ( $sale_price / $regular_price * 100 ) );
				}
			}
			
			// Keep the highest value
			$percentage = max( $percentages ) . '%';
		} else {
			$regular_price = (float) $product->get_regular_price();
			$sale_price    = (float) $product->get_sale_price();
			
			if ( $sale_price != 0 || ! empty( $sale_price ) ) {
				$percentage = round( 100 - ( $sale_price / $regular_price * 100 ) ) . '%';
			} else {
				return false;
			}
		}
		
		return printf( '<span class="sales-badge sale-percentage">%s%s</span>', absint( $percentage ), esc_html__( '% OFF', 'beetan' ) );
	}
}

if ( ! function_exists( 'beetan_product_brand' ) ) {
	function beetan_product_brand() {
		$brand_obj = wp_get_object_terms( get_the_ID(), 'product_brand' );
		
		if ( is_wp_error( $brand_obj ) ) {
			return;
		}
		
		if ( ! empty( $brand_obj ) ) {
			$brand_array = wp_list_pluck( $brand_obj, 'name' );
			$brand_name  = implode( ',', $brand_array );
			
			echo '<span class="product_brand">' . esc_html( $brand_name ) . '</span>';
		}
	}
}

if ( class_exists( 'Woo_Variation_Gallery' ) ) {
	/**
	 * Additional Variation Image Gallery plugin compatible
	 */
	add_filter( 'woo_variation_gallery_default_width', function ( $width ) {
		$width = 48;
		
		return $width;
	} );
}

if ( ! function_exists( 'beetan_shop_product_title' ) ) {
	/**
	 * Shop product title
	 */
	function beetan_shop_product_title() {
		echo '<a href="' . esc_url( get_the_permalink() ) . '">';
		woocommerce_template_loop_product_title();
		echo '</a>';
	}
}

if ( ! function_exists( 'beetan_shop_product_img_overlay' ) ) {
	/**
	 * Shop thumbnail overlay
	 */
	function beetan_shop_product_img_overlay() {
		echo '<div class="beetan-shop-thumbnail-overlay">';
		
		do_action( 'beetan_shop_thumbnail_overlay_content', get_the_ID() );
		
		echo '</div>';
	}
}

if ( ! function_exists( 'beetan_shop_item_view_details_button' ) ) {
	/**
	 * Shop view details button
	 */
	function beetan_shop_item_view_details_button() {
		printf( '<a href="%s" class="button view-details">%s</a>', esc_url( get_the_permalink() ), esc_html__( 'View Details', 'beetan' ) );
	}
}

if ( ! function_exists( 'beetan_change_shop_pagination_arrow' ) ) {
	/**
	 * Change shop page pagination arrow
	 *
	 * @param $args
	 *
	 * @return mixed
	 */
	function beetan_change_shop_pagination_arrow( $args ) {
		$args['prev_text'] = '<span class="material-icons">navigate_before</span>';
		$args['next_text'] = '<span class="material-icons">navigate_next</span>';
		
		return $args;
	}
}

if ( ! function_exists( 'beetan_button_proceed_to_checkout' ) ) {
	/**
	 * Change cart page `Proceed to Checkout` button text
	 */
	function beetan_button_proceed_to_checkout() {
		$button_text = get_theme_mod( 'proceed_to_checkout_button_text' );
		
		if ( ! empty( $button_text ) ) {
			printf( '<a href="%s" class="checkout-button button alt wc-forward">%s</a>', esc_url( wc_get_checkout_url() ), esc_html( $button_text ) );
		}
	}
}
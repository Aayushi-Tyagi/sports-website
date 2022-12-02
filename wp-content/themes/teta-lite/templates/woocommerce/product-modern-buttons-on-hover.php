<div <?php wc_product_class( $classes, $product ); ?>>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
	?>
	<div class="productwrap">
		<?php
		if ( $badges != 'disable' && $request_from == 'widget' ) {
			if ( $product->is_on_sale() ) {
				echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'teta-lite' ) . '</span>', $post, $product );
			}

			kite_custom_label();
		}
		?>
		<span class="added_to_cart_icon icon icon-check"></span>
		<div class="add_to_cart_btn_wrap lazy-load-hover-container">

		<?php
			/**
			 * Hook: woocommerce_before_shop_loop_item_title.
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( "woocommerce_before_{$request_from}_loop_item_title" );

		?>
		

		<?php 
			if ( $badges !== 'disable' ) {
				if ( $request_from == 'shop') {
					if ( $product->is_on_sale() ) {
						echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'teta-lite' ) . '</span>', $post, $product );
					}

					kite_custom_label();
				}
			}

			if ( $request_from == 'widget' ) {
				woocommerce_template_loop_product_link_open();
				echo '</a>';
				
				echo woocommerce_get_product_thumbnail( $image_size );
			}

			if ( $hover_image == 'show' && count( $attachment_ids ) > 0 ) {
				if ($request_from == 'shop') {
					$first_gallery_img = reset( $attachment_ids ); // get the first image of gallery
					$image_link        = wp_get_attachment_url( $first_gallery_img );

					if ( isset( $image_link ) ) {

						if ( $layout == 'masonry' ) {
							// Auto-height product images used in masonry style
							$img_src = wp_get_attachment_image_src( $first_gallery_img, 'Kite_product_thumbnail-auto-height' );
						} else {
							$img_src = wp_get_attachment_image_src( $first_gallery_img, 'shop_catalog' );
						}

						if ( $img_src != false ) {
							printf( '<div class="hover-image lazy-load lazy-load-hover bg-lazy-load" data-src="%s"></div>', esc_url( $img_src[0] ) );
						} else {
							printf( '<div class="hover-image lazy-load lazy-load-hover bg-lazy-load" data-src="%s"></div>', esc_url( $image_link ) );
						}
					}
				} else { // Request From Widget
					$image_src     = '';
					$image         = '';
					$attachment_id = $attachment_ids[0];

					if ( ! function_exists( 'aq_resize' ) && $image_size != 'full' ) {
						$image_size = 'full';
					}

					if ( $image_size == 'full' ) {
						$image_src = wp_get_attachment_image_src( $attachment_id, 'full' );
						$image     = '<div class="hover-image lazy-load lazy-load-hover bg-lazy-load" data-src="' . esc_url( $image_src[0] ) . '"></div>';

					} else {
						if ( function_exists( 'wc_get_image_size' ) ) {

							$image_dimension = wc_get_image_size( $image_size );

							$image_link = wp_get_attachment_url( $attachment_id );
							$img_url    = aq_resize( $image_link, $image_dimension['width'], $image_dimension['height'], $image_dimension['crop'], true, true );

							if ( ! $img_url ) {
								$img_url = $image_link;
							}

							$image = '<div class="hover-image lazy-load lazy-load-hover bg-lazy-load" data-src="' . esc_url( $img_url ) . '"></div>';

						} else {

							$image_url = wp_get_attachment_image_src( $attachment_id, apply_filters( 'single_product_large_thumbnail_size', $image_size ) );
							if ( $image_url != false ) {
								$image = '<div class="hover-image lazy-load lazy-load-hover bg-lazy-load" data-src="' . esc_url( $image_url[0] ) . '"></div>';
							} else {
								$image_src = wp_get_attachment_image_src( $attachment_id, 'full' );
								$image     = '<div class="hover-image lazy-load lazy-load-hover bg-lazy-load" data-src="' . esc_url( $image_src[0] ) . '"></div>';
							}
						}
					}
					// Sanitization performed in above lines!
					echo '' . $image;
				}
			}
			?>
			
				<div class="product-buttons <?php if ( $product->is_type( 'variable' ) ) { echo 'has-variation'; } ?>">

					<?php do_action( "kite_woocommerce_{$request_from}_loop_buttons", $product, $quickview, $wishlist, $compare, $ajax_add_to_cart, $catalog_mode ); ?>

				</div>
				<?php if ( $cart_button_style == 'quantity' ) { ?>
				<div class="product-quantity <?php if ( ! ( $product->is_purchasable() && $product->is_in_stock() ) || $product->get_type() != 'simple' ) echo esc_attr( 'disable' ); ?>">
					<span class="minus"></span>
					<input type="number" step="1" min="1" name="quantity" value="1" inputmode="numeric">
					<span class="plus"></span>
				<?php } ?>
				<?php
				if ( $cart_button_style == 'quantity' || $cart_button_style == 'stretched' ) {
					echo apply_filters(
						'woocommerce_loop_add_to_cart_link',
						sprintf(
							'<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s %s" data-min-quantity="%s"><span class="icon"></span><span class="txt" data-hover="%s">%s</span></a><span class="kt-tooltip"><span class="hint-txt">%s</span></span>',
							esc_url( $product->add_to_cart_url() ),
							esc_attr( $product->get_id() ),
							esc_attr( $product->get_sku() ),
							kite_get_min_product_quantity(),
							$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button modern-buttons-on-hover-cart-btn' : 'modern-buttons-on-hover-cart-btn',
							esc_attr( $product->get_type() ),
							esc_attr( $product->get_type() == 'simple' && 'yes' === $ajax_add_to_cart ? 'ajax_add_to_cart' : 'swiper-no-swiping' ), 
							kite_get_min_product_quantity(),
							esc_attr( $product->add_to_cart_text() ),
							esc_html( $product->add_to_cart_text() ),
							esc_html__( "Add to Cart", 'teta-lite' )
						),
						$product
					);
				}
				?>
				<?php if ( $cart_button_style == 'quantity' ) { ?>
				</div>
				<?php } ?>
			<!-- 
			-->

		</div>

		<div class="wrap_after_thumbnail">

			<?php

			/**
			 * woocommerce_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( "woocommerce_shop_loop_item_title" );

			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( "woocommerce_after_shop_loop_item_title" );

			if ( $badges !== 'disable' ) {
				if ( ! $product->is_in_stock() ) {
					echo '<div class="out_of_stock_badge_loop">' . esc_html__( 'Out of Stock', 'teta-lite' ) . '</div>';
				}
			}
			?>

		</div>
		<?php
		if ( $request_from == 'widget' ) {
			if ( $countdown_activation == 'on' ) {
				add_deal_count_down_timer( 1 );
			}
			if ( $progressbar_activation == 'on' ) {
				kite_stock_progress_bar( 1 );
			}
		}
		?>
	</div>
</div>
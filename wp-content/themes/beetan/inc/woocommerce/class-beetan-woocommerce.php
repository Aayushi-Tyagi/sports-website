<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Beetan
 */

// If plugin - 'WooCommerce' not exist then return.
if ( ! beetan_is_woocommerce_active() ) {
	return;
}

/**
 * Beetan WooCommerce Compatibility
 */
if ( ! class_exists( 'Beetan_Woocommerce' ) ) {
	
	class Beetan_Woocommerce {
		
		private static $instance;
		
		/**
		 * Initiator
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			
			return self::$instance;
		}
		
		/**
		 * Constructor
		 */
		public function __construct() {
			$this->includes();
			$this->hooks();
			
			do_action( 'beetan_woocommerce_loaded', $this );
		}
		
		/**
		 * Includes
		 */
		public function includes() {
			require_once get_template_directory() . '/inc/woocommerce/woocommerce-functions.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		}
		
		/**
		 * Hooks
		 */
		public function hooks() {
			add_action( 'after_setup_theme', array( $this, 'setup_theme' ) );
			add_filter( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			add_filter( 'body_class', array( $this, 'body_class' ) );
			add_action( 'wp', array( $this, 'woocommerce_init' ), 1 );
			add_action( 'wp', array( $this, 'product_customize' ), 5 );
			add_action( 'widgets_init', array( $this, 'register_widgets' ) );
			
			add_action( 'woocommerce_before_main_content', array( $this, 'woocommerce_wrapper_before' ) );
			add_action( 'woocommerce_after_main_content', array( $this, 'woocommerce_wrapper_after' ) );
			
			add_action( 'woocommerce_before_shop_loop', array( $this, 'shop_toolbar_open' ) );
			add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 20 );
			add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 25 );
			add_action( 'woocommerce_before_shop_loop', array( $this, 'shop_layout_buttons' ), 30 );
			add_action( 'woocommerce_before_shop_loop', array( $this, 'shop_toolbar_close' ), 40 );
			
			add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'woocommerce_cart_link_fragment' ) );
			add_filter( 'woocommerce_output_related_products_args', array( $this, 'related_products_args' ) );
			add_filter( 'beetan_get_sidebar', array( $this, 'replace_sidebar' ) );
		}
		
		public function shop_toolbar_open() {
			echo '<div class="beetan-shop-toolbar">';
		}
		
		public function shop_toolbar_close() {
			echo '</div>';
		}
		
		public function shop_layout_buttons() {
			if ( ! is_shop() && ! is_product_taxonomy() ) {
				return;
			}
			
			echo '<nav class="beetan-shop-layout">';
			echo '<a href="#" class="shop-layout-btn list-view" id="list-view-btn"><span class="material-icons">format_list_bulleted</span></a>';
			echo '<a href="#" class="shop-layout-btn grid-view active" id="grid-view-btn"><span class="material-icons">grid_view</span></a>';
			echo '</nav>';
		}
		
		/**
		 * WooCommerce setup theme
		 */
		public function setup_theme() {
			add_theme_support(
				'woocommerce',
				array(
					'thumbnail_image_width' => 150,
					'single_image_width'    => 300,
					'product_grid'          => array(
						'default_rows'    => 3,
						'min_rows'        => 1,
						'default_columns' => 4,
						'min_columns'     => 1,
						'max_columns'     => 6,
					),
				)
			);
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		}
		
		/**
		 * WooCommerce specific scripts & stylesheets.
		 */
		public function enqueue_scripts() {
			$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
			
			wp_enqueue_style( 'beetan-woocommerce-style', esc_url( get_theme_file_uri( "/assets/css/woocommerce{$suffix}.css" ) ), array(), beetan_assets_version( "/assets/css/woocommerce{$suffix}.css" ) );
			
			$font_path   = WC()->plugin_url() . '/assets/fonts/';
			$inline_font = '@font-face {
                font-family: "star";
                src: url("' . $font_path . 'star.eot");
                src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
                    url("' . $font_path . 'star.woff") format("woff"),
                    url("' . $font_path . 'star.ttf") format("truetype"),
                    url("' . $font_path . 'star.svg#star") format("svg");
                font-weight: normal;
                font-style: normal;
            }';
			
			wp_add_inline_style( 'beetan-woocommerce-style', $inline_font );
			
			wp_enqueue_script( 'beetan-woocommerce-scripts', esc_url( get_theme_file_uri( "/assets/js/woocommerce{$suffix}.js" ) ), array( 'jquery' ), beetan_assets_version( "/assets/js/woocommerce{$suffix}.js" ), true );
		}
		
		/**
		 * Add 'woocommerce-active' class to the body tag.
		 *
		 * @param $classes
		 *
		 * @return mixed
		 */
		public function body_class( $classes ) {
			$classes[] = 'woocommerce-active';
			
			return $classes;
		}
		
		/**
		 * Remove WooCommerce Default actions
		 */
		public function woocommerce_init() {
			remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
			remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
			remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
			remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
			remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
		}
		
		/**
		 * WooCommerce Default Shop Product Customization
		 */
		public function product_customize() {
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
			remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
			
			add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 10 );
			add_action( 'woocommerce_shop_loop_item_title', 'beetan_shop_product_title', 10 );
			add_action( 'woocommerce_shop_loop_item_title', 'beetan_product_sale_percentage', 8 );
			add_action( 'woocommerce_shop_loop_item_title', 'beetan_product_brand', 9 );
			add_action( 'woocommerce_before_shop_loop_item_title', 'beetan_shop_product_img_overlay', 20 );
			add_action( 'beetan_shop_thumbnail_overlay_content', 'beetan_shop_item_view_details_button', 15 );
			add_filter( 'woocommerce_pagination_args', 'beetan_change_shop_pagination_arrow' );
			
			// Enable Quantity +/- button
			if ( get_theme_mod( 'product_quantity_plus_minus_button', true ) ) {
				add_action( 'woocommerce_after_quantity_input_field', 'beetan_product_quantity_button' );
			}
			
			// Hide cart page coupon form
			if ( is_cart() && get_theme_mod( 'hide_coupon_cart_page', false ) ) {
				add_filter( 'woocommerce_coupons_enabled', '__return_false' );
			}
			
			// Change cart page `Proceed to Checkout` button text
			if ( ! empty( get_theme_mod( 'proceed_to_checkout_button_text' ) ) && get_theme_mod( 'change_proceed_to_checkout_button_text', false ) ) {
				remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );
				add_action( 'woocommerce_proceed_to_checkout', 'beetan_button_proceed_to_checkout', 20 );
			}
			
			// Remove cart page cross-sells from default position
			remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
			
			// Cart cross-sell
			if ( get_theme_mod( 'enable_cart_cross_sells', true ) ) {
				// Add cart page cross-sells UNDER the cart table
				if ( 'layout-2' === get_theme_mod( 'shop_cart_layout', 'layout-1' ) && get_theme_mod( 'sticky_cart_totals' ) ) {
					add_action( 'woocommerce_after_cart_table', 'woocommerce_cross_sell_display' );
				} else {
					add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );
				}
				
				// Cross-sells columns
				add_filter( 'woocommerce_cross_sells_columns', function ( $columns ) {
					return get_theme_mod( 'cart_cross_sells_columns', 3 );
				} );
				
				// Cross-sells products limit
				add_filter( 'woocommerce_cross_sells_total', function ( $limit ) {
					return get_theme_mod( 'cart_cross_sells_products_limit', 3 );
				} );
			}
			
			if ( defined( 'YITH_WCQV' ) ) {
				remove_action( 'woocommerce_after_shop_loop_item', array(
					YITH_WCQV_Frontend(),
					'yith_add_quick_view_button'
				), 15 );
				add_action( 'beetan_shop_thumbnail_overlay_content', array(
					YITH_WCQV_Frontend(),
					'yith_add_quick_view_button'
				), 10 );
			}
			
			add_filter( 'woocommerce_sale_flash', '__return_false' );
		}
		
		/**
		 * WooCommerce Before Content Wrapper.
		 *
		 * @return void
		 */
		public function woocommerce_wrapper_before() {
			echo '<section class="content-area">';
			
			if ( 'left_sidebar' == beetan_sidebar_layout() ) {
				get_sidebar();
			}
			
			echo '<main id="primary" class="site-main">';
		}
		
		/**
		 * WooCommerce After Content Wrapper.
		 *
		 * @return void
		 */
		public function woocommerce_wrapper_after() {
			echo '</main><!-- #main -->';
			
			if ( 'right_sidebar' == beetan_sidebar_layout() ) {
				get_sidebar();
			}
			
			echo '</section>';
		}
		
		public function register_widgets() {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Shop Sidebar', 'beetan' ),
					'id'            => 'sidebar-product-archive',
					/* translators: widget description */
					'description'   => sprintf( __( 'Add widgets here to show in single product page sidebar. Make sure you have enabled Sidebar layout by going to <a href="%1$s"><strong>Appearance / Customizer / Sidebar Options.</strong></a>', 'beetan' ), esc_url( admin_url( 'customize.php?autofocus%5Bsection%5D=sidebar_settings_section' ) ) ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			);
			register_sidebar(
				array(
					'name'          => esc_html__( 'Single Product Sidebar', 'beetan' ),
					'id'            => 'sidebar-product',
					/* translators: widget description */
					'description'   => sprintf( __( 'Add widgets here to show in shop page sidebar. Make sure you have enabled Sidebar layout by going to <a href="%1$s"><strong>Appearance / Customizer / Sidebar Options.</strong></a>', 'beetan' ), esc_url( admin_url( 'customize.php?autofocus%5Bsection%5D=sidebar_settings_section' ) ) ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			);
		}
		
		/**
		 * Related Products Args.
		 *
		 * @param array $args related products args.
		 *
		 * @return array $args related products args.
		 */
		public function related_products_args( $args ) {
			$shop_grid = get_option( 'woocommerce_catalog_columns', 4 );
			$defaults  = array(
				'posts_per_page' => absint( $shop_grid ),
				'columns'        => absint( $shop_grid ),
			);
			
			$args = wp_parse_args( $defaults, $args );
			
			return $args;
		}
		
		/**
		 * Cart Fragments.
		 *
		 * Ensure cart contents update when products are added to the cart via AJAX.
		 *
		 * @param $fragments
		 *
		 * @return mixed
		 */
		public function woocommerce_cart_link_fragment( $fragments ) {
			ob_start();
			$this->woocommerce_cart_link();
			$fragments['a.cart-contents'] = ob_get_clean();
			
			return $fragments;
		}
		
		/**
		 * Cart Link.
		 *
		 * Displayed a link to the cart including the number of items present and the cart total.
		 *
		 * @return void
		 */
		public function woocommerce_cart_link() {
			$item_count = WC()->cart->get_cart_contents_count();
			?>
            <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="site-navigation-right__item cart-contents"
               title="<?php esc_attr_e( 'View your shopping cart', 'beetan' ); ?>">
                <span class="material-icons">shopping_cart</span>
                <span class="status count"><?php echo esc_html( $item_count ); ?></span>
            </a>
			<?php
		}
		
		/**
		 * Custom mini cart
		 *
		 * @return false|string
		 */
		public function woocommerce_mini_cart() {
			if ( is_cart() ) {
				$class = 'current-menu-item';
			} else {
				$class = '';
			}
			
			ob_start();
			?>
            <li class="site-mini-cart">
				<?php $this->woocommerce_cart_link(); ?>

                <ul class="site-mini-cart__dropdown">
                    <li>
						<?php
						$instance = array(
							'title' => '',
						);
						
						the_widget( 'WC_Widget_Cart', $instance );
						?>
                    </li>
                </ul>
            </li>
			<?php
			return ob_get_clean();
		}
		
		/**
		 * Assign shop sidebar for store page.
		 */
		public function replace_sidebar( $sidebar ) {
			if ( is_shop() || is_product_taxonomy() ) {
				$sidebar = 'sidebar-product-archive';
			} elseif ( is_product() ) {
				$sidebar = 'sidebar-product';
			}
			
			return $sidebar;
		}
		
	}
}

Beetan_Woocommerce::instance();



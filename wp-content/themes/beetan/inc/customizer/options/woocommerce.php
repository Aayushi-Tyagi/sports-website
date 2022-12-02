<?php
/*
 * General
 */
$wp_customize->add_section(
	'shop_general_settings_section',
	array(
		'title'    => esc_html__( 'General', 'beetan' ),
		'panel'    => 'woocommerce',
		'priority' => 1
	)
);

/* Quantity button */
$wp_customize->add_setting(
	'product_quantity_plus_minus_button',
	array(
		'default'           => beetan_default_option( 'product_quantity_plus_minus_button' ),
		'sanitize_callback' => 'beetan_sanitize_boolean'
	)
);
$wp_customize->add_control(
	new Beetan_Customize_Toggle_Control( $wp_customize,
		'product_quantity_plus_minus_button',
		array(
			'label'    => esc_html__( 'Enable Quantity +/- button', 'beetan' ),
			'section'  => 'shop_general_settings_section',
			'settings' => 'product_quantity_plus_minus_button',
		)
	)
);


/*
 * Cart
 */
$wp_customize->add_section(
	'shop_cart_settings_section',
	array(
		'title'    => esc_html__( 'Cart', 'beetan' ),
		'panel'    => 'woocommerce',
		'priority' => 21
	)
);

/* Cart page layout */
$wp_customize->add_setting(
	'shop_cart_layout',
	array(
		'default'           => beetan_default_option( 'shop_cart_layout' ),
		'sanitize_callback' => 'sanitize_key',
	)
);
$wp_customize->add_control(
	new Beetan_Customize_Radio_Image_Control( $wp_customize,
		'shop_cart_layout',
		array(
			'label'    => esc_html__( 'Cart Layout', 'beetan' ),
			'section'  => 'shop_cart_settings_section',
			'settings' => 'shop_cart_layout',
			'choices'  => array(
				'layout-1' => array(
					'label' => esc_html__( 'layout 1', 'beetan' ),
					'url'   => get_theme_file_uri( '/assets/images/cart-layout-1.svg' )
				),
				'layout-2' => array(
					'label' => esc_html__( 'layout 2', 'beetan' ),
					'url'   => get_theme_file_uri( '/assets/images/cart-layout-2.svg' )
				)
			)
		)
	)
);

/* Sticky Cart totals */
$wp_customize->add_setting(
	'sticky_cart_totals',
	array(
		'default'           => beetan_default_option( 'sticky_cart_totals' ),
		'sanitize_callback' => 'beetan_sanitize_boolean'
	)
);
$wp_customize->add_control(
	new Beetan_Customize_Toggle_Control( $wp_customize,
		'sticky_cart_totals',
		array(
			'label'    => esc_html__( 'Sticky Cart Totals', 'beetan' ),
			'section'  => 'shop_cart_settings_section',
			'settings' => 'sticky_cart_totals',
			'active_callback' => function () {
				if ( 'layout-2' === get_theme_mod( 'shop_cart_layout', 'layout-1' ) ) {
					return true;
				}
				
				return false;
			},
		)
	)
);

/* Cart auto update */
$wp_customize->add_setting(
	'cart_auto_update',
	array(
		'default'           => beetan_default_option( 'cart_auto_update' ),
		'sanitize_callback' => 'beetan_sanitize_boolean'
	)
);
$wp_customize->add_control(
	new Beetan_Customize_Toggle_Control( $wp_customize,
		'cart_auto_update',
		array(
			'label'    => esc_html__( 'Cart Auto Update on Quantity Change', 'beetan' ),
			'section'  => 'shop_cart_settings_section',
			'settings' => 'cart_auto_update'
		)
	)
);

/* Change Proceed to Checkout button text */
$wp_customize->add_setting(
	'change_proceed_to_checkout_button_text',
	array(
		'default'           => beetan_default_option( 'change_proceed_to_checkout_button_text' ),
		'sanitize_callback' => 'beetan_sanitize_boolean'
	)
);
$wp_customize->add_control(
	new Beetan_Customize_Toggle_Control( $wp_customize,
		'change_proceed_to_checkout_button_text',
		array(
			'label'    => esc_html__( 'Change "Proceed to Checkout" Button Text', 'beetan' ),
			'section'  => 'shop_cart_settings_section',
			'settings' => 'change_proceed_to_checkout_button_text',
		)
	)
);

/* Proceed to Checkout button text */
$wp_customize->add_setting(
	'proceed_to_checkout_button_text',
	array(
		'default'           => beetan_default_option( 'proceed_to_checkout_button_text' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'proceed_to_checkout_button_text',
	array(
		'type'            => 'text',
		'label'           => esc_html__( '"Proceed to Checkout" Button Text', 'beetan' ),
		'section'         => 'shop_cart_settings_section',
		'active_callback' => function () {
			if ( get_theme_mod( 'change_proceed_to_checkout_button_text', false ) ) {
				return true;
			}
			
			return false;
		},
	)
);

/* Hide cart page coupon form */
$wp_customize->add_setting(
	'hide_coupon_cart_page',
	array(
		'default'           => beetan_default_option( 'hide_coupon_cart_page' ),
		'sanitize_callback' => 'beetan_sanitize_boolean'
	)
);
$wp_customize->add_control(
	new Beetan_Customize_Toggle_Control( $wp_customize,
		'hide_coupon_cart_page',
		array(
			'label'    => esc_html__( 'Hide Coupon Form', 'beetan' ),
			'section'  => 'shop_cart_settings_section',
			'settings' => 'hide_coupon_cart_page',
		)
	)
);

/* Enable cross-sells */
$wp_customize->add_setting(
	'enable_cart_cross_sells',
	array(
		'default'           => beetan_default_option( 'enable_cart_cross_sells' ),
		'sanitize_callback' => 'beetan_sanitize_boolean'
	)
);
$wp_customize->add_control(
	new Beetan_Customize_Toggle_Control( $wp_customize,
		'enable_cart_cross_sells',
		array(
			'label'    => esc_html__( 'Enable Cross-Sells', 'beetan' ),
			'section'  => 'shop_cart_settings_section',
			'settings' => 'enable_cart_cross_sells',
		)
	)
);

/* Cross-sells Products limit */
$wp_customize->add_setting(
	'cart_cross_sells_products_limit',
	array(
		'default'           => beetan_default_option( 'cart_cross_sells_products_limit' ),
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control(
	new Beetan_Customize_Range_Control( $wp_customize,
		'cart_cross_sells_products_limit',
		array(
			'label'    => esc_html__( 'Cross-Sells Products Limit', 'beetan' ),
			'section'  => 'shop_cart_settings_section',
			'input_attrs' => array(
				'min'    => 1,
				'max'    => 4,
				'step'   => 1,
			),
			'active_callback' => function () {
				if ( get_theme_mod( 'enable_cart_cross_sells', true ) ) {
					return true;
				}
				
				return false;
			},
		)
	)
);

/* Cross-sells Columns */
$wp_customize->add_setting(
	'cart_cross_sells_columns',
	array(
		'default'           => beetan_default_option( 'cart_cross_sells_columns' ),
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control(
	new Beetan_Customize_Range_Control( $wp_customize,
		'cart_cross_sells_columns',
		array(
			'label'    => esc_html__( 'Cross-Sells Columns', 'beetan' ),
			'section'  => 'shop_cart_settings_section',
			'input_attrs' => array(
				'min'    => 1,
				'max'    => 4,
				'step'   => 1,
			),
			'active_callback' => function () {
				if ( get_theme_mod( 'enable_cart_cross_sells', true ) ) {
					return true;
				}
				
				return false;
			},
		)
	)
);
<div class="site-navigation-right">
    <ul>
		<?php
		if ( defined( 'YITH_WCWL' ) && beetan_is_woocommerce_active() ) {
			get_template_part( 'template-parts/header/header', 'wishlist' );
		}

		if ( class_exists( 'Beetan_Woocommerce' ) ) {
			echo Beetan_Woocommerce::instance()->woocommerce_mini_cart(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

			get_template_part( 'template-parts/header/header', 'login' );
		}

		get_template_part( 'template-parts/header/header', 'search' );
		?>
    </ul>
</div>
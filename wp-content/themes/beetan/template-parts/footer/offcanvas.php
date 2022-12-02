<div class="sidebar-offcanvas-nav" id="sidebar-offcanvas-nav">
	<nav id="offcanvas-navigation" class="offcanvas-navigation" itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" aria-label="Site Navigation">
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'menu_id'         => 'offcanvas-menu',
				'menu_class'      => 'offcanvas-menu',
				'container' => '',
			)
		);
		?>
	</nav>

    <button class="menu-close" id="menu-close"><span class="material-icons">close</span></button>
</div>
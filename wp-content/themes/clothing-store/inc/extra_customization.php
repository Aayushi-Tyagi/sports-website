<?php 

	/*---------------------------Width -------------------*/

	$clothing_store_custom_style= "";
	
	$clothing_store_theme_width = get_theme_mod( 'clothing_store_width_options','full_width');

    if($clothing_store_theme_width == 'full_width'){

		$clothing_store_custom_style .='body{';

			$clothing_store_custom_style .='max-width: 100%;';

		$clothing_store_custom_style .='}';

	}else if($clothing_store_theme_width == 'container'){

		$clothing_store_custom_style .='body{';

			$clothing_store_custom_style .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';

		$clothing_store_custom_style .='}';

	}else if($clothing_store_theme_width == 'container_fluid'){

		$clothing_store_custom_style .='body{';

			$clothing_store_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

		$clothing_store_custom_style .='}';
	}

	
	$clothing_store_sticky_header = get_theme_mod('clothing_store_sticky_header');

		if($clothing_store_sticky_header != true){

			$clothing_store_custom_style .='.menu_header_box.fixed{';

				$clothing_store_custom_style .='position: static';
				
			$clothing_store_custom_style .='}';
		}


	/*---------------------------Scroll-top-position -------------------*/
	
	$clothing_store_scroll_options = get_theme_mod( 'clothing_store_scroll_options','right_align');

    if($clothing_store_scroll_options == 'right_align'){

		$clothing_store_custom_style .='.scroll-top button{';

			$clothing_store_custom_style .='';

		$clothing_store_custom_style .='}';

	}else if($clothing_store_scroll_options == 'center_align'){

		$clothing_store_custom_style .='.scroll-top button{';

			$clothing_store_custom_style .='right: 0; left:0; margin: 0 auto; top:85% !important';

		$clothing_store_custom_style .='}';

	}else if($clothing_store_scroll_options == 'left_align'){

		$clothing_store_custom_style .='.scroll-top button{';

			$clothing_store_custom_style .='right: auto; left:5%; margin: 0 auto';

		$clothing_store_custom_style .='}';
	}

	//-------------------------------------------------------------------------------

	$clothing_store_logo_max_height = get_theme_mod('clothing_store_logo_max_height');

	if($clothing_store_logo_max_height != false){

		$clothing_store_custom_style .='.custom-logo-link img{';

			$clothing_store_custom_style .='max-height: '.esc_html($clothing_store_logo_max_height).'px;';
			
		$clothing_store_custom_style .='}';
	}
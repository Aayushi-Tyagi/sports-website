<?php
/*
* Start Footer Settings
*/
$wp_customize->add_section(
	'footer_options',
	array(
		'title'    => esc_html__( 'Footer Options', 'beetan' ),
		'priority' => 32,
	)
);
$wp_customize->add_setting(
	'copyright_text',
	array(
		'default'           => beetan_default_option( 'copyright_text' ),
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new Beetan_Customize_TinyMCE_Control( $wp_customize,
		'copyright_text',
		array(
			'label'   => esc_html__( 'Copyright Text', 'beetan' ),
			'section' => 'footer_options'
		)
	)
);
/*
* End Footer Settings
*/
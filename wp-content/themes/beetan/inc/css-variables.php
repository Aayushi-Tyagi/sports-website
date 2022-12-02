<?php
defined( 'ABSPATH' ) or die( 'Keep Silent' );

/**
 * @var string $site_background_color
 * @var integer $site_container_width
 * @var integer $sidebar_width
 * @var string $site_header_background_color
 * @var string $site_header_box_shadow
 * @var string $primary_color
 * @var string $primary_color
 * @var string $text_color
 * @var string $heading_color
 * @var string $sub_heading_color
 * @var string $link_color
 * @var string $link_hover_color
 * @var integer $blog_posts_gap
 * @var integer $blog_post_inner_gap
 * @var string $blog_post_background_color
 * @var integer $box_layout_inner_gap
 * @var string $box_layout_background_color
 * @var integer $base_font_size
 * @var integer $base_font_weight
 * @var integer $base_line_height
 * @var integer $paragraph_margin_top
 * @var integer $paragraph_margin_bottom
 * @var integer $h1_font_size
 * @var integer $h2_font_size
 * @var integer $h3_font_size
 * @var integer $h4_font_size
 * @var integer $h5_font_size
 * @var integer $h6_font_size
 * @var integer $h1_font_weight
 * @var integer $h2_font_weight
 * @var integer $h3_font_weight
 * @var integer $h4_font_weight
 * @var integer $h5_font_weight
 * @var integer $h6_font_weight
 * @var integer $h1_line_height
 * @var integer $h2_line_height
 * @var integer $h3_line_height
 * @var integer $h4_line_height
 * @var integer $h5_line_height
 * @var integer $h6_line_height
 * @var integer $h1_margin_top
 * @var integer $h1_margin_bottom
 * @var integer $h2_margin_top
 * @var integer $h2_margin_bottom
 * @var integer $h3_margin_top
 * @var integer $h3_margin_bottom
 * @var integer $h4_margin_top
 * @var integer $h4_margin_bottom
 * @var integer $h5_margin_top
 * @var integer $h5_margin_bottom
 * @var integer $h6_margin_top
 * @var integer $h6_margin_bottom
 */
?>

<style type="text/css">
    :root {
        --beetan-site-background-color: <?php echo esc_attr( maybe_hash_hex_color( $site_background_color ) ) ?>;
        --beetan-site-container-width: <?php echo absint( $site_container_width ) ?>px;
        --beetan-sidebar-width: <?php echo absint( $sidebar_width ) ?>%;

        --beetan-site-header-background-color: <?php echo esc_attr( $site_header_background_color ) ?>;
        --beetan-site-header-box-shadow-color: <?php echo esc_attr( $site_header_box_shadow ) ?>;

        --beetan-primary-color: <?php echo esc_attr( maybe_hash_hex_color( $primary_color ) ) ?>;
        --beetan-text-color: <?php echo esc_attr( maybe_hash_hex_color( $text_color ) ) ?>;
        --beetan-heading-color: <?php echo esc_attr( maybe_hash_hex_color( $heading_color ) ) ?>;
        --beetan-sub-heading-color: <?php echo esc_attr( maybe_hash_hex_color( $sub_heading_color ) ) ?>;
        --beetan-link-color: <?php echo esc_attr( maybe_hash_hex_color( $link_color ) ) ?>;
        --beetan-link-hover-color: <?php echo esc_attr( maybe_hash_hex_color( $link_hover_color ) ) ?>;

        --beetan-blog-posts-gap: <?php echo absint( $blog_posts_gap ) ?>px;
        --beetan-blog-post-inner-gap: <?php echo absint( $blog_post_inner_gap ) ?>px;
        --beetan-blog-background-color: <?php echo esc_attr( $blog_post_background_color ) ?>;
        --beetan-box-layout-inner-gap: <?php echo absint( $box_layout_inner_gap ) ?>px;
        --beetan-box-layout-background-color: <?php echo esc_attr( $box_layout_background_color ) ?>;

        --beetan-body-font-family: <?php echo esc_html( beetan_get_font_family('body_font') ) ?>;
        --beetan-heading-font-family: <?php echo esc_html( beetan_get_font_family('heading_font') ) ?>;

        --beetan-base-font-size: <?php echo absint( $base_font_size ) ?>px;
        --beetan-base-font-weight: <?php echo absint( $base_font_weight ) ?>;
        --beetan-base-line-height: <?php echo floatval( $base_line_height ) ?>;

        --beetan-paragraph-margin-top: <?php echo absint( $paragraph_margin_top ) ?>px;
        --beetan-paragraph-margin-bottom: <?php echo absint( $paragraph_margin_bottom ) ?>px;

        --beetan-h1-font-size: <?php echo absint( $h1_font_size ) ?>px;
        --beetan-h2-font-size: <?php echo absint( $h2_font_size ) ?>px;
        --beetan-h3-font-size: <?php echo absint( $h3_font_size ) ?>px;
        --beetan-h4-font-size: <?php echo absint( $h4_font_size ) ?>px;
        --beetan-h5-font-size: <?php echo absint( $h5_font_size ) ?>px;
        --beetan-h6-font-size: <?php echo absint( $h6_font_size ) ?>px;

        --beetan-h1-font-weight: <?php echo absint( $h1_font_weight ) ?>;
        --beetan-h2-font-weight: <?php echo absint( $h2_font_weight ) ?>;
        --beetan-h3-font-weight: <?php echo absint( $h3_font_weight ) ?>;
        --beetan-h4-font-weight: <?php echo absint( $h4_font_weight ) ?>;
        --beetan-h5-font-weight: <?php echo absint( $h5_font_weight ) ?>;
        --beetan-h6-font-weight: <?php echo absint( $h6_font_weight ) ?>;

        --beetan-h1-line-height: <?php echo floatval( $h1_line_height ) ?>;
        --beetan-h2-line-height: <?php echo floatval( $h2_line_height ) ?>;
        --beetan-h3-line-height: <?php echo floatval( $h3_line_height ) ?>;
        --beetan-h4-line-height: <?php echo floatval( $h4_line_height ) ?>;
        --beetan-h5-line-height: <?php echo floatval( $h5_line_height ) ?>;
        --beetan-h6-line-height: <?php echo floatval( $h6_line_height ) ?>;

        --beetan-h1-margin-top: <?php echo absint( $h1_margin_top ) ?>px;
        --beetan-h1-margin-bottom: <?php echo absint( $h1_margin_bottom ) ?>px;

        --beetan-h2-margin-top: <?php echo absint( $h2_margin_top ) ?>px;
        --beetan-h2-margin-bottom: <?php echo absint( $h2_margin_bottom ) ?>px;

        --beetan-h3-margin-top: <?php echo absint( $h3_margin_top ) ?>px;
        --beetan-h3-margin-bottom: <?php echo absint( $h3_margin_bottom ) ?>px;

        --beetan-h4-margin-top: <?php echo absint( $h4_margin_top ) ?>px;
        --beetan-h4-margin-bottom: <?php echo absint( $h4_margin_bottom ) ?>px;

        --beetan-h5-margin-top: <?php echo absint( $h5_margin_top ) ?>px;
        --beetan-h5-margin-bottom: <?php echo absint( $h5_margin_bottom ) ?>px;

        --beetan-h6-margin-top: <?php echo absint( $h6_margin_top ) ?>px;
        --beetan-h6-margin-bottom: <?php echo absint( $h6_margin_bottom ) ?>px;
    }
</style>
<?php
defined( 'ABSPATH' ) or die( 'Keep Silent' );
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
    <label>
        <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'Search label', 'beetan' ) ?></span>
        <input type="search" class="search-field" name="s"
               placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'Search placeholder', 'beetan' ) ?>"
               value="<?php echo esc_attr( get_search_query() ) ?>"
               title="<?php echo esc_attr_x( 'Search for:', 'Search title', 'beetan' ) ?>">
    </label>

    <button type="submit" class="search-submit"><span class="material-icons">search</span></button>
</form>
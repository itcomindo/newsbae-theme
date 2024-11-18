<?php

/**
 *
 * Part Search Form
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');
$icon_search = nbt_icon()['search'];
?>

<form class="form horizontal search-form small" method="get" action="<?php echo esc_url(home_url('/')); ?>" aria-label="Search form">
    <input type="text" class="search-field borad-5" name="s" placeholder="Search" value="<?php echo esc_html(get_search_query()); ?>" aria-label="Search input">
    <button type="submit" class="search-submit" aria-label="Submit search"><?php echo wp_kses($icon_search, nbt_allowed()); ?></button>
</form>
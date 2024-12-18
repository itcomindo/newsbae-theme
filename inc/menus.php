<?php

/**
 *
 * Inc Menus
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Register new menus for location: Header, Sidebar, Footer, App, Mobile. 
 */
function nbt_register_menus()
{
    register_nav_menus(
        array(
            'header' => 'Header Menu',
            'sidebar' => 'Sidebar Menu',
            'footer' => 'Footer Menu',
            'app' => 'App Menu',
            'mobile' => 'Mobile Menu',
            'canvas' => 'Canvas Menu'
        )
    );
}
add_action('init', 'nbt_register_menus');

/**
 * Renders a navigation menu based on the specified location and optional CSS classes.
 *
 * @param string $location The theme location identifier for the menu.
 * @param string $container_class Optional. CSS class for the container element. Default is an empty string.
 * @param string $menu_class Optional. CSS class for the menu element. Default is an empty string.
 */
// function nbt_menus($location, $container_class = '', $menu_class = '')
// {
//     $args = array(
//         'theme_location' => $location,
//         'menu_class' => $menu_class
//     );

//     wp_nav_menu($args);
// }






function nbt_menus($location)
{
    // Dapatkan lokasi menu
    $locations = get_nav_menu_locations();

    if (!isset($locations[$location])) {
        return false; // Lokasi tidak ditemukan
    }

    $menu_id = $locations[$location];
    $menu_items = wp_get_nav_menu_items($menu_id); // Dapatkan item menu

    return $menu_items; // Kembalikan daftar item menu
}

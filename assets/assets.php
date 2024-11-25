<?php

/**
 *
 * Assets
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

require_once THEME_PATH . '/assets/images/images.php';

/**
 * Enqueue scripts and styles.
 */
function nbt_load_assets()
{
    //Font Awesome.
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css', array(), '6.6.0', 'all');


    // Styles.
    wp_enqueue_style('nbt-style', THEME_ASSETS . '/css/global.min.css', array(), THEME_VERSION, 'all');

    // Scripts.

    //Deregister jQuery.
    wp_deregister_script('jquery');

    //Register jQuery new version.
    wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), '3.6.0', true);

    //Enqueue jQuery.
    wp_enqueue_script('jquery');


    //Enqueue scripts.
    wp_enqueue_script('nbt-script', THEME_ASSETS . '/js/global.min.js', array(), THEME_VERSION, true);

    if (is_home()) {
        //Load Flickity.
        wp_enqueue_script('flickity', 'https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.pkgd.min.js', array(), '2.2.2', true);

        // Load notification.js (this is under development).
        // wp_enqueue_script('nbt-notification', THEME_ASSETS . '/js/notification.min.js', array(), THEME_VERSION, true);

        //Load home.min.js.
        wp_enqueue_script('nbt-home', THEME_ASSETS . '/js/home.min.js', array(), THEME_VERSION, true);
    }
}
add_action('wp_enqueue_scripts', 'nbt_load_assets');

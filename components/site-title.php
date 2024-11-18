<?php

/**
 *
 * Component: Site Title
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Site Title
 */
function nbt_site_title()
{
    if (function_exists('get_bloginfo')) {
        $site_title = get_bloginfo('name');
        if ($site_title) {
            echo $site_title;
        } else {
            echo 'Site Title';
        }
    }
}

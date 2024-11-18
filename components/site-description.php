<?php

/**
 *
 * Component: Site Description
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Site Description
 */
function nbt_site_description()
{
    if (function_exists('get_bloginfo')) {
        $site_description = get_bloginfo('description');
        if ($site_description) {
            echo $site_description;
        } else {
            echo 'Site Description';
        }
    }
}

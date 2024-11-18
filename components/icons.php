<?php

/**
 *
 * Icons
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');


/**
 * Function nbt_allowed
 * @return array
 */
function nbt_icon()
{
    $icons = array(
        'search'   => '<i class="fas fa-search"></i>',
        'facebook' => '<i class="fab fa-facebook-f"></i>',
        'instagram' => '<i class="fab fa-instagram"></i>',
        'twitter'  => '<i class="fab fa-twitter"></i>',
        'youtube'  => '<i class="fab fa-youtube"></i>',
        'linkedin' => '<i class="fab fa-linkedin-in"></i>',
        'whatsapp' => '<i class="fab fa-whatsapp"></i>',
    );

    return array_map(function ($icon) {
        return wp_kses($icon, nbt_allowed());
    }, $icons);
}

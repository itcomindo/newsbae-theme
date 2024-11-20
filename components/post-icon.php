<?php

/**
 *
 * Post Icon
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

function nbt_post_icon()
{
    $nbt_post = carbon_get_the_post_meta('nbt_post');
    if ('video' === $nbt_post) {
        echo '<span class="icon"><i class="fas fa-video"></i></span>';
    } elseif ('gallery' === $nbt_post) {
        echo '<span class="icon"><i class="far fa-images"></i></span>';
    } else {
        echo '<span class="icon"><i class="fas fa-pen"></i></span>';
    }
}

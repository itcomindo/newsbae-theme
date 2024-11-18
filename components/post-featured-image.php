<?php

/**
 *
 * Component Post Featured Image
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');



/**
 * Displays the featured image of a post.
 *
 * @param int $the_post_id The ID of the post.
 * @param string $size Optional. The size of the image. Default 'full'.
 * @param bool $lazy Optional. Whether to lazy load the image. Default false.
 *
 * @return void
 */
function nbt_post_featured_image($the_post_id, $size = 'full', $lazy = false)
{
    if (has_post_thumbnail($the_post_id)) {
        $args = array(
            'class' => 'fim',
            'alt' => get_the_title($the_post_id),
            'title' => get_the_title($the_post_id),
            'src' => get_the_post_thumbnail_url($the_post_id, $size),
        );

        if ($lazy) {
            $args['loading'] = 'lazy';
        }

        echo '<img ' . implode(' ', array_map(
            function ($key, $value) {
                return $key . '="' . esc_attr($value) . '"';
            },
            array_keys($args),
            $args
        )) . ' />';
    } else {
        echo '<img class="fim find-this" src="' . esc_url(THEME_ASSETS . '/images/placeholder.webp') . '" alt="' . get_the_title($the_pos_id) . '" title="' . get_the_title($the_pos_id) . '" />';
    }
}

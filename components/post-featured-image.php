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
            'alt'   => get_the_title($the_post_id),
            'title' => get_the_title($the_post_id),
        );

        if ($lazy) {
            $args['loading'] = 'lazy';
        }

        // Gunakan fungsi bawaan untuk menghasilkan <img> dengan srcset
        echo get_the_post_thumbnail(
            $the_post_id,
            $size,
            $args
        );
    } else {
        echo '<img class="fim find-this" src="' . esc_url(THEME_ASSETS . '/images/placeholder.webp') . '" alt="' . get_the_title($the_post_id) . '" title="' . get_the_title($the_post_id) . '" />';
    }
}

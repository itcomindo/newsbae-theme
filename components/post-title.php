<?php

/**
 *
 * Component Post Title
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');


/**
 * Retrieves and optionally trims the post title.
 *
 * @param int $the_pos_id The ID of the post.
 * @param int $trim Optional. The maximum length of the post title. Default 200.
 * @return string The post title, trimmed to the specified length if necessary.
 */
function nbt_post_title($the_pos_id, $trim = 200)
{
    $post_title = get_the_title($the_pos_id);
    $post_title = strlen($post_title) > $trim ? substr($post_title, 0, $trim) . '...' : $post_title;
    return $post_title;
}

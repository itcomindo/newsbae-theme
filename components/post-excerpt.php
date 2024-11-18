<?php

/**
 *
 * Component Post Excerpt
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Generates a trimmed excerpt for a given post.
 *
 * @param int $the_post_id The ID of the post.
 * @param int $length Optional. The maximum length of the excerpt. Default is 160 characters.
 * @return string The trimmed post excerpt with an ellipsis appended if it exceeds the specified length.
 */
function nbt_post_excerpt($the_post_id, $length = 160)
{
    $post_excerpt = get_the_excerpt($the_post_id);
    $post_excerpt = strlen($post_excerpt) > $length ? substr($post_excerpt, 0, $length) . '...' : $post_excerpt;
    return $post_excerpt;
}

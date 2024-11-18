<?php

/**
 *
 * Component Post Author
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Retrieves the post author for a given post ID.
 *
 * @param int $the_pos_id The ID of the post.
 * 
 * @return string The post author.
 */
function nbt_post_author($the_pos_id, $link = true)
{
    $post_author = get_the_author_meta('display_name', $the_pos_id);
    $post_author = $link ? '<a href="' . get_author_posts_url(get_the_author_meta('ID', $the_pos_id)) . '" rel="author">' . $post_author . '</a>' : $post_author;
    return $post_author;
}

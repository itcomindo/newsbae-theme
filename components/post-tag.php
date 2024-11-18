<?php

/**
 *
 * Component Post Tag
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Retrieves the formatted post tags for a given post ID.
 *
 * @param int $the_pos_id The ID of the post.
 * 
 * @return string The formatted post tags.
 */
function nbt_post_tag($the_pos_id)
{
    //get all post tags and echo them as a list completed with title and link.
    $post_tags = get_the_tags($the_pos_id);
    $tag_list = '';
    if ($post_tags) {
        foreach ($post_tags as $tag) {
            $tag_list .= '<a href="' . get_tag_link($tag->term_id) . '" title="' . $tag->name . ' Tag">' . $tag->name . '</a>, ';
        }
        $tag_list = rtrim($tag_list, ', ');
    }
    return $tag_list;
}

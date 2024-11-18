<?php

/**
 *
 * Component Post Readmore Link
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');


/**
 * Function nbt_post_readmore_link
 * @param int $the_post_id the post id
 * @param string $text the text default is 'Read More'
 * @param string $element_class the element class default is 'more'
 * @return string
 */
function nbt_post_readmore_link($the_post_id, $text = 'Read More', $element_class = 'more')
{
    $post_id = $the_post_id;
    $post = get_post($post_id);
    $post_url = get_permalink($post_id);
    $post_title = get_the_title($post_id);
    $post_readmore_text = $text;
    $post_readmore_link = '<a href="' . $post_url . '" title="' . $post_title . '" class="' . $element_class . '">' . $post_readmore_text . '</a>';
    return $post_readmore_link;
}

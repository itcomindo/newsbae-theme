<?php

/**
 *
 * Components
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Retrieves the category of a post and optionally returns it as a link.
 *
 * @param int  $the_post_id The ID of the post.
 * @param bool $link        Optional. Whether to return the category as a link. Default true.
 * 
 * @return string The category name or a link to the category.
 */
function nbt_post_category($the_post_id, $link = true)
{
    $categories = get_the_category($the_post_id);
    $category = $categories ? $categories[0] : '';
    $category = $category ? $category : '';
    $category = $link ? '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>' : $category->name;
    return $category;
}

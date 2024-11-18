<?php

/**
 *
 * INC Global Query
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

function nbt_query_headline($post_perpage = 7)
{
    $args = array(
        'posts_per_page' => $post_perpage,
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'ignore_sticky_posts' => 1,
    );

    if (is_category()) {
        $category_id = get_queried_object_id();
        $args['cat'] = $category_id;
    } elseif (is_tag()) {
        $tag_id = get_queried_object_id();
        $args['tag_id'] = $tag_id;
    } elseif (is_author()) {
        $author_id = get_queried_object_id();
        $args['author'] = $author_id;
    }

    $query = new WP_Query($args);
}

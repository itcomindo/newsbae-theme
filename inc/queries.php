<?php

/**
 *
 * INC Global Query
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Query headline posts.
 *
 * This function retrieves a specified number of headline posts based on the given criteria.
 * It supports filtering by category, tag, and author.
 *
 * @param int $post_perpage Optional. Number of posts to retrieve. Default is 7.
 *
 * @return void
 */
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
    } elseif (is_home()) {
        $args['ignore_sticky_posts'] = 1;
    }

    $query = new WP_Query($args);
    return $query;
}


/**
 * Query sticky posts.
 *
 * This function retrieves all sticky posts.
 *
 * @param int $post_perpage Optional. Number of posts to retrieve. Default is 3.
 *
 * @return void
 */
function nbt_query_sticky_post($posts_perpage = 3)
{
    $args = array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => $posts_perpage,
        'post__in'       => get_option('sticky_posts'),
        'orderby'        => 'date',
        'order'          => 'DESC',
        'ignore_sticky_posts' => 1
    );
    return new WP_Query($args);
}


/**
 * Query Post by CarbonFields key _nbt_post = video.
 * 
 * This function retrieves all posts with meta key _nbt_post = video.
 * @param int $post_perpage Optional. Number of posts to retrieve. Default is 4.
 */
function nbt_query_video_post($posts_perpage = 4)
{
    $args = array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => $posts_perpage,
        'ignore_sticky_posts' => 1,
        'meta_query'     => array(
            array(
                'key'     => '_nbt_post',
                'value'   => 'video',
                'compare' => '=',
            ),
        ),
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        echo '<div class="items video">';
        while ($query->have_posts()) {
            $query->the_post();
            $the_post_id = get_the_ID();

            // Call the part-loop.php template.
            nb_part_loop($the_post_id, 'item', 'top', 'bot', true, true, false, false, false, false, false, 'Lihat Video', true);
        }
    }
    echo '</div>';
    wp_reset_postdata();
}



function nbt_query_gallery_post($posts_perpage = 4)
{
    $args = array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => $posts_perpage,
        'ignore_sticky_posts' => 1,
        'meta_query'     => array(
            array(
                'key'     => '_nbt_post',
                'value'   => 'gallery',
                'compare' => '=',
            ),
        ),
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        echo '<div class="items video">';
        while ($query->have_posts()) {
            $query->the_post();
            $the_post_id = get_the_ID();

            // Call the part-loop.php template.
            nb_part_loop($the_post_id, 'item', 'top', 'bot', true, true, false, false, false, false, false, 'Lihat Video', true);
        }
    }
    echo '</div>';
    wp_reset_postdata();
}

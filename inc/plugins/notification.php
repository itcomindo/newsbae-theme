<?php

/**
 *
 * Notification
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Get the latest post.
 *
 * This function retrieves the latest published post. It uses a transient to cache the result for 30 seconds
 * to improve performance and reduce the number of database queries.
 *
 * @return array|null An associative array containing the post ID, title, and permalink, or null if no post is found.
 */
function mm_get_latest_post()
{
    if (false === ($latest_post = get_transient('mm_latest_post'))) {
        // Query the latest post.
        $latest_post = get_posts([
            'numberposts' => 1,
            'post_status' => 'publish',
        ]);
        set_transient('mm_latest_post', $latest_post, 30);
    }

    if (!empty($latest_post)) {
        return [
            'id' => $latest_post[0]->ID,
            'title' => $latest_post[0]->post_title,
            'link' => get_permalink($latest_post[0]->ID),
        ];
    }

    return null;
}

/**
 * Register a REST API endpoint to get the latest post.
 *
 * This function registers a custom REST API endpoint at 'mm/v1/latest-post/'.
 * When a GET request is made to this endpoint, the 'mm_get_latest_post' function
 * is called to retrieve the latest published post.
 */
add_action('rest_api_init', function () {
    register_rest_route('mm/v1', '/latest-post/', [
        'methods' => 'GET',
        'callback' => 'mm_get_latest_post',
    ]);
});

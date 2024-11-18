<?php

/**
 *
 * Component Post Modified Date
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Retrieves the formatted post modified date for a given post ID.
 *
 * @param int    $the_pos_id The ID of the post.
 * @param string $format     Optional. The format of the date. Default 'F j, Y'.
 * 
 * @return string The formatted post modified date.
 */
function nbt_post_modified_date($the_pos_id, $format = 'F j, Y')
{
    $post_modified_date = get_the_modified_date($format, $the_pos_id);
    return $post_modified_date;
}

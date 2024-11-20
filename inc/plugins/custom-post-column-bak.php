<?php

/**
 *
 * Plugin Custom Post Column
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');


/**
 * Adds a custom column to the post list table in the WordPress admin.
 *
 * This function hooks into the 'manage_post_posts_columns' filter to add a new column
 * labeled 'Post Type' to the list of columns displayed in the post list table.
 *
 * @param array $columns An associative array of column headers.
 * @return array Modified array of column headers with the new 'Post Type' column added.
 */
add_filter('manage_post_posts_columns', 'nbt_add_post_type_column');
function nbt_add_post_type_column($columns)
{
    $columns['nbt_post'] = 'Post Type';
    return $columns;
}

/**
 * Display the value of the 'Post Type' custom column in the post list table.
 *
 * This function hooks into the 'manage_post_posts_custom_column' action to display
 * the value of the 'Post Type' custom column for each post in the post list table.
 *
 * @param string $column The name of the column to display.
 * @param int $post_id The ID of the current post.
 */
add_action('manage_post_posts_custom_column', 'nbt_show_post_type_column', 10, 2);
function nbt_show_post_type_column($column, $post_id)
{
    if ($column == 'nbt_post') {
        $post_type = carbon_get_post_meta($post_id, 'nbt_post');
        echo ucfirst($post_type); // Menampilkan nilai Post Type
    }
}

/**
 * Adds a custom column to the list of sortable columns in the post edit screen.
 *
 * This function hooks into the 'manage_edit-post_sortable_columns' filter
 * to add a custom column identified by 'nbt_post' to the array of sortable columns.
 *
 * @param array $columns An array of columns displayed in the post edit screen.
 * @return array Modified array of columns with the custom 'nbt_post' column added.
 */
add_filter('manage_edit-post_sortable_columns', 'nbt_make_post_type_column_sortable');
function nbt_make_post_type_column_sortable($columns)
{
    $columns['nbt_post'] = 'nbt_post';
    return $columns;
}

/**
 * Hook into the 'pre_get_posts' action to modify the query for sorting custom post type columns.
 *
 * @param WP_Query $query The current query object.
 *
 * This function checks if the current query is for the admin area and is the main query.
 * If the 'orderby' parameter is set to 'nbt_post', it modifies the query to sort by the 'nbt_post' meta key.
 * It also ensures that only published posts are included and adds a meta query to check for the existence of the 'nbt_post' meta key.
 */
add_action('pre_get_posts', 'nbt_sort_post_type_column');
function nbt_sort_post_type_column($query)
{
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->get('orderby') === 'nbt_post') {
        $query->set('meta_key', 'nbt_post');
        $query->set('orderby', 'meta_value');
        $query->set('post_status', 'publish'); // Set post status ke publish
        $query->set('meta_query', array(
            array(
                'key' => 'nbt_post',
                'compare' => 'EXISTS'
            )
        ));
    }
}

/**
 * Adds a custom filter dropdown to the post type admin list.
 *
 * This function hooks into the 'restrict_manage_posts' action to add a custom filter
 * dropdown to the post type admin list. The dropdown allows users to filter posts
 * by custom post types such as 'Regular Post', 'Video Post', and 'Gallery Post'.
 *
 * @global string $typenow The current post type.
 */
add_action('restrict_manage_posts', 'nbt_add_post_type_filter');
function nbt_add_post_type_filter()
{
    global $typenow;
    if ($typenow == 'post') {
        $selected = isset($_GET['nbt_post']) ? $_GET['nbt_post'] : '';
?>
        <select name="nbt_post">
            <option value="">All Post Types</option>
            <option value="post" <?php selected($selected, 'post'); ?>>Regular Post</option>
            <option value="video" <?php selected($selected, 'video'); ?>>Video Post</option>
            <option value="gallery" <?php selected($selected, 'gallery'); ?>>Gallery Post</option>
        </select>
<?php
    }
}

/**
 * Filters the posts displayed in the admin post list table based on a custom post type.
 *
 * Hooks into the 'pre_get_posts' action to modify the query for the admin post list table.
 *
 * @param WP_Query $query The current WP_Query instance, passed by reference.
 */
add_action('pre_get_posts', 'nbt_filter_post_type_column');
function nbt_filter_post_type_column($query)
{
    global $pagenow;
    $post_type = isset($_GET['nbt_post']) ? $_GET['nbt_post'] : '';

    if (is_admin() && $pagenow == 'edit.php' && !empty($post_type)) {
        $query->set('meta_query', array(
            array(
                'key'   => 'nbt_post',
                'value' => $post_type,
                'compare' => '='
            )
        ));
    }
}

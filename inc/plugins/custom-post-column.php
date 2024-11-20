<?php

/**
 *
 * Plugin Custom Post Column
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

function mm_filter_by_nbt_post()
{
    global $typenow;

    // Pastikan hanya tampil di post type 'post'
    if ($typenow == 'post') {
        // Pilihan sesuai dengan field nbt_post
        $options = [
            ''         => 'All',
            'video'    => 'Video',
            'gallery'  => 'Gallery',
            'resep'    => 'Resep',
            'standard' => 'Standard',
        ];

        $current_value = isset($_GET['nbt_post']) ? $_GET['nbt_post'] : '';

        echo '<select name="nbt_post">';
        foreach ($options as $key => $label) {
            printf(
                '<option value="%s" %s>%s</option>',
                esc_attr($key),
                selected($current_value, $key, false),
                esc_html($label)
            );
        }
        echo '</select>';
    }
}
add_action('restrict_manage_posts', 'mm_filter_by_nbt_post');

function mm_filter_posts_by_nbt_post($query)
{
    global $pagenow;

    // Pastikan hanya memfilter di admin dan post type 'post'
    if ($pagenow == 'edit.php' && isset($_GET['nbt_post']) && !empty($_GET['nbt_post']) && $query->is_main_query()) {
        $query->set('meta_query', [
            [
                'key'   => '_nbt_post',
                'value' => sanitize_text_field($_GET['nbt_post']),
                'compare' => '='
            ]
        ]);
    }
}
add_action('pre_get_posts', 'mm_filter_posts_by_nbt_post');


// Custom Coloumn.
function mm_add_nbt_post_column($columns)
{
    // Tambahkan kolom baru dengan nama 'NBT Post'
    $columns['nbt_post'] = 'NBT Post';
    return $columns;
}
add_filter('manage_post_posts_columns', 'mm_add_nbt_post_column');

function mm_display_nbt_post_column($column, $post_id)
{
    if ($column == 'nbt_post') {
        // Ambil nilai nbt_post dari database
        $nbt_post = get_post_meta($post_id, '_nbt_post', true);

        // Tampilkan nilai, atau placeholder jika kosong
        echo !empty($nbt_post) ? esc_html($nbt_post) : '-';
    }
}
add_action('manage_post_posts_custom_column', 'mm_display_nbt_post_column', 10, 2);

function mm_make_nbt_post_column_sortable($columns)
{
    // Tambahkan kolom 'NBT Post' ke kolom yang bisa disortir
    $columns['nbt_post'] = 'nbt_post';
    return $columns;
}
add_filter('manage_edit-post_sortable_columns', 'mm_make_nbt_post_column_sortable');

function mm_sort_nbt_post_column($query)
{
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if (isset($_GET['orderby']) && $_GET['orderby'] === 'nbt_post') {
        $query->set('meta_key', '_nbt_post');
        $query->set('orderby', 'meta_value');
    }
}
add_action('pre_get_posts', 'mm_sort_nbt_post_column');

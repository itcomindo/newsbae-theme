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
function nbt_post_author($the_post_id, $link = true)
{
    // Ambil ID penulis dari post
    $author_id = get_post_field('post_author', $the_post_id);

    // Jika ID penulis tidak ditemukan, kembalikan string kosong
    if (!$author_id) {
        return '';
    }

    // Ambil nama tampilan penulis
    $post_author = get_the_author_meta('display_name', $author_id);

    // Jika nama tampilan kosong, gunakan nama login
    if (empty($post_author)) {
        $post_author = get_the_author_meta('user_login', $author_id);
    }

    // Jika $link true, tambahkan hyperlink ke nama penulis
    if ($link) {
        $author_url = get_author_posts_url($author_id);
        return '<a href="' . esc_url($author_url) . '" rel="author">' . esc_html($post_author) . '</a>';
    }

    // Jika $link false, kembalikan nama penulis
    return esc_html($post_author);
}

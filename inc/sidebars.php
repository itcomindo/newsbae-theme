<?php

/**
 *
 * Sidebar
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Register sidebars
 */
function mm_register_sidebars()
{
    register_sidebar(array(
        'name'          => 'Homepage Sidebar',
        'id'            => 'homepage-sidebar',
        'description'   => 'Sidebar khusus untuk halaman depan',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => 'Post Sidebar',
        'id'            => 'post-sidebar',
        'description'   => 'Sidebar khusus untuk halaman post',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'mm_register_sidebars');

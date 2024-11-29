<?php

/**
 *
 * Home File
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

get_header();
get_template_part('parts/part', 'newsticker');
get_template_part('parts/part', 'headline');
get_template_part('parts/part', 'sticky-post');

if (function_exists('nbto_home_options')) {
    if (true === carbon_get_theme_option('newstab_enable')) {
        get_template_part('parts/part', 'news-tab');
    }
}



get_template_part('parts/part', 'news-box');
get_footer();

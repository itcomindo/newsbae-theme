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
get_template_part('parts/part', 'news-tab');
get_template_part('parts/part', 'news-box');
get_footer();

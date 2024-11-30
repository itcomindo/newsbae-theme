<?php

/**
 *
 * Options File
 * @package  nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

// Theme Options Group.
require_once THEME_PATH . '/inc/options/options-theme.php';
require_once THEME_PATH . '/inc/options/field-global-option.php';
require_once THEME_PATH . '/inc/options/field-home-option.php';
require_once THEME_PATH . '/inc/options/field-single-post-option.php';

// Global Meta Group.
require_once THEME_PATH . '/inc/options/field-facebook.php';
require_once THEME_PATH . '/inc/options/field-twitter.php';


// Post Meta Group.
require_once THEME_PATH . '/inc/options/options-post.php';
require_once THEME_PATH . '/inc/options/field-post-gallery.php';
require_once THEME_PATH . '/inc/options/field-post-video.php';

// Category Meta Group.
require_once THEME_PATH . '/inc/options/options-category.php';

// Menu Meta Group.
require_once THEME_PATH . '/inc/options/options-menu.php';

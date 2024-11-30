<?php

/**
 *
 * Core Optimizer
 * Description: Optimize WordPress core by removing unnecessary features
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');


/**
 * Disables default WordPress CSS styles for non-admin pages.
 *
 * This function dequeues and deregisters several default WordPress CSS styles
 * to optimize the front-end performance by removing unnecessary styles.
 *
 * The following styles are disabled:
 * - wp-block-library
 * - wp-block-library-theme
 * - wc-block-style
 * - global-styles
 * - classic-theme-styles
 *
 * The function is hooked to the 'wp_enqueue_scripts' action with a priority of 100.
 *
 * @return void
 */
function mm_disable_default_wp_css()
{
    if (!is_admin()) {
        wp_dequeue_style('wp-block-library');
        wp_deregister_style('wp-block-library');

        wp_dequeue_style('wp-block-library-theme');
        wp_deregister_style('wp-block-library-theme');

        wp_dequeue_style('wc-block-style');
        wp_deregister_style('wc-block-style');

        wp_dequeue_style('global-styles');
        wp_deregister_style('global-styles');

        wp_dequeue_style('classic-theme-styles');
        wp_deregister_style('classic-theme-styles');
    }
}
add_action('wp_enqueue_scripts', 'mm_disable_default_wp_css', 100);

/**
 * Removes inline CSS for specific WordPress styles.
 *
 * This function filters the HTML output of enqueued styles and removes the inline CSS
 * for the specified handles: 'global-styles' and 'classic-theme-styles'.
 *
 * @param string $html   The HTML output of the enqueued style.
 * @param string $handle The handle of the enqueued style.
 * @return string The modified HTML output, or an empty string if the handle matches.
 */
function mm_remove_inline_wp_css($html, $handle)
{
    $handles_to_remove = ['global-styles', 'classic-theme-styles'];
    if (in_array($handle, $handles_to_remove)) {
        return '';
    }
    return $html;
}
add_filter('style_loader_tag', 'mm_remove_inline_wp_css', 10, 2);



/**
 * Removes the WordPress version meta generator tag from the head section of the site.
 *
 * This function hooks into the 'init' action and removes the 'wp_generator' action from 'wp_head',
 * which prevents the WordPress version from being displayed in the site's HTML source code.
 *
 * @return void
 */
function mm_remove_meta_generator()
{
    remove_action('wp_head', 'wp_generator');
}
add_action('init', 'mm_remove_meta_generator');




/**
 * Removes unnecessary actions from the WordPress head section.
 *
 * This function removes the emoji detection script and emoji styles from the WordPress head section
 * to optimize the performance of the website.
 *
 * @return void
 */
function mm_cleanup_wp_head()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
}
add_action('init', 'mm_cleanup_wp_head');

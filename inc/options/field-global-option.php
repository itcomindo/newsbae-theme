<?php

/**
 *
 * Global Options File
 * @package  nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

use Carbon_Fields\Container;
use Carbon_Fields\Field;



/**
 * Defines global options for the theme.
 *
 * This function returns an array of global options fields, including a separator
 * for global options and a checkbox to disable the Gutenberg editor. It also merges
 * these fields with Facebook options fields.
 *
 * @return array The array of global options fields.
 */
function nbto_global_options()
{
    return array_merge(
        array(
            // Global Options.
            Field::make('separator', 'globalsep', 'Global Options')->set_classes('nbtsep big'),

            // Disable Gutenberg Editor.
            Field::make('checkbox', 'disable_gutenberg', 'Disable Gutenberg Editor')
                ->set_default_value('yes')
                ->set_option_value('yes'),


        ),

        nbto_facebook_options(),
        nbto_twitter_options()
    );
}


/**
 * Disables the Gutenberg editor based on a theme option.
 *
 * This function checks the 'disable_gutenberg' theme option using the Carbon Fields library.
 * If the option is set to true, it disables the Gutenberg editor for posts by adding a filter
 * that returns false for the 'use_block_editor_for_post' hook.
 *
 * @return void
 */
function nbt_disable_gutenberg()
{
    $disable_gutenberg = carbon_get_theme_option('disable_gutenberg');
    if ($disable_gutenberg == true) {
        add_filter('use_block_editor_for_post', '__return_false', 10);
    }
}
add_action('init', 'nbt_disable_gutenberg');

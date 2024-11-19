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
 * Theme options to be used in the theme
 */
function nbto_global_options()
{
    return array(
        // Global Options.
        Field::make('separator', 'globalsep', 'Global Options')->set_classes('nbtsep'),

        // Disable Gutenberg Editor.
        Field::make('checkbox', 'disable_gutenberg', 'Disable Gutenberg Editor')
            ->set_default_value('yes')
            ->set_option_value('yes'),
    );
}

function nbt_disable_gutenberg()
{
    $disable_gutenberg = carbon_get_theme_option('disable_gutenberg');
    if ($disable_gutenberg == true) {
        add_filter('use_block_editor_for_post', '__return_false', 10);
    }
}
add_action('init', 'nbt_disable_gutenberg');

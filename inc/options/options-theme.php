<?php

/**
 *
 * Theme Options File
 * @package  nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function nbt_theme_options()
{
    $option_container = Container::make('theme_options', 'Theme Options')
        ->add_tab('Global', nbto_global_options())
        ->add_tab('Home', nbto_home_options())
        ->add_tab('Single Post', nbto_single_post_options());
}
add_action('carbon_fields_register_fields', 'nbt_theme_options');

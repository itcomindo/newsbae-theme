<?php

/**
 *
 * Options for Menu
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Menu options to be used in the theme
 */
function nbto_menu_options()
{
    Container::make('nav_menu_item', 'Menu Options')
        ->add_fields(array(
            // Description.
            Field::make('html', 'crb_information_text')
                ->set_html('<h2>Please choose either upload your own icon image (please use png format) or paste fontawesome class e,g: "fa-brands fa-whatsapp" without quotation.</p>'),

            // insert icon fontawesome.
            Field::make('text', 'menu_icon_fontawesome', 'Menu Icon Fontawesome')
        ));
}
add_action('carbon_fields_register_fields', 'nbto_menu_options');

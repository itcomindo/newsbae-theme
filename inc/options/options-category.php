<?php

/**
 *
 * Options for Category
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Category options to be used in the theme
 */
function nbto_category_options()
{
    Container::make('term_meta', 'Category Options')
        ->where('term_taxonomy', '=', 'category')
        ->add_fields(array(
            // Description.
            Field::make('html', 'crb_information_text')
                ->set_html('<h2>Please choose either upload your own icon image (please use png format) or paste fontawesome class e,g: "fa-brands fa-whatsapp" without quotation.</p>'),


            // Upload Category Icon Image.
            Field::make('image', 'cat_icon_image', 'Category Icon Image')
                ->set_value_type('url'),

            // insert icon fontawesome.
            Field::make('text', 'cat_icon_fontawesome', 'Category Icon Fontawesome')
        ));
}
add_action('carbon_fields_register_fields', 'nbto_category_options');

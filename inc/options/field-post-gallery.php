<?php

/**
 *
 * Field Post Gallery
 * @package  nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function nbto_field_post_gallery()
{
    return array(
        Field::make('complex', 'nbt_gallery', 'Gallery')
            ->add_fields(array(
                //Image URL.
                Field::make('image', 'nbto_post_gallery_image_url', 'Image')
                    ->set_value_type('url'),

                //Title.
                Field::make('text', 'nbto_post_gallery_title', 'Title'),

                //Description.
                Field::make('text', 'nbto_post_gallery_description', 'Description'),
            ))
            ->set_collapsed(true)
            ->set_conditional_logic(array(
                array(
                    'field' => 'nbt_post',
                    'value' => 'gallery',
                    'compare' => '=',
                ),
            )),
    );
}

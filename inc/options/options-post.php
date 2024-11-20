<?php

/**
 *
 * Post Options File
 * @package  nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function nbt_post_type()
{
    Container::make('post_meta', 'Post Type')
        ->where('post_type', '=', 'post')
        ->add_fields(array_merge(
            array(
                Field::make('radio', 'nbt_post', 'Post')
                    ->add_options(array(
                        'standard' => 'Standard',
                        'video' => 'Video',
                        'gallery' => 'Gallery',
                        'resep' => 'Resep',
                    ))
                    ->set_default_value('standard'),
            ),
            nbto_field_post_gallery(),
            nbto_field_post_video(),
        ));
}
add_action('carbon_fields_register_fields', 'nbt_post_type');

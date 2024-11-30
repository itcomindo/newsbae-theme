<?php

/**
 *
 * Field: Facebook
 * @package  nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

use Carbon_Fields\Container;
use Carbon_Fields\Field;


function nbto_facebook_options()
{
    return array(

        // Seperator for Social Media.
        Field::make('separator', 'sosmedsep', 'Social Media')
            ->set_classes('nbtsep medium'),
        // Checkbox to Enable Facebook OpenGraph if don't use any other plugin that does this.
        Field::make('checkbox', 'enable_facebook_opengraph', 'Enable Facebook OpenGraph')
            ->set_default_value('yes')
            ->set_option_value('yes')
            ->set_help_text('Enable Facebook OpenGraph meta tags for better sharing on Facebook. note: just enable this if you don\'t use any other plugin that does this.'),

        // Facebook developer App ID if enable Facebook OpenGraph.
        Field::make('text', 'facebook_app_id', 'Facebook App ID')
            ->set_help_text('Enter your Facebook App ID to enable Facebook OpenGraph meta tags for better sharing on Facebook.')
            ->set_attribute('placeholder', 'Enter your Facebook App ID')
            ->set_attribute('type', 'number')
            ->set_required(true)
            ->set_conditional_logic(array(
                array(
                    'field' => 'enable_facebook_opengraph',
                    'value' => true,
                ),
            )),

        // Default Image for Facebook OpenGraph.
        Field::make('image', 'facebook_default_image', 'Default Image for Facebook OpenGraph')
            ->set_help_text('Upload a default image to be used for Facebook OpenGraph meta tags if no featured image is set for the post.')
            ->set_required(true)
            ->set_conditional_logic(array(
                array(
                    'field' => 'enable_facebook_opengraph',
                    'value' => true,
                ),
            )),
    );
}

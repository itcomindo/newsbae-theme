<?php

/**
 *
 * Field X
 * @package  nbt
 * Description: Adds X com (former is twitter) meta tags to the head section of the website.
 */

defined('ABSPATH') || die('No script kiddies please!');


use Carbon_Fields\Container;
use Carbon_Fields\Field;

function nbto_twitter_options()
{
    return array(
        // Enable Twitter Card.
        Field::make('checkbox', 'enable_twitter_card', 'Enable Twitter Card')
            ->set_default_value('no')
            ->set_option_value('yes')
            ->set_help_text('Enable Twitter Card meta tags for better sharing on Twitter.'),

        // Twitter Card Type.
        Field::make('select', 'twitter_card_type', 'Twitter Card Type')
            ->add_options(array(
                'summary' => 'Summary',
                'summary_large_image' => 'Summary with Large Image',
                'app' => 'App',
                'player' => 'Player',
                'product' => 'Product',
            ))
            ->set_default_value('summary')
            ->set_required(true)
            ->set_conditional_logic(array(
                array(
                    'field' => 'enable_twitter_card',
                    'value' => true,
                ),
            )),

        // Twitter Username.
        Field::make('text', 'twitter_username', 'Twitter Username')
            ->set_help_text('Enter your Twitter username without the @ symbol.')
            ->set_attribute('placeholder', 'Enter your Twitter username')
            ->set_required(true)
            ->set_conditional_logic(array(
                array(
                    'field' => 'enable_twitter_card',
                    'value' => true,
                ),
            )),

        // Default Image for Twitter Card.
        Field::make('image', 'twitter_default_image', 'Default Image for Twitter Card')
            ->set_help_text('Upload a default image to be used for Twitter Card meta tags if no featured image is set for the post.')
            ->set_required(true)
            ->set_conditional_logic(array(
                array(
                    'field' => 'enable_twitter_card',
                    'value' => true,
                ),
            )),

        // Twitter Card Image Alt Text.
        Field::make('text', 'twitter_card_image_alt', 'Twitter Card Image Alt Text')
            ->set_help_text('Enter the alt text for the default image used for Twitter Card meta tags.')
            ->set_attribute('placeholder', 'Enter the alt text for the default image')
            ->set_required(true)
            ->set_conditional_logic(array(
                array(
                    'field' => 'enable_twitter_card',
                    'value' => true,
                ),
            )),


    );
}

<?php

/**
 *
 * Field: Home Options
 * @package  nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

use Carbon_Fields\Container;
use Carbon_Fields\Field;


/**
 * Theme options to be used in the theme
 */
function nbto_single_post_options()
{
    return array(
        // Global Options.
        Field::make('separator', 'singleposopsep', 'Single Post Options')->set_classes('nbtsep big')
            ->set_help_text('Home Options where you can set the options for the home page.'),

        //Checkbox Enable Share Post Button.
        Field::make('checkbox', 'nbto_share_post_enable', 'Enable Share Post Button')
            ->set_default_value('no')
            ->set_option_value('yes')
            ->set_help_text('Enable or disable the share post button.'),

        // Multi Select Share Post Button, Facebook, Twitter, WhatsApp, Telegram, Pinterest, LinkedIn, Email, Copy Link.
        Field::make('multiselect', 'nbto_share_post_platforms', 'Choose Platforms')
            ->set_help_text('Choose the platforms you want to enable for sharing the post.')
            ->set_conditional_logic(array(
                array(
                    'field' => 'nbto_share_post_enable',
                    'value' => true,
                ),
            ))
            ->set_default_value(array('facebook', 'twitter', 'whatsapp', 'telegram', 'pinterest', 'linkedin', 'email', 'copylink'))
            ->add_options(array(
                'facebook' => 'Facebook',
                'twitter' => 'Twitter',
                'whatsapp' => 'WhatsApp',
                'telegram' => 'Telegram',
                'pinterest' => 'Pinterest',
                'linkedin' => 'LinkedIn',
                'email' => 'Email',
                'copylink' => 'Copy Link',
            ))













    );
}

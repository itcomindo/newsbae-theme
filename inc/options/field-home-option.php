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
function nbto_home_options()
{
    return array(
        // Global Options.
        Field::make('separator', 'homeopsep', 'Home Options')->set_classes('nbtsep big')
            ->set_help_text('Home Options where you can set the options for the home page.'),

        // Newstab Options.
        Field::make('separator', 'homeopnewstabsep', 'Newstab Options')->set_classes('nbtsep medium'),

        //Checkbox Enable/Disable Newstab.
        Field::make('checkbox', 'newstab_enable', 'Enable Newstab')
            ->set_default_value('no')
            ->set_option_value('yes')
            ->set_help_text('Enable or disable the newstab.'),

        Field::make('complex', 'newstabs', 'News Tab')
            ->set_max(6)
            ->set_collapsed(true)
            ->set_layout('tabbed-horizontal')
            ->add_fields(
                array(

                    // Category Name.
                    Field::make('text', 'newstab_catname', 'Category Custom Name')
                        ->set_help_text('This is the custom name for the category.'),

                    // Category ID.
                    Field::make('text', 'newstab_catid', 'Category ID')
                        ->set_attribute('type', 'number')
                        ->set_help_text('This is the category ID that will be used to display the news card.')
                )
            )
            ->set_header_template('
                <% if (newstab_catname) { %>
                    <%- newstab_catname %>
                <% } else { %>
                    Category
                <% } %>
            ')




    );
}

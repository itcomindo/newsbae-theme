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
        Field::make('separator', 'homeopsep', 'Home Options')->set_classes('nbtsep')
            ->set_help_text('Home Options where you can set the options for the home page.'),

        // Newstab Options.
        Field::make('separator', 'homeopnewstabsep', 'Newstab Options')->set_classes('nbtsep-child'),

        Field::make('complex', 'newstabs', 'News Tab')
            ->set_max(6)
            ->set_collapsed(true)
            ->set_layout('tabbed-horizontal')
            ->add_fields(
                array(
                    Field::make('text', 'newstab_catid', 'Category ID')
                        ->set_attribute('type', 'number')
                )
            )
            ->set_header_template('
                <% if (newstab_catid) { %>
                    <%- newstab_catid %>
                <% } else { %>
                    Category ID
                <% } %>
            ')




    );
}

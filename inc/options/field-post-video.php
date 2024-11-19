<?php

/**
 *
 * Field Post Gallery
 * @package  nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function nbto_field_post_video()
{
    return array(
        Field::make('complex', 'nbt_video', 'video')
            ->add_fields(array(
                //Video URL
                Field::make('text', 'nbto_post_video_url', 'Video URL')
                    ->set_help_text('Enter the ID from video Youtube e.g if the video URL is https://www.youtube.com/watch?v=1234567890, then enter 1234567890'),

                //Video Title
                Field::make('text', 'nbto_post_video_title', 'Title'),

                //Video Description
                Field::make('textarea', 'nbto_post_video_description', 'Description'),
            ))
            ->set_collapsed(true)
            ->set_conditional_logic(array(
                array(
                    'field' => 'nbt_post',
                    'value' => 'video',
                    'compare' => '=',
                ),
            )),
    );
}

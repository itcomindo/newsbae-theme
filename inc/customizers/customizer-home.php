<?php

/**
 *
 * Customizer Home
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');


function nbt_cust_home()
{
    // Panel.
    Yano::panel('panel_home', array(
        'title' => 'Home',
        'priority' => 1,
    ));

    // Section.
    Yano::section('section_headline', array(
        'title' => 'Section Headline',
        'panel' => 'panel_home',
        'priority' => 1,
    ));

    //Enable Headline Head.
    Yano::field('checkbox', array(
        'id' => 'enable_headline_head',
        'label' => 'Enable Headline Head',
        'section' => 'section_headline',
        'priority' => 1,
        'default' => true,
    ));

    // Headline Head.
    Yano::field('text', array(
        'id' => 'headline_head',
        'label' => 'Headline Head',
        'section' => 'section_headline',
        'priority' => 1,
        'default' => 'Headline News',
        'maxlength' => 50,
    ));
}

add_action('customize_register', 'nbt_cust_home');

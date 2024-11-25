<?php

/**
 *
 * Part Ads Floating Left Right
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');


/**
 * Renders a floating left advertisement block.
 *
 * This function outputs HTML for a floating left advertisement block
 * with a heading, some placeholder text, and a "Buy Now" button.
 *
 * @return void
 */
function nbt_flo_left()
{
?>
    <div class="ads flo left">
        <div class="ads-inner">
            <div class="ads-content">
                <h3 class="head-medium">ADS</h3>
                <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum, at?</span>
                <a href="#" class="btn ads">Buy Now</a>
            </div>
        </div>
    </div>
<?php
}


/**
 * Renders a floating right advertisement block.
 *
 * This function outputs HTML for a floating right advertisement block
 * with a heading, some placeholder text, and a "Buy Now" button.
 *
 * @return void
 */
function nbt_flo_right()
{
?>
    <div class="ads flo right">
        <div class="ads-inner">
            <div class="ads-content">
                <h3 class="head-medium">ADS</h3>
                <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum, at?</span>
                <a href="#" class="btn ads">Buy Now</a>
            </div>
        </div>
    </div>
<?php
}

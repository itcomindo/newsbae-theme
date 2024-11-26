<?php

/**
 *
 * Part Ads After Header Menu
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

?>

<div id="ads-after-header-menu" class="ads width-full">
    <div class="ads-inner">
        <div class="ads-content">
            <div id="adsafhm-closer" class="close">X</div>
            <h3 class="head-medium">ADS</h3>
            <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum, at?</span>
            <a href="#" class="btn ads">Buy Now</a>
        </div>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            jQuery('#adsafhm-closer').click(function() {
                jQuery('#ads-after-header-menu').slideUp(300);
            });
        });
    </script>

</div>
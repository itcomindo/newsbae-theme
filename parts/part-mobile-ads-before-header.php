<?php

/**
 *
 * Part Mobile Ads Before Header
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

?>

<div id="adsbfh540" class="ads width-full m540">
    <div class="ads-inner">
        <div class="ads-close">close</div>
        <div class="ads-content">
            <h3>Ads Before Header</h3>
            <span>This ads show in mobile version start in screen width below 540px only you can add custom ads or google adsense.</span>
            <a href="#" class="btn ads">Buy Nuw</a>
        </div>
    </div>
    <script>
        setTimeout(function() {
            jQuery('#adsbfh540').addClass('active');
        }, 1500);
        document.querySelector('#adsbfh540 .ads-close').addEventListener('click', function() {
            jQuery('#adsbfh540').slideUp().removeClass('active');
        });
    </script>
</div>
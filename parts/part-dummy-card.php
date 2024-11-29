<?php

/**
 *
 * Part: Dummy Card
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

function nbt_dummy_card($card = 8)
{
    $x = 0;
    echo '<div class="items dummy">';
    for ($i = 0; $i < $card; $i++) {
        $x++;
?>
        <div class="item">
            <div class="top">FIM</div>
            <div class="bot">
                <h3 class="head-smaller"><a href="#"><?php echo esc_html($x); ?>Lorem ipsum dolor sit amet, consectetur.</a></h3>
            </div>
        </div>
<?php
    }
    echo '</div>';
}

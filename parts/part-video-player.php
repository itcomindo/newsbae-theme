<?php

/**
 *
 * Part: Video Player
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');


?>
<div id="the-player" class="custom-post">
    <div class="top">
        <div class="player">
            <?php echo esc_html($nbt_post); ?>
        </div>
    </div>
    <div class="bot">
        <div class="items">
            <div class="item"><?php echo esc_html($nbt_post); ?></div>
            <div class="item"><?php echo esc_html($nbt_post); ?></div>
            <div class="item"><?php echo esc_html($nbt_post); ?></div>
        </div>
    </div>
</div>
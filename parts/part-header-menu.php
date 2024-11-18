<?php

/**
 *
 * Part Header Menu
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

?>

<div id="header-menu" class="section">
    <div class="inner-section">
        <div class="container">
            <div class="wrapper">
                <div class="items">
                    <div class="left">
                        <?php
                        nbt_menus('header', 'header-menu', 'header-menu__list');
                        ?>
                    </div>
                    <div class="right">
                        <?php
                        get_template_part('components/component', 'bars');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
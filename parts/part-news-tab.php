<?php

/**
 *
 * Part: News Tab
 * @package nbt
 * Description: This part is used to display the news tab which is every tab contains the news card based on the post category id.
 */

defined('ABSPATH') || die('No script kiddies please!');


?>

<section id="news-tab" class="section section-small">
    <div class="inner-section">
        <div class="container">
            <div class="wrapper">
                <div class="inner">
                    <div class="top">
                        <h2 class="section-head head-small">News Tab</h2>
                    </div>
                    <div class="tabs">
                        <div class="the-trigger">
                            <ul class="list-no-style triggers">
                                <li class="trigger active" data-cat="9">Hiburan</li>
                                <li class="trigger" data-cat="7">Kesehatan</li>
                                <li class="trigger" data-cat="3">Keuangan</li>
                                <li class="trigger" data-cat="6">Makanan</li>
                                <li class="trigger" data-cat="2">Olahraga</li>
                            </ul>
                        </div>
                        <div class="groups">

                            <!-- Hiburan -->
                            <div class="group active" data-cat="9">
                                <h3 class="head head-smaller">Hiburan</h3>
                                <?php
                                nbt_dummy_card(8);
                                ?>
                            </div>

                            <!-- Kesehatan -->
                            <div class="group" data-cat="7">
                                <h3 class="head head-smaller">Kesehatan</h3>
                                <?php
                                nbt_dummy_card(8);
                                ?>
                            </div>

                            <!-- Keuangan -->
                            <div class="group" data-cat="3">
                                <h3 class="head head-smaller">Keuangan</h3>
                                <?php
                                nbt_dummy_card(8);
                                ?>
                            </div>

                            <!-- Makanan -->
                            <div class="group" data-cat="6">
                                <h3 class="head head-smaller">Makanan</h3>
                                <?php
                                nbt_dummy_card(8);
                                ?>
                            </div>

                            <!-- Olahraga -->
                            <div class="group" data-cat="2">
                                <h3 class="head head-smaller">Olahraga</h3>
                                <?php
                                nbt_dummy_card(8);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
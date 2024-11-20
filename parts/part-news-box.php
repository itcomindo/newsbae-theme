<?php

/**
 *
 * Part: News Box
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

?>

<section id="news-box" class="section section-small">
    <div class="inner-section">
        <div class="container">
            <div class="wrapper">
                <h2 class="head-smaller section-head">News Box</h2>
                <div class="news-box-content">
                    <div class="left">
                        <div class="inner-left">
                            <div class="content">
                                <h3>Post Video</h3>
                                <?php
                                nbt_query_video_post($posts_perpage = 4);
                                ?>
                            </div>
                            <div class="content">
                                <h3>Post Gallery</h3>
                            </div>
                            <div class="content">
                                <h3>Post Post Feed</h3>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <?php
                        if (is_active_sidebar('homepage-sidebar')) : ?>
                            <aside id="homepage-sidebar" class="sidebar">
                                <?php dynamic_sidebar('homepage-sidebar'); ?>
                            </aside>
                        <?php endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
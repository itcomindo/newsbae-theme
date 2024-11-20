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

                            <!-- Video Post -->
                            <div class="content">
                                <h3>Video:</h3>
                                <?php
                                nbt_query_video_post($posts_perpage = 3);
                                ?>
                            </div>

                            <!-- ADS Full Width 1 -->
                            <div class="content">
                                <?php
                                get_template_part('parts/part', 'ads-full-width');
                                ?>
                            </div>

                            <!-- Foto Post -->
                            <div class="content">
                                <h3>Foto:</h3>
                                <?php
                                nbt_query_gallery_post($posts_perpage = 3);
                                ?>
                            </div>

                            <!-- ADS Full Width 2 -->
                            <div class="content">
                                <?php
                                get_template_part('parts/part', 'ads-full-width');
                                ?>
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
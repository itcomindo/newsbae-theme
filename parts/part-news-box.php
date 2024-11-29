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
                <h2 id="news-box-head" class="head-smaller section-head">News Box</h2>
                <div class="news-box-content">
                    <div class="left">
                        <div class="inner-left">

                            <!-- Video Post -->
                            <div class="content">
                                <h3>Video:</h3>
                                <?php
                                // Display the video post with parameter number of posts to show.
                                nbt_query_video_post($posts_perpage = 4);
                                ?>
                            </div>

                            <!-- ADS Full Width 1 -->
                            <div class="content">
                                <?php
                                // Display the ads full width.
                                get_template_part('parts/ads/part', 'ads-full-width');
                                ?>
                            </div>

                            <!-- Foto Post -->
                            <div class="content">
                                <h3>Foto:</h3>
                                <?php
                                // Display the gallery post with parameter number of posts to show.
                                nbt_query_gallery_post($posts_perpage = 4);
                                ?>
                            </div>

                            <!-- ADS Full Width 2 -->
                            <div class="content">
                                <?php
                                // Display the ads full width.
                                get_template_part('parts/ads/part', 'ads-full-width');
                                ?>
                            </div>


                            <div id="rest-posts" class="content">
                                <div class="items rest-post">
                                    <?php
                                    // Query post with rest api, first parameter is number of posts to skip, second parameter is number of posts to show.
                                    $rp = nbt_rest_post_query(5, 8);
                                    if ($rp->have_posts()) {
                                        while ($rp->have_posts()) {
                                            $rp->the_post();
                                            $the_post_id = get_the_ID();

                                            // Call the part-loop.php template.
                                            nb_part_loop($the_post_id, 'item', 'top', 'bot', true, true, true, true, true, true, true, 'Baca Berita', true);
                                        }
                                    }
                                    // Reset post data.
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="sidebar-container" class="right">
                        <aside id="homepage-sidebar" class="aside">
                            <?php
                            // Display the homepage sidebar if it's active.
                            if (is_active_sidebar('homepage-sidebar')) {
                                dynamic_sidebar('homepage-sidebar');
                            }
                            ?>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
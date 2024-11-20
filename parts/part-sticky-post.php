<?php

/**
 *
 * Part Editorial
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

?>

<section id="sticky" class="section section-small">
    <div class="inner-section">
        <div class="container">
            <div class="wrapper">
                <h2 class="head-smaller section-head">Editorial</h2>
                <div id="flk" class="items horizontal">
                    <?php
                    $query = nbt_query_sticky_post(5);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            $the_post_id = get_the_ID();
                            // get_template_part('parts/part', 'loop-horizontal');
                            nb_part_loop(
                                // Post ID.
                                $the_post_id,

                                // Wrapper class.
                                'item',

                                // Top class.
                                'left',

                                // Bottom class.
                                'right',

                                // Display post icon.
                                false,

                                // Display post category.
                                false,

                                // Display post excerpt.
                                true,

                                // Display post meta information.
                                true,

                                // Display post date.
                                false,

                                // Display post author.
                                true,

                                // Display "read more" link.
                                true,

                                // "Read more" link text.
                                'Baca Berita',

                                // Display edit post link.
                                false





                            );
                        }
                    } else {
                        echo '<p>No sticky post found.</p>';
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
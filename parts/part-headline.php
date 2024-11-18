<?php

/**
 *
 * Part Headline
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

?>
<section id="headline" class="section section-small">
    <div class="inner-section">
        <div class="container">
            <div class="wrapper">
                <h2 class="head-smaller section-head">Headline News:</h2>
                <div class="items vertical">
                    <?php
                    $query = nbt_query_headline(5);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            $the_post_id = get_the_ID();
                            get_template_part('parts/part', 'loop-vertical');
                        }
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
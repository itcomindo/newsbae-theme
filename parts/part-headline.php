<?php

/**
 *
 * Part Headline
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

?>
<div id="headline" class="section section-small">
    <div class="inner-section">
        <div class="container">
            <div class="wrapper">
                <div class="items vertical headline-item">
                    <?php
                    $query = nbt_query_headline();
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
</div>
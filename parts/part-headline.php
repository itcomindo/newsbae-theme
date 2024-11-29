<?php

/**
 *
 * Part Headline
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

$enable_headline_head = get_theme_mod('enable_headline_head');
if (true === $enable_headline_head) {
    $headline_head = '<h2 id="headline-head" class="head-smaller section-head">' . esc_html(get_theme_mod('headline_head', 'Headline News:')) . '</h2>';
}

?>
<section id="headline" class="section section-small">
    <div class="inner-section">
        <div class="container">
            <div class="wrapper">
                <?php echo $headline_head; ?>
                <div class="items vertical">
                    <?php
                    $query = nbt_query_headline(5);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            $the_post_id = get_the_ID();
                            // get_template_part('parts/part', 'loop-vertical');
                            nb_part_loop($the_post_id, 'item', 'top', 'bot', true, true, true, true, true, true, true, 'Baca Berita', true);
                        }
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
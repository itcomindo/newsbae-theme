<?php

/**
 *
 * Template Name: Video Page
 * Description: A Page Template that adds a sidebar to pages
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

get_header();
?>
<section id="headline" class="section section-small">
    <div class="inner-section">
        <div class="container">
            <div class="wrapper">
                <div class="items vertical">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 5,
                        'order' => 'ASC',
                        'orderby' => 'title',
                        'ignore_sticky_posts' => 1,
                        'meta_query' => array(
                            array(
                                'key' => '_nbt_post',
                                'value' => 'video',
                                'compare' => '=',
                            ),
                        ),
                    );
                    $query = new WP_Query($args);
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
<?php
get_footer();

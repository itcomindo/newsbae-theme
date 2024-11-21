<?php

/**
 *
 * Part Newsticker
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');


$args = array(
    'posts_per_page' => 5,
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'ignore_sticky_posts' => 1,
);
$query = new WP_Query($args);
if ($query->have_posts()) {
?>
    <div id="newsticker" class="section">
        <div class="inner-section">
            <div class="container">
                <div class="wrapper">
                    <ul id="newstickeritems" class="items list-no-style">
                        <?php
                        while ($query->have_posts()) {
                            $query->the_post();
                            $the_post_id = get_the_ID();
                        ?>
                            <li class="item"><a href="<?php echo esc_html(get_the_permalink($the_post_id)); ?>"><?php echo esc_html(nbt_post_title($the_post_id, 200)); ?></a></li>
                    <?php
                        }
                    }
                    wp_reset_postdata();
                    ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
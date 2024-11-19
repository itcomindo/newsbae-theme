<?php

/**
 *
 * Standard Post
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

$the_post_id = get_the_ID();
?>

<div class="inner-wrapper">
    <div class="top row">
        <h1 id="single-post-title"><?php echo get_the_title(); ?></h1>
        <div class="meta">
            <span class="date"><?php echo nbt_post_date($the_post_id); ?></span>
            <span class="author">By <?php echo nbt_post_author($the_post_id, true); ?></span>
        </div>
    </div>
    <div class="featured-image">
        <?php echo nbt_post_featured_image($the_post_id, 'full', false); ?>
    </div>
    <div id="the-content" class="content row">
        <?php the_content(); ?>
    </div>
</div>
<?php

/**
 *
 * Part Loop Vertical
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

?>

<div class="item">
    <div class="cat"><?php echo nbt_post_category($the_post_id, true); ?></div>
    <div class="left">
        <a href="<?php echo get_the_permalink(); ?>"><?php echo nbt_post_featured_image($the_post_id, 'full', true); ?></a>
    </div>
    <div class="right">
        <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo nbt_post_title($the_post_id, 100); ?></a></h3>
        <span class="excerpt"><?php echo nbt_post_excerpt($the_post_id, 80); ?></span>
        <span class="date"><?php echo nbt_post_date($the_post_id); ?></span>
        <span class="author"><?php echo nbt_post_author($the_post_id, true); ?></span>
    </div>
</div>
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
    <div class="top">
        <?php // nbt_post_icon(); 
        ?>
        <a href="<?php echo esc_html(get_the_permalink($the_post_id)); ?>"><?php echo nbt_post_featured_image($the_post_id, 'full', false); ?></a>
    </div>
    <div class="bot">
        <?php echo nbt_edit_post_link($the_post_id); ?>
        <h3 class="item-post-title"><a href="<?php echo esc_html(get_the_permalink($the_post_id)); ?>"><?php echo nbt_post_title($the_post_id, 80); ?></a></h3>
        <span class="excerpt"><?php echo nbt_post_excerpt($the_post_id, 80); ?></span>
        <div class="meta">
            <span class="date"><?php echo nbt_post_date($the_post_id); ?></span>
            <span class="author"><?php echo nbt_post_author($the_post_id, true); ?></span>
        </div>
        <?php echo nbt_post_readmore_link($the_post_id, 'Baca Berita'); ?>
    </div>
</div>
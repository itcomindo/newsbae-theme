<?php

/**
 *
 * Part Loop
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Renders a post loop item with various customizable elements.
 *
 * @param int $the_post_id The ID of the post to display.
 * @param string $el_class The CSS class for the main container element. Default 'item'.
 * @param string $colone_class The CSS class for the first column element. Default 'top'.
 * @param string $coltwo_class The CSS class for the second column element. Default 'bot'.
 * @param bool $icon Whether to display the post icon. Default true.
 * @param bool $cat Whether to display the post category. Default true.
 * @param bool $excerpt Whether to display the post excerpt. Default true.
 * @param bool $meta Whether to display the post meta information. Default true.
 * @param bool $date Whether to display the post date. Default true.
 * @param bool $author Whether to display the post author. Default true.
 * @param bool $read_more Whether to display the "read more" link. Default true.
 * @param string $read_more_text The text for the "read more" link. Default 'Baca Berita'.
 * @param bool $edit Whether to display the edit post link. Default true.
 */
function nb_part_loop(
    $the_post_id,
    $el_class = 'item',
    $colone_class = 'top',
    $coltwo_class = 'bot',
    $icon = true,
    $cat = true,
    $excerpt = true,
    $meta = true,
    $date = true,
    $author = true,
    $read_more = true,
    $read_more_text = 'Baca Berita',
    $edit = true
) {
    if (!$the_post_id) return;
?>
    <div class="<?php echo esc_attr($el_class); ?>">
        <?php if ($cat) : ?>
            <div class="cat"><?php echo nbt_post_category($the_post_id, true); ?></div>
        <?php endif; ?>

        <div class="<?php echo esc_attr($colone_class); ?>">
            <?php if ($icon) nbt_post_icon(); ?>
            <a href="<?php echo esc_html(get_the_permalink($the_post_id)); ?>">
                <?php echo nbt_post_featured_image($the_post_id, 'full', false); ?>
            </a>
        </div>

        <div class="<?php echo esc_attr($coltwo_class); ?>">
            <?php if ($edit) echo nbt_edit_post_link($the_post_id); ?>
            <h3 class="item-post-title">
                <a href="<?php echo esc_html(get_the_permalink($the_post_id)); ?>">
                    <?php echo esc_html(nbt_post_title($the_post_id, 80)); ?>
                </a>
            </h3>
            <?php if ($excerpt) : ?>
                <span class="excerpt"><?php echo esc_html(nbt_post_excerpt($the_post_id, 80)); ?></span>
            <?php endif; ?>

            <?php if ($meta) : ?>
                <div class="meta">
                    <?php if ($date) : ?>
                        <span class="date"><?php echo nbt_post_date($the_post_id); ?></span>
                    <?php endif; ?>
                    <?php if ($author) : ?>
                        <span class="author"><?php echo nbt_post_author($the_post_id, true); ?></span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if ($read_more) : ?>
                <?php echo nbt_post_readmore_link($the_post_id, $read_more_text); ?>
            <?php endif; ?>
        </div>
    </div>
<?php
}

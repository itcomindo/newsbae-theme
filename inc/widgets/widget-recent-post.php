<?php

/**
 *
 * Widgets Recent Post
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

if (! class_exists('NBT_Recent_Posts_Widget')) {
    class NBT_Recent_Posts_Widget extends WP_Widget
    {
        // Register widget with WordPress Start.
        public function __construct()
        {
            parent::__construct(
                'nbt_recent_posts_widget',
                'NBT Recent Posts Widget',
                array('description' => 'Widget untuk menampilkan post terbaru dengan pilihan-pilihan cara menampilkan recent post seperti: Category ID (input field type number), Posts perpage (input field type number), With Featured Image (checkbox with retun value is false or true).')
            );
        }
        // Register widget with WordPress End.

        // Front-end display of widget Start.
        public function widget($args, $instance)
        {
            echo $args['before_widget'];
            $postcatid = ! empty($instance['postcatid']) ? $instance['postcatid'] : '';
            $postperpage = ! empty($instance['postperpage']) ? $instance['postperpage'] : '';
            $withfeaturedimage = ! empty($instance['withfeaturedimage']) ? $instance['withfeaturedimage'] : '';
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $postperpage,
                'cat' => $postcatid
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {
                $num = 0;
?>
                <div class="items">
                    <?php
                    while ($query->have_posts()) {
                        $num++;
                        $query->the_post();
                        $the_post_id = get_the_ID();
                        $title = get_the_title();
                        $permalink = get_the_permalink();

                        if ($withfeaturedimage) {
                            $item_class = 'fim';
                            $featured_image = get_the_post_thumbnail_url();
                            $featured_image = '<div class="left"><img class="ft" src="' . $featured_image . '" alt="' . $title . '" title="' . $title . '" loading="lazy"></div>';
                        } else {
                            $item_class = 'nofim';
                            $featured_image = '<div class="left">' . esc_html($num) . '</div>';
                        }


                    ?>

                        <div class="item <?php echo esc_html($item_class); ?>">
                            <?php echo $featured_image; ?>
                            <div class="right">
                                <h3><a href="<?php echo esc_url($permalink); ?>" title="<?php echo esc_html(get_the_title()); ?>"><?php echo nbt_post_title($the_post_id, 60); ?></a></h3>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            wp_reset_postdata();
            echo $args['after_widget'];
        }
        // Front-end display of widget End.

        // Back-end widget form Start.
        public function form($instance)
        {
            $postcatid = ! empty($instance['postcatid']) ? $instance['postcatid'] : '';
            $postperpage = ! empty($instance['postperpage']) ? $instance['postperpage'] : '';
            $withfeaturedimage = ! empty($instance['withfeaturedimage']) ? $instance['withfeaturedimage'] : '';

            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('postcatid')); ?>">ID Post Kategori:</label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('postcatid')); ?>" name="<?php echo esc_attr($this->get_field_name('postcatid')); ?>" type="number" value="<?php echo esc_attr($postcatid); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('postperpage')); ?>">Jumlah Post:</label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('postperpage')); ?>" name="<?php echo esc_attr($this->get_field_name('postperpage')); ?>" type="number" value="<?php echo esc_attr($postperpage); ?>">
            </p>
            <p>
                <input class="checkbox" type="checkbox" <?php checked($withfeaturedimage, 'on'); ?> id="<?php echo esc_attr($this->get_field_id('withfeaturedimage')); ?>" name="<?php echo esc_attr($this->get_field_name('withfeaturedimage')); ?>" />
                <label for="<?php echo esc_attr($this->get_field_id('withfeaturedimage')); ?>">With Featured Image</label>
            </p>
<?php
        }
        // Back-end widget form End.

        // Sanitize widget form values as they are saved Start.
        public function update($new_instance, $old_instance)
        {
            $instance = array();
            $instance['postcatid'] = (! empty($new_instance['postcatid'])) ? strip_tags($new_instance['postcatid']) : '';
            $instance['postperpage'] = (! empty($new_instance['postperpage'])) ? strip_tags($new_instance['postperpage']) : '';
            $instance['withfeaturedimage'] = (! empty($new_instance['withfeaturedimage'])) ? strip_tags($new_instance['withfeaturedimage']) : '';
            return $instance;
        }
        // Sanitize widget form values as they are saved end.
    }
}

// Register and load the widget
function nbt_recent_posts_widget()
{
    register_widget('NBT_Recent_Posts_Widget');
}
add_action('widgets_init', 'nbt_recent_posts_widget');

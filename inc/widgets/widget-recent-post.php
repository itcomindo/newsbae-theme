<?php

/**
 *
 * Widgets Recent Post
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

if (!class_exists('NBT_Recent_Posts_Widget')) {
    class NBT_Recent_Posts_Widget extends WP_Widget
    {
        public function __construct()
        {
            parent::__construct(
                'nbt_recent_posts_widget',
                'NBT Recent Posts Widget',
                array('description' => 'Widget untuk menampilkan post terbaru dengan pilihan-pilihan seperti kategori, jumlah post, dan gambar fitur.')
            );
        }

        public function widget($args, $instance)
        {
            $postcatid = !empty($instance['postcatid']) ? $instance['postcatid'] : '';
            $postperpage = !empty($instance['postperpage']) ? $instance['postperpage'] : '';
            $withfeaturedimage = !empty($instance['withfeaturedimage']) ? $instance['withfeaturedimage'] : '';

            $query_args = array(
                'post_type' => 'post',
                'posts_per_page' => $postperpage,
                'cat' => $postcatid,
            );

            $query = new WP_Query($query_args);

            // Output buffering untuk menghindari penggunaan echo secara langsung
            ob_start();
?>
            <?php echo $args['before_widget']; ?>
            <?php if ($query->have_posts()) : ?>
                <div class="items">
                    <?php
                    $num = 0;
                    while ($query->have_posts()) :
                        $num++;
                        $query->the_post();
                        $the_post_id = get_the_ID();
                        $title = get_the_title();
                        $permalink = get_the_permalink();
                        $item_class = $withfeaturedimage ? 'fim' : 'nofim';
                        $featured_image = $withfeaturedimage && has_post_thumbnail() ?
                            '<div class="left"><img class="ft" src="' . esc_url(get_the_post_thumbnail_url()) . '" alt="' . esc_attr($title) . '" loading="lazy"></div>' :
                            '<div class="left">' . esc_html($num) . '</div>';
                    ?>
                        <div class="item <?php echo esc_attr($item_class); ?>">
                            <?php echo $featured_image; ?>
                            <div class="right">
                                <h3>
                                    <a href="<?php echo esc_url($permalink); ?>" title="<?php echo esc_attr($title); ?>">
                                        <?php echo esc_html(nbt_post_title($the_post_id, 60)); ?>
                                    </a>
                                </h3>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <?php echo $args['after_widget']; ?>
        <?php
            wp_reset_postdata();
            echo ob_get_clean(); // Output buffer dikembalikan sebagai string
        }

        public function form($instance)
        {
            $postcatid = !empty($instance['postcatid']) ? $instance['postcatid'] : '';
            $postperpage = !empty($instance['postperpage']) ? $instance['postperpage'] : '';
            $withfeaturedimage = !empty($instance['withfeaturedimage']) ? $instance['withfeaturedimage'] : '';
        ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('postcatid')); ?>">ID Kategori:</label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('postcatid')); ?>" name="<?php echo esc_attr($this->get_field_name('postcatid')); ?>" type="number" value="<?php echo esc_attr($postcatid); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('postperpage')); ?>">Jumlah Post:</label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('postperpage')); ?>" name="<?php echo esc_attr($this->get_field_name('postperpage')); ?>" type="number" value="<?php echo esc_attr($postperpage); ?>">
            </p>
            <p>
                <input class="checkbox" type="checkbox" <?php checked($withfeaturedimage, 'on'); ?> id="<?php echo esc_attr($this->get_field_id('withfeaturedimage')); ?>" name="<?php echo esc_attr($this->get_field_name('withfeaturedimage')); ?>" />
                <label for="<?php echo esc_attr($this->get_field_id('withfeaturedimage')); ?>">Dengan Gambar Fitur</label>
            </p>
<?php
        }

        public function update($new_instance, $old_instance)
        {
            $instance = array();
            $instance['postcatid'] = (!empty($new_instance['postcatid'])) ? strip_tags($new_instance['postcatid']) : '';
            $instance['postperpage'] = (!empty($new_instance['postperpage'])) ? strip_tags($new_instance['postperpage']) : '';
            $instance['withfeaturedimage'] = (!empty($new_instance['withfeaturedimage'])) ? strip_tags($new_instance['withfeaturedimage']) : '';
            return $instance;
        }
    }
}

function nbt_recent_posts_widget_init()
{
    register_widget('NBT_Recent_Posts_Widget');
}
add_action('widgets_init', 'nbt_recent_posts_widget_init');

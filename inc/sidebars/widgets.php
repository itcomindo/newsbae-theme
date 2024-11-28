<?php

/**
 *
 * Widgets
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

if (! class_exists('MM_Custom_Widget')) {
    class MM_Custom_Widget extends WP_Widget
    {

        public function __construct()
        {
            parent::__construct(
                'mm_custom_widget', // Base ID
                'MM Custom Widget', // Name
                array('description' => 'Widget dengan input, checkbox, textarea, dan select.')
            );
        }

        public function widget($args, $instance)
        {
            echo $args['before_widget'];
            if (! empty($instance['title'])) {
                echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
            }
            // Output data
            echo '<p>Number: ' . esc_html($instance['number_field']) . '</p>';
            echo '<p>Checkbox: ' . (! empty($instance['checkbox_field']) ? 'Checked' : 'Unchecked') . '</p>';
            echo '<p>Textarea: ' . esc_html($instance['textarea_field']) . '</p>';
            echo '<p>Select: ' . esc_html($instance['select_field']) . '</p>';
            echo $args['after_widget'];
        }

        public function form($instance)
        {
            $number_field   = ! empty($instance['number_field']) ? $instance['number_field'] : '';
            $checkbox_field = ! empty($instance['checkbox_field']) ? $instance['checkbox_field'] : '';
            $textarea_field = ! empty($instance['textarea_field']) ? $instance['textarea_field'] : '';
            $select_field   = ! empty($instance['select_field']) ? $instance['select_field'] : '';
?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('number_field')); ?>">Number:</label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number_field')); ?>" name="<?php echo esc_attr($this->get_field_name('number_field')); ?>" type="number" value="<?php echo esc_attr($number_field); ?>">
            </p>
            <p>
                <input class="checkbox" type="checkbox" <?php checked($checkbox_field, 'on'); ?> id="<?php echo esc_attr($this->get_field_id('checkbox_field')); ?>" name="<?php echo esc_attr($this->get_field_name('checkbox_field')); ?>" />
                <label for="<?php echo esc_attr($this->get_field_id('checkbox_field')); ?>">Check me</label>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('textarea_field')); ?>">Textarea:</label>
                <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('textarea_field')); ?>" name="<?php echo esc_attr($this->get_field_name('textarea_field')); ?>"><?php echo esc_textarea($textarea_field); ?></textarea>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('select_field')); ?>">Select:</label>
                <select class="widefat" id="<?php echo esc_attr($this->get_field_id('select_field')); ?>" name="<?php echo esc_attr($this->get_field_name('select_field')); ?>">
                    <option value="bakso" <?php selected($select_field, 'bakso'); ?>>Bakso</option>
                    <option value="soto" <?php selected($select_field, 'soto'); ?>>Soto</option>
                    <option value="ayam" <?php selected($select_field, 'ayam'); ?>>Ayam</option>
                </select>
            </p>
<?php
        }

        public function update($new_instance, $old_instance)
        {
            $instance = array();
            $instance['number_field']   = (! empty($new_instance['number_field'])) ? sanitize_text_field($new_instance['number_field']) : '';
            $instance['checkbox_field'] = (! empty($new_instance['checkbox_field'])) ? sanitize_text_field($new_instance['checkbox_field']) : '';
            $instance['textarea_field'] = (! empty($new_instance['textarea_field'])) ? sanitize_textarea_field($new_instance['textarea_field']) : '';
            $instance['select_field']   = (! empty($new_instance['select_field'])) ? sanitize_text_field($new_instance['select_field']) : '';
            return $instance;
        }
    }
}

// Register widget
function mm_register_custom_widget()
{
    register_widget('MM_Custom_Widget');
}
add_action('widgets_init', 'mm_register_custom_widget');

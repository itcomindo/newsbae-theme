<?php

/**
 *
 * Single File
 */

defined('ABSPATH') || die('No script kiddies please!');
get_header();

// Dapatkan ID post secara langsung
$the_post_id = get_the_ID();

// Dapatkan nilai dari Carbon Fields
$nbt_post_type = carbon_get_the_post_meta('nbt_post');

// Tentukan class section
$section_class = 'standard'; // Default
if ('video' === $nbt_post_type) {
    $section_class = 'video';
} elseif ('gallery' === $nbt_post_type) {
    $section_class = 'gallery';
}

?>
<section id="sing" class="standard section section-small <?php echo esc_attr($section_class); ?>">
    <div class="inner-section">
        <div class="container">
            <div class="wrapper">
                <div class="left">
                    <?php nbt_video_player(); ?>
                    <?php nbt_gallery_player(); ?>
                    <div id="the-content">
                        <?php
                        the_content();
                        ?>
                    </div>
                </div>
                <div class="right">
                    <?php
                    get_template_part('parts/part-single-sidebar');
                    ?>
                </div>

            </div>
        </div>
    </div>
</section>

<?php

get_footer();

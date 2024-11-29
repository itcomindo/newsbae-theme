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
                    <?php
                    if ('video' === carbon_get_the_post_meta('nbt_post')) {
                        nbt_video_player();
                    } elseif ('gallery' === carbon_get_the_post_meta('nbt_post')) {
                        nbt_gallery_player();
                    } else {
                        get_template_part('parts/part-single-meta');
                    ?>
                        <div class="fim">
                            <?php
                            nbt_post_featured_image(get_the_ID(), 'full', false);
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                    <div id="the-content">
                        <?php
                        the_content();
                        ?>
                    </div>
                    <?php
                    if (function_exists('nbto_single_post_options') && true === carbon_get_theme_option('nbto_share_post_enable')) {
                        get_template_part('components/share-post');
                    }
                    ?>
                </div>
                <div id="sidebar-container" class="right">
                    <?php
                    if (is_active_sidebar('post-sidebar')) : ?>
                        <aside id="post-sidebar" class="sidebar">
                            <?php dynamic_sidebar('post-sidebar'); ?>
                        </aside>
                    <?php endif;
                    ?>
                </div>

            </div>
        </div>
    </div>
</section>

<?php

get_footer();

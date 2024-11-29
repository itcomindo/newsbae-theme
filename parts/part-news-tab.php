<?php

/**
 *
 * Part: News Tab
 * @package nbt
 * Description: This part is used to display the news tab which is every tab contains the news card based on the post category id.
 */

defined('ABSPATH') || die('No script kiddies please!');




/**
 * Generates the HTML for the news tabs trigger section.
 *
 * This function checks if the 'nbto_home_options' function exists and if the 'newstab_enable' option is enabled.
 * If both conditions are met, it retrieves the 'newstabs' option and generates an unordered list of news tab triggers.
 * The first tab is marked as active by default. If no news tabs are created, it displays a default message.
 *
 * @return string The generated HTML for the news tabs trigger section.
 */
function nbt_newstabs_trigger()
{
    ob_start();
    if (function_exists('nbto_home_options')) {
        if (true === carbon_get_theme_option('newstab_enable')) {
            $newstabs = carbon_get_theme_option('newstabs');
            if ($newstabs) {
?>
                <ul class="list-no-style triggers">
                    <?php
                    // Tandai tab pertama sebagai aktif.
                    $first = true;
                    foreach ($newstabs as $trigger) {
                        // Tandai tab pertama sebagai aktif.
                        $active_class = $first ? 'active' : '';
                        // Setelah tab pertama, set $first menjadi false agar tab selanjutnya tidak aktif.
                        $first = false;
                    ?>
                        <li class="trigger <?php echo $active_class; ?>" data-cat="<?php echo $trigger['newstab_catid']; ?>">
                            <?php echo $trigger['newstab_catname']; ?>
                        </li>
                    <?php
                    }
                    echo '</ul>';
                } else {
                    echo '<ul class="list-no-style triggers">';
                    echo '<li class="trigger active">You not create news tab</li>';
                    ?>
                </ul>
                <?php
                }
            }
        }
        return ob_get_clean();
    }

    function nbt_news_tab_groups()
    {
        ob_start();
        if (function_exists('nbto_home_options')) {
            if (true === carbon_get_theme_option('newstab_enable')) {
                $groups = carbon_get_theme_option('newstabs');
                if ($groups) {
                    $first = true;
                    foreach ($groups as $group) {
                        $active_class = $first ? 'active' : '';
                        $first = false;
                        $cat_id = $group['newstab_catid'];
                ?>
                    <div class="group <?php echo $active_class; ?>" data-cat="<?php echo $cat_id; ?>">
                        <div class="items">
                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 5,
                                'cat' => $cat_id
                            );
                            $query = new WP_Query($args);
                            if ($query->have_posts()) {
                                while ($query->have_posts()) {
                                    $query->the_post();
                                    $the_post_id = get_the_ID();
                            ?>
                                    <div class="item">
                                        <div class="top">
                                            <a href="<?php echo esc_html(get_the_permalink()); ?>" title="<?php echo esc_html(get_the_title()); ?>"><?php echo nbt_post_featured_image($the_post_id, 'full', true); ?></a>
                                        </div>
                                        <div class="bot">
                                            <h3>
                                                <a href="<?php echo esc_html(get_the_permalink()); ?>"><?php echo nbt_post_title($the_post_id, 100); ?></a>
                                            </h3>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
<?php
                    }
                }
            }
        }
        return ob_get_clean();
    }

?>

<section id="news-tab" class="section section-small">
    <div class="inner-section">
        <div class="container">
            <div class="wrapper">
                <div class="inner">
                    <div class="top">
                        <h2 class="section-head head-small">News Tab</h2>
                    </div>
                    <div class="tabs">
                        <div class="the-trigger">
                            <?php
                            echo nbt_newstabs_trigger();
                            ?>
                        </div>
                        <div class="groups">
                            <?php
                            echo nbt_news_tab_groups();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
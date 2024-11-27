<?php

/**
 *
 * Category File
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

get_header();

$the_category_id = get_queried_object_id();
// get menu_icon_fontawesome from carbon fields menu field.
$cat_icon_fontawesome = carbon_get_term_meta($the_category_id, 'cat_icon_fontawesome');


?>
<section id="arc" class="section section-small">
    <div class="inner-section">
        <div class="container">
            <div class="wrapper">
                <h2 class="head head-medium">Underconstruction</h2>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();

<?php

/**
 *
 * Part: Single Meta
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

?>


<div class="top row">
    <?php
    nbt_edit_post_link(get_the_id());
    ?>
    <h1 id="the-post-title" class="head head-big"><?php echo nbt_post_title(get_the_id(), 250) ?></h1>
</div>
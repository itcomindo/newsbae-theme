<?php

/**
 *
 * Part Topbar
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');
?>
<div id="topbar" class="section">
    <div class="inner-section">
        <div class="container">
            <div class="wrapper">
                <div class="items">
                    <div class="left">
                        <div class="ihome"><a href="/" title="<?php echo esc_html(nbt_site_title()); ?>"><i class="fas fa-house"></i></a></div><span>Newsbae Themes</span>
                    </div>
                    <div class="mid">
                        <?php
                        get_template_part('parts/part', 'search-form');
                        ?>
                    </div>
                    <div class="right">
                        <div class="icons horizontal">
                            <ul class="list-no-style">

                                <!-- Facebook -->
                                <li>
                                    <a href="#"><?php echo wp_kses(nbt_icon()['facebook'], nbt_allowed()); ?></a>
                                </li>

                                <!-- Instagram -->
                                <li>
                                    <a href="#"><?php echo wp_kses(nbt_icon()['instagram'], nbt_allowed()); ?></a>
                                </li>

                                <!-- Twitter -->
                                <li>
                                    <a href="#"><?php echo wp_kses(nbt_icon()['twitter'], nbt_allowed()); ?></a>
                                </li>

                                <!-- Youtube -->
                                <li>
                                    <a href="#"><?php echo wp_kses(nbt_icon()['youtube'], nbt_allowed()); ?></a>
                                </li>




                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

/**
 *
 * Part Header Menu
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');
function nbt_header_menu()
{
    $menu_items = nbt_menus('header');
    if ($menu_items) {
        echo '<ul id="menu-header-menu" class="header-menu__list">';
        foreach ($menu_items as $item) {
            $menu_id = $item->ID;
            $menu_icon = carbon_get_nav_menu_item_meta($item->ID, 'menu_icon_fontawesome');

            if ($menu_icon) {
                $menu_icon = $menu_icon;
            } else {
                $menu_icon = '<i class="fa-solid fa-magnifying-glass"></i>';
            }



            $menu_title = $item->title;
            $menu_url = $item->url;
?>
            <li class="">
                <a href="<?php echo $menu_url; ?>">
                    <?php echo $menu_icon . ' <span class="menu-title">' . $menu_title . '</span>'; ?>
                </a>
            </li>
<?php
        }
        echo '</ul>';
    } else {
        echo 'Menu not found for this location.';
    }
}
?>

<div id="header-menu" class="section">
    <div class="inner-section">
        <div class="container">
            <div class="wrapper">
                <div class="items">
                    <div class="left">
                        <?php
                        get_template_part('parts/part', 'offcanvas-menu');
                        ?>
                        <nav id="header-menu-nav">
                            <div class="menu-header-menu-container">
                                <?php
                                nbt_header_menu();
                                // get_template_part('components/component', 'topbar-mid');
                                ?>
                                <?php
                                // nbt_menus('header', 'header-menu', 'header-menu__list');
                                ?>
                            </div>
                        </nav>
                    </div>
                    <div class="right">
                        <?php
                        get_template_part('components/component', 'bars');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
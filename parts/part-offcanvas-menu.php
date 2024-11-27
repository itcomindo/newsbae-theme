<?php

/**
 *
 * Part Offcanvas Menu
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

$menu_items = nbt_menus('canvas');
if ($menu_items) {
?>
    <nav id="offcanvas-menu-nav" class="">
        <!-- <div class="closer">X</div> -->
        <?php
        get_template_part('components/component', 'topbar-mid');
        ?>
        <div class="offcanvas-header-menu-container">
            <ul id="menu-offcanvas-menu" class="offcanvas-menu__list list-no-style">
                <?php
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
                ?>
            </ul>
        </div>
    </nav>
<?php
}

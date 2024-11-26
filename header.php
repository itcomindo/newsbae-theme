<?php

/**
 *
 * Header File
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');
?>
<!DOCTYPE html>
<html lang="en-US" class="no-js" itemscope itemtype="https://schema.org/WebPage">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="googlebot" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preload" href="/wp-content/themes/newsbae-theme/assets/fonts/Roboto-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="/wp-content/themes/newsbae-theme/assets/fonts/Roboto-Light.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="/wp-content/themes/newsbae-theme/assets/fonts/Roboto-Medium.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="/wp-content/themes/newsbae-theme/assets/fonts/Roboto-Bold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="/wp-content/themes/newsbae-theme/assets/fonts/Roboto-Black.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="/wp-content/themes/newsbae-theme/assets/fonts/Roboto-BlackItalic.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="/wp-content/themes/newsbae-theme/assets/fonts/Roboto-Italic.woff2" as="font" type="font/woff2" crossorigin="anonymous">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    wp_body_open();

    nbt_flo_left();
    nbt_flo_right();
    get_template_part('parts/ads/part', 'mobile-ads-before-topbar');
    get_template_part('parts/part', 'topbar');
    // get_template_part('parts/ads/part', 'mobile-ads-before-header');
    get_template_part('parts/part', 'header');
    get_template_part('parts/part', 'header-menu');
    get_template_part('parts/ads/part', 'ads-after-header-menu');


    ?>
    <main>
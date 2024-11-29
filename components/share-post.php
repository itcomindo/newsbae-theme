<?php

/**
 *
 * Component: Share Post
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

// This is component to show share post buttons to share post to social media from the list of social media, Facebook, Twitter, LinkedIn, Pinterest, WhatsApp, Email, Copy Link and only show this in single post page which is will share the current post URL, title and featured image.

// Get the current post URL
$current_post_url = get_permalink();

// Get the current post title
$current_post_title = get_the_title();

// Get the current post featured image
$current_post_featured_image = get_the_post_thumbnail_url();

?>

<div class="share-post row">
    <?php
    //  Call the share post platforms from carbon fields which is this create with multi select field. This contain the list of social media to share the post like facebook, twitter, whatsapp, telegram, pinterest, linkeding, email, copy link.
    $platforms = carbon_get_theme_option('nbto_share_post_platforms'); // Ambil nilai field Carbon Fields
    if (!empty($platforms)) {
    ?>
        <ul class="list-no-style">
            <?php
            foreach ($platforms as $platform) {
                $platform_url = urlencode($current_post_url);
                $platform_title = urlencode($current_post_title);
                $platform_image = isset($current_post_featured_image) ? urlencode($current_post_featured_image) : '';

                if ($platform === 'facebook') { ?>
                    <li>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $platform_url; ?>" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                <?php }
                if ($platform === 'twitter') { ?>
                    <li>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo $platform_url; ?>&text=<?php echo $platform_title; ?>" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                <?php }
                if ($platform === 'whatsapp') { ?>
                    <li>
                        <a href="whatsapp://send?text=<?php echo $platform_title . ' ' . $platform_url; ?>" target="_blank">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </li>
                <?php }
                if ($platform === 'telegram') { ?>
                    <li>
                        <a href="https://telegram.me/share/url?url=<?php echo $platform_url; ?>&text=<?php echo $platform_title; ?>" target="_blank">
                            <i class="fab fa-telegram"></i>
                        </a>
                    </li>
                <?php }
                if ($platform === 'pinterest') { ?>
                    <li>
                        <a href="https://pinterest.com/pin/create/button/?url=<?php echo $platform_url; ?>&media=<?php echo $platform_image; ?>&description=<?php echo $platform_title; ?>" target="_blank">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </li>
                <?php }
                if ($platform === 'linkedin') { ?>
                    <li>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $platform_url; ?>&title=<?php echo $platform_title; ?>" target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </li>
                <?php }
                if ($platform === 'email') { ?>
                    <li>
                        <a href="mailto:?subject=<?php echo $platform_title; ?>&body=<?php echo $platform_url; ?>">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </li>
                <?php }
                if ($platform === 'copylink') { ?>
                    <li>
                        <a href="javascript:void(0);" onclick="copyToClipboard('<?php echo $current_post_url; ?>')" title="Copy Link">
                            <i class="fas fa-link"></i>
                        </a>
                    </li>
            <?php }
            }
            ?>
        </ul>
    <?php
    }
    ?>
    <script>
        function copyToClipboard(text) {
            var tempInput = document.createElement("input");
            tempInput.type = "text";
            tempInput.value = text;
            document.body.appendChild(tempInput);
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); // Mobile compatibility
            document.execCommand("copy");
            document.body.removeChild(tempInput);
            alert("Link copied: " + text);
        }
    </script>


</div>
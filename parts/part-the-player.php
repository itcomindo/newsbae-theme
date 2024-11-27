<?php

/**
 *
 * Part: The Player
 * @package nbt
 */

defined('ABSPATH') || die('No script kiddies please!');

function nbt_video_player()
{
    $nbt_post = carbon_get_the_post_meta('nbt_post');
    if (('video' === $nbt_post)) {
        get_template_part('parts/part-single-meta');
        $videos = carbon_get_the_post_meta('nbt_video');
        if ($videos) {
            //get first video.
            $first_video = $videos[0];
            $first_video_id = $first_video['nbto_post_video_url'];
            $first_video_thumbnail = 'https://img.youtube.com/vi/' . $first_video_id . '/0.jpg';
            $first_video_title = $first_video['nbto_post_video_title'];
            $video_items = count($videos);
            if ($video_items > 3) {
                $flk = 'true';
            } else {
                $flk = 'false';
            }
?>
            <div id="the-player" data-flk="<?php echo esc_html($flk); ?>">
                <div id="player" data-contentid="<?php echo esc_html($first_video_id); ?>">
                    <!-- iframe from youtube -->
                    <iframe id="ytplayer" width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo esc_html($first_video_id); ?>?autoplay=1&rel=0&showinfo=0&modestbranding=1" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
                </div>
                <?php
                if ($video_items > 1) {
                ?>
                    <div id="thumbs">
                        <?php
                        foreach ($videos as $video) {
                            $content_id = $video['nbto_post_video_url'];
                            $content_title = $video['nbto_post_video_title'];
                            $content_description = $video['nbto_post_video_description'];
                            $content_thumbnail = 'https://img.youtube.com/vi/' . $content_id . '/0.jpg';
                        ?>
                            <div class="thumb" data-contentid="<?php echo $content_id; ?>">
                                <img src="<?php echo $content_thumbnail; ?>" alt="<?php echo $content_title; ?>">
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
                <script>
                    // when thumb clicked get this data-contentid and change the iframe src with this data-contentid value in the iframe #ytplayer, please use Vanilla Js.
                    const thumbs = document.querySelectorAll('.thumb');
                    thumbs.forEach(thumb => {
                        thumb.addEventListener('click', function() {
                            const contentId = this.getAttribute('data-contentid');
                            const ytplayer = document.getElementById('ytplayer');
                            ytplayer.src = `https://www.youtube.com/embed/${contentId}?autoplay=1&rel=0&showinfo=0&modestbranding=1`;
                        });
                    });
                </script>
            </div>
        <?php
        }
    }
}


function nbt_gallery_player()
{
    $nbt_post = carbon_get_the_post_meta('nbt_post');
    if (('gallery' === $nbt_post)) {
        get_template_part('parts/part-single-meta');
        $galleries = carbon_get_the_post_meta('nbt_gallery');
        if ($galleries) {
            //get first gallery.
            $first_gallery = $galleries[0];
            $first_gallery_thumbnail = $first_gallery['nbto_post_gallery_image_url'];
            $first_gallery_title = $first_gallery['nbto_post_gallery_title'];
            $first_gallery_description = $first_gallery['nbto_post_gallery_description'];
            $gallery_items = count($galleries);
            if ($gallery_items > 3) {
                $flk = 'true';
            } else {
                $flk = 'false';
            }
        ?>
            <div id="the-player" data-flk="<?php echo esc_html($flk); ?>">
                <div id="player">
                    <!-- image -->
                    <img src="<?php echo esc_html($first_gallery_thumbnail); ?>" alt="<?php echo esc_html($first_gallery_title); ?>">
                    <div class="desc">
                        <h3 id="content-title"><?php echo esc_html($first_gallery_title); ?></h3>
                        <p id="content-desc"><?php echo esc_html($first_gallery_description); ?></p>
                    </div>
                </div>
                <?php
                if ($gallery_items > 1) {
                ?>
                    <div id="thumbs">
                        <?php
                        foreach ($galleries as $gallery) {
                            $content_url = $gallery['nbto_post_gallery_image_url'];
                            $content_description = $gallery['nbto_post_gallery_description'];
                            $content_title = $gallery['nbto_post_gallery_title'];
                        ?>
                            <div class="thumb" data-contentid="<?php echo $content_url; ?>" data-contendes="<?php echo esc_html($content_description); ?>" data-contenttile="<?php echo esc_html($content_title); ?>">
                                <img src="<?php echo $content_url; ?>" alt="<?php echo $content_description; ?>">
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
                <script>
                    // when thumb clicked get this data-contentid and replace the img src with this data-contentid value, replace the img alt with data-contenttitle, replace  data-contentdes with the p#content-desc, replace data-contenttitle with h3#content-title, please use Vanilla Js.
                    const thumbs = document.querySelectorAll('.thumb');
                    thumbs.forEach(thumb => {
                        thumb.addEventListener('click', function() {
                            const contentId = this.getAttribute('data-contentid');
                            const contentDes = this.getAttribute('data-contendes');
                            const contentTitle = this.getAttribute('data-contenttile');
                            const player = document.getElementById('player');
                            player.innerHTML = `<img src="${contentId}" alt="${contentDes}"><div class="desc"><h3 id="content-title">${contentTitle}</h3><p id="content-desc">${contentDes}</p></div>`;
                        });
                    });
                </script>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const contentContainer = document.querySelector("#the-content");

                        if (contentContainer) {
                            // Ambil HTML asli dari container
                            let htmlContent = contentContainer.innerHTML;

                            // Ganti <br> dengan </p><p> untuk membentuk paragraf baru
                            htmlContent = htmlContent.replace(/<br\s*\/?>/g, '</p><p>');

                            // Tambahkan <p> di awal dan akhir konten agar valid
                            htmlContent = `<p>${htmlContent}</p>`;

                            // Hapus <p> kosong yang mungkin terbentuk
                            htmlContent = htmlContent.replace(/<p>\s*<\/p>/g, '');

                            // Set kembali konten yang sudah diformat
                            contentContainer.innerHTML = htmlContent;
                        }
                    });
                </script>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        // Pilih container utama
                        const contentContainer = document.querySelector("#the-content");

                        // Ambil teks judul post
                        const postTitleElement = document.querySelector("#single-post-title");
                        const postTitle = postTitleElement ? postTitleElement.textContent.trim() : "Default alt text";

                        if (contentContainer) {
                            // Pilih semua elemen img dengan kondisi:
                            // - img langsung di dalam <p>
                            // - img langsung di dalam <figure>
                            // - img yang berdiri sendiri
                            const images = contentContainer.querySelectorAll(
                                "p > img, figure > img, img:not(p > img):not(figure > img)"
                            );

                            images.forEach(function(img) {
                                // Tambahkan atribut alt jika kosong atau tidak ada
                                if (!img.hasAttribute("alt") || img.getAttribute("alt").trim() === "") {
                                    img.setAttribute("alt", postTitle); // Gunakan teks dari judul post
                                }

                                // Tambahkan atribut title jika kosong atau tidak ada
                                if (!img.hasAttribute("title") || img.getAttribute("title").trim() === "") {
                                    img.setAttribute("title", postTitle); // Gunakan teks dari judul post
                                }

                                // Tambahkan atribut loading="lazy" jika belum ada
                                if (!img.hasAttribute("loading")) {
                                    img.setAttribute("loading", "lazy");
                                }
                            });
                        }
                    });
                </script>
            </div>
<?php
        }
    }
}

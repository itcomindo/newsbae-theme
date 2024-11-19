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
$nbt_post_type = carbon_get_the_post_meta('nbt_post', $the_post_id);

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
                    // Muat template berdasarkan nbt_post
                    if ('video' === $nbt_post_type) {
                        get_template_part('parts/video-post');
                    } elseif ('gallery' === $nbt_post_type) {
                        get_template_part('parts/gallery-post');
                    } else {
                        get_template_part('parts/standard-post');
                    }
                    ?>
                </div>
                <!-- Sidebar Part Single Sidebar -->
                <div class="right">
                    <?php
                    get_template_part('parts/part-single-sidebar');
                    ?>
                </div>
            </div>
        </div>
    </div>
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


</section>
<?php

get_footer();

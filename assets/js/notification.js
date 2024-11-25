var lastPostId = 0; // Menyimpan ID terakhir posting yang dilihat user

function checkForNewPosts() {
    // Mengirimkan permintaan ke endpoint REST API WordPress
    jQuery.ajax({
        url: '/wp-json/wp/v2/posts?per_page=1', // Mendapatkan 1 posting terbaru
        method: 'GET',
        success: function (data) {
            if (data.length && data[0].id > lastPostId) {
                // Jika ada post baru, tampilkan notifikasi
                showNotification(data[0].title.rendered, data[0].link);
                lastPostId = data[0].id; // Update ID terakhir
            }
        },
        error: function () {
            console.error('Gagal memeriksa postingan baru.');
        },
    });
}

function showNotification(title, link) {
    // Membuat elemen notifikasi
    var notification = document.createElement('div');
    notification.className = 'new-post-notification';
    notification.innerHTML = `
        <div class="notification-content">
            <span>${title}</span>
            <button class="update-button">Lihat</button>
        </div>
    `;
    document.body.appendChild(notification);

    // Event listener untuk tombol "Lihat"
    jQuery('.update-button').on('click', function () {
        window.location.href = link; // Buka link posting baru
    });

    // Menghapus notifikasi otomatis setelah 10 detik
    setTimeout(function () {
        notification.remove();
    }, 10000);
}

// Periksa postingan baru setiap 30 detik = 30000 ms.
setInterval(checkForNewPosts, 5000);

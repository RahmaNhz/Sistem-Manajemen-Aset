

// function loadNotifications() {
//     fetch('/notifikasi/peminjaman')
//         .then(response => response.json())
//         .then(data => {
//             displayNotifications(data);
//         })
//         .catch(error => console.error('Error:', error));
// }
// function displayNotifications(notifications) {
//     const notificationList = document.getElementById('notification-list');
//     notificationList.innerHTML = '';

// const { kebabCase } = require("lodash");

    
//     notifications.forEach(notification => {
//         const notificationItem = document.createElement('div');
//         notificationItem.classList.add('notification-item');
        
//         // Menampilkan informasi tambahan: nama aset, nama pengguna, tanggal peminjaman
//         const assetName = notification.aset ? notification.aset.nama_aset : 'undefined';
//         const userName = notification.user ? notification.user.nama : 'undefined';
//         notificationItem.textContent = `Peminjaman ${notification.id} aset ${assetName} oleh ${userName} pada tanggal ${notification.tanggal_pinjam} dalam proses`;
        
//         notificationList.appendChild(notificationItem);
//     });
// }

// 

// JAVASCRIPT NOTIFIKASI

$(document).ready(function() {
    // Ketika tombol lonceng diklik, tampilkan dropdown notifikasi
    $('#notification-dropdown').on('click', function() {
        $('#notification-list').toggle(); // Toggle tampilan dropdown
    });

    // Muat notifikasi saat halaman dimuat
    loadNotifications();
});

function loadNotifications() {
    fetch('/notifikasi/peminjaman')
        .then(response => response.json())
        .then(data => {
            displayNotifications(data);
        })
        .catch(error => console.error('Error:', error));
}

function displayNotifications(notifications) {
    const notificationList = $('#notification-list');
    notificationList.empty(); // Kosongkan daftar notifikasi sebelum menambahkan yang baru

    let count = 0; // Inisialisasi jumlah peminjaman yang masih proses

    notifications.forEach(notification => {
        const assetName = notification.aset ? notification.aset.nama_aset : 'undefined';
        const userName = notification.user ? notification.user.nama : 'undefined';
        const notificationItem = `
        <li>
        <a class="dropdown-item" href="/peminjaman/${notification.id}">
        <i class="fas fa-info-circle"></i> <!-- Simbol orang atau ikon lainnya -->
        Peminjaman ${notification.id} aset ${assetName} oleh ${userName} pada tanggal ${notification.tanggal_pinjam} dalam proses
        </a>
        </li>`;

        // const notificationItem = `<a class="dropdown-item" href="/peminjaman/${notification.id}">Peminjaman ${notification.id} aset ${assetName} oleh ${userName} pada tanggal ${notification.tanggal_pinjam} dalam proses</a>`;
        
        notificationList.append(notificationItem);

        // Jika status peminjaman masih 'proses', tambahkan ke jumlah notifikasi
        if (notification.ket_pinjam === 'Menunggu Approval') {
            count++;
        }
    });

    // Perbarui angka pada lonceng notifikasi (badge)
    $('#notification-count').text(count);    
}

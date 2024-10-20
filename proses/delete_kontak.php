<?php
require_once "../connection.php";

// Mengambil ID kontak dari parameter URL
$id_kontak = $_GET["idKontak"];

// Membuat objek dari kelas kontak dan melakukan koneksi
$delete_kontak = new kontak();
$delete_kontak->connect();

// Hapus data kontak berdasarkan ID
$delete_kontak->deleteDataKontak($id_kontak);

// Tutup koneksi (optional)
$delete_kontak->close_connection();

// Redirect kembali ke halaman index.php setelah penghapusan berhasil
header('Location: ../index.php');
exit(); // Penting untuk menghentikan eksekusi setelah header
?>

<?php
// Memanggil file koneksi database
require_once "./../connections/connections.php";

// Menonaktifkan laporan kesalahan PHP agar tidak ada pesan kesalahan yang ditampilkan
error_reporting(0);

// Memulai sesi
session_start();

// Query untuk menghapus data berita dari tabel tb_berita berdasarkan id_berita yang diberikan melalui parameter GET (menu_del)
mysqli_query($conn, "DELETE FROM tb_berita WHERE id_berita = '" . $_GET['menu_del'] . "'");

// Mengalihkan halaman kembali ke halaman admin.php dengan parameter p=berita setelah berhasil menghapus data
header("location:admin.php?p=berita");
?>

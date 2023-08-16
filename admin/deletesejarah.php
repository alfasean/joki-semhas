<?php
// Memanggil file koneksi database
require_once "./../connections/connections.php";

// Menonaktifkan laporan kesalahan PHP agar tidak ada pesan kesalahan yang ditampilkan
error_reporting(0);

// Memulai sesi
session_start();

// Query untuk menghapus data sejarah dari tabel tb_sejarah berdasarkan id_sejarah yang diberikan melalui parameter GET (menu_del)
mysqli_query($conn, "DELETE FROM tb_sejarah WHERE id_sejarah = '" . $_GET['menu_del'] . "'");

// Mengalihkan halaman kembali ke halaman admin.php dengan parameter p=sejarah setelah berhasil menghapus data
header("location:admin.php?p=sejarah");
?>

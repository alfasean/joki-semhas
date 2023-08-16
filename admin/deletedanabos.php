<?php
// Memanggil file koneksi database
require_once "./../connections/connections.php";

// Menonaktifkan laporan kesalahan PHP agar tidak ada pesan kesalahan yang ditampilkan
error_reporting(0);

// Memulai sesi
session_start();

// Query untuk menghapus data Dana BOS dari tabel tb_danabos berdasarkan id_danabos yang diberikan melalui parameter GET (menu_del)
mysqli_query($conn, "DELETE FROM tb_danabos WHERE id_danabos = '" . $_GET['menu_del'] . "'");

// Mengalihkan halaman kembali ke halaman admin.php dengan parameter p=danabos setelah berhasil menghapus data
header("location:admin.php?p=danabos");
?>

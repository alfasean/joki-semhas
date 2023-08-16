<?php
// Memanggil file koneksi database
require_once "./../connections/connections.php";

// Menonaktifkan laporan kesalahan PHP agar tidak ada pesan kesalahan yang ditampilkan
error_reporting(0);

// Memulai sesi
session_start();

// Query untuk menghapus data guru dari tabel tb_guru berdasarkan id_guru yang diberikan melalui parameter GET (menu_del)
mysqli_query($conn, "DELETE FROM tb_guru WHERE id_guru = '" . $_GET['menu_del'] . "'");

// Mengalihkan halaman kembali ke halaman admin.php dengan parameter p=guru setelah berhasil menghapus data
header("location:admin.php?p=guru");
?>

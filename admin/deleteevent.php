<?php
// Memanggil file koneksi database
require_once "./../connections/connections.php";

// Menonaktifkan laporan kesalahan PHP agar tidak ada pesan kesalahan yang ditampilkan
error_reporting(0);

// Memulai sesi
session_start();

// Query untuk menghapus data event dari tabel tb_event berdasarkan id_event yang diberikan melalui parameter GET (menu_del)
mysqli_query($conn, "DELETE FROM tb_event WHERE id_event = '" . $_GET['menu_del'] . "'");

// Mengalihkan halaman kembali ke halaman admin.php dengan parameter p=event setelah berhasil menghapus data
header("location:admin.php?p=event");
?>

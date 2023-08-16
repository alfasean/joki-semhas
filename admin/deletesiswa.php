<?php
// Memanggil file koneksi database
require_once "./../connections/connections.php";

// Menonaktifkan laporan kesalahan PHP agar tidak ada pesan kesalahan yang ditampilkan
error_reporting(0);

// Memulai sesi
session_start();

// Query untuk menghapus data siswa dari tabel tb_siswa berdasarkan id_siswa yang diberikan melalui parameter GET (menu_del)
mysqli_query($conn, "DELETE FROM tb_siswa WHERE id_siswa = '" . $_GET['menu_del'] . "'");

// Mengalihkan halaman kembali ke halaman admin.php dengan parameter p=siswa setelah berhasil menghapus data
header("location:admin.php?p=siswa");
?>

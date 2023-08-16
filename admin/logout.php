<?php 
// Memulai sesi
session_start();
// Mengosongkan nilai session untuk 'session_username' dan 'session_password'
$_SESSION['session_username'] = "";
$_SESSION['session_password'] = "";
// Menghancurkan sesi yang aktif
session_destroy();
// Mengarahkan pengguna kembali ke halaman "index.php"
header("location:index.php");
?>

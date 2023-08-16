<?php
session_start();
require_once "./../connections/connections.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memulai sesi dan memerlukan file koneksi ke database

    $judul = $_POST["judul"];
    $tanggal = $_POST["tanggal"];
    $tanggal_berakhir = $_POST["tanggal_berakhir"];
    // Mengambil nilai yang diinputkan oleh pengguna melalui form

    $sql = "INSERT INTO tb_kalender (judul, tanggal, tanggal_berakhir)
            VALUES ('$judul', '$tanggal', '$tanggal_berakhir')";
    // Membuat pernyataan SQL untuk menyisipkan data kegiatan ke dalam tabel "tb_kalender"

    if ($conn->query($sql) === TRUE) {
        // Jika pernyataan SQL berhasil dieksekusi

        $conn->close();
        // Menutup koneksi ke database

        echo '<script>window.location.href = "admin.php?p=kalender";</script>';
        // Mengarahkan halaman kembali ke halaman "admin.php?p=kalender" setelah data kegiatan berhasil ditambahkan
        exit();
    } else {
        // Jika terjadi kesalahan saat mengeksekusi pernyataan SQL

        echo "Error: " . $sql . "<br>" . $conn->error;
        // Menampilkan pesan error beserta informasi kesalahan dari database
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kalender</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="form-container mt-2">
        <h2>Tambah Kalender</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul">Nama Kegiatan:</label>
                <input type="text" id="judul" name="judul">
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Kegiatan:</label>
                <input type="date" id="tanggal" name="tanggal">
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Berakhir Kegiatan:</label>
                <input type="date" id="tanggal" name="tanggal_berakhir">
            </div>
            <div class="form-group submit-button">
                <button class="btn btn-success" type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
